import mysql from 'mysql2/promise';
import axios from 'axios';
import dotenv from 'dotenv';

dotenv.config();

const CRICKETID_API_KEY = process.env.CRICKETID_API_KEY || 'dijbfuwd719e12rqhfbjdqdnkqnd11';
const API_URL = `https://api.cricketid.xyz/get_placed_bets?key=${CRICKETID_API_KEY}`;

async function getDbConnection() {
    return await mysql.createConnection({
        host: process.env.DB_HOST,
        user: process.env.DB_USERNAME,
        password: process.env.DB_PASSWORD,
        database: process.env.DB_DATABASE,
        port: process.env.DB_PORT || 3306
    });
}

async function getUnsettledEventIds(connection) {
    const [rows] = await connection.execute(
        'SELECT DISTINCT event_id FROM results WHERE settled = 0 AND event_id IS NOT NULL'
    );
    return rows.map(row => row.event_id);
}

async function fetchDeclaredResults() {
    try {
        const response = await axios.get(API_URL);
        return response.data || [];
    } catch (error) {
        console.error('Error fetching results from API:', error.message);
        return [];
    }
}

async function settleMatchingBets(connection, declaredResults) {
    let settledCount = 0;
    
    for (const result of declaredResults) {
        if (!result.is_declared || result.is_roleback) {
            continue;
        }
        
        const marketId = result.market_id;
        const finalResult = result.final_result;
        
        const [matchingResults] = await connection.execute(
            'SELECT r.*, b.bet_type, b.odds, b.stake, b.user_id FROM results r JOIN bets b ON r.bet_id = b.id WHERE r.market_id = ? AND r.settled = 0',
            [marketId]
        );
        
        for (const bet of matchingResults) {
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
            
            console.log(`Settled bet ID ${bet.bet_id}: market_id=${marketId}, result=${finalResult}, P/L=${profitLoss}`);
            settledCount++;
        }
    }
    
    return settledCount;
}

function calculateProfitLoss(bet, finalResult) {
    const stake = parseFloat(bet.stake) || 0;
    const odds = parseFloat(bet.odds) || 0;
    const betType = bet.bet_type;
    const selectionName = bet.selection_name || '';
    const marketType = (bet.market_type || '').toLowerCase();
    
    let won = false;
    
    if (marketType === 'match' || marketType === 'match1' || marketType === 'match_odds') {
        won = selectionName.toLowerCase() === finalResult.toLowerCase();
    } else if (marketType === 'oddeven') {
        const resultNum = parseInt(finalResult);
        const isOdd = resultNum % 2 !== 0;
        won = (selectionName.toLowerCase() === 'odd' && isOdd) || 
              (selectionName.toLowerCase() === 'even' && !isOdd);
    } else {
        const resultNum = parseFloat(finalResult);
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
            } else if (marketType === 'line' || marketType === 'over_by_over' || marketType === 'ball_by_ball') {
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
            } else if (marketType === 'line' || marketType === 'over_by_over' || marketType === 'ball_by_ball') {
                profitLoss = -stake;
            } else {
                const size = parseFloat(bet.size) || 100;
                profitLoss = -(stake * (size / 100));
            }
        }
    }
    
    return Math.round(profitLoss * 100) / 100;
}

async function updateUserBalance(connection, userId, profitLoss) {
    if (profitLoss === 0) return;
    
    await connection.execute(
        'UPDATE users SET balance = balance + ? WHERE id = ?',
        [profitLoss, userId]
    );
}

async function run() {
    console.log('='.repeat(60));
    console.log(`Result Settlement Started: ${new Date().toISOString()}`);
    console.log('='.repeat(60));
    
    let connection;
    
    try {
        connection = await getDbConnection();
        console.log('Database connected');
        
        const unsettledEventIds = await getUnsettledEventIds(connection);
        console.log(`Found ${unsettledEventIds.length} unique event(s) with unsettled bets`);
        
        if (unsettledEventIds.length === 0) {
            console.log('No unsettled bets to process');
            return;
        }
        
        console.log('Event IDs:', unsettledEventIds.join(', '));
        
        console.log('Fetching declared results from API...');
        const declaredResults = await fetchDeclaredResults();
        console.log(`Received ${declaredResults.length} result(s) from API`);
        
        const relevantResults = declaredResults.filter(r => 
            r.is_declared && !r.is_roleback && unsettledEventIds.includes(r.event_id)
        );
        console.log(`${relevantResults.length} result(s) match our unsettled events`);
        
        const settledCount = await settleMatchingBets(connection, relevantResults);
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
    console.log(`Result Settlement Completed: ${new Date().toISOString()}`);
    console.log('='.repeat(60));
}

run();
