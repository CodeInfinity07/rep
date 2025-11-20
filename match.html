<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Cricket Odds</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .header-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .update-time {
            color: #666;
            font-size: 14px;
        }

        .controls {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .refresh-btn {
            padding: 8px 16px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .refresh-btn:hover {
            background: #1d4ed8;
        }

        .market {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .market-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .market-title {
            font-size: 20px;
            font-weight: bold;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-open {
            background: #d1fae5;
            color: #065f46;
        }

        .status-suspended {
            background: #fef3c7;
            color: #92400e;
        }

        .team-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .team-name {
            font-weight: 600;
            font-size: 16px;
            min-width: 200px;
        }

        .odds-container {
            display: flex;
            gap: 8px;
        }

        .odds-box {
            min-width: 80px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            border: 2px solid;
            transition: all 0.1s ease;
        }

        .back-odds {
            background: #dbeafe;
            border-color: #3b82f6;
        }

        .lay-odds {
            background: #fce7f3;
            border-color: #ec4899;
        }

        .odds-value {
            font-size: 16px;
            font-weight: bold;
            color: #1f2937;
        }

        .odds-size {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
        }

        /* Flash animation */
        @keyframes yellowFlash {
            0% { background-color: inherit; }
            50% { background-color: #fef08a; }
            100% { background-color: inherit; }
        }

        .flash {
            animation: yellowFlash 0.6s ease-in-out;
        }

        .legend {
            display: flex;
            gap: 20px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: #6b7280;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-box {
            width: 20px;
            height: 20px;
            border-radius: 3px;
        }

        .fancy-bet {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .fancy-name {
            font-weight: 500;
            flex: 1;
        }

        .fancy-status {
            font-size: 11px;
            padding: 3px 8px;
            background: #f3f4f6;
            border-radius: 10px;
            margin-left: 10px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .loading {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏏 Pakistan vs South Africa - Live Odds</h1>
            <div class="header-info">
                <div class="update-time" id="lastUpdate">Connecting...</div>
                <div class="controls">
                    <select id="refreshRate">
                        <option value="100" selected>100ms</option>
                        <option value="500">500ms</option>
                        <option value="1000">1 second</option>
                        <option value="2000">2 seconds</option>
                        <option value="5000">5 seconds</option>
                    </select>
                    <button class="refresh-btn" id="refreshBtn">Refresh Now</button>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="loading">Loading data...</div>
        </div>
    </div>

    <script>
        const API_URL = 'http://15.204.230.60/hitpro/gameprivate?etid=4&gmid=662880303&key=ccc121';
        let previousData = null;
        let refreshInterval = null;
        let currentRefreshRate = 100;

        // Store element references for change detection
        const elementMap = new Map();

        function makeId(marketIdx, sectionIdx, oddIdx, field) {
            return `${marketIdx}-${sectionIdx}-${oddIdx}-${field}`;
        }

        function flashElement(elementId) {
            const element = elementMap.get(elementId);
            if (element) {
                element.classList.remove('flash');
                // Force reflow
                void element.offsetWidth;
                element.classList.add('flash');
            }
        }

        function compareAndFlash(newData) {
            if (!previousData) {
                previousData = JSON.parse(JSON.stringify(newData));
                return;
            }

            newData.forEach((market, mIdx) => {
                const oldMarket = previousData[mIdx];
                if (!oldMarket) return;

                market.section?.forEach((section, sIdx) => {
                    const oldSection = oldMarket.section?.[sIdx];
                    if (!oldSection) return;

                    section.odds?.forEach((odd, oIdx) => {
                        const oldOdd = oldSection.odds?.[oIdx];
                        if (!oldOdd) return;

                        if (odd.odds !== oldOdd.odds) {
                            flashElement(makeId(mIdx, sIdx, oIdx, 'odds'));
                        }
                        if (odd.size !== oldOdd.size) {
                            flashElement(makeId(mIdx, sIdx, oIdx, 'size'));
                        }
                    });
                });
            });

            previousData = JSON.parse(JSON.stringify(newData));
        }

        function renderOddsBox(odd, marketIdx, sectionIdx, oddIdx) {
            const isBack = odd.otype === 'back';
            const oddsId = makeId(marketIdx, sectionIdx, oddIdx, 'odds');
            const sizeId = makeId(marketIdx, sectionIdx, oddIdx, 'size');

            const box = document.createElement('div');
            box.className = `odds-box ${isBack ? 'back-odds' : 'lay-odds'}`;

            const oddsValue = document.createElement('div');
            oddsValue.className = 'odds-value';
            oddsValue.textContent = odd.odds;
            oddsValue.id = oddsId;
            elementMap.set(oddsId, oddsValue);

            const oddsSize = document.createElement('div');
            oddsSize.className = 'odds-size';
            oddsSize.textContent = Math.round(odd.size).toLocaleString();
            oddsSize.id = sizeId;
            elementMap.set(sizeId, oddsSize);

            box.appendChild(oddsValue);
            box.appendChild(oddsSize);

            return box;
        }

        function renderMatchOdds(market, marketIdx) {
            if (market.mname !== 'MATCH_ODDS') return null;

            const div = document.createElement('div');
            div.className = 'market';

            const header = document.createElement('div');
            header.className = 'market-header';
            header.innerHTML = `
                <div class="market-title">Match Odds</div>
                <div class="status-badge status-${market.status.toLowerCase()}">${market.status}</div>
            `;
            div.appendChild(header);

            market.section.forEach((team, sIdx) => {
                const teamRow = document.createElement('div');
                teamRow.className = 'team-row';

                const teamName = document.createElement('div');
                teamName.className = 'team-name';
                teamName.textContent = team.nat;
                teamRow.appendChild(teamName);

                const oddsContainer = document.createElement('div');
                oddsContainer.className = 'odds-container';

                // Back odds (reverse order)
                const backs = team.odds.filter(o => o.otype === 'back').reverse();
                backs.forEach((odd, idx) => {
                    const originalIdx = team.odds.findIndex(o => o === odd);
                    oddsContainer.appendChild(renderOddsBox(odd, marketIdx, sIdx, originalIdx));
                });

                // Lay odds
                const lays = team.odds.filter(o => o.otype === 'lay');
                lays.forEach((odd, idx) => {
                    const originalIdx = team.odds.findIndex(o => o === odd);
                    oddsContainer.appendChild(renderOddsBox(odd, marketIdx, sIdx, originalIdx));
                });

                teamRow.appendChild(oddsContainer);
                div.appendChild(teamRow);
            });

            const legend = document.createElement('div');
            legend.className = 'legend';
            legend.innerHTML = `
                <div class="legend-item">
                    <div class="legend-box" style="background: #dbeafe; border: 2px solid #3b82f6;"></div>
                    <span>Back (Bet For)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-box" style="background: #fce7f3; border: 2px solid #ec4899;"></div>
                    <span>Lay (Bet Against)</span>
                </div>
            `;
            div.appendChild(legend);

            return div;
        }

        function renderBookmaker(market, marketIdx) {
            if (market.mname !== 'Bookmaker') return null;

            const div = document.createElement('div');
            div.className = 'market';

            const header = document.createElement('div');
            header.className = 'market-header';
            header.innerHTML = `
                <div class="market-title">Bookmaker</div>
                <div class="status-badge status-${market.status.toLowerCase()}">${market.status}</div>
            `;
            div.appendChild(header);

            market.section.forEach((team, sIdx) => {
                const teamRow = document.createElement('div');
                teamRow.className = 'team-row';

                const teamName = document.createElement('div');
                teamName.className = 'team-name';
                teamName.textContent = team.nat;
                teamRow.appendChild(teamName);

                const oddsContainer = document.createElement('div');
                oddsContainer.className = 'odds-container';

                team.odds.filter(o => o.odds > 0).forEach((odd, idx) => {
                    const originalIdx = team.odds.findIndex(o => o === odd);
                    oddsContainer.appendChild(renderOddsBox(odd, marketIdx, sIdx, originalIdx));
                });

                teamRow.appendChild(oddsContainer);
                div.appendChild(teamRow);
            });

            return div;
        }

        function renderFancyBets(market, marketIdx) {
            if (market.gtype !== 'fancy') return null;

            const div = document.createElement('div');
            div.className = 'market';

            const header = document.createElement('div');
            header.className = 'market-header';
            header.innerHTML = `
                <div class="market-title">${market.mname}</div>
                <div class="status-badge status-${market.status.toLowerCase()}">${market.status}</div>
            `;
            div.appendChild(header);

            market.section.forEach((bet, sIdx) => {
                const fancyBet = document.createElement('div');
                fancyBet.className = 'fancy-bet';

                const nameDiv = document.createElement('div');
                nameDiv.className = 'fancy-name';
                nameDiv.textContent = bet.nat;
                fancyBet.appendChild(nameDiv);

                if (bet.gstatus && bet.gstatus !== 'ACTIVE') {
                    const status = document.createElement('div');
                    status.className = 'fancy-status';
                    status.textContent = bet.gstatus;
                    fancyBet.appendChild(status);
                }

                const oddsContainer = document.createElement('div');
                oddsContainer.className = 'odds-container';

                bet.odds.filter(o => o.odds > 0).forEach((odd, idx) => {
                    const originalIdx = bet.odds.findIndex(o => o === odd);
                    oddsContainer.appendChild(renderOddsBox(odd, marketIdx, sIdx, originalIdx));
                });

                fancyBet.appendChild(oddsContainer);
                div.appendChild(fancyBet);
            });

            return div;
        }

        function render(data) {
            const content = document.getElementById('content');
            content.innerHTML = '';
            elementMap.clear();

            data.forEach((market, idx) => {
                const matchOdds = renderMatchOdds(market, idx);
                if (matchOdds) content.appendChild(matchOdds);

                const bookmaker = renderBookmaker(market, idx);
                if (bookmaker) content.appendChild(bookmaker);

                const fancy = renderFancyBets(market, idx);
                if (fancy) content.appendChild(fancy);
            });
        }

        async function fetchData() {
            try {
                const response = await fetch(API_URL);
                const result = await response.json();

                if (result.success && result.data) {
                    compareAndFlash(result.data);
                    render(result.data);
                    
                    const now = new Date();
                    document.getElementById('lastUpdate').textContent = 
                        `Last update: ${now.toLocaleTimeString()}.${now.getMilliseconds().toString().padStart(3, '0')}`;
                }
            } catch (error) {
                console.error('Fetch error:', error);
                document.getElementById('content').innerHTML = 
                    `<div class="error">Error: ${error.message}</div>`;
            }
        }

        function startRefresh() {
            if (refreshInterval) {
                clearInterval(refreshInterval);
            }
            fetchData();
            refreshInterval = setInterval(fetchData, currentRefreshRate);
        }

        // Event listeners
        document.getElementById('refreshRate').addEventListener('change', (e) => {
            currentRefreshRate = parseInt(e.target.value);
            startRefresh();
        });

        document.getElementById('refreshBtn').addEventListener('click', () => {
            fetchData();
        });

        // Start
        startRefresh();
    </script>
</body>
</html>
