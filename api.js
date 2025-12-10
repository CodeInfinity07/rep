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

// Fetch data from API
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
        console.error('❌ Error fetching data:', error.message);
        return null;
    }
}

// Parse datetime string to MySQL format
function parseDatetime(dateStr) {
    if (!dateStr) return null;
    try {
        // Format: "12/10/2025 8:00:00 PM"
        const date = new Date(dateStr);
        if (isNaN(date.getTime())) return null;
        
        return date.toISOString().slice(0, 19).replace('T', ' ');
    } catch (error) {
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
                match.ename,
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

// Process and save all data
async function processData(data) {
    if (!data) return;
    
    try {
        // Process t1 array (regular sports)
        if (data.t1 && Array.isArray(data.t1)) {
            // Save all sports first
            await saveSports(data.t1);
            
            // Process each sport
            for (const sport of data.t1) {
                // Check if this is a sport we want to track
                const isTrackedSport = Object.values(SPORT_IDS).includes(sport.etid);
                
                if (isTrackedSport && sport.children && Array.isArray(sport.children)) {
                    // Save competitions
                    await saveCompetitions(sport.children, sport.etid);
                    
                    // Collect all matches from all competitions
                    const allMatches = [];
                    for (const competition of sport.children) {
                        if (competition.children && Array.isArray(competition.children)) {
                            allMatches.push(...competition.children);
                        }
                    }
                    
                    if (allMatches.length > 0) {
                        await saveMatches(allMatches, sport.etid);
                        console.log(`✅ Saved ${allMatches.length} ${sport.name} matches`);
                    }
                }
            }
        }
        
        // Process t2 array (racing events)
        if (data.t2 && Array.isArray(data.t2)) {
            for (const sport of data.t2) {
                const isRacingSport = sport.etid === SPORT_IDS.HORSE_RACING || 
                                     sport.etid === SPORT_IDS.GREYHOUND_RACING;
                
                if (isRacingSport && sport.children && Array.isArray(sport.children)) {
                    await saveRacingEvents(sport.children, sport.etid);
                    console.log(`✅ Saved ${sport.children.length} ${sport.name} events`);
                }
            }
        }
        
    } catch (error) {
        console.error('❌ Error processing data:', error.message);
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
        
        const data = await fetchSportsData();
        if (data) {
            await processData(data);
            console.log('✅ Data processing complete');
        }
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
