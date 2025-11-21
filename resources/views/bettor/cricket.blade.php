@extends('layouts.bettor')

@section('title', 'Cricket | BETGURU')

@section('content')
<div class="content-wrap body">
    <div class="container-fluid px-0">
        <!-- Preloader -->
        <div id="preloader" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.9); z-index: 9999; display: flex; align-items: center; justify-content: center;">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Cricket Matches Container -->
        <div id="cricket-matches-container" style="display: none;">
            <!-- Matches will be dynamically loaded here -->
        </div>
    </div>
</div>

<style>
.match-card {
    background: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    margin-bottom: 15px;
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.match-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #dee2e6;
}

.match-title {
    font-size: 16px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
    cursor: pointer;
}

.match-title:hover {
    color: #3498db;
}

.live-badge {
    background: #28a745;
    color: white;
    padding: 2px 8px;
    border-radius: 3px;
    font-size: 11px;
    font-weight: bold;
}

.match-info {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 10px;
}

.odds-table {
    width: 100%;
}

.odds-table th {
    background: #f8f9fa;
    font-size: 11px;
    font-weight: 600;
    padding: 5px;
    text-align: center;
    border: 1px solid #dee2e6;
}

.odds-table td {
    padding: 5px;
    text-align: center;
    font-size: 12px;
    border: 1px solid #dee2e6;
}

.runner-name {
    text-align: left !important;
    font-weight: 500;
}

.back-cell {
    background: #72bbef;
    color: #000;
    font-weight: 600;
}

.lay-cell {
    background: #faa9ba;
    color: #000;
    font-weight: 600;
}

.matched-amount {
    font-size: 11px;
    color: #6c757d;
    margin-top: 5px;
}

.no-matches {
    text-align: center;
    padding: 40px;
    color: #6c757d;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadCricketMatches();
    
    // Auto-refresh every 60 seconds
    setInterval(loadCricketMatches, 60000);
});

function loadCricketMatches() {
    fetch('/api/cricket-matches')
        .then(response => response.json())
        .then(data => {
            const cricketMatches = data.result.cricket || [];
            displayMatches(cricketMatches);
            
            // Hide preloader and show content
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('cricket-matches-container').style.display = 'block';
        })
        .catch(error => {
            console.error('Error loading cricket matches:', error);
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('cricket-matches-container').innerHTML = 
                '<div class="no-matches">Error loading matches. Please try again later.</div>';
            document.getElementById('cricket-matches-container').style.display = 'block';
        });
}

function displayMatches(matches) {
    const container = document.getElementById('cricket-matches-container');
    
    if (!matches || matches.length === 0) {
        container.innerHTML = '<div class="no-matches">No cricket matches available at the moment.</div>';
        return;
    }
    
    let html = '';
    
    matches.forEach(match => {
        const isLive = match.inplay || false;
        const matchedAmount = formatMatched(match.totalMatched || 0);
        
        html += `
            <div class="match-card">
                <div class="match-header">
                    <h5 class="match-title" onclick="window.location.href='/cricket/${match.marketId}'">
                        ${match.eventName || 'Cricket Match'}
                    </h5>
                    ${isLive ? '<span class="live-badge">LIVE</span>' : ''}
                </div>
                
                <div class="match-info">
                    Market ID: ${match.marketId} | Matched: ₹${matchedAmount}
                </div>
                
                ${match.runners && match.runners.length > 0 ? generateOddsTable(match.runners) : '<p class="text-muted">Odds not available</p>'}
            </div>
        `;
    });
    
    container.innerHTML = html;
}

function generateOddsTable(runners) {
    let html = `
        <table class="odds-table">
            <thead>
                <tr>
                    <th style="width: 40%;">Runner</th>
                    <th style="width: 10%;">Back</th>
                    <th style="width: 10%;">Size</th>
                    <th style="width: 10%;">Lay</th>
                    <th style="width: 10%;">Size</th>
                </tr>
            </thead>
            <tbody>
    `;
    
    runners.forEach(runner => {
        const backPrice = runner.back_price_1 || '-';
        const backSize = runner.back_size_1 ? formatSize(runner.back_size_1) : '-';
        const layPrice = runner.lay_price_1 || '-';
        const laySize = runner.lay_size_1 ? formatSize(runner.lay_size_1) : '-';
        
        html += `
            <tr>
                <td class="runner-name">${runner.selectionName || 'Unknown'}</td>
                <td class="back-cell">${formatOdds(backPrice)}</td>
                <td class="back-cell">${backSize}</td>
                <td class="lay-cell">${formatOdds(layPrice)}</td>
                <td class="lay-cell">${laySize}</td>
            </tr>
        `;
    });
    
    html += `
            </tbody>
        </table>
    `;
    
    return html;
}

function formatOdds(value) {
    if (!value || value === '-' || value === 0) return '-';
    return parseFloat(value).toFixed(2);
}

function formatSize(value) {
    if (!value || value === 0) return '-';
    if (value >= 1000) {
        return (value / 1000).toFixed(2) + 'k';
    }
    return value.toFixed(0);
}

function formatMatched(value) {
    if (!value || value === 0) return '0';
    if (value >= 1000000) {
        return (value / 1000000).toFixed(2) + 'M';
    }
    if (value >= 1000) {
        return (value / 1000).toFixed(2) + 'k';
    }
    return value.toFixed(0);
}
</script>
@endsection
