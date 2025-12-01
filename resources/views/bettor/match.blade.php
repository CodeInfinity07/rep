<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sports Trading Platform">
    <meta name="keyword" content="sports trading, bet, betfair">
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/img/favicon/BetPro.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/img/sprites/css/sprite.css">
    <link rel="stylesheet" href="/dist/site.css?11700">
    <link href="/css/BetPro-style.css?11700" rel="stylesheet">

    <title>{{ $eventName ?? 'Match Details' }} | BETGURU</title>
    <style>
        .body { min-height: 91.7vh; }
        center a { color: white; font-size: 13px; }
        
        .tabcontent { margin-top: -4px; display: none; border: 1px solid #ccc; border-top: none; background-color: white; }
        div.scrollmenu { overflow: auto; white-space: nowrap; margin-bottom: -10px; transition: 0.5s; border-top-left-radius: 10px; border-top-right-radius: 10px; }
        div.scrollmenu a { display: inline-block; color: black; text-align: center; padding: 0px 20px; text-decoration: none; border-top-left-radius: 10px; border-top-right-radius: 10px; }
        div.scrollmenu a:hover { color: white; }
        
        #TVDIVIFRAME iframe { height: 330px; width: 100%; border: none; overflow: hidden; }
        @media screen and (max-width: 480px) {
            #TVDIVIFRAME iframe { height: 230px; }
        }
        iframe { width: 1px; min-width: 100%; }
        
        .right-nav { padding-left: 10px; }
        .runrate { color: #666; font-size: 12px; margin-left: 10px; }
        
        @keyframes flashBack { 0% { background-color: rgb(80, 180, 220); } 100% { background-color: rgb(141, 210, 240); } }
        @keyframes flashLay { 0% { background-color: rgb(250, 120, 130); } 100% { background-color: rgb(254, 175, 178); } }
        .flash-back { animation: flashBack 0.3s ease-out; }
        .flash-lay { animation: flashLay 0.3s ease-out; }
    </style>
    
    <script>
        const pricesUrl = "https://prices9.mgs11.com/api";
        const marketId = '{{ $marketId }}';
        const eventId = '{{ $eventId ?? '' }}';
    </script>
</head>

<body class="bg-gray d-flex flex-column menu-collapsed">
    <div class="main-page">
        <div class="row no-gutters">
            <div class="col-md-3 col-lg-2" id="sidebar">
                <div class="logo-bar">
                    <a href="/Common/Dashboard">
                        <span class="green-logo-text">BETGURU</span>
                    </a>
                </div>
                <div class="divider"></div>
                <div class="sidebar-menu" style="height:100%;">
                    <ul class="nav">
                        <li style="width:100%;">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown">
                                <span class="svg-cricket svg-cricket-dims svg-span" role="img"></span>
                                <span>Cricket</span>
                            </a>
                            <div class="dropdown-menu">
                                <ul id="sidebar-cricket-menu" class="sub-menu">
                                    <li><a href="/"><strong>All Cricket</strong></a></li>
                                    <li class="divider"></li>
                                </ul>
                            </div>
                        </li>
                        <li style="width:100%;">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown">
                                <span class="svg-soccer svg-soccer-dims svg-span" role="img"></span>
                                <span>Soccer</span>
                            </a>
                            <div class="dropdown-menu">
                                <ul id="sidebar-soccer-menu" class="sub-menu">
                                    <li><a href="/soccer"><strong>All Soccer</strong></a></li>
                                    <li class="divider"></li>
                                </ul>
                            </div>
                        </li>
                        <li style="width:100%;">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown">
                                <span class="svg-tennis svg-tennis-dims svg-span" role="img"></span>
                                <span>Tennis</span>
                            </a>
                            <div class="dropdown-menu">
                                <ul id="sidebar-tennis-menu" class="sub-menu">
                                    <li><a href="/tennis"><strong>All Tennis</strong></a></li>
                                    <li class="divider"></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md" id="main-wrap">
                <div class="header">
                    <button class="burger-toggle active">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="top-nav">
                        <li><a href="/Common/Dashboard">Dashboard</a></li>
                    </ul>

                    <div class="dropdown-wrap">
                        <div class="dropdown">
                            <div class="designation">
                                <span class="wallet-balance">B: Rs. {{ number_format($balance ?? 0, 2) }}</span>
                                <span class="wallet-exposure"> | L: {{ number_format($liable ?? 0, 2) }}</span>
                            </div>
                            <button class="btn profile-dropdown dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                {{ $username ?? 'User' }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/Customer/Ledger/">Statement</a>
                                <a class="dropdown-item" href="/Common/Result/">Result</a>
                                <a class="dropdown-item" href="/Customer/ProfitLoss/">Profit Loss</a>
                                <a class="dropdown-item" href="/Customer/Bets">Bet History</a>
                                <a class="dropdown-item" href="/Customer/Profile">Profile</a>
                                <form method="POST" action="/logout" style="display:inline;">
                                    @csrf
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="this.closest('form').submit()">Logout</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-wrap body">
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
                                                <a id="Fancytab" href="#" onclick="MarketTab('Fancy')" class="tablink btn btn-primary">BetFair-Fancy</a>
                                                <a id="Fancy2tab" href="#" onclick="MarketTab('Fancy2')" class="tablink btn btn-primary">Fancy-2</a>
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
                                                                <div id="ball-commentary">-</div>
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
                                                        <div id="betfair-fancy-section" class="tb-content"></div>
                                                        <div id="fancy2-section" class="tb-content"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="BM" class="tabcontent">
                                            <div id="bm-tab-content" class="tb-content"></div>
                                        </div>
                                        
                                        <div id="Fancy" class="tabcontent">
                                            <div id="fancy-tab-content" class="tb-content"></div>
                                        </div>
                                        
                                        <div id="Fancy2" class="tabcontent">
                                            <div id="fancy2-tab-content" class="tb-content"></div>
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
                                            
                                            <div id="bet-slip-container" style="display: none;">
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
                                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="2000">2,000</button></td>
                                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="5000">5,000</button></td>
                                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="10000">10,000</button></td>
                                                                    <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="25000">25,000</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="+1000">+1,000</button></td>
                                                                    <td><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="+5000">+5,000</button></td>
                                                                    <td><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="+10000">+10,000</button></td>
                                                                    <td><button type="button" class="btn btn-secondary btn-block stake-btn" data-amount="+25000">+25,000</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button type="button" class="btn btn-danger" onclick="closeBetSlip()">Close</button></td>
                                                                    <td colspan="2">
                                                                        <button type="button" class="btn btn-primary" onclick="submitBet()">Submit</button>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
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
        
        function createMarketSection(title, maxBet, marketId, runners, isBookmaker = false) {
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
                <div id="market-${marketId}" class="market-runners">
            `;
            
            runners.forEach(runner => {
                const runnerId = runner.id;
                const runnerName = runner.name || 'Runner';
                const status = runner.status;
                const isSuspended = status === 'SUSPENDED' || (!runner.price1 && !runner.lay1);
                
                html += `
                    <div id="runner-${marketId}-${runnerId}" class="runner-runner">
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
                            </div>
                        </h3>
                `;
                
                if (isSuspended) {
                    html += `<div><div class="runner-disabled">SUSPENDED</div></div>`;
                } else {
                    html += `
                        <a id="B3-${marketId}-${runnerId}" role="button" class="price-price price-back" onclick="openBetSlip('${runnerName}', ${runner.price3 || 0}, 'back', '${marketId}', '${runnerId}')">
                            <span class="price-odd">${runner.price3 || ''}</span>
                            <span class="price-amount">${formatAmount(runner.size3)}</span>
                        </a>
                        <a id="B2-${marketId}-${runnerId}" class="price-price price-back" onclick="openBetSlip('${runnerName}', ${runner.price2 || 0}, 'back', '${marketId}', '${runnerId}')">
                            <span class="price-odd">${runner.price2 || ''}</span>
                            <span class="price-amount">${formatAmount(runner.size2)}</span>
                        </a>
                        <a id="B1-${marketId}-${runnerId}" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);" onclick="openBetSlip('${runnerName}', ${runner.price1 || 0}, 'back', '${marketId}', '${runnerId}')">
                            <span class="price-odd">${runner.price1 || ''}</span>
                            <span class="price-amount">${formatAmount(runner.size1)}</span>
                        </a>
                        <a id="L1-${marketId}-${runnerId}" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);" onclick="openBetSlip('${runnerName}', ${runner.lay1 || 0}, 'lay', '${marketId}', '${runnerId}')">
                            <span class="price-odd">${runner.lay1 || ''}</span>
                            <span class="price-amount">${formatAmount(runner.ls1)}</span>
                        </a>
                        <a id="L2-${marketId}-${runnerId}" class="price-price price-lay" onclick="openBetSlip('${runnerName}', ${runner.lay2 || 0}, 'lay', '${marketId}', '${runnerId}')">
                            <span class="price-odd">${runner.lay2 || ''}</span>
                            <span class="price-amount">${formatAmount(runner.ls2)}</span>
                        </a>
                        <a id="L3-${marketId}-${runnerId}" class="price-price price-lay mr-4" onclick="openBetSlip('${runnerName}', ${runner.lay3 || 0}, 'lay', '${marketId}', '${runnerId}')">
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
                        <div id="runner-${mktId}-${runner.id}" class="runner-runner">
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
                    <a id="B1-${mktId}-1" class="price-price price-back mb-show" onclick="openBetSlip('${runnerName}', ${runner.price1 || 0}, 'back', '${mktId}', '1')">
                        <span class="price-odd">${runner.price1 || ''}</span>
                        <span class="price-amount">${formatAmount(runner.size1)}</span>
                    </a>
                    <a id="L1-${mktId}-1" class="price-price price-lay ml-4 mb-show" onclick="openBetSlip('${runnerName}', ${runner.lay1 || 0}, 'lay', '${mktId}', '1')">
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
        
        function updateScoreboard(scoreboard) {
            if (!scoreboard) return;
            
            document.getElementById('team1-name').textContent = scoreboard.team1 || 'Team 1';
            document.getElementById('team1-score').textContent = `${scoreboard.t1_runs || 0}/${scoreboard.t1_wickets || 0} (${scoreboard.t1_overs || 0})`;
            document.getElementById('team1-crr').textContent = `CRR: ${scoreboard.t1_crr || 0}`;
            document.getElementById('ball-commentary').textContent = scoreboard.commentry || '-';
            document.getElementById('this-over-display').textContent = `This Over : ${scoreboard.recent_string || '-'}`;
        }
        
        function processMarkets(data) {
            const marketBooks = data.marketBooks || [];
            allMarketData = {};
            
            let matchOddsHtml = '';
            let bookmakerHtml = '';
            let betfairFancyHtml = '';
            let fancy2Html = '';
            let otherHtml = '';
            
            marketBooks.forEach(market => {
                const mktId = market.id;
                const runners = market.runners || [];
                allMarketData[mktId] = market;
                
                if (mktId === marketId) {
                    const runnerNames = runners.map(r => ({...r, name: r.name || getRunnerName(r.id)}));
                    matchOddsHtml = createMarketSection('Match Odds', '200K', mktId, runnerNames);
                } else if (mktId.startsWith('9.')) {
                    if (runners.length > 0 && runners[0].name) {
                        fancy2Html += createFancyMarket(mktId, runners[0]);
                    }
                } else if (mktId.startsWith('1.') && mktId !== marketId) {
                    if (runners.length === 1 && runners[0].id === '15316') {
                        betfairFancyHtml = createMarketSection('BetFair Fancy', '20K', mktId, runners.map(r => ({...r, name: '1st Innings 10 Overs Line'})));
                    } else if (runners.length === 2) {
                        const hasYesNo = runners.some(r => r.id === '37302' || r.id === '37303');
                        if (hasYesNo) {
                            const runnerNames = runners.map(r => ({...r, name: r.id === '37302' ? 'Yes' : 'No'}));
                            if (mktId.endsWith('844')) {
                                otherHtml += createMarketSection('Completed Match', '100K', mktId, runnerNames);
                            } else if (mktId.endsWith('845')) {
                                otherHtml += createMarketSection('Tied Match', '500K', mktId, runnerNames);
                            }
                        }
                    }
                }
            });
            
            const bookmakerMarket = marketBooks.find(m => m.id.startsWith('9.') && m.runners && m.runners.length === 2 && m.runners.some(r => r.name && r.name.includes('Hurricanes')));
            if (bookmakerMarket) {
                bookmakerHtml = createMarketSection('Bookmaker', '1M', bookmakerMarket.id, bookmakerMarket.runners, true);
            }
            
            document.getElementById('match-odds-section').innerHTML = matchOddsHtml;
            document.getElementById('bookmaker-section').innerHTML = bookmakerHtml;
            document.getElementById('betfair-fancy-section').innerHTML = betfairFancyHtml;
            document.getElementById('fancy2-section').innerHTML = `
                <div class="market-titlebar">
                    <p class="market-name">
                        <span class="market-name-badge">
                            <i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i>
                            <span>Fancy 2 </span>
                            <span style="text-transform: initial;">(MaxBet: 20K)</span>
                        </span>
                    </p>
                    <div class="market-overarround"><span></span><strong>Back</strong></div>
                    <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div>
                </div>
                ${fancy2Html}
            `;
            
            document.getElementById('other-tab-content').innerHTML = otherHtml;
            document.getElementById('bm-tab-content').innerHTML = bookmakerHtml;
            document.getElementById('fancy-tab-content').innerHTML = betfairFancyHtml;
            document.getElementById('fancy2-tab-content').innerHTML = `
                <div class="market-titlebar">
                    <p class="market-name">
                        <span class="market-name-badge"><span>Fancy 2 </span><span style="text-transform: initial;">(MaxBet: 20K)</span></span>
                    </p>
                    <div class="market-overarround"><strong>Back</strong></div>
                    <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div>
                </div>
                ${fancy2Html}
            `;
            
            if (data.scoreboard) {
                updateScoreboard(data.scoreboard);
            }
        }
        
        function getRunnerName(runnerId) {
            const names = {
                '89981477': 'Hobart Hurricanes W',
                '90023848': 'Melbourne Stars W',
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
        
        function openBetSlip(runnerName, odds, betType, mktId, selectionId) {
            if (!odds || odds <= 0) return;
            
            currentBetData = {
                runner_name: runnerName,
                odds: odds,
                bet_type: betType,
                market_id: mktId,
                selection_id: selectionId,
                market_name: 'Match Odds',
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
                    updateHeaderValues(data.new_balance, data.total_liability);
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
        
        function updateHeaderValues(balance, liability) {
            document.querySelector('.wallet-balance').textContent = 'B: Rs. ' + parseFloat(balance).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            document.querySelector('.wallet-exposure').textContent = ' | L: ' + parseFloat(liability).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
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
                    updateHeaderValues(data.new_balance, data.total_liability);
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
            
            fetch('/api/cricket-matches')
                .then(response => response.json())
                .then(data => {
                    const result = data.result || data;
                    const cricketMatches = result.cricket || [];
                    
                    const cricketMenu = document.getElementById('sidebar-cricket-menu');
                    if (cricketMenu && cricketMatches.length > 0) {
                        const items = cricketMatches.slice(0, 10).map(match => 
                            `<li class="nav-item"><a class="nav-link" href="/cricket/${match.marketId || ''}">${match.marketName || 'Match'}</a></li>`
                        ).join('');
                        cricketMenu.innerHTML = `<li><a href="/"><strong>All Cricket</strong></a></li><li class="divider"></li>${items}`;
                    }
                })
                .catch(error => console.error('Error loading sidebar:', error));
        });
    </script>
</body>
</html>
