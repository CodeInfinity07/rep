<!DOCTYPE html>
<html>
<head>
    <title>Cricket | BETGURU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/BetPro-style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { background: #1a1a1a; color: white; font-family: Arial, sans-serif; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { color: #4CAF50; margin-bottom: 30px; }
        .match-card { background: #2a2a2a; padding: 20px; margin-bottom: 15px; border-radius: 5px; }
        .match-name { font-size: 18px; font-weight: bold; color: #4CAF50; margin-bottom: 10px; }
        .match-info { color: #aaa; margin-bottom: 10px; }
        .odds-container { display: flex; gap: 20px; margin-top: 15px; }
        .runner { flex: 1; }
        .runner-name { font-weight: bold; margin-bottom: 5px; }
        .odds { display: flex; gap: 10px; }
        .box { padding: 8px 12px; border-radius: 3px; text-align: center; }
        .box.-blue { background: #1976D2; }
        .box.-pink { background: #E91E63; }
        .box.-empty_blue { background: #333; color: #666; }
        .box.-empty_pink { background: #333; color: #666; }
        #loader { text-align: center; padding: 50px; }
        .spinner { border: 4px solid #333; border-top: 4px solid #4CAF50; border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; margin: 0 auto; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cricket Matches</h1>
        <div id="loader"><div class="spinner"></div><p>Loading matches...</p></div>
        <div id="matches-container"></div>
    </div>

    <script>
        function formatSize(value) {
            if (!value || value === 0) return '-';
            if (value >= 1000) return (value / 1000).toFixed(2) + 'k';
            return value.toLocaleString();
        }

        function formatMatched(value) {
            if (!value || value === 0) return '';
            if (value >= 1000000) return (value / 1000000).toFixed(1) + 'M';
            if (value >= 1000) return (value / 1000).toFixed(0) + 'k';
            return value.toLocaleString();
        }

        function loadMatches() {
            $.get('/api/cricket-matches', function(data) {
                const matches = data.cricket || [];
                const container = $('#matches-container');
                $('#loader').hide();
                
                if (matches.length === 0) {
                    container.html('<p>No cricket matches available at the moment.</p>');
                    return;
                }
                
                container.html(matches.map(match => {
                    const runners = match.runners || [];
                    const r1 = runners[0] || {};
                    const r2 = runners[2] || {};  // The Draw
                    const r3 = runners[1] || {};
                    
                    const inplayBadge = match.inplay ? '<span style="background:#4CAF50;padding:2px 8px;border-radius:3px;font-size:12px;margin-left:10px;">LIVE</span>' : '';
                    
                    return `
                        <div class="match-card">
                            <div class="match-name">${match.marketName} ${inplayBadge}</div>
                            <div class="match-info">
                                Matched: ${formatMatched(match.totalMatched)} | 
                                Status: ${match.status} | 
                                Start: ${new Date(match.startTime).toLocaleString()}
                            </div>
                            <div class="odds-container">
                                ${r1.name ? `
                                    <div class="runner">
                                        <div class="runner-name">${r1.name}</div>
                                        <div class="odds">
                                            <div class="box -blue ${r1.back ? '' : '-empty_blue'}">
                                                <strong>${r1.back || ' '}</strong><br>
                                                <span>${formatSize(r1.backSize)}</span>
                                            </div>
                                            <div class="box -pink ${r1.lay ? '' : '-empty_pink'}">
                                                <strong>${r1.lay || ' '}</strong><br>
                                                <span>${formatSize(r1.laySize)}</span>
                                            </div>
                                        </div>
                                    </div>
                                ` : ''}
                                ${r2.name ? `
                                    <div class="runner">
                                        <div class="runner-name">${r2.name}</div>
                                        <div class="odds">
                                            <div class="box -blue ${r2.back ? '' : '-empty_blue'}">
                                                <strong>${r2.back || ' '}</strong><br>
                                                <span>${formatSize(r2.backSize)}</span>
                                            </div>
                                            <div class="box -pink ${r2.lay ? '' : '-empty_pink'}">
                                                <strong>${r2.lay || ' '}</strong><br>
                                                <span>${formatSize(r2.laySize)}</span>
                                            </div>
                                        </div>
                                    </div>
                                ` : ''}
                                ${r3.name ? `
                                    <div class="runner">
                                        <div class="runner-name">${r3.name}</div>
                                        <div class="odds">
                                            <div class="box -blue ${r3.back ? '' : '-empty_blue'}">
                                                <strong>${r3.back || ' '}</strong><br>
                                                <span>${formatSize(r3.backSize)}</span>
                                            </div>
                                            <div class="box -pink ${r3.lay ? '' : '-empty_pink'}">
                                                <strong>${r3.lay || ' '}</strong><br>
                                                <span>${formatSize(r3.laySize)}</span>
                                            </div>
                                        </div>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    `;
                }).join(''));
            });
        }

        $(document).ready(function() {
            loadMatches();
            setInterval(loadMatches, 60000);
        });
    </script>
</body>
</html>
