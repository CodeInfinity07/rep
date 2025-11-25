<html lang="en"><plasmo-csui></plasmo-csui>

<head>

    <style id="stndz-custom-css"></style>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sports Trading Platform">
    <meta name="keyword" content="sports trading, bet, betfair">
    <meta name="robots" content="noindex">

    <link rel="shortcut icon" href="/img/favicon/BetPro.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/img/sprites/css/sprite.css">
    <link rel="stylesheet" href="/dist/site.css?11700">
    <link href="/css/BetPro-style.css?11700" rel="stylesheet">

    <title>Match Details | BETGURU</title>
    <style>
        .body {
            min-height: 91.7vh;
        }

        center a {
            color: white;
        }

        center a {
            font-size: 13px;
        }

        #page-preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.3s ease;
        }

        .preloader-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #333;
            border-top: 5px solid #4CAF50;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    
    <script>
        // EARLY: Mark this as non-homepage and setup preloader hide
        window.isNonHomePage = true;
        window.isMatchPage = true;

        // Hide preloader as soon as DOM is ready
        document.addEventListener('DOMContentLoaded', function () {
            var preloader = document.getElementById('page-preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                preloader.style.display = 'none';
            }
            var loader = document.querySelector('.page_loader');
            if (loader) loader.style.display = 'none';
            
            // Initialize sidebar menus for non-homepage
            initSidebarMenus();
        });

        // Also try immediately when this script runs
        if (document.readyState !== 'loading') {
            var preloader = document.getElementById('page-preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                preloader.style.display = 'none';
            }
        }
        
        // Sidebar menu initializer for non-homepage pages
        function initSidebarMenus() {
            fetch('/api/cricket-matches')
                .then(response => response.json())
                .then(data => {
                    const result = data.result || data;
                    const cricketMatches = result.cricket || [];
                    const soccerMatches = result.soccer || [];
                    const tennisMatches = result.tennis || [];
                    
                    populateSidebarOnly(cricketMatches, soccerMatches, tennisMatches);
                })
                .catch(error => console.error('Error loading sidebar:', error));
        }
        
        function populateSidebarOnly(cricketMatches, soccerMatches, tennisMatches) {
            const cricketMenu = document.getElementById('sidebar-cricket-menu');
            const soccerMenu = document.getElementById('sidebar-soccer-menu');
            const tennisMenu = document.getElementById('sidebar-tennis-menu');
            
            if (cricketMenu) {
                if (cricketMatches.length > 0) {
                    const items = cricketMatches.slice(0, 10).map(match => 
                        `<li class="nav-item"><a class="nav-link" href="/cricket/${match.marketId || ''}">${match.marketName || 'Match'}</a></li>`
                    ).join('');
                    cricketMenu.innerHTML = `<li><a href="/"><strong>All Cricket</strong></a></li><li class="divider"></li>${items}`;
                } else {
                    cricketMenu.innerHTML = `<li><a href="/"><strong>All Cricket</strong></a></li><li class="divider"></li><li class="text-center"><small>No matches</small></li>`;
                }
            }
            
            if (soccerMenu) {
                if (soccerMatches.length > 0) {
                    const items = soccerMatches.slice(0, 10).map(match => 
                        `<li class="nav-item"><a class="nav-link" href="/soccer/${match.marketId || ''}">${match.marketName || 'Match'}</a></li>`
                    ).join('');
                    soccerMenu.innerHTML = `<li><a href="/soccer"><strong>All Soccer</strong></a></li><li class="divider"></li>${items}`;
                } else {
                    soccerMenu.innerHTML = `<li><a href="/soccer"><strong>All Soccer</strong></a></li><li class="divider"></li><li class="text-center"><small>No matches</small></li>`;
                }
            }
            
            if (tennisMenu) {
                if (tennisMatches.length > 0) {
                    const items = tennisMatches.slice(0, 10).map(match => 
                        `<li class="nav-item"><a class="nav-link" href="/tennis/${match.marketId || ''}">${match.marketName || 'Match'}</a></li>`
                    ).join('');
                    tennisMenu.innerHTML = `<li><a href="/tennis"><strong>All Tennis</strong></a></li><li class="divider"></li>${items}`;
                } else {
                    tennisMenu.innerHTML = `<li><a href="/tennis"><strong>All Tennis</strong></a></li><li class="divider"></li><li class="text-center"><small>No matches</small></li>`;
                }
            }
        }
    </script>

    <script>
        const pricesUrl = "https://prices9.mgs11.com/api";
        const ordersUrl = "https://orders.mgs11.com/api";
        const LiquidityRate = 35;
        const SsocketUrl = "https://orders-ws.mgs11.com/signalr";
        const uwsUrl = "https://orders-ws.mgs11.com/usershub";
        const genSck = 1;
        const CasSck = 1;
        const casinoUrl = "https://casino-ws.mgs11.com/signalr";
        // var SsocketEnable = 0;
    </script>
</head>

<body class="bg-gray d-flex flex-column">
    <div id="page-preloader">
        <div class="preloader-spinner"></div>
    </div>
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
                    <ul>


                        <ul class="nav">



                            <style>
                                @keyframes spin {
                                    from {
                                        transform: rotateY(0deg);
                                        moz-transform: rotateY(0deg);
                                        ms-transform: rotateY(0deg);
                                    }

                                    to {
                                        transform: rotateY(360deg);
                                        moz-transform: rotateY(360deg);
                                        ms-transform: rotateY(360deg);
                                    }
                                }

                                @-webkit-keyframes spin {
                                    from {
                                        -webkit-transform: rotateY(0deg);
                                    }

                                    to {
                                        -webkit-transform: rotateY(360deg);
                                    }
                                }

                                .imageSpin {
                                    transition-delay: 5s;
                                    animation-name: spin;
                                    animation-iteration-count: infinite;
                                    animation-duration: inherit;
                                    -webkit-animation-name: spin;
                                    -webkit-animation-iteration-count: infinite;
                                    -webkit-animation-timing-function: initial;
                                    -webkit-animation-duration: 4s;
                                    -webkit-animation-delay: 2s;
                                }

                                .imageSpin2 {
                                    transition-delay: 3s;
                                    animation-name: spin;
                                    animation-iteration-count: infinite;
                                    animation-duration: inherit;
                                    -webkit-animation-name: spin;
                                    -webkit-animation-iteration-count: infinite;
                                    -webkit-animation-timing-function: initial;
                                    -webkit-animation-duration: 3s;
                                    -webkit-animation-delay: 2s;
                                }


                                /*for spin2*/
                                #spinning-circle {
                                    animation-name: spinning-circle;
                                    animation-duration: 5s;
                                    animation-iteration-count: infinite;
                                }

                                @-webkit-keyframes spinning-circle {
                                    0% {
                                        -webkit-transform: rotate(0deg);
                                        transform: rotate(0deg);
                                    }

                                    100% {
                                        -webkit-transform: rotate(360deg);
                                        transform: rotate(360deg);
                                    }
                                }

                                #invertcolor {
                                    filter: invert(100%);
                                    -webkit-filter: invert(100%);
                                    animation-name: spinning-circle;
                                    animation-duration: 3s;
                                    animation-iteration-count: infinite;
                                }

                                #invertcolor2 {
                                    filter: invert(100%);
                                    -webkit-filter: invert(100%);
                                    animation-name: spin;
                                    animation-duration: 4s;
                                    animation-iteration-count: infinite;
                                    max-height: 30px;
                                }

                                #invertcolor3 {
                                    filter: invert(100%);
                                    -webkit-filter: invert(100%);
                                    animation-name: spin;
                                    animation-duration: 3s;
                                    animation-iteration-count: infinite;
                                    max-height: 30px;
                                }


                                .exgameblinker {
                                    animation: animate 8s linear infinite;
                                }

                                @keyframes animate {
                                    0% {
                                        background-color: red;
                                    }

                                    25% {
                                        background-color: inherit;
                                    }

                                    50% {
                                        background-color: inherit;
                                    }

                                    75% {
                                        background-color: inherit;
                                    }

                                    100% {
                                        background-color: red;
                                    }
                                }

                                .Galaxyblinker {
                                    position: relative;
                                    z-index: 0;
                                }

                                .Galaxyblinker::before {
                                    content: '';
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    z-index: -1;
                                    background: linear-gradient(90deg, #8a47ff 0%, #c36eff 100%);
                                    opacity: 1;
                                    animation: animateGradient 12s linear infinite;
                                    transition: opacity 0.5s ease;
                                }

                                @keyframes animateGradient {

                                    0%,
                                    100% {
                                        opacity: 1;
                                    }

                                    25%,
                                    50%,
                                    75% {
                                        opacity: 0;
                                    }

                                }
                            </style>

                            <li style="width:100%;">

                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-soccer svg-soccer-dims svg-span" role="img"></span>
                                    <span>Soccer</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="nav">
                                    <ul class="sub-menu" id="sidebar-soccer-menu" href="#">
                                        <li><a href="/soccer"><strong>All Soccer</strong></a></li>
                                        <li class="divider"></li>
                                        <li class="text-center"><small>Loading...</small></li>
                                    </ul>
                                </div>
                            </li>
                            <li style="width:100%;">

                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-tennis svg-tennis-dims svg-span" role="img"></span>
                                    <span>Tennis</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="nav">
                                    <ul class="sub-menu" id="sidebar-tennis-menu" href="#">
                                        <li><a href="/tennis"><strong>All Tennis</strong></a></li>
                                        <li class="divider"></li>
                                        <li class="text-center"><small>Loading...</small></li>
                                    </ul>
                                </div>
                            </li>
                            <li style="width:100%;">

                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-cricket svg-cricket-dims svg-span" role="img"></span>
                                    <span>Cricket</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="nav">
                                    <ul class="sub-menu" id="sidebar-cricket-menu" href="#">
                                        <li><a href="/cricket"><strong>All Cricket</strong></a></li>
                                        <li class="divider"></li>
                                        <li class="text-center"><small>Loading...</small></li>
                                    </ul>
                                </div>
                            </li>
                            <li style="width:100%;">

                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-horse svg-horse-dims svg-span" role="img"></span>
                                    <span>Horse Race</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="nav">
                                    <ul class="sub-menu" id="sidebar-horserace-menu" href="#">
                                        <li><a href="#"><strong>All Horse Race</strong></a></li>
                                        <li class="divider"></li>
                                        <li class="text-center"><small>Coming Soon</small></li>
                                    </ul>
                                </div>
                            </li>
                            <li style="width:100%;display:none;">

                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-greyhound svg-greyhound-dims svg-span" role="img"></span>
                                    <span>Greyhound Race</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="nav">
                                    <ul class="sub-menu" id="sidebar-greyhound-menu" href="#">
                                        <li><a href="#"><strong>All Greyhound</strong></a></li>
                                        <li class="divider"></li>
                                        <li class="text-center"><small>Coming Soon</small></li>
                                    </ul>
                                </div>
                            </li>
                            <li style="width:100%;display:none;">

                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-greyhound-racing svg-greyhound-racing-dims svg-span"
                                        role="img"></span>
                                    <span>Greyhound Legacy</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="nav">
                                    <ul class="sub-menu" href="#">

                                        <li><a href="#"><strong>All Greyhound</strong></a></li>
                                        <li class="divider"></li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250209693">
                                                <span class="market-time">3:02 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:02:00.0000000Z
                                                </span>
                                                <span class="race-venue">Bendigo (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250208472">
                                                <span class="market-time">3:08 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:08:00.0000000Z
                                                </span>
                                                <span class="race-venue">Richmond (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250208645">
                                                <span class="market-time">3:11 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:11:00.0000000Z
                                                </span>
                                                <span class="race-venue">Wagga (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250210132">
                                                <span class="market-time">3:19 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:19:00.0000000Z
                                                </span>
                                                <span class="race-venue">Geelong (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250209698">
                                                <span class="market-time">3:22 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:22:00.0000000Z
                                                </span>
                                                <span class="race-venue">Bendigo (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250208477">
                                                <span class="market-time">3:26 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:26:00.0000000Z
                                                </span>
                                                <span class="race-venue">Richmond (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250208650">
                                                <span class="market-time">3:29 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:29:00.0000000Z
                                                </span>
                                                <span class="race-venue">Wagga (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250230237">
                                                <span class="market-time">3:32 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:32:00.0000000Z
                                                </span>
                                                <span class="race-venue">Harlow (GB)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250210137">
                                                <span class="market-time">3:38 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:38:00.0000000Z
                                                </span>
                                                <span class="race-venue">Geelong (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250208655">
                                                <span class="market-time">3:44 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:44:00.0000000Z
                                                </span>
                                                <span class="race-venue">Wagga (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250209703">
                                                <span class="market-time">3:47 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:47:00.0000000Z
                                                </span>
                                                <span class="race-venue">Bendigo (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250230239">
                                                <span class="market-time">3:48 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:48:00.0000000Z
                                                </span>
                                                <span class="race-venue">Harlow (GB)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250208482">
                                                <span class="market-time">3:49 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:49:00.0000000Z
                                                </span>
                                                <span class="race-venue">Richmond (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250211384">
                                                <span class="market-time">3:52 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:52:00.0000000Z
                                                </span>
                                                <span class="race-venue">Mandurah (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250210142">
                                                <span class="market-time">3:56 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T10:56:00.0000000Z
                                                </span>
                                                <span class="race-venue">Geelong (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250229792">
                                                <span class="market-time">4:01 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T11:01:00.0000000Z
                                                </span>
                                                <span class="race-venue">Hove (GB)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250230241">
                                                <span class="market-time">4:04 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T11:04:00.0000000Z
                                                </span>
                                                <span class="race-venue">Harlow (GB)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250209708">
                                                <span class="market-time">4:05 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T11:05:00.0000000Z
                                                </span>
                                                <span class="race-venue">Bendigo (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250208660">
                                                <span class="market-time">4:08 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T11:08:00.0000000Z
                                                </span>
                                                <span class="race-venue">Wagga (AU)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/Common/market/?id=1.250228637">
                                                <span class="market-time">4:09 PM</span>
                                                <span class="d-none utctime" data-format="h:mm A">
                                                    2025-11-07T11:09:00.0000000Z
                                                </span>
                                                <span class="race-venue">Central Park (GB)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item" style="width:100%;">
                                <a href="/Common/sap" class="dropdown-toggle" role="button">
                                    <span class="svg-Casino svg-Casino-dims imageSpin2" role="img"></span>
                                    <span>Sports Book</span>
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a href="/Common/RSC" class="dropdown-toggle" role="button">
                                    <i style="font-size:17px;" class="fas fa-star fa-2x fa-spin fa-lg"></i>
                                    <span>RoyalStar Casino</span>
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a href="/Common/Games" class="dropdown-toggle" role="button">
                                    <img id="spinning-circle" src="/img/v2/livegameing.png"
                                        onerror="this.onerror = null; this.src= null" alt="G">
                                    <span>Star Casino</span>
                                </a>

                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a class="dropdown-toggle" role="button" href="/Common/WorldCasino">
                                    <img id="invertcolor" style="background:invert(100%)"
                                        src="/img/v2/worldcasinosvg.png" alt="WC">
                                    <span>World Casino</span>
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a class="dropdown-toggle" role="button" href="/Common/Dream">
                                    <span class="svg-Casino svg-Casino-dims imageSpin2" role="img"></span>
                                    <span>Royal Casino</span>
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a class="dropdown-toggle" role="button" href="/Common/ExGames">
                                    <img id="invertcolor2" src="/img/v2/BLogo.png">
                                    <span>BetFairGames</span>
                                </a>
                            </li>
                            <li class="nav-item exgameblinker" style="width:100%;">
                                <a class="dropdown-toggle" role="button" href="/Common/BetProGames">
                                    <img id="invertcolor3" src="/img/v2/TPS.png">
                                    <span>TeenPatti Studio</span>
                                </a>
                            </li>
                            <li class="nav-item Galaxyblinker" style="width:100%;">
                                <a class="dropdown-toggle" role="button" href="/Common/Galaxy">
                                    <img src="/img/v2/Glogo.png">
                                    <span>Galaxy Casino</span>
                                </a>
                            </li>

                            <li class="divider"></li>
                            <li class="nav-item" style="width:100%;">
                                <a class="nav-link" href="/Customer/Liable">
                                    <span class="svg-colossus svg-colossus-dims svg-span" role="img"></span>
                                    Current Position
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a class="nav-link" href="/Common/Dashboard">
                                    <span class="svg-soccer svg-soccer-dims svg-span" role="img"></span>
                                    All Sports
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a class="nav-link" href="/Common/Result">
                                    <span class="svg-clipboard svg-clipboard-dims svg-span" role="img"></span>
                                    Results
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a class="nav-link" href="#" onclick="ShowExchangeRules(); return false;">
                                    <i class="fa fa-info-circle"></i>Market Rules
                                </a>
                            </li>
                            <li class="nav-item" style="width:100%;">
                                <a class="nav-link" href="#" onclick="ShowTos(); return false;">
                                    <i class="fa fa-info-circle"></i>Terms &amp; Conditions
                                </a>
                            </li>
                        </ul>
                        <script>
                            function ShowExchangeRules() {
                                $("#modalMarketRules").modal('show');

                                $.get("/rules.html", function (data) {
                                    $("#modalMarketRules .modal-body").html(data);
                                });
                            }

                            function ShowTos() {
                                $("#modalTos").modal('show');
                                $.get("/tos.html", function (data) {
                                    $("#modalTos .modal-body").html(data);
                                });
                            }
                        </script>
                    </ul>
                </div>
            </div>

            <div class="col-md" id="main-wrap">
                <div class="header">
                    <button class="burger-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="top-nav">
                        <li><a href="/Common/Dashboard">Dashboard</a></li>
                    </ul>

                    <div id="sticky-footer" style="width:50vw; padding:0px; margin:0px; float:left; "
                        class="py-1 bg-black text-white">
                        <div class="container text-center" style="padding:0px; margin:0px;">
                            <div class="tickercontainer" style="height: 25px; overflow: hidden;">
                                <div class="mask">
                                    <ul id="news-ticker-foot"
                                        style="padding: 0px; margin: 0px; position: relative; overflow: hidden; float: left; font: bold 10px Verdana; list-style-type: none; width: 1201.29px; transition-timing-function: linear; transition-duration: 15.8275s; left: -853.75px;">
                                        <li class="webticker-init"
                                            style="float: left; width: 853.75px; height: 25px; white-space: nowrap; padding: 0px 7px; line-height: 25px;">
                                        </li>
                                        <li data-update="item1"
                                            style="white-space: nowrap; float: left; padding: 0px 7px; line-height: 25px;">
                                            <b>Welcome to Exchange - </b></li>
                                        <li class="ticker-spacer"
                                            style="float: left; width: 0px; height: 25px; white-space: nowrap; padding: 0px 7px; line-height: 25px;">
                                        </li>
                                    </ul><span class="tickeroverlay-left" style="display: none;">&nbsp;</span><span
                                        class="tickeroverlay-right" style="display: none;">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dropdown-wrap">
                        <div class="dropdown">

                            <div class="designation">
                                <span class="wallet-balance">B: Rs. {{ number_format($balance, 2) }}</span>
                                <span class="wallet-exposure"> | L: {{ number_format($liable, 2) }}</span>
                            </div>

                            <button class="btn profile-dropdown dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ strtoupper($username ?? Auth::user()->username) }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/Customer/Ledger/">Statement</a>
                                <a class="dropdown-item" href="/Common/Result/">Result</a>
                                <a class="dropdown-item" href="/Customer/ProfitLoss/">Profit Loss</a>
                                <a class="dropdown-item" href="/Customer/Bets">Bet History</a>
                                <a class="dropdown-item" href="/Customer/Profile">Profile</a>
                                <a class="dropdown-item" id="btn-logout" href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                </div>

<div class="content-wrap body">
                    

<style>

    .container {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    /* Then style the iframe to fit in the container div with full height and width */
    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .containerofiframe {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: max-content;
        padding-top: 88%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
    }

    /* Then style the iframe to fit in the container div with full height and width */
    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .checknow {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* IE 10+ and Edge */
        user-select: none; /* Standard syntax */
    }

    .controls {
        overflow: hidden;
        background: #2b2f35;
        /* height: 35px; */
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .scores {
        background-color: #2b2f35;
        border: 1px solid #2b2f35;
        padding: 0.25rem;
    }

    .scores .runnername {
        margin-top: 7px;
        line-height: 0.2;
        color: white;
        font-size: 18px;
    }

    .scores .runner-score {
        color: white;
        font-size: 18px;
        margin-top: 2px;
        padding: 0px;
    }

    .scores .active {
        color: #009069
    }

    .scores .col-divider {
        border-left: 1px solid white;
    }

    .tablefoter {
        font-size: 14px;
        border: 1px solid white;
        color: white;
    }

    .socindivs {
        padding: 0px;
    }

    .timeshow {
        color: white;
        font-size: 18px;
    }

    .scoresocer {
        color: white;
        font-size: 18px
    }

    .tablefotercs {
        font-size: 12px;
        color: white;
    }

    .colwidthset {
        width: 1vw;
    }

    .right-nav {
        padding-left: 10px;
    }

    #TVDIVIFRAME iframe {
        height: 330px;
        width: 100%;
        border: none;
        overflow: hidden;
    }

    @media screen and (max-width: 480px) {
        #TVDIVIFRAME iframe {
            height: 230px;
            width: 100%;
            border: none;
            overflow: hidden;
        }

        .runnername {
            margin-top: 10px;
            line-height: 0.1;
            color: white;
            font-size: 9px;
        }

        .colwidthset {
            width: 50px;
        }

        .tableresp {
            display: inline-table;
        }

        .lrhom {
            display: none;
        }

        .sethourshow {
            line-height: 0.3;
            font-size: 15px;
        }

        .tablefoter {
            font-size: 10px;
        }

        .runnersocer {
            color: white;
            font-size: 13px;
            margin-top: 2px;
            padding: 0px;
            line-height: 1.2;
        }

        .socindivs {
            padding: 0px;
        }

        .timeshow {
            color: white;
            font-size: 12px;
        }

        .scoresocer {
            color: white;
            font-size: 18px;
            padding: 0px;
            margin-bottom: 7px;
        }

        .tablefotercs {
            font-size: 11px;
            color: white;
        }

        .scores .runnername {
            margin-top: 7px;
            line-height: 0.2;
            color: white;
            font-size: 12px;
        }
    }

    @media screen and (max-width: 480px) {
        .runnername {
            margin-top: 10px;
            line-height: 0.1;
            color: white;
            font-size: 9px;
        }

        .colwidthset {
            width: 50px;
        }

        .tableresp {
            display: inline-table;
        }

        .lrhom {
            display: none;
        }

        .sethourshow {
            line-height: 0.3;
            font-size: 15px;
        }

        .tablefoter {
            font-size: 10px;
        }

        .runnersocer {
            color: white;
            font-size: 13px;
            margin-top: 2px;
            padding: 0px;
            line-height: 1.2;
        }

        .socindivs {
            padding: 0px;
        }

        .timeshow {
            color: white;
            font-size: 12px;
        }

        .scoresocer {
            color: white;
            font-size: 18px;
            padding: 0px;
            margin-bottom: 7px;
        }

        .tablefotercs {
            font-size: 11px;
            color: white;
        }

        .scores .runnername {
            margin-top: 7px;
            line-height: 0.2;
            color: white;
            font-size: 12px;
        }

        iframe {
            width: 1px;
            min-width: 100%;
        }
    }

    iframe {
        width: 1px;
        min-width: 100%;
    }

    /* Style the tab */
    .tabcontent {
        margin-top: -4px;
        display: none;
        border: 1px solid #ccc;
        border-top: none;
        background-color: white;
    }

    div.scrollmenu {
        overflow: auto;
        white-space: nowrap;
        margin-bottom: -10px;
        transition: 0.5s;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    div.scrollmenu a {
        display: inline-block;
        color: black;
        text-align: center;
        padding: 0px 20px;
        text-decoration: none;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    div.scrollmenu a:hover {
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
</style>

<script>
    const marketId = '{{ $marketId ?? "1.250636959" }}';
    const eventId = '{{ $eventId ?? "34872738" }}';
    const timeCode = '';

    const CommentrySignalR = 1;
    const SsocketEnable = 1;
    const CatalogSignalR = 0; //1;
</script>
<script src="/js/unreal_html5_player_script_v2.js?00001"></script>

<div id="MarketView"><div class="text-center mt-10" style="display: none;"><img src="/img/loadinggif.gif" alt="Loading..."></div> <div id="loadedmarkettoshow" class="row" style=""><div class="col-lg-8"><div class="left-content"><div class="table-wrap"><div class="table-box-header"><div class="row no-gutters"><div class="col-md-auto"><div class="box-main-icon"><img src="/img/v2/cricket.svg" alt="Box Icon"></div></div> <div class="col-md"><div class="tb-top-text"><p><img src="/img/v2/clock-green.svg"> <span class="green-upper-text">InPlay</span> <span class="black-light-text">7 hours ago | Nov 22 8:30 am</span> <span class="black-light-text"> | Winners: 1</span></p> <h4 class="event-title">{{ $eventName ?? 'Match' }}</h4> <p><span class="medium-black">Elapsed : 06:55:57</span></p><div id="DisplayOnBox" class="form-group form-check pull-right"><input type="checkbox" id="IsDisplayOn" class="form-check-input"> <label for="IsDisplayOn" class="form-check-label">Keep Display On</label></div> <p></p></div></div></div> <div class="scrollmenu"><a id="Alltab" class="tablink btn btn-primary">
                                ALL
                            </a> <!----> <a id="BMtab" href="#" onclick="MarketTab('BM')" class="tablink btn btn-primary">Bookmaker</a> <!----> <a id="Fancy2tab" href="#" onclick="MarketTab('Fancy2')" class="tablink btn btn-primary">Fancy-2</a> <!----> <!----> <!----> </div></div> <!----> <!----> <!----> <div id="All" class="tabcontent" style="display: block;"><div id="nav-tabContent" class="tab-content"><div id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab" class="tab-pane fade show active"><div class="table-box-body"><!----> <div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Match Odds </span> <span style="text-transform: initial;">
                    (MaxBet: 200K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners">
@php
    $runners = $runners ?? [];
    $odds = $odds ?? [];
@endphp
@if(count($runners) > 0)
    @foreach($runners as $runner)
        @php
            $runnerId = $runner['selectionId'] ?? $runner['id'] ?? 0;
            $runnerName = $runner['runnerName'] ?? $runner['name'] ?? 'Unknown';
            $runnerOdds = collect($odds)->firstWhere('selectionId', $runnerId) ?? [];
            $backPrices = $runnerOdds['ex']['availableToBack'] ?? [];
            $layPrices = $runnerOdds['ex']['availableToLay'] ?? [];
        @endphp
        <div id="runner-{{ $runnerId }}" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img src="" class="ml-2"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer" data-original-title="" title="">
                        {{ $runnerName }}
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span></span> <span class="ml-1" style="font-weight: normal;"></span></div></h3> <a id="B3-{{ $runnerId }}" role="button" class="price-price price-back"><span class="price-odd">{{ $backPrices[2]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($backPrices[2]['size']) ? number_format($backPrices[2]['size']) : '' }}</span></a> <a id="B2-{{ $runnerId }}" class="price-price price-back"><span class="price-odd">{{ $backPrices[1]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($backPrices[1]['size']) ? number_format($backPrices[1]['size']) : '' }}</span></a> <a id="B1-{{ $runnerId }}" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">{{ $backPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($backPrices[0]['size']) ? number_format($backPrices[0]['size']) : '' }}</span></a> <a id="L1-{{ $runnerId }}" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">{{ $layPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($layPrices[0]['size']) ? number_format($layPrices[0]['size']) : '' }}</span></a> <a class="price-price price-lay"><span class="price-odd">{{ $layPrices[1]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($layPrices[1]['size']) ? number_format($layPrices[1]['size']) : '' }}</span></a> <a class="price-price price-lay mr-4"><span class="price-odd">{{ $layPrices[2]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($layPrices[2]['size']) ? number_format($layPrices[2]['size']) : '' }}</span></a></div>
    @endforeach
@else
    <div class="runner-runner"><h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">No runners available</h4></span></div></h3></div>
@endif
</div></div> <!----> <!----> <div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Bookmaker </span> <span style="text-transform: initial;">
                    (MaxBet: 1M)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners"><div id="runner-989523" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Bangladesh
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-989523" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-989523" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-989523" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1.0125</span> <span class="price-amount">100</span></a> <a id="L1-989523" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1.02</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div><div id="runner-839387" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Ireland
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div><div id="runner-147882" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        The Draw
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div> <!----> <div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Fancy 2 </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div id="market-9.20530814"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        2nd Innings Run IRE
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530781"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Curtis Campher Boundaries 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530780"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Curtis Campher Runs 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530811"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Fall of 6th Wkt IRE 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530813"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Stephen Doheny Boundaries 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530812"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Stephen Doheny Runs 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div></div>   <!----></div></div></div></div> <!----> <div id="BM" class="tabcontent"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Bookmaker </span> <span style="text-transform: initial;">
                    (MaxBet: 1M)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners"><div id="runner-989523" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Bangladesh
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-989523" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-989523" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-989523" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1.0125</span> <span class="price-amount">100</span></a> <a id="L1-989523" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1.02</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div><div id="runner-839387" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Ireland
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div><div id="runner-147882" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        The Draw
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div></div> <!----> <div id="Fancy2" class="tabcontent"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Fancy 2 </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div id="market-9.20530814"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        2nd Innings Run IRE
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530781"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Curtis Campher Boundaries 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530780"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Curtis Campher Runs 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530811"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Fall of 6th Wkt IRE 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530813"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Stephen Doheny Boundaries 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div><div id="market-9.20530812"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Stephen Doheny Runs 2
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div></div></div> <!----> <!----> <!----> </div></div></div> <div class="col-lg-4 right-nav"><div class="right-content"><div class="table-wrap"><div class="table-box-body"><div class="btn-group btn-group-xs" style="width: 100%; height: 30px; margin-bottom: 2px;"><button onclick="SHOWTV()" class="btn btn-primary btn-xs" style="width: 50%; border-right: solid;">Tv</button> <button onclick="SHOWLIVE('1.250542387')" class="btn btn-primary btn-xs" style="width: 50%;">Score Card</button></div> <div id="TVDIVIFRAME" style="display: none;"></div> <div id="TVDIV" style="display: none;"><div class="bets"><div id="VBox1" style="display: none;"><unrealhtml5videoplayer id="UnrealPlayer1"></unrealhtml5videoplayer> <video id="streamVideo1" width="465" autoplay="autoplay" playsinline="" controls="controls" onloadedmetadata="OnMetadata()"></video></div></div></div> <div id="LIVEDIV" class="container" style="height: 174px;"><iframe id="livesc" src="https://bpexch.xyz/Common/LiveScoreCard?id=1.250542387" scrolling="no" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="responsive-iframe" style="height: 213px;"></iframe></div> <div id="betSlip" class="bets" style="display: none;"><strong>Bet Slip <a target="_blank" href="/Customer/Profile" class="button" style="color: white; float: right;">Edit Bet Sizes</a></strong> <div class="betting-table"><table class="table"><thead><tr><th>Bet for</th> <th>Odds</th> <th>Stake</th> <th>Profit</th></tr></thead> <tbody><tr class="back"><td></td> <td width="10%"><div class="quantity"><input type="text" id="bet-price"> <div class="quantity-nav"><div class="quantity-button quantity-up"><span class="fa fa-caret-up"></span></div> <div class="quantity-button quantity-down"><span class="fa fa-caret-down"></span></div></div></div></td> <td width="10%"><div class="stake"><input type="text" id="bet-size"></div></td> <td> / -</td></tr> <tr class="back"><td colspan="5"><table class="table"><tbody><tr class="checknow"><td><span data-amount="2000" class="points">2,000</span></td> <td><span class="points">5,000</span></td> <td><span class="points">10,000</span></td> <td><span class="points">25,000</span></td></tr> <tr class="checknow"><td><span class="points">+ 1,000</span></td> <td><span class="points">+ 5,000</span></td> <td><span class="points">+ 10,000</span></td> <td><span class="points">+ 25,000</span></td></tr> <tr><td colspan="4" class="alert-danger pr-5"></td></tr> <tr><td><button type="reset" class="align-left btn btn-danger"><b>Close</b></button></td> <td><button type="reset" class="align-left btn btn-warning"><b>Clear</b></button></td> <td colspan="1"></td> <td><div class="btn btn-primary ld-over" style="cursor: pointer;"><b>Submit</b> <div class="ld ld-ball ld-flip"></div></div></td></tr></tbody></table></td></tr></tbody></table></div></div> <div id="betSlipMobile" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog modal-md"><div class="modal-content back"><div class="modal-body"><table><tbody><tr><td>&nbsp;</td> <th colspan="3"></th></tr> <tr><td>ODDS</td> <td colspan="2"><div class="input-group mt-2"><div class="input-group-prepend"><button type="button" class="btn btn-outline-secondary"><strong>-</strong></button></div> <input type="number" id="bet-price" step="0.01" min="1.01" max="1000" class="form-control"> <div class="input-group-append"><button type="button" class="btn btn-outline-secondary"><strong>+</strong></button></div></div></td></tr> <tr><td>Amount</td> <td colspan="2"><input type="number" id="bet-size-m" class="form-control mt-2"></td></tr> <tr><td style="width: 25%;"><button type="button" data-amount="2000" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                2,000
                            </button></td> <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                5,000
                            </button></td> <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                10,000
                            </button></td> <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                25,000
                            </button></td></tr> <tr><td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +1,000
                            </button></td> <td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +5,000
                            </button></td> <td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +10,000
                            </button></td> <td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +25,000
                            </button></td></tr> <tr><td><button type="button" data-dismiss="modal" class="btn btn-danger mt-2" style="touch-action: manipulation;">
                                Close
                            </button></td> <td colspan="2"><div class="btn btn-primary ld-over mt-2" style="cursor: pointer;"><b>Submit</b> <div class="ld ld-ball ld-flip"></div></div> <span> / -</span></td></tr> <tr style="display: none;"><td colspan="4" class="alert-danger pr-5"></td></tr></tbody></table></div></div></div></div> <div class="bets"><strong>
        Open Bets (0)
        <img src="/img/reconnecting.gif" alt="dc" class="rounded disconnected" style="display: none;"> <!----> <!----></strong> <div class="betting-table"><table class="table"><thead><tr><th>Runner</th> <th>Price</th> <th>Size</th> <th></th></tr></thead> <tbody></tbody></table></div></div> <div class="bets"><strong>Matched Bets (0)</strong> <div class="betting-table"><table class="table"><thead><tr><th>Runner</th> <th>Price</th> <th>Size</th></tr></thead> <tbody></tbody></table></div></div> <div style="margin-top: 7px;"><strong class="RM_In_Markets" style="display: block; background: rgb(43, 47, 53); color: rgb(255, 255, 255); padding: 10px;">Related Events</strong> <div><table class="table compact" style="margin-bottom: 0px;"><tbody><tr id="m_1_250636959" onclick="window.location='/Common/Market?id=1.250636959';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">8:30</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-22T03:30:00.0000000Z
                                        </span></div></td> <td><div>
                                    India v South Africa
                                </div></td></tr> <tr id="m_1_250776463" onclick="window.location='/Common/Market?id=1.250776463';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">14:50</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-22T09:50:00.0000000Z
                                        </span></div></td> <td><div>
                                    Perth Scorchers W v Adelaide Strikers W
                                </div></td></tr> <tr id="m_1_250836685" onclick="window.location='/Common/Market?id=1.250836685';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">16:30</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-22T11:30:00.0000000Z
                                        </span></div></td> <td><div>
                                    Aspin Stallions v Vista Riders
                                </div></td></tr> <tr id="m_1_250777438" onclick="window.location='/Common/Market?id=1.250777438';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">18:00</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-22T13:00:00.0000000Z
                                        </span></div></td> <td><div>
                                    Pakistan v Sri Lanka
                                </div></td></tr> <tr id="m_1_250840894" onclick="window.location='/Common/Market?id=1.250840894';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">18:45</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-22T13:45:00.0000000Z
                                        </span></div></td> <td><div>
                                    Northern Warriors v Deccan Gladiators
                                </div></td></tr></tbody></table></div></div></div></div></div></div> <div id="fancyPosition" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 id="exampleModalLabel" class="modal-title"></h5> <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button></div> <div id="fancypos-body" class="modal-body"><table class="table"><tbody><tr><th>Score</th> <th>Position</th></tr> </tbody></table></div> <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button></div></div></div></div> <div id="modalRules" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 id="exampleModalLabel" class="modal-title">Market Rules</h5> <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button></div> <div id="rules-box" class="modal-body"></div></div></div></div></div></div>


                </div>
                </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <b>Protection of minors</b>
                    <br>
                    <p> It is illegal for anybody under the age of 18 to gamble. </p>
                    <br>
                    <p>Our site has strict policies and verification measures to prevent access to minors.</p>
                    <br>
                    <p>We encourage parents consider the use of internet use protection tools. You may find the
                        following links useful. </p>
                    <br>
                    <a href="https://www.cyberpatrol.com/" target="_blank" style="color:mediumspringgreen">
                        Cyberpatrol</a>
                    <br>
                    <a href="https://www.cybersitter.com/" target="_blank" style="color:mediumspringgreen"> Cybersitter
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    </div> <!-- end main-page -->

    <footer id="sticky-footer" class="py-1 bg-dark text-white-50 Bl_NT_SF">
        <div class="col-12 container" style="background-color:#4dbd74; height:6px; margin-top:-4px;">
        </div>
        <div class="container text-center">
            <center>

                <style>
                    p {
                        font-size: 12px;
                        color: white;
                    }

                    .caoimg {
                        max-width: 60px;
                    }

                    .bffooter {
                        width: 135px;
                        height: 30px;
                    }

                    .curasaoLinks {
                        pointer-events: none;
                        cursor: default;
                        margin-top: 10px;
                    }

                    @media screen and (max-width: 635px) {
                        .caoimg {
                            max-width: 40px;
                        }

                        .bffooter {
                            width: 100px;
                            height: 30px;
                        }
                    }
                </style>


                <div class="curasaoLinks row" style="display:inline-flex;" id="curacaodiv">
                    <hr>
                    <div class="col-sm-12 col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", (event) => {
                        document.querySelector('#curacaodiv').insertAdjacentHTML(
                            'afterbegin',
                            `<hr>
                <div class="col-sm-12 col-md-4"></div>
                <div class="col-md-4"></div>`);
                    });
                </script>

            </center>

        </div>
    </footer>
    <script type="text/javascript" src="https://wurfl.io/wurfl.js"></script>
    <script type="text/javascript" src="/dist/bundle0a.js?11700"></script>

    <script>
        const token = getCookie('wexscktoken');
        const sess = getCookie('wex3authtoken');
        const reft = getCookie('wex3reftoken');
    </script>


    <script type="text/javascript" src="/js/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            fetchWallet();
            fetchHighlights();
            setInterval(fetchHighlights, 60000);

            isPWCRequired();
            showWelcomeBanner();

            $(".page_loader").hide();
            
            // Hide preloader
            const preloader = document.getElementById('page-preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => preloader.style.display = 'none', 300);
            }
            
            // Only hide horsenhound if it exists (homepage only)
            const horsenhound = document.getElementById("horsenhound");
            if (horsenhound) {
                horsenhound.classList.remove("d-none");
            }

            $(".games_slider").slick({
                arrows: false,
                autoplay: true,
                infinite: true,
                slidesToShow: 8,
                slidesToScroll: 1,
                swipeToSlide: true,
                touchThreshold: 100,
                waitForAnimate: false,
                responsive: [
                    {
                        breakpoint: 1800,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 900,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $("#modalCasinoToS").on('hidden.bs.modal', function (event) {
                showNewsFlash();
            });
        });

        function AcceptPassword() {
            var newpass = document.getElementById("Newpasswordmodal").value;
            $.ajax({
                type: "GET",
                url: "/Customer/Profile?handler=UpdatePassword&NewPassword=" + newpass,
                success: function (result) {
                    if (result == 'PCS') {
                        $('#modalPasswordChange').modal('hide');;
                        $('#modalRedirectToLogout').modal('show');;
                    } else {
                        $('#alertmodaltitle').html(result);
                    }
                },
                error: function (exception) {
                    location.reload();
                }
            });
        }

        function ReLogin() {
            document.getElementById('logout-form').submit();
        }

        function formatOdds(value) {
            return value && value > 0 ? value : '';
        }

        function formatMatched(value) {
            if (!value || value === 0) return '';
            if (value >= 1000000) return (value / 1000000).toFixed(1) + 'M';
            if (value >= 1000) return (value / 1000).toFixed(0) + 'k';
            return value.toLocaleString();
        }

        function formatSize(value) {
            if (!value || value === 0) return '-';
            if (value >= 1000) {
                return (value / 1000).toFixed(2) + 'k';
            }
            return value.toLocaleString();
        }

        function populateAllTables(allCricket, allSoccer, allTennis, cricketInplay, soccerInplay, tennisInplay) {
            const tabContents = document.querySelectorAll('.tabcontent');
            
            tabContents.forEach((tabContent, index) => {
                const tables = tabContent.querySelectorAll('.high_lights table tbody');
                
                let cricketData = [];
                let soccerData = [];
                let tennisData = [];
                
                if (index === 0) {
                    cricketData = cricketInplay;
                    soccerData = soccerInplay;
                    tennisData = tennisInplay;
                } else if (index === 1) {
                    cricketData = allCricket;
                    soccerData = [];
                    tennisData = [];
                } else if (index === 2) {
                    cricketData = [];
                    soccerData = [];
                    tennisData = allTennis;
                } else if (index === 3) {
                    cricketData = [];
                    soccerData = allSoccer;
                    tennisData = [];
                }
                
                populateTables(tables, cricketData, soccerData, tennisData, index);
            });
        }

        function populateTables(tables, cricketMatches, soccerMatches, tennisMatches, tabIndex) {
            
            if (tabIndex === 0) {
                if (tables[0]) {
                    tables[0].innerHTML = cricketMatches.map(match => {
                    const r1 = match.runners && match.runners[0] || {};
                    const r2 = match.runners && match.runners[2] || {};
                    const r3 = match.runners && match.runners[1] || {};
                    const r1Back = formatOdds(r1.back);
                    const r1Lay = formatOdds(r1.lay);
                    const r2Back = formatOdds(r2.back);
                    const r2Lay = formatOdds(r2.lay);
                    const r3Back = formatOdds(r3.back);
                    const r3Lay = formatOdds(r3.lay);
                    
                    return `
                        <tr class="McomCustom">
                            <td colspan="2">
                                <div class="teams">
                                    <strong class="team-1">
                                        <a href="/cricket/${match.marketId}">${match.marketName}</a>
                                    </strong>
                                </div>
                            </td>
                            <td>
                                <div class="matched">
                                    <span class="TMFORDESK">${formatMatched(match.totalMatched)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r1Back ? '' : '-empty_blue'}">
                                    <strong>${r1Back || ' '}</strong>
                                    <span>${formatSize(r1.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r1Lay ? '' : '-empty_pink'}">
                                    <strong>${r1Lay || ' '}</strong>
                                    <span>${formatSize(r1.laySize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r2Back ? '' : '-empty_blue'}">
                                    <strong>${r2Back || ' '}</strong>
                                    <span>${formatSize(r2.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r2Lay ? '' : '-empty_pink'}">
                                    <strong>${r2Lay || ' '}</strong>
                                    <span>${formatSize(r2.laySize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r3Back ? '' : '-empty_blue'}">
                                    <strong>${r3Back || ' '}</strong>
                                    <span>${formatSize(r3.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r3Lay ? '' : '-empty_pink'}">
                                    <strong>${r3Lay || ' '}</strong>
                                    <span>${formatSize(r3.laySize)}</span>
                                </div>
                            </td>
                            <td class="action">
                                <a href="#"><i class="fa fa-info-circle"></i></a>
                            </td>
                        </tr>
                    `;
                }).join('');
                }
                
                if (tables[1]) {
                    tables[1].innerHTML = soccerMatches.map(match => {
                    const r1 = match.runners && match.runners[0] || {};
                    const r2 = match.runners && match.runners[1] || {};
                    const r3 = match.runners && match.runners[2] || {};
                    const r1Back = formatOdds(r1.back);
                    const r1Lay = formatOdds(r1.lay);
                    const r2Back = formatOdds(r2.back);
                    const r2Lay = formatOdds(r2.lay);
                    const r3Back = formatOdds(r3.back);
                    const r3Lay = formatOdds(r3.lay);
                    
                    return `
                        <tr class="McomCustom">
                            <td colspan="2">
                                <div class="teams">
                                    <strong class="team-1">
                                        <a href="/cricket/${match.marketId}">${match.marketName}</a>
                                    </strong>
                                </div>
                            </td>
                            <td>
                                <div class="matched">
                                    <span class="TMFORDESK">${formatMatched(match.totalMatched)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r1Back ? '' : '-empty_blue'}">
                                    <strong>${r1Back || ' '}</strong>
                                    <span>${formatSize(r1.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r1Lay ? '' : '-empty_pink'}">
                                    <strong>${r1Lay || ' '}</strong>
                                    <span>${formatSize(r1.laySize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r2Back ? '' : '-empty_blue'}">
                                    <strong>${r2Back || ' '}</strong>
                                    <span>${formatSize(r2.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r2Lay ? '' : '-empty_pink'}">
                                    <strong>${r2Lay || ' '}</strong>
                                    <span>${formatSize(r2.laySize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r3Back ? '' : '-empty_blue'}">
                                    <strong>${r3Back || ' '}</strong>
                                    <span>${formatSize(r3.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r3Lay ? '' : '-empty_pink'}">
                                    <strong>${r3Lay || ' '}</strong>
                                    <span>${formatSize(r3.laySize)}</span>
                                </div>
                            </td>
                            <td class="action">
                                <a href="#"><i class="fa fa-info-circle"></i></a>
                            </td>
                        </tr>
                    `;
                }).join('');
                }
                
                if (tables[2]) {
                    tables[2].innerHTML = tennisMatches.map(match => {
                    const r1 = match.runners && match.runners[0] || {};
                    const r2 = match.runners && match.runners[1] || {};
                    const r1Back = formatOdds(r1.back);
                    const r1Lay = formatOdds(r1.lay);
                    const r2Back = formatOdds(r2.back);
                    const r2Lay = formatOdds(r2.lay);
                    
                    return `
                        <tr class="McomCustom">
                            <td colspan="2">
                                <div class="teams">
                                    <strong class="team-1">
                                        <a href="/cricket/${match.marketId}">${match.marketName}</a>
                                    </strong>
                                </div>
                            </td>
                            <td>
                                <div class="matched">
                                    <span class="TMFORDESK">${formatMatched(match.totalMatched)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r1Back ? '' : '-empty_blue'}">
                                    <strong>${r1Back || ' '}</strong>
                                    <span>${formatSize(r1.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r1Lay ? '' : '-empty_pink'}">
                                    <strong>${r1Lay || ' '}</strong>
                                    <span>${formatSize(r1.laySize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue m-left -empty_blue">
                                    <strong> </strong>
                                    <span>-</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink m-right -empty_pink">
                                    <strong> </strong>
                                    <span>-</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -blue ${r2Back ? '' : '-empty_blue'}">
                                    <strong>${r2Back || ' '}</strong>
                                    <span>${formatSize(r2.backSize)}</span>
                                </div>
                            </td>
                            <td>
                                <div class="box -pink ${r2Lay ? '' : '-empty_pink'}">
                                    <strong>${r2Lay || ' '}</strong>
                                    <span>${formatSize(r2.laySize)}</span>
                                </div>
                            </td>
                            <td class="action">
                                <a href="#"><i class="fa fa-info-circle"></i></a>
                            </td>
                        </tr>
                    `;
                }).join('');
                }
            } else if (tabIndex === 1) {
                if (tables[0]) {
                    tables[0].innerHTML = cricketMatches.map(match => {
                        const r1 = match.runners && match.runners[0] || {};
                        const r2 = match.runners && match.runners[2] || {};
                        const r3 = match.runners && match.runners[1] || {};
                        const r1Back = formatOdds(r1.back);
                        const r1Lay = formatOdds(r1.lay);
                        const r2Back = formatOdds(r2.back);
                        const r2Lay = formatOdds(r2.lay);
                        const r3Back = formatOdds(r3.back);
                        const r3Lay = formatOdds(r3.lay);
                        
                        return `
                            <tr class="McomCustom">
                                <td colspan="2">
                                    <div class="teams">
                                        <strong class="team-1">
                                            <a href="/cricket/${match.marketId}">${match.marketName}</a>
                                        </strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="matched">
                                        <span class="TMFORDESK">${formatMatched(match.totalMatched)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r1Back ? '' : '-empty_blue'}">
                                        <strong>${r1Back || ' '}</strong>
                                        <span>${formatSize(r1.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r1Lay ? '' : '-empty_pink'}">
                                        <strong>${r1Lay || ' '}</strong>
                                        <span>${formatSize(r1.laySize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r2Back ? '' : '-empty_blue'}">
                                        <strong>${r2Back || ' '}</strong>
                                        <span>${formatSize(r2.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r2Lay ? '' : '-empty_pink'}">
                                        <strong>${r2Lay || ' '}</strong>
                                        <span>${formatSize(r2.laySize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r3Back ? '' : '-empty_blue'}">
                                        <strong>${r3Back || ' '}</strong>
                                        <span>${formatSize(r3.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r3Lay ? '' : '-empty_pink'}">
                                        <strong>${r3Lay || ' '}</strong>
                                        <span>${formatSize(r3.laySize)}</span>
                                    </div>
                                </td>
                                <td class="action">
                                    <a href="#"><i class="fa fa-info-circle"></i></a>
                                </td>
                            </tr>
                        `;
                    }).join('');
                }
            } else if (tabIndex === 2) {
                if (tables[0]) {
                    tables[0].innerHTML = tennisMatches.map(match => {
                        const r1 = match.runners && match.runners[0] || {};
                        const r2 = match.runners && match.runners[1] || {};
                        const r1Back = formatOdds(r1.back);
                        const r1Lay = formatOdds(r1.lay);
                        const r2Back = formatOdds(r2.back);
                        const r2Lay = formatOdds(r2.lay);
                        
                        return `
                            <tr class="McomCustom">
                                <td colspan="2">
                                    <div class="teams">
                                        <strong class="team-1">
                                            <a href="/cricket/${match.marketId}">${match.marketName}</a>
                                        </strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="matched">
                                        <span class="TMFORDESK">${formatMatched(match.totalMatched)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r1Back ? '' : '-empty_blue'}">
                                        <strong>${r1Back || ' '}</strong>
                                        <span>${formatSize(r1.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r1Lay ? '' : '-empty_pink'}">
                                        <strong>${r1Lay || ' '}</strong>
                                        <span>${formatSize(r1.laySize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue m-left -empty_blue">
                                        <strong> </strong>
                                        <span>-</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink m-right -empty_pink">
                                        <strong> </strong>
                                        <span>-</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r2Back ? '' : '-empty_blue'}">
                                        <strong>${r2Back || ' '}</strong>
                                        <span>${formatSize(r2.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r2Lay ? '' : '-empty_pink'}">
                                        <strong>${r2Lay || ' '}</strong>
                                        <span>${formatSize(r2.laySize)}</span>
                                    </div>
                                </td>
                                <td class="action">
                                    <a href="#"><i class="fa fa-info-circle"></i></a>
                                </td>
                            </tr>
                        `;
                    }).join('');
                }
            } else if (tabIndex === 3) {
                if (tables[0]) {
                    tables[0].innerHTML = soccerMatches.map(match => {
                        const r1 = match.runners && match.runners[0] || {};
                        const r2 = match.runners && match.runners[1] || {};
                        const r3 = match.runners && match.runners[2] || {};
                        const r1Back = formatOdds(r1.back);
                        const r1Lay = formatOdds(r1.lay);
                        const r2Back = formatOdds(r2.back);
                        const r2Lay = formatOdds(r2.lay);
                        const r3Back = formatOdds(r3.back);
                        const r3Lay = formatOdds(r3.lay);
                        
                        return `
                            <tr class="McomCustom">
                                <td colspan="2">
                                    <div class="teams">
                                        <strong class="team-1">
                                            <a href="/cricket/${match.marketId}">${match.marketName}</a>
                                        </strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="matched">
                                        <span class="TMFORDESK">${formatMatched(match.totalMatched)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r1Back ? '' : '-empty_blue'}">
                                        <strong>${r1Back || ' '}</strong>
                                        <span>${formatSize(r1.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r1Lay ? '' : '-empty_pink'}">
                                        <strong>${r1Lay || ' '}</strong>
                                        <span>${formatSize(r1.laySize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r2Back ? '' : '-empty_blue'}">
                                        <strong>${r2Back || ' '}</strong>
                                        <span>${formatSize(r2.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r2Lay ? '' : '-empty_pink'}">
                                        <strong>${r2Lay || ' '}</strong>
                                        <span>${formatSize(r2.laySize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -blue ${r3Back ? '' : '-empty_blue'}">
                                        <strong>${r3Back || ' '}</strong>
                                        <span>${formatSize(r3.backSize)}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box -pink ${r3Lay ? '' : '-empty_pink'}">
                                        <strong>${r3Lay || ' '}</strong>
                                        <span>${formatSize(r3.laySize)}</span>
                                    </div>
                                </td>
                                <td class="action">
                                    <a href="#"><i class="fa fa-info-circle"></i></a>
                                </td>
                            </tr>
                        `;
                    }).join('');
                }
            }
        }

        function populateSidebarMenus(cricketMatches, soccerMatches, tennisMatches) {
            const cricketMenu = document.getElementById('sidebar-cricket-menu');
            const soccerMenu = document.getElementById('sidebar-soccer-menu');
            const tennisMenu = document.getElementById('sidebar-tennis-menu');
            
            // Populate Cricket sidebar (limit to 10 matches)
            if (cricketMenu && cricketMatches.length > 0) {
                const cricketItems = cricketMatches.slice(0, 10).map(match => 
                    `<li class="nav-item"><a class="nav-link" href="/Common/market/?id=${match.marketId || ''}">${match.marketName || 'Match'}</a></li>`
                ).join('');
                cricketMenu.innerHTML = `
                    <li><a href="/cricket"><strong>All Cricket</strong></a></li>
                    <li class="divider"></li>
                    ${cricketItems}
                `;
            } else if (cricketMenu) {
                cricketMenu.innerHTML = `
                    <li><a href="/cricket"><strong>All Cricket</strong></a></li>
                    <li class="divider"></li>
                    <li class="text-center"><small>No matches available</small></li>
                `;
            }
            
            // Populate Soccer sidebar (limit to 10 matches)
            if (soccerMenu && soccerMatches.length > 0) {
                const soccerItems = soccerMatches.slice(0, 10).map(match => 
                    `<li class="nav-item"><a class="nav-link" href="/Common/market/?id=${match.marketId || ''}">${match.marketName || 'Match'}</a></li>`
                ).join('');
                soccerMenu.innerHTML = `
                    <li><a href="/soccer"><strong>All Soccer</strong></a></li>
                    <li class="divider"></li>
                    ${soccerItems}
                `;
            } else if (soccerMenu) {
                soccerMenu.innerHTML = `
                    <li><a href="/soccer"><strong>All Soccer</strong></a></li>
                    <li class="divider"></li>
                    <li class="text-center"><small>No matches available</small></li>
                `;
            }
            
            // Populate Tennis sidebar (limit to 10 matches)
            if (tennisMenu && tennisMatches.length > 0) {
                const tennisItems = tennisMatches.slice(0, 10).map(match => 
                    `<li class="nav-item"><a class="nav-link" href="/Common/market/?id=${match.marketId || ''}">${match.marketName || 'Match'}</a></li>`
                ).join('');
                tennisMenu.innerHTML = `
                    <li><a href="/tennis"><strong>All Tennis</strong></a></li>
                    <li class="divider"></li>
                    ${tennisItems}
                `;
            } else if (tennisMenu) {
                tennisMenu.innerHTML = `
                    <li><a href="/tennis"><strong>All Tennis</strong></a></li>
                    <li class="divider"></li>
                    <li class="text-center"><small>No matches available</small></li>
                `;
            }
        }

        function fetchHighlights() {
            $.ajax({
                type: "GET",
                url: "/api/cricket-matches",
                timeout: 12000,
                success: function (result) {
                    if (result) {
                        const cricketMatches = result.cricket || [];
                        const soccerMatches = result.soccer || [];
                        const tennisMatches = result.tennis || [];
                        
                        const cricketInplay = cricketMatches.filter(m => m.inplay === true);
                        const soccerInplay = soccerMatches.filter(m => m.inplay === true);
                        const tennisInplay = tennisMatches.filter(m => m.inplay === true);
                        
                        const totalInplay = cricketInplay.length + soccerInplay.length + tennisInplay.length;
                        
                        document.querySelector('#owlitemactive1t div i').textContent = totalInplay;
                        document.querySelector('#owlitemactive2t div i').textContent = cricketMatches.length;
                        document.querySelector('#owlitemactive3t div i').textContent = tennisMatches.length;
                        document.querySelector('#owlitemactive4t div i').textContent = soccerMatches.length;
                        
                        populateAllTables(cricketMatches, soccerMatches, tennisMatches, cricketInplay, soccerInplay, tennisInplay);
                        populateSidebarMenus(cricketMatches, soccerMatches, tennisMatches);
                        
                        const preloader = document.getElementById('page-preloader');
                        if (preloader) {
                            preloader.style.opacity = '0';
                            setTimeout(() => preloader.style.display = 'none', 300);
                        }
                    }
                    ActivateTab(LastTab);
                    convertAllToClientTime();
                    $(".center").slick({
                        infinite: false,
                        slidesToShow: 8,
                        slidesToScroll: 3,
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 2
                                }
                            }

                        ]
                    });
                },
                error: function (jqXhr, textStatus, errorThrown) {

                }
            });
        };

        function fetchWallet() {
            $.ajax({
                type: 'GET',
                url: '/Customer/Wallet',
                success: function (result) {
                    $('#cust-wallet').html(result);
                }
            });
        }

        function convertAllToClientTime() {
            $('.utctime').each(function (index, el) {
                try {
                    convertToClientTime(el);
                }
                catch { }
            });
        }

        function convertToClientTime(el) {
            var reqFormat = $(el).data('format');
            var isoDate = $(el).text().trim();

            var clientDateTime = moment(isoDate).format(reqFormat);

            $(el).prev('.market-time').text(clientDateTime);
            let dateText = $(el).prev().prev('.day').text().toString();

            if (dateText.toLocaleLowerCase() !== "inplay") {
                let currentDay = parseInt(moment(new Date()).format("DDDD"));
                let marketDay = parseInt(moment(isoDate).format("DDDD"));
                let daysDiff = marketDay - currentDay;

                if (daysDiff == 0) {
                    dateText = "Today";
                }
                else if (daysDiff == 1) {
                    dateText = "Tomorrow";
                }
                else if (daysDiff == -1) {
                    dateText = "Yesterday";
                }

                $(el).prev().prev('.day').text(dateText);
            }
        }

        var highlightLink = function () {
            var active = null, colour = 'black';
            if (this.attachEvent) this.attachEvent('onunload', function () {
                active = null;
            });
            return function (element) {
                if ((active != element) && element.style) {
                    if (active) active.style.backgroundColor = '';
                    element.style.backgroundColor = colour;
                    active = element;
                }
            };
        }();

        var LastTab = 0;

        function ActivateTab(tab_index) {

            tab_index = parseInt(tab_index);
            LastTab = tab_index;

            $(".tablinks").removeClass('active');
            $(".tablinks:eq( " + tab_index + " )").addClass('active');

            $(".tabcontent").hide();
            $(".tabcontent:eq( " + tab_index + " )").show();
        }

        function showWelcomeBanner() {
            let isShowBanner = localStorage.getItem('welcome-banner');

            if (isShowBanner) {
                $('#modalCasinoToS').modal('show');

                fetchProfile();
            }

            localStorage.removeItem('welcome-banner');
        }

        function isPWCRequired() {
            let isPWC = localStorage.getItem('pwc-req');

            if (isPWC) {
                $('#modalPasswordChange').modal('show');
            }
        }

        function fetchProfile() {
            $.ajax({
                type: 'GET',
                url: '/api/users/profile',
                success: function (result) {
                    localStorage.setItem('symbol', result.currencySymbol);
                }
            });
        }
    </script>


    <script>
        $(document).ready(function () {
            pollRefreshToken();
        });

        if (genSck === 1) {
            const signalRConnection = new UWS(uwsUrl, token, sess);
            signalRConnection.connect();
        }
        else {
            pollUserData();
        }
    </script>
    
    <style>
        /* Flash animation for odds changes */
        @keyframes flashBack {
            0% { background-color: rgb(141, 210, 240); }
            25% { background-color: #ffff00; }
            50% { background-color: #90EE90; }
            75% { background-color: #ffff00; }
            100% { background-color: rgb(141, 210, 240); }
        }
        @keyframes flashLay {
            0% { background-color: rgb(254, 175, 178); }
            25% { background-color: #ffff00; }
            50% { background-color: #FFB6C1; }
            75% { background-color: #ffff00; }
            100% { background-color: rgb(254, 175, 178); }
        }
        .flash-back {
            animation: flashBack 0.5s ease-in-out;
        }
        .flash-lay {
            animation: flashLay 0.5s ease-in-out;
        }
    </style>
    <script>
        // Real-time Match Odds polling - updates every second
        var previousOdds = {};
        
        function formatAmount(size) {
            if (!size) return '';
            if (size >= 1000000) return (size / 1000000).toFixed(1) + 'M';
            if (size >= 1000) return (size / 1000).toFixed(1) + 'K';
            return size.toString();
        }
        
        function flashElement(element, isBack) {
            if (!element) return;
            element.classList.remove('flash-back', 'flash-lay');
            void element.offsetWidth; // Trigger reflow to restart animation
            element.classList.add(isBack ? 'flash-back' : 'flash-lay');
            setTimeout(() => {
                element.classList.remove('flash-back', 'flash-lay');
            }, 500);
        }
        
        function updatePriceWithFlash(element, newPrice, newSize, isBack, key) {
            if (!element) return;
            
            const oldValue = previousOdds[key];
            const newValue = newPrice + '|' + newSize;
            
            if (oldValue && oldValue !== newValue) {
                flashElement(element, isBack);
            }
            
            previousOdds[key] = newValue;
            
            const priceOdd = element.querySelector('.price-odd');
            const priceAmount = element.querySelector('.price-amount');
            if (priceOdd) priceOdd.textContent = newPrice || '-';
            if (priceAmount) priceAmount.textContent = formatAmount(newSize);
        }
        
        function updateMatchOdds() {
            const currentMarketId = marketId;
            if (!currentMarketId) return;
            
            fetch('/api/match-odds/' + currentMarketId)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.log('Odds update error:', data.error);
                        return;
                    }
                    
                    const runners = data.runners || [];
                    
                    runners.forEach(runner => {
                        const selectionId = runner.selectionId;
                        const ex = runner.ex || {};
                        const back = ex.availableToBack || [];
                        const lay = ex.availableToLay || [];
                        
                        // Update Back prices (B1, B2, B3) with flash
                        if (back[0]) {
                            const b1 = document.querySelector('#B1-' + selectionId);
                            updatePriceWithFlash(b1, back[0].price, back[0].size, true, 'B1-' + selectionId);
                        }
                        if (back[1]) {
                            const b2 = document.querySelector('#B2-' + selectionId);
                            updatePriceWithFlash(b2, back[1].price, back[1].size, true, 'B2-' + selectionId);
                        }
                        if (back[2]) {
                            const b3 = document.querySelector('#B3-' + selectionId);
                            updatePriceWithFlash(b3, back[2].price, back[2].size, true, 'B3-' + selectionId);
                        }
                        
                        // Update Lay prices (L1) with flash
                        if (lay[0]) {
                            const l1 = document.querySelector('#L1-' + selectionId);
                            updatePriceWithFlash(l1, lay[0].price, lay[0].size, false, 'L1-' + selectionId);
                        }
                        
                        // Update additional lay prices with flash
                        const runnerDiv = document.querySelector('#runner-' + selectionId);
                        if (runnerDiv) {
                            const layButtons = runnerDiv.querySelectorAll('.price-lay:not([id])');
                            if (lay[1] && layButtons[0]) {
                                updatePriceWithFlash(layButtons[0], lay[1].price, lay[1].size, false, 'L2-' + selectionId);
                            }
                            if (lay[2] && layButtons[1]) {
                                updatePriceWithFlash(layButtons[1], lay[2].price, lay[2].size, false, 'L3-' + selectionId);
                            }
                        }
                    });
                })
                .catch(error => console.log('Odds fetch error:', error));
        }
        
        // Start polling every second
        setInterval(updateMatchOdds, 1000);
        
        // Initial update
        updateMatchOdds();
    </script>
    <script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;99ac001e6ec6fdb0&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}"
        crossorigin="anonymous"></script>

</body>

</html>