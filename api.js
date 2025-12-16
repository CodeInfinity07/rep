import 'dotenv/config';
import axios from 'axios';
import mysql from 'mysql2/promise';

// Database configuration
const dbConfig = {
    host: process.env.DB_HOST || 'localhost',
    user: process.env.DB_USERNAME || 'root',
    password: process.env.DB_PASSWORD || '',
    database: process.env.DB_DATABASE || 'sports_betting',
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
};

// Sport IDs we want to track
const SPORT_IDS = {
    CRICKET: 4,
    FOOTBALL: 1,
    TENNIS: 2,
    HORSE_RACING: 10,
    GREYHOUND_RACING: 65
};

let pool;

// Initialize database connection
async function initDatabase() {
    try {
        pool = mysql.createPool(dbConfig);
        console.log('✅ Database connection pool created');
        
        // Test connection
        const connection = await pool.getConnection();
        console.log('✅ Database connection successful');
        connection.release();
        
        // Create tables
        await createTables();
    } catch (error) {
        console.error('❌ Database connection failed:', error.message);
        process.exit(1);
    }
}

// Create database tables
async function createTables() {
    try {
        const connection = await pool.getConnection();
        
        // Sports table
        await connection.query(`
            CREATE TABLE IF NOT EXISTS sports (
                id INT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                oid INT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                UNIQUE KEY idx_sport_id (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        `);
        
        // Competitions table
        await connection.query(`
            CREATE TABLE IF NOT EXISTS competitions (
                cid VARCHAR(50) PRIMARY KEY,
                sport_id INT NOT NULL,
                name VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (sport_id) REFERENCES sports(id) ON DELETE CASCADE,
                INDEX idx_sport (sport_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        `);
        
        // Matches table (for t1 sports: cricket, football, tennis)
        await connection.query(`
            CREATE TABLE IF NOT EXISTS matches (
                gmid BIGINT PRIMARY KEY,
                sport_id INT NOT NULL,
                cid VARCHAR(50),
                match_name VARCHAR(500) NOT NULL,
                competition_name VARCHAR(255),
                match_status VARCHAR(50),
                is_inplay BOOLEAN DEFAULT FALSE,
                scheduled_time DATETIME,
                is_live BOOLEAN DEFAULT FALSE,
                has_bookmaker BOOLEAN DEFAULT FALSE,
                has_fancy BOOLEAN DEFAULT FALSE,
                iscc INT DEFAULT 0,
                last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (sport_id) REFERENCES sports(id) ON DELETE CASCADE,
                FOREIGN KEY (cid) REFERENCES competitions(cid) ON DELETE CASCADE,
                INDEX idx_sport (sport_id),
                INDEX idx_competition (cid),
                INDEX idx_status (match_status),
                INDEX idx_scheduled (scheduled_time)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        `);
        
        // Racing events table (for t2: horse racing, greyhound racing)
        await connection.query(`
            CREATE TABLE IF NOT EXISTS racing_events (
                gmid BIGINT PRIMARY KEY,
                sport_id INT NOT NULL,
                venue_name VARCHAR(255) NOT NULL,
                scheduled_datetime DATETIME NOT NULL,
                iscc INT DEFAULT 0,
                last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (sport_id) REFERENCES sports(id) ON DELETE CASCADE,
                INDEX idx_sport (sport_id),
                INDEX idx_venue (venue_name),
                INDEX idx_scheduled (scheduled_datetime)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        `);
        
        // Match odds table
        await connection.query(`
            CREATE TABLE IF NOT EXISTS match_odds (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                gmid BIGINT NOT NULL,
                sid INT,
                selection_name VARCHAR(255),
                back_odds DECIMAL(10,2),
                back_size DECIMAL(15,2),
                lay_odds DECIMAL(10,2),
                lay_size DECIMAL(15,2),
                section_number INT,
                status VARCHAR(50),
                last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (gmid) REFERENCES matches(gmid) ON DELETE CASCADE,
                INDEX idx_match (gmid),
                INDEX idx_selection (sid)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        `);
        
        connection.release();
        console.log('✅ Database tables created/verified');
    } catch (error) {
        console.error('❌ Error creating tables:', error.message);
        throw error;
    }
}

// Fetch tree data from API
async function fetchSportsData() {
    try {
        const response = await axios.get('https://api.cricketid.xyz/tree?key=dijbfuwd719e12rqhfbjdqdnkqnd11', {
            timeout: 10000,
            headers: {
                'User-Agent': 'Mozilla/5.0',
                'Accept': 'application/json'
            }
        });
        
        if (response.data && response.data.success) {
            return response.data.data;
        }
        
        return null;
    } catch (error) {
        console.error('❌ Error fetching tree data:', error.message);
        return null;
    }
}

// Fetch detailed match data for a specific sport from esid endpoint
async function fetchSportDetails(sportId) {
    try {
        const response = await axios.get(`https://api.cricketid.xyz/esid?sid=${sportId}&key=dijbfuwd719e12rqhfbjdqdnkqnd11`, {
            timeout: 15000,
            headers: {
                'User-Agent': 'Mozilla/5.0',
                'Accept': 'application/json'
            }
        });
        
        if (response.data && response.data.success) {
            return response.data.data;
        }
        
        return null;
    } catch (error) {
        console.error(`❌ Error fetching details for sport ${sportId}:`, error.message);
        return null;
    }
}

// Parse datetime string to MySQL format (convert to Pakistan time)
// Add 30 minutes to get correct Pakistan display time
function parseDatetime(dateStr) {
    if (!dateStr) return null;
    try {
        // Format: "12/11/2025 7:00:00 PM"
        // We need to add 30 minutes to get correct Pakistan time
        
        // Try to parse as MM/DD/YYYY HH:MM:SS AM/PM format
        const parts = dateStr.match(/(\d{1,2})\/(\d{1,2})\/(\d{4})\s+(\d{1,2}):(\d{2}):(\d{2})\s*(AM|PM)?/i);
        
        if (!parts) {
            return null; // Can't parse, return null
        }
        
        let [, month, day, year, hours, minutes, seconds, ampm] = parts;
        let h = parseInt(hours);
        let m = parseInt(minutes);
        let s = parseInt(seconds);
        let d = parseInt(day);
        let mo = parseInt(month);
        let y = parseInt(year);
        
        // Convert 12-hour to 24-hour format
        if (ampm) {
            if (ampm.toUpperCase() === 'PM' && h !== 12) {
                h += 12;
            } else if (ampm.toUpperCase() === 'AM' && h === 12) {
                h = 0;
            }
        }
        
        // Add 30 minutes using pure arithmetic
        m += 30;
        if (m >= 60) {
            m -= 60;
            h += 1;
        }
        if (h >= 24) {
            h -= 24;
            d += 1;
        }
        // Handle day overflow
        const daysInMonth = [31, (y % 4 === 0 && (y % 100 !== 0 || y % 400 === 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        if (d > daysInMonth[mo - 1]) {
            d = 1;
            mo += 1;
            if (mo > 12) {
                mo = 1;
                y += 1;
            }
        }
        
        // Format as MySQL datetime
        const pad = (n) => n.toString().padStart(2, '0');
        return `${y}-${pad(mo)}-${pad(d)} ${pad(h)}:${pad(m)}:${pad(s)}`;
    } catch (error) {
        console.error('Error parsing datetime:', dateStr, error.message);
        return null;
    }
}

// Save sports data
async function saveSports(sportsData) {
    const connection = await pool.getConnection();
    try {
        await connection.beginTransaction();
        
        const insertSql = `
            INSERT INTO sports (id, name, oid) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE 
                name = VALUES(name),
                oid = VALUES(oid),
                updated_at = CURRENT_TIMESTAMP
        `;
        
        for (const sport of sportsData) {
            await connection.query(insertSql, [sport.etid, sport.name, sport.oid]);
        }
        
        await connection.commit();
    } catch (error) {
        await connection.rollback();
        console.error('❌ Error saving sports:', error.message);
    } finally {
        connection.release();
    }
}

// Save competitions
async function saveCompetitions(competitions, sportId) {
    const connection = await pool.getConnection();
    try {
        await connection.beginTransaction();
        
        const insertSql = `
            INSERT INTO competitions (cid, sport_id, name) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE 
                name = VALUES(name),
                updated_at = CURRENT_TIMESTAMP
        `;
        
        for (const comp of competitions) {
            await connection.query(insertSql, [comp.cid, sportId, comp.name]);
        }
        
        await connection.commit();
    } catch (error) {
        await connection.rollback();
        console.error('❌ Error saving competitions:', error.message);
    } finally {
        connection.release();
    }
}

// Save matches (t1 data)
async function saveMatches(matches, sportId) {
    const connection = await pool.getConnection();
    try {
        await connection.beginTransaction();
        
        const insertSql = `
            INSERT INTO matches (
                gmid, sport_id, cid, match_name, competition_name, 
                match_status, is_inplay, scheduled_time, is_live, 
                has_bookmaker, has_fancy, iscc
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE 
                match_name = VALUES(match_name),
                match_status = VALUES(match_status),
                is_inplay = VALUES(is_inplay),
                scheduled_time = VALUES(scheduled_time),
                is_live = VALUES(is_live),
                has_bookmaker = VALUES(has_bookmaker),
                has_fancy = VALUES(has_fancy),
                iscc = VALUES(iscc),
                last_updated = CURRENT_TIMESTAMP
        `;
        
        for (const match of matches) {
            await connection.query(insertSql, [
                match.gmid,
                sportId,
                match.cid,
                match.name || match.ename,
                match.cname,
                match.status || 'UNKNOWN',
                match.iplay || false,
                parseDatetime(match.stime),
                match.tv || false,
                match.bm || false,
                match.f || false,
                match.iscc || 0
            ]);
            
            // Save odds if available
            if (match.section && Array.isArray(match.section)) {
                await saveMatchOdds(connection, match.gmid, match.section);
            }
        }
        
        await connection.commit();
    } catch (error) {
        await connection.rollback();
        console.error('❌ Error saving matches:', error.message);
    } finally {
        connection.release();
    }
}

// Save match odds
async function saveMatchOdds(connection, gmid, sections) {
    try {
        // Delete old odds for this match
        await connection.query('DELETE FROM match_odds WHERE gmid = ?', [gmid]);
        
        const insertSql = `
            INSERT INTO match_odds (
                gmid, sid, selection_name, back_odds, back_size, 
                lay_odds, lay_size, section_number, status
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        `;
        
        for (const section of sections) {
            let backOdds = null, backSize = null, layOdds = null, laySize = null;
            
            if (section.odds && Array.isArray(section.odds)) {
                for (const odd of section.odds) {
                    if (odd.otype === 'back' || odd.otype === 'BACK') {
                        backOdds = odd.odds;
                        backSize = odd.size;
                    } else if (odd.otype === 'lay' || odd.otype === 'LAY') {
                        layOdds = odd.odds;
                        laySize = odd.size;
                    }
                }
            }
            
            await connection.query(insertSql, [
                gmid,
                section.sid || 0,
                section.nat || '',
                backOdds,
                backSize,
                layOdds,
                laySize,
                section.sno || 0,
                section.gstatus || 'UNKNOWN'
            ]);
        }
    } catch (error) {
        console.error('❌ Error saving match odds:', error.message);
    }
}

// Save racing events (t2 data)
async function saveRacingEvents(events, sportId) {
    const connection = await pool.getConnection();
    try {
        await connection.beginTransaction();
        
        const insertSql = `
            INSERT INTO racing_events (
                gmid, sport_id, venue_name, scheduled_datetime, iscc
            ) VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE 
                venue_name = VALUES(venue_name),
                scheduled_datetime = VALUES(scheduled_datetime),
                iscc = VALUES(iscc),
                last_updated = CURRENT_TIMESTAMP
        `;
        
        for (const event of events) {
            await connection.query(insertSql, [
                event.gmid,
                sportId,
                event.name,
                parseDatetime(event.sdatetime),
                event.iscc || 0
            ]);
        }
        
        await connection.commit();
    } catch (error) {
        await connection.rollback();
        console.error('❌ Error saving racing events:', error.message);
    } finally {
        connection.release();
    }
}

// Process and save all data from tree endpoint
async function processData(data) {
    if (!data) return;
    
    try {
        // Process t1 array (regular sports) - save sports and competitions from tree
        if (data.t1 && Array.isArray(data.t1)) {
            // Save all sports first
            await saveSports(data.t1);
            
            // Save competitions for tracked sports
            for (const sport of data.t1) {
                const isTrackedSport = Object.values(SPORT_IDS).includes(sport.etid);
                if (isTrackedSport && sport.children && Array.isArray(sport.children)) {
                    await saveCompetitions(sport.children, sport.etid);
                }
            }
        }
        
        // Process t2 array (racing events) - save sports from tree
        if (data.t2 && Array.isArray(data.t2)) {
            await saveSports(data.t2);
        }
        
    } catch (error) {
        console.error('❌ Error processing tree data:', error.message);
    }
}

// Fetch and save detailed match data from esid endpoint for all tracked sports
async function fetchAndSaveDetailedData() {
    const sportNames = {
        [SPORT_IDS.CRICKET]: 'Cricket',
        [SPORT_IDS.FOOTBALL]: 'Football',
        [SPORT_IDS.TENNIS]: 'Tennis',
        [SPORT_IDS.HORSE_RACING]: 'Horse Racing',
        [SPORT_IDS.GREYHOUND_RACING]: 'Greyhound Racing'
    };
    
    // Fetch detailed data for Cricket, Football, Tennis
    const regularSports = [SPORT_IDS.CRICKET, SPORT_IDS.FOOTBALL, SPORT_IDS.TENNIS];
    
    for (const sportId of regularSports) {
        try {
            const details = await fetchSportDetails(sportId);
            if (details && details.t1 && Array.isArray(details.t1)) {
                await saveMatchesFromEsid(details.t1, sportId);
                console.log(`✅ Saved ${details.t1.length} ${sportNames[sportId]} matches with odds`);
            }
        } catch (error) {
            console.error(`❌ Error processing ${sportNames[sportId]}:`, error.message);
        }
    }
    
    // Fetch detailed data for Horse Racing and Greyhound Racing
    const racingSports = [SPORT_IDS.HORSE_RACING, SPORT_IDS.GREYHOUND_RACING];
    
    for (const sportId of racingSports) {
        try {
            const details = await fetchSportDetails(sportId);
            if (details && details.t2 && Array.isArray(details.t2)) {
                await saveRacingEvents(details.t2, sportId);
                console.log(`✅ Saved ${details.t2.length} ${sportNames[sportId]} events`);
            }
        } catch (error) {
            console.error(`❌ Error processing ${sportNames[sportId]}:`, error.message);
        }
    }
}

// Save matches from esid endpoint with full odds data
async function saveMatchesFromEsid(matches, sportId) {
    const connection = await pool.getConnection();
    try {
        await connection.beginTransaction();
        
        const insertSql = `
            INSERT INTO matches (
                gmid, sport_id, cid, match_name, competition_name, 
                match_status, is_inplay, scheduled_time, is_live, 
                has_bookmaker, has_fancy, iscc
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE 
                match_name = VALUES(match_name),
                competition_name = VALUES(competition_name),
                match_status = VALUES(match_status),
                is_inplay = VALUES(is_inplay),
                scheduled_time = VALUES(scheduled_time),
                is_live = VALUES(is_live),
                has_bookmaker = VALUES(has_bookmaker),
                has_fancy = VALUES(has_fancy),
                iscc = VALUES(iscc),
                last_updated = CURRENT_TIMESTAMP
        `;
        
        for (const match of matches) {
            // esid endpoint uses 'ename' for match name
            const matchName = match.ename || match.name;
            if (!matchName) continue; // Skip if no name
            
            await connection.query(insertSql, [
                match.gmid,
                sportId,
                match.cid,
                matchName,
                match.cname,
                match.status || 'UNKNOWN',
                match.iplay || false,
                parseDatetime(match.stime),
                match.tv || false,
                match.bm || false,
                match.f || false,
                match.iscc || 0
            ]);
            
            // Save odds if available
            if (match.section && Array.isArray(match.section)) {
                await saveMatchOddsFromEsid(connection, match.gmid, match.section);
            }
        }
        
        await connection.commit();
    } catch (error) {
        await connection.rollback();
        console.error('❌ Error saving matches from esid:', error.message);
    } finally {
        connection.release();
    }
}

// Save match odds from esid endpoint
async function saveMatchOddsFromEsid(connection, gmid, sections) {
    try {
        // Delete old odds for this match
        await connection.query('DELETE FROM match_odds WHERE gmid = ?', [gmid]);
        
        const insertSql = `
            INSERT INTO match_odds (
                gmid, sid, selection_name, back_odds, back_size, 
                lay_odds, lay_size, section_number, status
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        `;
        
        for (const section of sections) {
            let backOdds = null, backSize = null, layOdds = null, laySize = null;
            
            if (section.odds && Array.isArray(section.odds)) {
                for (const odd of section.odds) {
                    if (odd.otype === 'back' || odd.otype === 'BACK') {
                        backOdds = odd.odds;
                        backSize = odd.size;
                    } else if (odd.otype === 'lay' || odd.otype === 'LAY') {
                        layOdds = odd.odds;
                        laySize = odd.size;
                    }
                }
            }
            
            await connection.query(insertSql, [
                gmid,
                section.sid || 0,
                section.nat || '',
                backOdds,
                backSize,
                layOdds,
                laySize,
                section.sno || 0,
                section.gstatus || 'UNKNOWN'
            ]);
        }
    } catch (error) {
        console.error('❌ Error saving match odds from esid:', error.message);
    }
}

// Main function
async function main() {
    console.log('🚀 Starting sports data fetcher...');
    
    // Initialize database
    await initDatabase();
    
    // Function to fetch and save data
    const fetchAndSave = async () => {
        const timestamp = new Date().toLocaleString();
        console.log(`\n⏰ [${timestamp}] Fetching data...`);
        
        // First, fetch tree data and save sports/competitions
        const data = await fetchSportsData();
        if (data) {
            await processData(data);
        }
        
        // Then, fetch detailed match data from esid endpoint for all 5 sports
        await fetchAndSaveDetailedData();
        
        console.log('✅ Data processing complete');
    };
    
    // Initial fetch
    await fetchAndSave();
    
    // Set up interval (5 seconds)
    setInterval(fetchAndSave, 5000);
    
    console.log('✅ Scheduler running - fetching every 5 seconds');
}

// Handle graceful shutdown
process.on('SIGINT', async () => {
    console.log('\n🛑 Shutting down gracefully...');
    if (pool) {
        await pool.end();
    }
    process.exit(0);
});

process.on('unhandledRejection', (error) => {
    console.error('❌ Unhandled rejection:', error);
});

// Start the application
main().catch((error) => {
    console.error('❌ Fatal error:', error);
    process.exit(1);
});
