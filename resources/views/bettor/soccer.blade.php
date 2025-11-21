@extends('layouts.bettor')

@section('title', 'Soccer | BetPro')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h4 class="text-white mb-3">Soccer</h4>
            
            <div id="soccer-matches-container">
                <!-- Soccer matches will be populated here -->
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadSoccerMatches();
    
    // Refresh every 60 seconds
    setInterval(loadSoccerMatches, 60000);
});

function loadSoccerMatches() {
    fetch('/api/cricket-matches')
        .then(response => response.json())
        .then(data => {
            const soccerMatches = data.matches.filter(m => m.sportType === 'soccer');
            displayMatches(soccerMatches);
        })
        .catch(error => {
            console.error('Error loading soccer matches:', error);
        });
}

function displayMatches(matches) {
    const container = document.getElementById('soccer-matches-container');
    
    if (matches.length === 0) {
        container.innerHTML = '<div class="alert alert-info">No soccer matches available at the moment.</div>';
        return;
    }
    
    let html = '';
    
    matches.forEach(match => {
        const isInplay = match.inplay ? '<span class="badge badge-danger ml-2">LIVE</span>' : '';
        
        html += `
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">
                    <a href="/Common/market/?id=${match.marketId}" class="text-white">
                        ${match.marketName} ${isInplay}
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <small class="text-muted">Matched: ${formatMatched(match.totalMatched)}</small>
                        </div>
                    </div>
                    ${displayRunners(match.runners)}
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
}

function displayRunners(runners) {
    if (!runners || runners.length === 0) {
        return '<p class="text-muted">No odds available</p>';
    }
    
    let html = '<div class="row mt-2">';
    
    runners.forEach(runner => {
        const backOdds = runner.back || '-';
        const layOdds = runner.lay || '-';
        const backSize = formatSize(runner.backSize);
        const laySize = formatSize(runner.laySize);
        
        html += `
            <div class="col-md-4 mb-2">
                <strong>${runner.name || 'Runner'}</strong><br>
                <div class="d-flex gap-2 mt-1">
                    <div class="box -blue ${backOdds !== '-' ? '' : '-empty_blue'}" style="padding: 5px; background: #72bbef; text-align: center; min-width: 60px;">
                        <strong>${backOdds}</strong><br>
                        <small>${backSize}</small>
                    </div>
                    <div class="box -pink ${layOdds !== '-' ? '' : '-empty_pink'}" style="padding: 5px; background: #faa9ba; text-align: center; min-width: 60px;">
                        <strong>${layOdds}</strong><br>
                        <small>${laySize}</small>
                    </div>
                </div>
            </div>
        `;
    });
    
    html += '</div>';
    return html;
}

function formatMatched(value) {
    if (!value || value === 0) return '0';
    if (value >= 1000000) return (value / 1000000).toFixed(2) + 'M';
    if (value >= 1000) return (value / 1000).toFixed(2) + 'k';
    return value.toLocaleString();
}

function formatSize(value) {
    if (!value || value === 0) return '-';
    if (value >= 1000) return (value / 1000).toFixed(2) + 'k';
    return value.toLocaleString();
}
</script>
@endsection
