@extends('layouts.bettor')

@section('title', ($eventName ?? 'Match Details') . ' | BETGURU')

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .container { position: relative; overflow: hidden; width: 100%; }
    .responsive-iframe { position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height: 100%; }
    .containerofiframe { position: relative; overflow: hidden; width: 100%; height: max-content; padding-top: 88%; }
    .checknow { -webkit-user-select: none; -ms-user-select: none; user-select: none; }
    .controls { overflow: hidden; background: #2b2f35; position: absolute; bottom: 0; left: 0; }
    .scores { background-color: #2b2f35; border: 1px solid #2b2f35; padding: 0.25rem; }
    .scores .runnername { margin-top: 7px; line-height: 0.2; color: white; font-size: 18px; }
    .scores .runner-score { color: white; font-size: 18px; margin-top: 2px; padding: 0px; }
    .scores .active { color: #009069 }
    .scores .col-divider { border-left: 1px solid white; }
    .tablefoter { font-size: 14px; border: 1px solid white; color: white; }
    .socindivs { padding: 0px; }
    .timeshow { color: white; font-size: 18px; }
    .scoresocer { color: white; font-size: 18px }
    .tablefotercs { font-size: 12px; color: white; }
    .colwidthset { width: 1vw; }
    .right-nav { padding-left: 10px; }
    .runrate { color: #666; font-size: 12px; margin-left: 10px; }
    
    #TVDIVIFRAME iframe { height: 330px; width: 100%; border: none; overflow: hidden; }
    @media screen and (max-width: 480px) {
        #TVDIVIFRAME iframe { height: 230px; width: 100%; border: none; overflow: hidden; }
        .runnername { margin-top: 10px; line-height: 0.1; color: white; font-size: 9px; }
        .colwidthset { width: 50px; }
        .tableresp { display: inline-table; }
        .lrhom { display: none; }
        .sethourshow { line-height: 0.3; font-size: 15px; }
        .tablefoter { font-size: 10px; }
        .runnersocer { color: white; font-size: 13px; margin-top: 2px; padding: 0px; line-height: 1.2; }
        .socindivs { padding: 0px; }
        .timeshow { color: white; font-size: 12px; }
        .scoresocer { color: white; font-size: 18px; padding: 0px; margin-bottom: 7px; }
        .tablefotercs { font-size: 11px; color: white; }
        .scores .runnername { margin-top: 7px; line-height: 0.2; color: white; font-size: 12px; }
    }

    iframe { width: 1px; min-width: 100%; }
    .tabcontent { margin-top: -4px; display: none; border: 1px solid #ccc; border-top: none; background-color: white; }
    div.scrollmenu { overflow: auto; white-space: nowrap; margin-bottom: -10px; transition: 0.5s; border-top-left-radius: 10px; border-top-right-radius: 10px; }
    div.scrollmenu a { display: inline-block; color: black; text-align: center; padding: 0px 20px; text-decoration: none; border-top-left-radius: 10px; border-top-right-radius: 10px; }
    div.scrollmenu a:hover { color: white; border-top-left-radius: 10px; border-top-right-radius: 10px; }
    
    @keyframes flashBack { 0% { background-color: rgb(80, 180, 220); } 100% { background-color: rgb(141, 210, 240); } }
    @keyframes flashLay { 0% { background-color: rgb(250, 120, 130); } 100% { background-color: rgb(254, 175, 178); } }
    .flash-back { animation: flashBack 0.3s ease-out; }
    .flash-lay { animation: flashLay 0.3s ease-out; }
    
    .customcheck { cursor: pointer; }
    .customcheck:hover { background-color: #e0f0ff; }
    .priceodd { font-size: 14px; }
    .priceamount { font-size: 11px; color: #666; }
    .positioncustom { font-size: 11px; }
</style>
@endpush

@section('content')
<div class="content-wrap body">
    <script>
        const marketId = '{{ $marketId }}';
        const eventId = '{{ $eventId ?? '' }}';
    </script>

    <div id="MarketView">
        <div id="loadedmarkettoshow" class="row">
            <div class="col-lg-8">
                <div class="left-content">
                    <div class="table-wrap">
                        <div class="table-box-header">
                            <div class="row no-gutters">
                                <div class="col-md-auto">
                                    <div class="box-main-icon">
                                        <img src="/img/v2/cricket.svg" alt="Box Icon">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="tb-top-text">
                                        <p>
                                            <img src="/img/v2/clock-green.svg">
                                            <span id="inplay-status" class="green-upper-text">{{ $inPlay ? 'InPlay' : 'Upcoming' }}</span>
                                            <span id="match-time-display" class="black-light-text"></span>
                                            <span class="black-light-text"> | Winners: 1</span>
                                        </p>
                                        <h4 class="event-title">{{ $eventName ?? 'Match' }}</h4>
                                        <p><span id="elapsed-time" class="medium-black">Elapsed : --:--:--</span></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="scrollmenu">
                                <a id="Alltab" class="tablink btn btn-primary active" onclick="MarketTab('All')">ALL</a>
                                <a id="BMtab" href="#" onclick="MarketTab('BM')" class="tablink btn btn-primary">Bookmaker</a>
                                <a id="Fancy2tab" href="#" onclick="MarketTab('Fancy2')" class="tablink btn btn-primary">Fancy-2</a>
                                <a id="Figuretab" href="#" onclick="MarketTab('Figure')" class="tablink btn btn-primary">Figure</a>
                                <a id="OddFiguretab" href="#" onclick="MarketTab('OddFigure')" class="tablink btn btn-primary">Even-Odd</a>
                                <a id="Othertab" href="#" onclick="MarketTab('Other')" class="tablink btn btn-primary">Others</a>
                            </div>
                        </div>
                        
                        <div class="table-box-header">
                            <div class="row no-gutters">
                                <div class="col-md">
                                    <div class="tb-top-text">
                                        <div id="live-score-display">
                                            <span id="team1-name">Team 1</span>
                                            <span id="team1-score" class="medium-black">0/0 (0)</span>
                                            <span id="team1-crr" class="runrate">CRR: 0</span>
                                        </div>
                                        <span class="green-upper-text" id="commentary-display">
                                            <div class="row">
                                                <div id="ball-commentary">Ball Chaloo!!</div>
                                            </div>
                                        </span>
                                        <p id="this-over-display">This Over : -</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="All" class="tabcontent" style="display: block;">
                            <div id="nav-tabContent" class="tab-content">
                                <div id="nav-1" class="tab-pane fade show active">
                                    <div class="table-box-body">
                                        <div id="match-odds-section" class="tb-content"></div>
                                        <div id="bookmaker-section" class="tb-content"></div>
                                        <div id="fancy2-section" class="tb-content"></div>
                                        <div id="completed-match-section" class="tb-content"></div>
                                        <div id="tied-match-section" class="tb-content"></div>
                                        <div id="figure-section" class="tb-content"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="BM" class="tabcontent">
                            <div id="bm-tab-content" class="tb-content"></div>
                        </div>
                        
                        <div id="Fancy2" class="tabcontent">
                            <div id="fancy2-tab-content" class="tb-content"></div>
                        </div>
                        
                        <div id="Figure" class="tabcontent">
                            <div id="figure-tab-content" class="tb-content"></div>
                        </div>
                        
                        <div id="OddFigure" class="tabcontent">
                            <div id="oddfigure-tab-content" class="tb-content"></div>
                        </div>
                        
                        <div id="Other" class="tabcontent">
                            <div id="other-tab-content" class="tb-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 right-nav">
                <div class="right-content">
                    <div class="table-wrap">
                        <div class="table-box-body">
                            <div class="btn-group btn-group-xs" style="width: 100%; height: 30px; margin-bottom: 2px;">
                                <button onclick="SHOWTV()" class="btn btn-primary btn-xs" style="width: 50%; border-right: solid;">Tv</button>
                                <button onclick="SHOWLIVE()" class="btn btn-primary btn-xs" style="width: 50%;">Score Card</button>
                            </div>
                            
                            <div id="TVDIVIFRAME" style="display: none;">
                                <iframe src="https://live.cricketid.xyz/casino-tv" allowfullscreen></iframe>
                            </div>
                            
                            <div id="LIVEDIV" style="display: block;">
                                <iframe id="livesc" src="https://score.akamaized.uk/index.html?id={{ $eventId }}" style="width:100%; height:200px; border:none;"></iframe>
                            </div>
                            
                            <div id="bet-slip-container" style="display: none; padding: 10px; margin-top: 10px; border-radius: 5px;">
                                <div id="bet-slip" class="bets">
                                    <div class="betting-table">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td colspan="4">
                                                        <strong id="bet-slip-runner">Runner Name</strong>
                                                        <span id="bet-slip-type" class="badge"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <input type="number" id="bet-slip-odds" class="form-control" placeholder="Odds" step="0.01" readonly>
                                                    </td>
                                                    <td style="width: 50%;">
                                                        <input type="number" id="bet-slip-stake" class="form-control" placeholder="Stake" min="1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="2000">2,000</button></td>
                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="5000">5,000</button></td>
                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="10000">10,000</button></td>
                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="25000">25,000</button></td>
                                                </tr>
                                                <tr>
                                                    <td><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="+1000">+1,000</button></td>
                                                    <td><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="+5000">+5,000</button></td>
                                                    <td><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="+10000">+10,000</button></td>
                                                    <td><button type="button" class="btn btn-secondary btn-block mt-2 stake-btn" data-amount="+25000">+25,000</button></td>
                                                </tr>
                                                <tr>
                                                    <td><button type="button" class="btn btn-danger mt-2" onclick="closeBetSlip()">Close</button></td>
                                                    <td colspan="2">
                                                        <button type="button" class="btn btn-primary ld-over mt-2" onclick="submitBet()"><b>Submit</b></button>
                                                        <span id="bet-slip-profit"> / -</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bets">
                                <strong>Open Bets (<span id="open-bets-count">0</span>)</strong>
                                <div class="betting-table">
                                    <table class="table">
                                        <thead>
                                            <tr><th>Runner</th><th>Price</th><th>Size</th><th></th></tr>
                                        </thead>
                                        <tbody id="open-bets-tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="bets">
                                <strong>Matched Bets (0)</strong>
                                <div class="betting-table">
                                    <table class="table">
                                        <thead>
                                            <tr><th>Runner</th><th>Price</th><th>Size</th></tr>
                                        </thead>
                                        <tbody id="matched-bets-tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div style="margin-top: 7px;">
                                <strong class="RM_In_Markets" style="display: block; background: rgb(43, 47, 53); color: rgb(255, 255, 255); padding: 10px;">Related Events</strong>
                                <div id="related-events-container">
                                    <table class="table compact" style="margin-bottom: 0px;">
                                        <tbody id="related-events-tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var currentBetData = null;
    var previousOdds = {};
    var allMarketData = {};
    
    function SHOWTV() {
        document.getElementById('TVDIVIFRAME').style.display = 'block';
        document.getElementById('LIVEDIV').style.display = 'none';
    }
    
    function SHOWLIVE() {
        document.getElementById('TVDIVIFRAME').style.display = 'none';
        document.getElementById('LIVEDIV').style.display = 'block';
    }
    
    function MarketTab(tabName) {
        var tabcontent = document.getElementsByClassName("tabcontent");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        var tablinks = document.getElementsByClassName("tablink");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(tabName).style.display = "block";
        document.getElementById(tabName + "tab").classList.add("active");
    }
    
    function formatAmount(size) {
        if (!size) return '';
        if (size >= 1000000) return (size / 1000000).toFixed(1) + 'M';
        if (size >= 1000) return (size / 1000).toFixed(1) + 'K';
        return Math.round(size).toString();
    }
    
    function createMarketSection(title, maxBet, mktId, runners, showBook = false) {
        let html = `
            <div class="market-titlebar">
                <p class="market-name">
                    <span class="market-name-badge">
                        <i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i>
                        <span>${title} </span>
                        <span style="text-transform: initial;">(MaxBet: ${maxBet})</span>
                    </span>
                    <span class="rules-badge"><i class="fa fa-info-circle"></i></span>
                </p>
                <div class="market-overarround"><span></span><strong>Back</strong></div>
                <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div>
            </div>
            <div class="market-runners">
        `;
        
        runners.forEach(runner => {
            const runnerId = runner.id;
            const runnerName = runner.name || 'Runner';
            const status = runner.status;
            const isSuspended = status === 'SUSPENDED' || (!runner.price1 && !runner.lay1);
            
            html += `
                <div id="runner-${mktId}-${runnerId}" class="runner-runner">
                    <span class="selector ml-2" style="display: none;"></span>
                    <img class="ml-2" style="display: none;">
                    <h3 class="runner-name">
                        <div class="runner-info">
                            <span class="clippable runner-display-name">
                                <h4 class="clippable-spacer">${runnerName}</h4>
                            </span>
                        </div>
                        <div class="runner-position">
                            <span><span class="position-minus"><strong></strong></span></span>
                            <span class="ml-1" style="font-weight: normal;"></span>
                            ${showBook ? '<span>&nbsp;&nbsp;<a href="#">Book</a></span>' : ''}
                        </div>
                    </h3>
            `;
            
            if (isSuspended) {
                html += `<div><div class="runner-disabled">SUSPENDED</div></div>`;
            } else {
                html += `
                    <a id="B3-${mktId}-${runnerId}" role="button" class="price-price price-back" onclick="openBetSlip('${runnerName}', ${runner.price3 || 0}, 'back', '${mktId}', '${runnerId}', '${title}')">
                        <span class="price-odd">${runner.price3 || ''}</span>
                        <span class="price-amount">${formatAmount(runner.size3)}</span>
                    </a>
                    <a id="B2-${mktId}-${runnerId}" class="price-price price-back" onclick="openBetSlip('${runnerName}', ${runner.price2 || 0}, 'back', '${mktId}', '${runnerId}', '${title}')">
                        <span class="price-odd">${runner.price2 || ''}</span>
                        <span class="price-amount">${formatAmount(runner.size2)}</span>
                    </a>
                    <a id="B1-${mktId}-${runnerId}" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);" onclick="openBetSlip('${runnerName}', ${runner.price1 || 0}, 'back', '${mktId}', '${runnerId}', '${title}')">
                        <span class="price-odd">${runner.price1 || ''}</span>
                        <span class="price-amount">${formatAmount(runner.size1)}</span>
                    </a>
                    <a id="L1-${mktId}-${runnerId}" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);" onclick="openBetSlip('${runnerName}', ${runner.lay1 || 0}, 'lay', '${mktId}', '${runnerId}', '${title}')">
                        <span class="price-odd">${runner.lay1 || ''}</span>
                        <span class="price-amount">${formatAmount(runner.ls1)}</span>
                    </a>
                    <a id="L2-${mktId}-${runnerId}" class="price-price price-lay" onclick="openBetSlip('${runnerName}', ${runner.lay2 || 0}, 'lay', '${mktId}', '${runnerId}', '${title}')">
                        <span class="price-odd">${runner.lay2 || ''}</span>
                        <span class="price-amount">${formatAmount(runner.ls2)}</span>
                    </a>
                    <a id="L3-${mktId}-${runnerId}" class="price-price price-lay mr-4" onclick="openBetSlip('${runnerName}', ${runner.lay3 || 0}, 'lay', '${mktId}', '${runnerId}', '${title}')">
                        <span class="price-odd">${runner.lay3 || ''}</span>
                        <span class="price-amount">${formatAmount(runner.ls3)}</span>
                    </a>
                `;
            }
            
            html += `</div>`;
        });
        
        html += `</div>`;
        return html;
    }
    
    function createFancyMarket(mktId, runner) {
        const runnerName = runner.name || 'Session';
        const status = runner.status;
        const isSuspended = status === 'SUSPENDED' || (!runner.price1 && !runner.lay1);
        
        let html = `
            <div id="market-${mktId}">
                <div class="market-runners">
                    <div id="runner-${mktId}-1" class="runner-runner">
                        <span class="selector ml-2" style="display: none;"></span>
                        <img class="ml-2" style="display: none;">
                        <h3 class="runner-name">
                            <div class="runner-info">
                                <span class="clippable runner-display-name">
                                    <h4 class="clippable-spacer">${runnerName}</h4>
                                </span>
                            </div>
                            <div class="runner-position">
                                <span><span class="position-minus"><strong></strong></span></span>
                                <span class="ml-1" style="font-weight: normal;"></span>
                                <span>&nbsp;&nbsp;<a href="#">Book</a></span>
                            </div>
                        </h3>
        `;
        
        if (isSuspended) {
            html += `<div><div class="runner-disabled">SUSPENDED</div></div>`;
        } else {
            html += `
                <a id="B3-${mktId}-1" role="button" class="price-price price-back"><span class="price-odd"></span><span class="price-amount"></span></a>
                <a id="B2-${mktId}-1" class="price-price price-back"><span class="price-odd"></span><span class="price-amount"></span></a>
                <a id="B1-${mktId}-1" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);" onclick="openBetSlip('${runnerName}', ${runner.price1 || 0}, 'back', '${mktId}', '1', 'Fancy')">
                    <span class="price-odd">${runner.price1 || ''}</span>
                    <span class="price-amount">${formatAmount(runner.size1)}</span>
                </a>
                <a id="L1-${mktId}-1" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);" onclick="openBetSlip('${runnerName}', ${runner.lay1 || 0}, 'lay', '${mktId}', '1', 'Fancy')">
                    <span class="price-odd">${runner.lay1 || ''}</span>
                    <span class="price-amount">${formatAmount(runner.ls1)}</span>
                </a>
                <a class="price-price price-lay"><span class="price-odd"></span><span class="price-amount"></span></a>
                <a class="price-price price-lay mr-4"><span class="price-odd"></span><span class="price-amount"></span></a>
            `;
        }
        
        html += `</div></div></div>`;
        return html;
    }
    
    function createFigureSection(title, maxBet, figures) {
        let html = `
            <div class="tb-content">
                <div class="market-titlebar">
                    <p class="market-name">
                        <span class="market-name-badge">
                            <i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i>
                            <span>${title} </span>
                            <span style="text-transform: initial;">(MaxBet: ${maxBet})</span>
                        </span>
                        <span class="rules-badge"><i class="fa fa-info-circle"></i></span>
                    </p>
                </div>
                <div>
                    <div class="card" style="padding: 1px 18px;">
                        <div class="row">
                            <div class="col-3 col-lg-4 mobilehide"></div>
        `;
        
        for (let i = 0; i <= 9; i++) {
            const figData = figures[i] || { odd: i, amount: '8.85' };
            html += `
                <div class="col customcheck" style="text-align: center; border: 1px solid black;" onclick="openFigureBet('${title}', ${i}, ${figData.amount || 8.85})">
                    <div id="fig-${i}">
                        <b><span class="priceodd">${i}</span><br></b>
                        <span class="priceamount">${figData.amount || '8.85'}</span><br>
                        <hr style="margin: 0px;">
                        <div style="background-color: rgb(233, 246, 252);">
                            <span class="positioncustom" style="color: red;"><strong></strong></span>
                        </div>
                    </div>
                </div>
            `;
        }
        
        html += `
                            <div class="col-3 col-lg-4 mobilehide"></div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return html;
    }
    
    function updateScoreboard(scoreboard) {
        if (!scoreboard) return;
        
        document.getElementById('team1-name').textContent = scoreboard.team1 || 'Team 1';
        document.getElementById('team1-score').textContent = `${scoreboard.t1_runs || 0}/${scoreboard.t1_wickets || 0} (${scoreboard.t1_overs || 0})`;
        document.getElementById('team1-crr').textContent = `CRR: ${scoreboard.t1_crr || 0}`;
        document.getElementById('ball-commentary').textContent = scoreboard.commentry || 'Ball Chaloo!!';
        document.getElementById('this-over-display').textContent = `This Over : ${scoreboard.recent_string || '-'}`;
    }
    
    function processMarkets(data) {
        const marketBooks = data.marketBooks || [];
        allMarketData = {};
        
        let matchOddsHtml = '';
        let bookmakerHtml = '';
        let fancy2Html = '';
        let completedMatchHtml = '';
        let tiedMatchHtml = '';
        let figureHtml = '';
        let oddEvenHtml = '';
        
        marketBooks.forEach(market => {
            const mktId = market.id;
            const runners = market.runners || [];
            allMarketData[mktId] = market;
            
            if (mktId === marketId) {
                const runnerNames = runners.map(r => ({...r, name: r.name || getRunnerName(r.id)}));
                matchOddsHtml = createMarketSection('Match Odds', '200K', mktId, runnerNames);
            } else if (mktId.startsWith('9.')) {
                if (runners.length > 0) {
                    const runner = runners[0];
                    if (runner.name) {
                        fancy2Html += createFancyMarket(mktId, runner);
                    }
                }
            }
        });
        
        const bookmakerMarket = marketBooks.find(m => {
            if (!m.id.startsWith('9.')) return false;
            if (!m.runners || m.runners.length !== 2) return false;
            return m.runners.some(r => r.name && (r.name.includes('Hurricanes') || r.name.includes('Stars') || r.id === '783382' || r.id === '883051'));
        });
        
        if (bookmakerMarket) {
            const bmRunners = bookmakerMarket.runners.map(r => ({...r, name: r.name || getRunnerName(r.id)}));
            bookmakerHtml = createMarketSection('Bookmaker', '1M', bookmakerMarket.id, bmRunners);
        }
        
        const completedMarket = marketBooks.find(m => m.runners && m.runners.length === 2 && m.runners.some(r => r.id === '37302'));
        if (completedMarket) {
            const cmRunners = completedMarket.runners.map(r => ({...r, name: r.id === '37302' ? 'Yes' : 'No'}));
            completedMatchHtml = createMarketSection('Completed Match', '100K', completedMarket.id + '_cm', cmRunners);
        }
        
        const tiedMarket = marketBooks.find(m => m.id.endsWith('845') || (m.runners && m.runners.length === 2 && m.runners.some(r => r.id === '37302') && m !== completedMarket));
        if (tiedMarket) {
            const tmRunners = tiedMarket.runners.map(r => ({...r, name: r.id === '37302' ? 'Yes' : 'No'}));
            tiedMatchHtml = createMarketSection('Tied Match', '500K', tiedMarket.id + '_tm', tmRunners);
        }
        
        figureHtml = createFigureSection('{{ $eventName ?? "Match" }} 17 Over Total Last Figure', '100K', {});
        
        document.getElementById('match-odds-section').innerHTML = matchOddsHtml;
        document.getElementById('bookmaker-section').innerHTML = bookmakerHtml;
        
        if (fancy2Html) {
            document.getElementById('fancy2-section').innerHTML = `
                <div class="market-titlebar">
                    <p class="market-name">
                        <span class="market-name-badge">
                            <i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i>
                            <span>Fancy 2 </span>
                            <span style="text-transform: initial;">(MaxBet: 20K)</span>
                        </span>
                        <span class="rules-badge"><i class="fa fa-info-circle"></i></span>
                    </p>
                    <div class="market-overarround"><span></span><strong>Back</strong></div>
                    <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div>
                </div>
                ${fancy2Html}
            `;
        }
        
        document.getElementById('completed-match-section').innerHTML = completedMatchHtml;
        document.getElementById('tied-match-section').innerHTML = tiedMatchHtml;
        document.getElementById('figure-section').innerHTML = figureHtml;
        
        document.getElementById('bm-tab-content').innerHTML = bookmakerHtml;
        document.getElementById('fancy2-tab-content').innerHTML = fancy2Html ? `
            <div class="market-titlebar">
                <p class="market-name"><span class="market-name-badge"><span>Fancy 2 </span><span style="text-transform: initial;">(MaxBet: 20K)</span></span></p>
                <div class="market-overarround"><strong>Back</strong></div>
                <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div>
            </div>
            ${fancy2Html}
        ` : '<p class="text-center py-3">No fancy markets available</p>';
        
        document.getElementById('figure-tab-content').innerHTML = figureHtml;
        document.getElementById('other-tab-content').innerHTML = completedMatchHtml + tiedMatchHtml;
        
        if (data.scoreboard) {
            updateScoreboard(data.scoreboard);
        }
    }
    
    function getRunnerName(runnerId) {
        const names = {
            '89981477': 'Hobart Hurricanes W',
            '90023848': 'Melbourne Stars W',
            '783382': 'Hobart Hurricanes W',
            '883051': 'Melbourne Stars W',
            '37302': 'Yes',
            '37303': 'No',
            '15316': '1st Innings 10 Overs Line'
        };
        return names[runnerId] || 'Runner ' + runnerId;
    }
    
    function fetchPricesData() {
        fetch('/api/prices/' + marketId)
            .then(response => response.json())
            .then(data => {
                if (data.success && data.data) {
                    processMarkets(data.data);
                }
            })
            .catch(error => console.log('Error fetching prices:', error));
    }
    
    function openBetSlip(runnerName, odds, betType, mktId, selectionId, marketName) {
        if (!odds || odds <= 0) return;
        
        currentBetData = {
            runner_name: runnerName,
            odds: odds,
            bet_type: betType,
            market_id: mktId,
            selection_id: selectionId,
            market_name: marketName || 'Match Odds',
            event_id: eventId,
            event_name: '{{ $eventName ?? "Match" }}',
            sport_type: 'cricket'
        };
        
        document.getElementById('bet-slip-runner').textContent = runnerName;
        document.getElementById('bet-slip-odds').value = odds;
        document.getElementById('bet-slip-stake').value = '';
        document.getElementById('bet-slip-profit').textContent = ' / -';
        
        const typeSpan = document.getElementById('bet-slip-type');
        typeSpan.textContent = betType.toUpperCase();
        typeSpan.className = 'badge ' + (betType === 'back' ? 'badge-info' : 'badge-danger');
        
        const slipContainer = document.getElementById('bet-slip-container');
        slipContainer.style.display = 'block';
        slipContainer.style.backgroundColor = betType === 'back' ? '#d4edff' : '#ffe4e8';
        
        document.getElementById('bet-slip-stake').focus();
    }
    
    function openFigureBet(title, figure, amount) {
        openBetSlip(title + ' - ' + figure, amount, 'back', 'figure_' + figure, figure, 'Figure');
    }
    
    function closeBetSlip() {
        document.getElementById('bet-slip-container').style.display = 'none';
        currentBetData = null;
    }
    
    function calculateProfit() {
        const stake = parseFloat(document.getElementById('bet-slip-stake').value) || 0;
        const odds = parseFloat(document.getElementById('bet-slip-odds').value) || 0;
        if (stake > 0 && odds > 0 && currentBetData) {
            const profit = currentBetData.bet_type === 'back' ? stake * (odds - 1) : stake;
            document.getElementById('bet-slip-profit').textContent = ' / ' + profit.toFixed(2);
        }
    }
    
    function submitBet() {
        if (!currentBetData) return;
        
        const stake = parseFloat(document.getElementById('bet-slip-stake').value);
        if (!stake || stake <= 0) {
            alert('Please enter a valid stake');
            return;
        }
        
        const betData = {
            ...currentBetData,
            stake: stake
        };
        
        fetch('/api/bets/place', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(betData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Bet placed successfully!');
                closeBetSlip();
                loadOpenBets();
            } else {
                alert('Failed to place bet: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Bet error:', error);
            alert('Error placing bet. Please try again.');
        });
    }
    
    function loadOpenBets() {
        fetch('/api/bets/open?market_id=' + marketId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const bets = data.bets || [];
                    document.getElementById('open-bets-count').textContent = bets.length;
                    
                    let html = '';
                    bets.forEach(bet => {
                        html += `
                            <tr class="${bet.bet_type === 'back' ? 'table-info' : 'table-danger'}">
                                <td>${bet.selection_name}</td>
                                <td>${bet.odds}</td>
                                <td>${bet.stake}</td>
                                <td><button class="btn btn-xs btn-danger" onclick="cancelBet(${bet.id})">X</button></td>
                            </tr>
                        `;
                    });
                    document.getElementById('open-bets-tbody').innerHTML = html;
                }
            })
            .catch(error => console.log('Error loading bets:', error));
    }
    
    function cancelBet(betId) {
        if (!confirm('Cancel this bet?')) return;
        
        fetch('/api/bets/' + betId + '/cancel', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Bet cancelled. Refund: ' + data.refund_amount.toLocaleString('en-IN'));
                loadOpenBets();
            } else {
                alert('Failed to cancel bet: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Cancel error:', error);
            alert('Error cancelling bet.');
        });
    }
    
    function loadRelatedEvents() {
        fetch('/api/cricket-matches')
            .then(response => response.json())
            .then(data => {
                const result = data.result || data;
                const matches = result.cricket || [];
                
                let html = '';
                matches.slice(0, 5).forEach(match => {
                    if (match.marketId !== marketId) {
                        html += `
                            <tr onclick="window.location='/Common/Market?id=${match.marketId}';" class="relatedtr" style="cursor: pointer;">
                                <td class="sport-date" style="font-size: 14px; padding: 0px 20px;">
                                    <div><span class="day">Today</span></div>
                                </td>
                                <td><div>${match.marketName || 'Match'}</div></td>
                            </tr>
                        `;
                    }
                });
                document.getElementById('related-events-tbody').innerHTML = html;
            })
            .catch(error => console.error('Error loading related events:', error));
    }
    
    document.querySelectorAll('.stake-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const amount = this.getAttribute('data-amount');
            const stakeInput = document.getElementById('bet-slip-stake');
            if (amount.startsWith('+')) {
                stakeInput.value = (parseFloat(stakeInput.value) || 0) + parseInt(amount.substring(1));
            } else {
                stakeInput.value = amount;
            }
            calculateProfit();
        });
    });
    
    document.getElementById('bet-slip-stake').addEventListener('input', calculateProfit);
    
    document.addEventListener('DOMContentLoaded', function() {
        fetchPricesData();
        setInterval(fetchPricesData, 1000);
        loadOpenBets();
        loadRelatedEvents();
    });
</script>
@endpush
