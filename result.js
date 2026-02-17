import mysql from 'mysql2/promise';
import axios from 'axios';
import dotenv from 'dotenv';

dotenv.config();

const RESULT_API_URL = 'https://dia-results.cricketid.xyz/api/get-result';

async function getDbConnection() {
    return await mysql.createConnection({
        host: process.env.DB_HOST,
        user: process.env.DB_USERNAME,
        password: process.env.DB_PASSWORD,
        database: process.env.DB_DATABASE,
        port: process.env.DB_PORT || 3306
    });
}

async function getUnsettledBets(connection) {
    const [rows] = await connection.execute(
        'SELECT r.*, b.bet_type, b.odds, b.stake, b.user_id, b.size FROM results r JOIN bets b ON r.bet_id = b.id WHERE r.settled = 0 AND r.client_ref IS NOT NULL'
    );
    return rows;
}

async function fetchResultForBet(bet) {
    try {
        const payload = {
            event_id: parseInt(bet.event_id),
            event_name: bet.event_name,
            market_id: parseInt(bet.market_id),
            market_name: bet.selection_name,
            market_type: bet.market_type,
            client_ref: bet.client_ref,
        };

        console.log(`  Fetching result for client_ref=${bet.client_ref}, market_id=${bet.market_id}`);
        console.log(`  Request payload:`, JSON.stringify(payload));
        const response = await axios.post(RESULT_API_URL, payload, { timeout: 10000 });
        console.log(`  Server response (status ${response.status}):`, JSON.stringify(response.data));
        return response.data;
    } catch (error) {
        if (error.response) {
            console.error(`  Server error (status ${error.response.status}):`, JSON.stringify(error.response.data));
        } else {
            console.error(`  Error fetching result for client_ref=${bet.client_ref}:`, error.message);
        }
        return null;
    }
}

async function settleMatchingBets(connection, unsettledBets) {
    let settledCount = 0;

    for (const bet of unsettledBets) {
        const resultData = await fetchResultForBet(bet);

        if (!resultData) continue;

        if (!resultData.is_declared || resultData.is_roleback) {
            console.log(`  client_ref=${bet.client_ref}: Not yet declared or rolled back, skipping`);
            continue;
        }

        const finalResult = resultData.final_result;
        const profitLoss = calculateProfitLoss(bet, finalResult);

        await connection.execute(
            'UPDATE results SET result = ?, profit_loss = ?, settled = 1, settled_at = NOW() WHERE id = ?',
            [finalResult, profitLoss, bet.id]
        );

        await connection.execute(
            'UPDATE bets SET status = ?, profit = ? WHERE id = ?',
            ['settled', profitLoss, bet.bet_id]
        );

        await updateUserBalance(connection, bet.user_id, profitLoss);

        console.log(`  Settled bet ID ${bet.bet_id}: client_ref=${bet.client_ref}, result=${finalResult}, P/L=${profitLoss}`);
        settledCount++;
    }

    return settledCount;
}

function calculateProfitLoss(bet, finalResult) {
    const stake = parseFloat(bet.stake) || 0;
    const odds = parseFloat(bet.odds) || 0;
    const betType = bet.bet_type;
    const selectionName = bet.selection_name || '';
    const marketType = (bet.market_type || '').toLowerCase();
    const resultNum = parseFloat(finalResult);

    let won = false;

    if (marketType === 'match' || marketType === 'match1' || marketType === 'match_odds') {
        won = selectionName.toLowerCase() === finalResult.toLowerCase();
    } else if (marketType === 'oddeven') {
        const isOdd = parseInt(finalResult) % 2 !== 0;
        won = (selectionName.toLowerCase() === 'odd' && isOdd) ||
              (selectionName.toLowerCase() === 'even' && !isOdd);
    } else if (marketType === 'line' || marketType.includes('line') || marketType === 'over_by_over' || marketType === 'ball_by_ball') {
        if (betType === 'back') {
            won = resultNum >= odds;
        } else {
            won = resultNum < odds;
        }
    } else {
        const selectionNum = parseFloat(selectionName.replace(/[^\d.-]/g, ''));

        if (!isNaN(resultNum) && !isNaN(selectionNum)) {
            if (betType === 'back') {
                won = resultNum >= selectionNum;
            } else {
                won = resultNum < selectionNum;
            }
        }
    }

    let profitLoss = 0;

    if (betType === 'back') {
        if (won) {
            if (marketType === 'match' || marketType === 'match_odds' || marketType === 'oddeven' || marketType === 'tied_match') {
                profitLoss = stake * (odds - 1);
            } else if (marketType === 'match1') {
                profitLoss = stake * (odds / 100);
            } else if (marketType === 'line' || marketType.includes('line') || marketType === 'over_by_over' || marketType === 'ball_by_ball') {
                profitLoss = stake;
            } else {
                const size = parseFloat(bet.size) || 100;
                profitLoss = stake * (size / 100);
            }
        } else {
            profitLoss = -stake;
        }
    } else {
        if (won) {
            profitLoss = stake;
        } else {
            if (marketType === 'match' || marketType === 'match_odds' || marketType === 'oddeven' || marketType === 'tied_match') {
                profitLoss = -(stake * (odds - 1));
            } else if (marketType === 'match1') {
                profitLoss = -(stake * (odds / 100));
            } else if (marketType === 'line' || marketType.includes('line') || marketType === 'over_by_over' || marketType === 'ball_by_ball') {
                profitLoss = -stake;
            } else {
                const size = parseFloat(bet.size) || 100;
                profitLoss = -(stake * (size / 100));
            }
        }
    }

    console.log(`  Calculating: ${betType} bet, market=${marketType}, odds/line=${odds}, result=${resultNum}, won=${won}, P/L=${profitLoss}`);

    return Math.round(profitLoss * 100) / 100;
}

async function updateUserBalance(connection, userId, profitLoss) {
    if (profitLoss === 0) return;

    await connection.execute(
        'UPDATE users SET balance = balance + ? WHERE id = ?',
        [profitLoss, userId]
    );
}

const CHECK_INTERVAL_MS = 2 * 60 * 1000;

async function run() {
    console.log('='.repeat(60));
    console.log(`Result Settlement Check: ${new Date().toISOString()}`);
    console.log('='.repeat(60));

    let connection;

    try {
        connection = await getDbConnection();
        console.log('Database connected');

        const unsettledBets = await getUnsettledBets(connection);
        console.log(`Found ${unsettledBets.length} unsettled bet(s) with client_ref`);

        if (unsettledBets.length === 0) {
            console.log('No unsettled bets to process');
            return;
        }

        const settledCount = await settleMatchingBets(connection, unsettledBets);
        console.log(`\nSettled ${settledCount} bet(s)`);

    } catch (error) {
        console.error('Error:', error.message);
    } finally {
        if (connection) {
            await connection.end();
            console.log('Database connection closed');
        }
    }

    console.log('='.repeat(60));
    console.log(`Result Settlement Check Completed: ${new Date().toISOString()}`);
    console.log('='.repeat(60));
}

async function startLoop() {
    console.log('Result Settlement Service started');
    console.log(`Checking every ${CHECK_INTERVAL_MS / 1000} seconds`);

    while (true) {
        await run();
        console.log(`\nNext check in ${CHECK_INTERVAL_MS / 1000} seconds...\n`);
        await new Promise(resolve => setTimeout(resolve, CHECK_INTERVAL_MS));
    }
}

startLoop();
