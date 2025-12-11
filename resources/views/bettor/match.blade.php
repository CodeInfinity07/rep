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
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    
    /* Bet Slip Styles */
    #betSlip {
        margin-top: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        background-color: #f9f9f9;
    }
    
    #betSlip .stake-btn {
        cursor: pointer;
        border-radius: 3px;
        background-color: #e0e0e0;
        margin: 2px;
        transition: background-color 0.2s;
    }
    
    #betSlip .stake-btn:hover {
        background-color: #c0c0c0;
    }
    
    #betSlip tr.back {
        background-color: #d4edff;
    }
    
    #betSlip tr.lay {
        background-color: #ffe4e8;
    }
    
    #betSlip .quantity {
        display: flex;
        align-items: center;
    }
    
    #betSlip .quantity input {
        width: 60px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 3px;
        padding: 5px;
    }
    
    #betSlip .quantity-nav {
        display: flex;
        flex-direction: column;
        margin-left: 5px;
    }
    
    #betSlip .quantity-button {
        cursor: pointer;
        padding: 0 5px;
        background-color: #ddd;
        border: 1px solid #ccc;
        font-size: 10px;
    }
    
    #betSlip .quantity-button:hover {
        background-color: #bbb;
    }
    
    #betSlip .stake input {
        width: 80px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 3px;
        padding: 5px;
    }
    
    .price-back:hover, .price-lay:hover {
        opacity: 0.8;
        transform: scale(1.02);
        transition: all 0.1s;
    }
    
    .runrate {
        color: #009069;
        font-weight: bold;
        margin-left: 10px;
    }
    
    #scoreboard-display {
        font-size: 16px;
    }
    
    #scoreboard-display #team1-name {
        font-weight: bold;
    }
    
    #commentry-text {
        color: #009069;
        font-weight: bold;
    }
    
    #this-over-display {
        font-size: 14px;
        color: #333;
    }
</style>

<script>
    const marketId = '{{ $marketId ?? "1.250636959" }}';
    const eventId = '{{ $eventId ?? "34872738" }}';
    const gmid = '{{ $gmid ?? "" }}';
    const sid = '{{ $sid ?? "4" }}';
    const useCricketIdApi = {{ ($useCricketIdApi ?? false) ? 'true' : 'false' }};
    const timeCode = '';

    const CommentrySignalR = 1;
    const SsocketEnable = 1;
    const CatalogSignalR = 0; //1;
</script>
<script src="/js/unreal_html5_player_script_v2.js?00001"></script>

<div id="MarketView"><div class="text-center mt-10" style="display: none;"><img src="/img/loadinggif.gif" alt="Loading..."></div> <div id="loadedmarkettoshow" class="row" style=""><div class="col-lg-8"><div class="left-content"><div class="table-wrap"><div class="table-box-header"><div class="row no-gutters"><div class="col-md-auto"><div class="box-main-icon"><img src="/img/v2/cricket.svg" alt="Box Icon"></div></div> <div class="col-md"><div class="tb-top-text"><p><img src="/img/v2/clock-green.svg"> <span class="green-upper-text">{{ ($inPlay ?? false) ? 'InPlay' : 'Upcoming' }}</span> <span class="black-light-text" id="matchTimeDisplay">Loading...</span> <span class="black-light-text"> | Winners: 1</span></p> <h4 class="event-title">{{ $eventName ?? 'Match' }}</h4> <p><span class="medium-black" id="elapsedTimeDisplay">Elapsed : --:--:--</span></p><div id="DisplayOnBox" class="form-group form-check pull-right"><input type="checkbox" id="IsDisplayOn" class="form-check-input"> <label for="IsDisplayOn" class="form-check-label">Keep Display On</label></div> <p></p></div></div></div>
<script>
    var marketStartTimeISO = '{{ $marketStartTime ?? '' }}';
    var isInPlay = {{ ($inPlay ?? false) ? 'true' : 'false' }};
    var scoreCardUrl = '{{ $scoreCardUrl ?? "" }}';
</script> <div class="scrollmenu" style="display: none;"><a id="Alltab" class="tablink btn btn-primary">
                                ALL
                            </a> <!----> <a id="BMtab" href="#" onclick="MarketTab('BM')" class="tablink btn btn-primary" style="display: none;">Bookmaker</a> <!----> <a id="Fancy2tab" href="#" onclick="MarketTab('Fancy2')" class="tablink btn btn-primary" style="display: none;">Fancy-2</a> <a id="Figuretab" href="#" onclick="MarketTab('Figure')" class="tablink btn btn-primary" style="display: none;">Figure</a> <a id="OddFiguretab" href="#" onclick="MarketTab('OddFigure')" class="tablink btn btn-primary">Even-Odd</a> <a id="Othertab" href="#" onclick="MarketTab('Other')" class="tablink btn btn-primary">Others</a> </div></div>

<div class="table-box-header" id="scoreboard-header" style="display: none;"><div class="row no-gutters"><div class="col-md"><div class="tb-top-text"><p></p><div id="scoreboard-display"><span id="team1-name">--</span> <span class="medium-black" id="team1-score">0/0 (0)</span> <span class="runrate" id="team1-crr">CRR: 0.00</span></div> <span class="green-upper-text" style="margin-top: -8px;"><div class="row"><div id="commentry-text">
                                                    Ball Running...
                                                </div> <div style="margin-left: 8px; margin-top: -3px;"><input type="checkbox" class="fas fa-volume-mute fa-inverse" style="width: 0px; margin-right: 35px; font-size: 15px;"></div></div></span> <p></p> <p id="this-over-display">This Over : &nbsp; --</p></div></div></div></div> <!----> <!----> <!----> <div id="All" class="tabcontent" style="display: block;"><div id="nav-tabContent" class="tab-content"><div id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab" class="tab-pane fade show active"><div class="table-box-body"><!----> <div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Match Odds </span> <span style="text-transform: initial;">
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
</div></div> <!----> <!----> <div class="tb-content" id="bookmaker-section" style="display: none;"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Bookmaker </span> <span style="text-transform: initial;">
                    (MaxBet: 1M)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners" id="bookmaker-runners">
@php
    $bookmakerMarkets = collect($allMarketIds ?? [])->filter(function($mktId) use ($marketId) {
        return !str_starts_with($mktId, '9.') && $mktId !== $marketId;
    });
    $hasBookmaker = false;
@endphp
@foreach($bookmakerMarkets as $bmMarketId)
    @php
        $bmData = $marketsData[$bmMarketId] ?? [];
        $bmRunners = $bmData['runners'] ?? [];
    @endphp
    @if(count($bmRunners) > 0)
        @php $hasBookmaker = true; @endphp
        @foreach($bmRunners as $bmRunner)
            @php
                $bmRunnerId = $bmRunner['selectionId'] ?? $bmRunner['id'] ?? 0;
                $bmRunnerName = $bmRunner['runnerName'] ?? $bmRunner['name'] ?? 'Runner';
                $bmBackPrices = $bmRunner['ex']['availableToBack'] ?? [];
                $bmLayPrices = $bmRunner['ex']['availableToLay'] ?? [];
                $bmStatus = $bmRunner['status'] ?? 'ACTIVE';
            @endphp
            <div id="runner-{{ $bmRunnerId }}-bm" class="runner-runner" data-market-id="{{ $bmMarketId }}"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        {{ $bmRunnerName }}
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span></span> <span class="ml-1" style="font-weight: normal;"></span></div></h3>
            @if($bmStatus === 'SUSPENDED' || (empty($bmBackPrices) && empty($bmLayPrices)))
                <div><div class="runner-disabled">SUSPENDED</div></div>
            @else
                <a id="B3-{{ $bmRunnerId }}-{{ $bmMarketId }}" role="button" class="price-price price-back"><span class="price-odd">{{ $bmBackPrices[2]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmBackPrices[2]['size']) ? number_format($bmBackPrices[2]['size']) : '' }}</span></a>
                <a id="B2-{{ $bmRunnerId }}-{{ $bmMarketId }}" class="price-price price-back"><span class="price-odd">{{ $bmBackPrices[1]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmBackPrices[1]['size']) ? number_format($bmBackPrices[1]['size']) : '' }}</span></a>
                <a id="B1-{{ $bmRunnerId }}-{{ $bmMarketId }}" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">{{ $bmBackPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmBackPrices[0]['size']) ? number_format($bmBackPrices[0]['size']) : '' }}</span></a>
                <a id="L1-{{ $bmRunnerId }}-{{ $bmMarketId }}" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">{{ $bmLayPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmLayPrices[0]['size']) ? number_format($bmLayPrices[0]['size']) : '' }}</span></a>
                <a class="price-price price-lay"><span class="price-odd">{{ $bmLayPrices[1]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmLayPrices[1]['size']) ? number_format($bmLayPrices[1]['size']) : '' }}</span></a>
                <a class="price-price price-lay mr-4"><span class="price-odd">{{ $bmLayPrices[2]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmLayPrices[2]['size']) ? number_format($bmLayPrices[2]['size']) : '' }}</span></a>
            @endif
            </div>
        @endforeach
    @endif
@endforeach
@if(!$hasBookmaker)
    @foreach($runners as $runner)
        @php
            $runnerId = $runner['selectionId'] ?? $runner['id'] ?? 0;
            $runnerName = $runner['runnerName'] ?? $runner['name'] ?? 'Unknown';
        @endphp
        <div id="runner-{{ $runnerId }}-bm" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">{{ $runnerName }}</h4></span></div></h3> <div><div class="runner-disabled">SUSPENDED</div></div></div>
    @endforeach
@endif
</div></div> <!----> <div id="all-fancy-container"></div> <!----> <div class="tb-content" id="fancy-section" style="display: none;"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Fancy 2 </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div>
@php
    $fancyMarkets = collect($allMarketIds ?? [])->filter(function($mktId) {
        return str_starts_with($mktId, '9.');
    });
@endphp
@forelse($fancyMarkets as $fancyMarketId)
    @php
        $fancyData = $marketsData[$fancyMarketId] ?? [];
        $fancyRunners = $fancyData['runners'] ?? [];
        $fancyName = $fancyData['marketName'] ?? $fancyData['name'] ?? 'Fancy Market';
    @endphp
    <div id="market-{{ $fancyMarketId }}"><div class="market-runners">
    @foreach($fancyRunners as $fancyRunner)
        @php
            $fRunnerId = $fancyRunner['selectionId'] ?? $fancyRunner['id'] ?? 1;
            $fRunnerName = $fancyRunner['runnerName'] ?? $fancyRunner['name'] ?? $fancyName;
            $fBackPrices = $fancyRunner['ex']['availableToBack'] ?? [];
            $fLayPrices = $fancyRunner['ex']['availableToLay'] ?? [];
            $fStatus = $fancyRunner['status'] ?? 'ACTIVE';
        @endphp
        <div id="runner-{{ $fRunnerId }}" class="runner-runner" data-market-id="{{ $fancyMarketId }}"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        {{ $fRunnerName }}
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span></span> <span class="ml-1" style="font-weight: normal;"></span> <span>&nbsp;&nbsp;<a href="#">Book</a></span></div></h3>
        @if($fStatus === 'SUSPENDED' || (empty($fBackPrices) && empty($fLayPrices)))
            <div><div class="runner-disabled">SUSPENDED</div></div>
        @else
            <a class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">{{ $fBackPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($fBackPrices[0]['size']) ? number_format($fBackPrices[0]['size']) : '' }}</span></a>
            <a class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">{{ $fLayPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($fLayPrices[0]['size']) ? number_format($fLayPrices[0]['size']) : '' }}</span></a>
        @endif
        </div>
    @endforeach
    </div></div>
@empty
    <div class="market-runners"><div class="runner-runner"><h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">No fancy markets available</h4></span></div></h3></div></div>
@endforelse
</div>   <!----></div></div></div></div> <!----> <div id="BM" class="tabcontent"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Bookmaker </span> <span style="text-transform: initial;">
                    (MaxBet: 1M)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners" id="bm-tab-runners">
@php
    $bmMarketsTab = collect($allMarketIds ?? [])->filter(function($mktId) use ($marketId) {
        return !str_starts_with($mktId, '9.') && $mktId !== $marketId;
    });
    $hasBmTab = false;
@endphp
@foreach($bmMarketsTab as $bmMktId)
    @php
        $bmTabData = $marketsData[$bmMktId] ?? [];
        $bmTabRunners = $bmTabData['runners'] ?? [];
    @endphp
    @if(count($bmTabRunners) > 0)
        @php $hasBmTab = true; @endphp
        @foreach($bmTabRunners as $bmTabRunner)
            @php
                $bmTabRunnerId = $bmTabRunner['selectionId'] ?? $bmTabRunner['id'] ?? 0;
                $bmTabRunnerName = $bmTabRunner['runnerName'] ?? $bmTabRunner['name'] ?? 'Runner';
                $bmTabBackPrices = $bmTabRunner['ex']['availableToBack'] ?? [];
                $bmTabLayPrices = $bmTabRunner['ex']['availableToLay'] ?? [];
                $bmTabStatus = $bmTabRunner['status'] ?? 'ACTIVE';
            @endphp
            <div id="runner-{{ $bmTabRunnerId }}-bmtab" class="runner-runner" data-market-id="{{ $bmMktId }}"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">{{ $bmTabRunnerName }}</h4></span></div></h3>
            @if($bmTabStatus === 'SUSPENDED' || (empty($bmTabBackPrices) && empty($bmTabLayPrices)))
                <div><div class="runner-disabled">SUSPENDED</div></div>
            @else
                <a class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">{{ $bmTabBackPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmTabBackPrices[0]['size']) ? number_format($bmTabBackPrices[0]['size']) : '' }}</span></a>
                <a class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">{{ $bmTabLayPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($bmTabLayPrices[0]['size']) ? number_format($bmTabLayPrices[0]['size']) : '' }}</span></a>
            @endif
            </div>
        @endforeach
    @endif
@endforeach
@if(!$hasBmTab)
    @foreach($runners as $runner)
        @php
            $rId = $runner['selectionId'] ?? $runner['id'] ?? 0;
            $rName = $runner['runnerName'] ?? $runner['name'] ?? 'Unknown';
        @endphp
        <div class="runner-runner"><h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">{{ $rName }}</h4></span></div></h3> <div><div class="runner-disabled">SUSPENDED</div></div></div>
    @endforeach
@endif
</div></div></div> <!----> <div id="Fancy2" class="tabcontent"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Fancy 2 </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div>
@php
    $fancyMarketsTab = collect($allMarketIds ?? [])->filter(function($mktId) {
        return str_starts_with($mktId, '9.');
    });
@endphp
@forelse($fancyMarketsTab as $fancyTabMarketId)
    @php
        $fancyTabData = $marketsData[$fancyTabMarketId] ?? [];
        $fancyTabRunners = $fancyTabData['runners'] ?? [];
        $fancyTabName = $fancyTabData['marketName'] ?? $fancyTabData['name'] ?? 'Fancy';
    @endphp
    <div id="market-{{ $fancyTabMarketId }}-tab"><div class="market-runners">
    @foreach($fancyTabRunners as $fTabRunner)
        @php
            $fTabRunnerId = $fTabRunner['selectionId'] ?? $fTabRunner['id'] ?? 1;
            $fTabRunnerName = $fTabRunner['runnerName'] ?? $fTabRunner['name'] ?? $fancyTabName;
            $fTabBackPrices = $fTabRunner['ex']['availableToBack'] ?? [];
            $fTabLayPrices = $fTabRunner['ex']['availableToLay'] ?? [];
            $fTabStatus = $fTabRunner['status'] ?? 'ACTIVE';
        @endphp
        <div class="runner-runner" data-market-id="{{ $fancyTabMarketId }}"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">{{ $fTabRunnerName }}</h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span></span> <span>&nbsp;&nbsp;<a href="#">Book</a></span></div></h3>
        @if($fTabStatus === 'SUSPENDED' || (empty($fTabBackPrices) && empty($fTabLayPrices)))
            <div><div class="runner-disabled">SUSPENDED</div></div>
        @else
            <a class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">{{ $fTabBackPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($fTabBackPrices[0]['size']) ? number_format($fTabBackPrices[0]['size']) : '' }}</span></a>
            <a class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">{{ $fTabLayPrices[0]['price'] ?? '-' }}</span> <span class="price-amount">{{ isset($fTabLayPrices[0]['size']) ? number_format($fTabLayPrices[0]['size']) : '' }}</span></a>
        @endif
        </div>
    @endforeach
    </div></div>
@empty
    <div class="market-runners"><div class="runner-runner"><h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">No fancy markets available</h4></span></div></h3></div></div>
@endforelse
</div></div> <!----> <!----> <!----> </div></div></div> <div class="col-lg-4 right-nav"><div class="right-content"><div class="table-wrap"><div class="table-box-body"><div class="btn-group btn-group-xs" id="tv-score-buttons" style="width: 100%; height: 30px; margin-bottom: 2px; display: none;"><button onclick="SHOWTV()" class="btn btn-primary btn-xs" id="btnTV" style="width: 50%; border-right: solid;">Tv</button> <button onclick="SHOWLIVE()" class="btn btn-primary btn-xs" id="btnScore" style="width: 50%;">Score Card</button></div> <div id="TVDIV" class="container" style="height: 213px; display: none;"><iframe id="tvframe" src="https://live.cricketid.xyz/casino-tv?id={{ $eventId ?? '34966369' }}" scrolling="no" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="responsive-iframe" style="height: 213px; width: 100%;"></iframe></div> <div id="LIVEDIV" class="container" style="height: 213px; display: none;"><iframe id="livesc" src="{{ $scoreCardUrl ?? 'https://score.akamaized.uk/?id=' . ($eventId ?? '34966369') }}" scrolling="no" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="responsive-iframe" style="height: 213px;"></iframe></div> <div id="betSlip" class="bets" style="display: none;">
    <strong>Bet Slip <a target="_blank" href="/Customer/Profile" class="button" style="color: white; float: right;">Edit Bet Sizes</a></strong>
    <div class="betting-table">
        <table class="table">
            <thead>
                <tr><th>Bet for</th><th>Odds</th><th>Stake</th><th>Profit</th></tr>
            </thead>
            <tbody>
                <tr id="betSlipRow" class="back">
                    <td id="betRunnerName">-</td>
                    <td width="10%">
                        <div class="quantity">
                            <input type="text" id="bet-price" readonly>
                            <div class="quantity-nav">
                                <div class="quantity-button quantity-up" onclick="adjustOdds(0.01)"><span class="fa fa-caret-up"></span></div>
                                <div class="quantity-button quantity-down" onclick="adjustOdds(-0.01)"><span class="fa fa-caret-down"></span></div>
                            </div>
                        </div>
                    </td>
                    <td width="10%">
                        <div class="stake"><input type="text" id="bet-size" oninput="calculateProfit()"></div>
                    </td>
                    <td id="betProfitDisplay">0 / 0</td>
                </tr>
                <tr id="betSlipRow2" class="back">
                    <td colspan="5">
                        <table class="table">
                            <tbody>
                                <tr class="checknow">
                                    <td><span data-amount="2000" class="points stake-btn" onclick="setStake(2000)">2,000</span></td>
                                    <td><span data-amount="5000" class="points stake-btn" onclick="setStake(5000)">5,000</span></td>
                                    <td><span data-amount="10000" class="points stake-btn" onclick="setStake(10000)">10,000</span></td>
                                    <td><span data-amount="25000" class="points stake-btn" onclick="setStake(25000)">25,000</span></td>
                                </tr>
                                <tr class="checknow">
                                    <td><span class="points stake-btn" onclick="addStake(1000)">+ 1,000</span></td>
                                    <td><span class="points stake-btn" onclick="addStake(5000)">+ 5,000</span></td>
                                    <td><span class="points stake-btn" onclick="addStake(10000)">+ 10,000</span></td>
                                    <td><span class="points stake-btn" onclick="addStake(25000)">+ 25,000</span></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="align-left btn btn-danger" onclick="closeBetSlip()"><b>Close</b></button></td>
                                    <td><button type="button" class="align-left btn btn-warning" onclick="clearBetSlip()"><b>Clear</b></button></td>
                                    <td colspan="1"></td>
                                    <td><div class="btn btn-primary ld-over" style="cursor: pointer;" onclick="submitBet()"><b>Submit</b><div class="ld ld-ball ld-flip"></div></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div> <div id="betSlipMobile" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog modal-md"><div class="modal-content back"><div class="modal-body"><table><tbody><tr><td>&nbsp;</td> <th colspan="3"></th></tr> <tr><td>ODDS</td> <td colspan="2"><div class="input-group mt-2"><div class="input-group-prepend"><button type="button" class="btn btn-outline-secondary"><strong>-</strong></button></div> <input type="number" id="bet-price" step="0.01" min="1.01" max="1000" class="form-control"> <div class="input-group-append"><button type="button" class="btn btn-outline-secondary"><strong>+</strong></button></div></div></td></tr> <tr><td>Amount</td> <td colspan="2"><input type="number" id="bet-size-m" class="form-control mt-2"></td></tr> <tr><td style="width: 25%;"><button type="button" data-amount="2000" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
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
        <img src="/img/reconnecting.gif" alt="dc" class="rounded disconnected" style="display: none;"> <!----> <!----></strong> <div class="betting-table"><table class="table"><thead><tr><th>Runner</th> <th>Price</th> <th>Size</th> <th></th></tr></thead> <tbody></tbody></table></div></div> <div class="bets"><strong>Matched Bets (0)</strong> <div class="betting-table"><table class="table"><thead><tr><th>Runner</th> <th>Price</th> <th>Size</th></tr></thead> <tbody></tbody></table></div></div> <div style="margin-top: 7px;"><strong class="RM_In_Markets" style="display: block; background: rgb(43, 47, 53); color: rgb(255, 255, 255); padding: 10px;">Related Events</strong> <div><table class="table compact" style="margin-bottom: 0px;"><tbody id="related-events-tbody"><tr><td colspan="2" style="text-align: center; padding: 10px;">Loading related matches...</td></tr></tbody></table></div></div></div></div></div></div> <div id="fancyPosition" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 id="exampleModalLabel" class="modal-title"></h5> <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button></div> <div id="fancypos-body" class="modal-body"><table class="table"><tbody><tr><th>Score</th> <th>Position</th></tr> </tbody></table></div> <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button></div></div></div></div> <div id="modalRules" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 id="exampleModalLabel" class="modal-title">Market Rules</h5> <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button></div> <div id="rules-box" class="modal-body"></div></div></div></div></div></div>


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
        /* Flash animation for odds changes - single flash with same color */
        @keyframes flashBack {
            0% { background-color: rgb(80, 180, 220); }
            100% { background-color: rgb(141, 210, 240); }
        }
        @keyframes flashLay {
            0% { background-color: rgb(250, 120, 130); }
            100% { background-color: rgb(254, 175, 178); }
        }
        .flash-back {
            animation: flashBack 0.3s ease-out;
        }
        .flash-lay {
            animation: flashLay 0.3s ease-out;
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
            let apiUrl;
            if (useCricketIdApi && gmid) {
                apiUrl = '/api/cricketid/odds/' + gmid + '?sid=' + sid;
            } else {
                const currentMarketId = marketId;
                if (!currentMarketId) return;
                apiUrl = '/api/all-prices/' + currentMarketId;
            }
            
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.error || !data.success) {
                        console.log('Odds update error:', data.error || 'No data');
                        return;
                    }
                    
                    // marketBooks array: [0]=Match Odds, [1]=Bookmaker, [2]=Fancy/Fancy-2
                    const matchOdds = data.matchOdds;
                    const bookmaker = data.bookmaker;
                    const fancy = data.fancy;
                    
                    // IMPORTANT: Default to false, only true if explicitly set
                    const isInPlayFromApi = useCricketIdApi ? (data.inPlay === true) : (matchOdds?.inPlay === true);
                    
                    // Handle in-play visibility (tabs and scorecard)
                    handleInPlayVisibility(isInPlayFromApi);
                    
                    // Update Match Odds section (marketBooks[0]) - always update prices
                    if (matchOdds && matchOdds.runners && matchOdds.runners.length > 0) {
                        // Get the match odds runners container
                        const matchOddsContainer = document.querySelector('#All .market-runners:first-of-type');
                        const matchOddsRunnerDivs = matchOddsContainer ? matchOddsContainer.querySelectorAll('.runner-runner') : [];
                        
                        matchOdds.runners.forEach((runner, index) => {
                            // Try ID-based matching first
                            let runnerDiv = document.getElementById('runner-' + runner.selectionId);
                            
                            if (runnerDiv) {
                                // Found by ID - use original updateRunnerPrices function
                                updateRunnerPrices(runner, 'match-odds');
                            } else if (matchOddsRunnerDivs[index]) {
                                // Fallback to index matching when ID not found
                                updateRunnerPricesDirect(matchOddsRunnerDivs[index], runner, 'match-odds-' + index);
                            } else if (matchOddsContainer) {
                                // Create runner element dynamically if it doesn't exist
                                const newRunnerDiv = createMatchOddsRunnerElement(runner);
                                matchOddsContainer.appendChild(newRunnerDiv);
                                updateRunnerPricesDirect(newRunnerDiv, runner, 'match-odds-' + index);
                            }
                        });
                    }
                    
                    // Handle Bookmaker section visibility - show if data exists (even when suspended or not in play)
                    const bookmakerSection = document.getElementById('bookmaker-section');
                    const bmTab = document.getElementById('BMtab');
                    if (bookmaker && bookmaker.runners && bookmaker.runners.length > 0) {
                        if (bookmakerSection) bookmakerSection.style.display = '';
                        if (bmTab) bmTab.style.display = '';
                        
                        // Dynamically create or update bookmaker runners
                        const bookmakerRunnersContainer = document.getElementById('bookmaker-runners');
                        
                        // Clear placeholder/suspended rows from initial page load (only once)
                        if (bookmakerRunnersContainer && !bookmakerRunnersContainer.dataset.initialized) {
                            bookmakerRunnersContainer.innerHTML = '';
                            bookmakerRunnersContainer.dataset.initialized = 'true';
                        }
                        
                        bookmaker.runners.forEach(runner => {
                            let runnerDiv = document.getElementById('runner-' + runner.selectionId + '-bm');
                            
                            if (!runnerDiv && bookmakerRunnersContainer) {
                                // Create runner element dynamically
                                runnerDiv = createBookmakerRunnerElement(runner, bookmaker.marketId);
                                bookmakerRunnersContainer.appendChild(runnerDiv);
                            }
                            
                            updateRunnerPrices(runner, 'bookmaker', bookmaker.marketId);
                            updateRunnerName(runner.selectionId, runner.name, 'bm');
                        });
                    } else {
                        if (bookmakerSection) bookmakerSection.style.display = 'none';
                        if (bmTab) bmTab.style.display = 'none';
                    }
                    
                    // Handle All Fancy sections - show each market type with its name as heading
                    const allFancy = data.allFancy || [];
                    const fancyContainer = document.getElementById('all-fancy-container');
                    const fancy2Tab = document.getElementById('Fancy2tab');
                    
                    if (allFancy.length > 0 && fancyContainer) {
                        if (fancy2Tab) fancy2Tab.style.display = '';
                        updateAllFancySections(allFancy, fancyContainer);
                    } else {
                        // Fallback to single fancy if allFancy not available
                        const fancySection = document.getElementById('fancy-section');
                        if (fancy && fancy.runners && fancy.runners.length > 0) {
                            if (fancySection) fancySection.style.display = '';
                            if (fancy2Tab) fancy2Tab.style.display = '';
                            updateFancySection(fancy);
                        } else {
                            if (fancySection) fancySection.style.display = 'none';
                            if (fancy2Tab) fancy2Tab.style.display = 'none';
                        }
                    }
                })
                .catch(error => console.log('Odds fetch error:', error));
        }
        
        function handleInPlayVisibility(isInPlay) {
            // Elements to show/hide based on inPlay status
            const scrollMenu = document.querySelector('.scrollmenu');
            const scoreboardHeader = document.getElementById('scoreboard-header');
            const tvScoreButtons = document.getElementById('tv-score-buttons');
            const tvDiv = document.getElementById('TVDIV');
            const liveDiv = document.getElementById('LIVEDIV');
            
            if (isInPlay === true) {
                // Show tabs and scorecard when in play
                if (scrollMenu) scrollMenu.style.display = '';
                if (scoreboardHeader) scoreboardHeader.style.display = '';
                if (tvScoreButtons) tvScoreButtons.style.display = '';
                if (liveDiv) liveDiv.style.display = '';
            } else {
                // Hide tabs and scorecard when not in play
                if (scrollMenu) scrollMenu.style.display = 'none';
                if (scoreboardHeader) scoreboardHeader.style.display = 'none';
                if (tvScoreButtons) tvScoreButtons.style.display = 'none';
                if (tvDiv) tvDiv.style.display = 'none';
                if (liveDiv) liveDiv.style.display = 'none';
            }
        }
        
        function createMatchOddsRunnerElement(runner) {
            const div = document.createElement('div');
            div.id = 'runner-' + runner.selectionId;
            div.className = 'runner-runner';
            
            const status = runner.status;
            const isSuspended = status === 'SUSPENDED' || !runner.price1;
            
            div.innerHTML = `
                <span class="selector ml-2" style="display: none;"></span>
                <img src="" class="ml-2">
                <h3 class="runner-name">
                    <div class="runner-info">
                        <span class="clippable runner-display-name">
                            <h4 class="clippable-spacer">${runner.name || 'Runner'}</h4>
                        </span>
                    </div>
                    <div class="runner-position">
                        <span><span class="position-minus"><strong></strong></span></span>
                        <span class="ml-1" style="font-weight: normal;"></span>
                    </div>
                </h3>
                ${isSuspended ? '<div><div class="runner-disabled">SUSPENDED</div></div>' : `
                    <a id="B3-${runner.selectionId}" role="button" class="price-price price-back"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a id="B2-${runner.selectionId}" class="price-price price-back"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a id="B1-${runner.selectionId}" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a id="L1-${runner.selectionId}" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a class="price-price price-lay"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a class="price-price price-lay mr-4"><span class="price-odd">-</span><span class="price-amount"></span></a>
                `}
            `;
            
            return div;
        }
        
        function createBookmakerRunnerElement(runner, marketId) {
            const div = document.createElement('div');
            div.id = 'runner-' + runner.selectionId + '-bm';
            div.className = 'runner-runner';
            div.setAttribute('data-market-id', marketId);
            
            const status = runner.status;
            const isSuspended = status === 'SUSPENDED' || !runner.price1;
            
            div.innerHTML = `
                <span class="selector ml-2" style="display: none;"></span>
                <img class="ml-2" style="display: none;">
                <h3 class="runner-name">
                    <div class="runner-info">
                        <span class="clippable runner-display-name">
                            <h4 class="clippable-spacer">${runner.name || 'Runner'}</h4>
                        </span>
                    </div>
                    <div class="runner-position">
                        <span><span class="position-minus"><strong></strong></span></span>
                        <span class="ml-1" style="font-weight: normal;"></span>
                    </div>
                </h3>
                ${isSuspended ? '<div><div class="runner-disabled">SUSPENDED</div></div>' : `
                    <a id="B3-${runner.selectionId}-${marketId}" role="button" class="price-price price-back"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a id="B2-${runner.selectionId}-${marketId}" class="price-price price-back"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a id="B1-${runner.selectionId}-${marketId}" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a id="L1-${runner.selectionId}-${marketId}" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a class="price-price price-lay"><span class="price-odd">-</span><span class="price-amount"></span></a>
                    <a class="price-price price-lay mr-4"><span class="price-odd">-</span><span class="price-amount"></span></a>
                `}
            `;
            
            return div;
        }
        
        function updateRunnerName(selectionId, name, suffix) {
            if (!name) return;
            const runnerDiv = document.getElementById('runner-' + selectionId + '-' + suffix);
            if (runnerDiv) {
                const nameEl = runnerDiv.querySelector('.clippable-spacer');
                if (nameEl && nameEl.textContent.trim() !== name) {
                    nameEl.textContent = name;
                }
            }
        }
        
        function updateRunnerPricesDirect(runnerDiv, runner, key) {
            if (!runnerDiv) return;
            
            const runnerName = runner.name;
            const status = runner.status;
            
            // Update runner name
            if (runnerName) {
                const nameEl = runnerDiv.querySelector('.clippable-spacer');
                if (nameEl && nameEl.textContent.trim() !== runnerName) {
                    nameEl.textContent = runnerName;
                }
            }
            
            const disabledDiv = runnerDiv.querySelector('.runner-disabled');
            const priceButtons = runnerDiv.querySelectorAll('.price-price');
            
            if (status === 'SUSPENDED' || !runner.price1) {
                // Show SUSPENDED
                if (!disabledDiv && priceButtons.length > 0) {
                    priceButtons.forEach(btn => btn.style.display = 'none');
                    if (!runnerDiv.querySelector('.runner-disabled')) {
                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = '<div class="runner-disabled">SUSPENDED</div>';
                        runnerDiv.appendChild(wrapper.firstChild);
                    }
                }
            } else {
                // Remove SUSPENDED and show prices
                if (disabledDiv) {
                    disabledDiv.parentElement?.remove() || disabledDiv.remove();
                }
                priceButtons.forEach(btn => btn.style.display = '');
                
                // Update back prices (price1, price2, price3)
                // HTML order: B3 (index 0), B2 (index 1), B1 (index 2)
                const backBtns = runnerDiv.querySelectorAll('.price-back');
                const layBtns = runnerDiv.querySelectorAll('.price-lay');
                
                if (backBtns.length >= 3) {
                    if (runner.price3) updatePriceWithFlash(backBtns[0], runner.price3, runner.size3, true, 'B3-' + key);
                    if (runner.price2) updatePriceWithFlash(backBtns[1], runner.price2, runner.size2, true, 'B2-' + key);
                    if (runner.price1) updatePriceWithFlash(backBtns[2], runner.price1, runner.size1, true, 'B1-' + key);
                } else if (backBtns.length >= 1) {
                    if (runner.price1) updatePriceWithFlash(backBtns[backBtns.length - 1], runner.price1, runner.size1, true, 'B1-' + key);
                }
                
                if (layBtns.length >= 1 && runner.lay1) updatePriceWithFlash(layBtns[0], runner.lay1, runner.ls1, false, 'L1-' + key);
                if (layBtns.length >= 2 && runner.lay2) updatePriceWithFlash(layBtns[1], runner.lay2, runner.ls2, false, 'L2-' + key);
                if (layBtns.length >= 3 && runner.lay3) updatePriceWithFlash(layBtns[2], runner.lay3, runner.ls3, false, 'L3-' + key);
            }
        }
        
        function updateRunnerPrices(runner, section, marketId) {
            const selectionId = runner.selectionId;
            const status = runner.status;
            const runnerName = runner.name;
            
            // Find runner divs
            let runnerDivs = [];
            if (section === 'match-odds') {
                const div = document.getElementById('runner-' + selectionId);
                if (div) runnerDivs.push(div);
            } else if (section === 'bookmaker') {
                const div = document.getElementById('runner-' + selectionId + '-bm');
                if (div) runnerDivs.push(div);
                const divTab = document.getElementById('runner-' + selectionId + '-bmtab');
                if (divTab) runnerDivs.push(divTab);
            }
            
            runnerDivs.forEach(runnerDiv => {
                if (!runnerDiv) return;
                
                // Update runner name
                if (runnerName) {
                    const nameEl = runnerDiv.querySelector('.clippable-spacer');
                    if (nameEl && nameEl.textContent.trim() !== runnerName) {
                        nameEl.textContent = runnerName;
                    }
                }
                
                const disabledDiv = runnerDiv.querySelector('.runner-disabled');
                const priceButtons = runnerDiv.querySelectorAll('.price-price');
                
                if (status === 'SUSPENDED' || !runner.price1) {
                    // Show SUSPENDED
                    if (!disabledDiv && priceButtons.length > 0) {
                        priceButtons.forEach(btn => btn.style.display = 'none');
                        if (!runnerDiv.querySelector('.runner-disabled')) {
                            const wrapper = document.createElement('div');
                            wrapper.innerHTML = '<div class="runner-disabled">SUSPENDED</div>';
                            runnerDiv.appendChild(wrapper.firstChild);
                        }
                    }
                } else {
                    // Remove SUSPENDED and show prices
                    if (disabledDiv) {
                        disabledDiv.parentElement?.remove() || disabledDiv.remove();
                    }
                    priceButtons.forEach(btn => btn.style.display = '');
                    
                    // Update back prices (price1, price2, price3)
                    const b1 = runnerDiv.querySelector('[id^="B1-"]');
                    const b2 = runnerDiv.querySelector('[id^="B2-"]');
                    const b3 = runnerDiv.querySelector('[id^="B3-"]');
                    
                    if (b1 && runner.price1) updatePriceWithFlash(b1, runner.price1, runner.size1, true, 'B1-' + selectionId);
                    if (b2 && runner.price2) updatePriceWithFlash(b2, runner.price2, runner.size2, true, 'B2-' + selectionId);
                    if (b3 && runner.price3) updatePriceWithFlash(b3, runner.price3, runner.size3, true, 'B3-' + selectionId);
                    
                    // Update lay prices (lay1, lay2, lay3)
                    const l1 = runnerDiv.querySelector('[id^="L1-"]');
                    if (l1 && runner.lay1) updatePriceWithFlash(l1, runner.lay1, runner.ls1, false, 'L1-' + selectionId);
                    
                    const layButtons = runnerDiv.querySelectorAll('.price-lay:not([id])');
                    if (runner.lay2 && layButtons[0]) updatePriceWithFlash(layButtons[0], runner.lay2, runner.ls2, false, 'L2-' + selectionId);
                    if (runner.lay3 && layButtons[1]) updatePriceWithFlash(layButtons[1], runner.lay3, runner.ls3, false, 'L3-' + selectionId);
                }
            });
        }
        
        function updateFancySection(fancy) {
            const fancySection = document.getElementById('fancy-section');
            if (!fancySection) return;
            
            let fancyRunnersContainer = fancySection.querySelector('.market-runners');
            if (!fancyRunnersContainer) {
                fancyRunnersContainer = document.createElement('div');
                fancyRunnersContainer.className = 'market-runners';
                fancySection.appendChild(fancyRunnersContainer);
            }
            
            const existingNoData = fancyRunnersContainer.querySelector('.runner-runner h4.clippable-spacer');
            if (existingNoData && existingNoData.textContent.includes('No fancy markets')) {
                fancyRunnersContainer.innerHTML = '';
            }
            
            const runners = fancy.runners || [];
            
            runners.forEach((runner, index) => {
                const runnerId = runner.selectionId || index;
                let runnerDiv = fancyRunnersContainer.querySelector('#fancy-runner-' + runnerId);
                
                if (!runnerDiv) {
                    runnerDiv = document.createElement('div');
                    runnerDiv.id = 'fancy-runner-' + runnerId;
                    runnerDiv.className = 'runner-runner';
                    runnerDiv.innerHTML = `<span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">${runner.name || 'Fancy'}</h4></span></div></h3> <a class="price-price price-back" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a> <a class="price-price price-back" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a> <a class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">-</span> <span class="price-amount"></span></a> <a class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">-</span> <span class="price-amount"></span></a> <a class="price-price price-lay" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a> <a class="price-price price-lay mr-4" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a>`;
                    fancyRunnersContainer.appendChild(runnerDiv);
                }
                
                const nameEl = runnerDiv.querySelector('.clippable-spacer');
                if (nameEl && runner.name) {
                    nameEl.textContent = runner.name;
                }
                
                const status = runner.status;
                let disabledDiv = runnerDiv.querySelector('.runner-disabled');
                const priceButtons = runnerDiv.querySelectorAll('.price-price');
                
                if (status === 'SUSPENDED' || status === 'Ball Running' || (!runner.price1 && !runner.lay1)) {
                    priceButtons.forEach(btn => btn.style.display = 'none');
                    if (!disabledDiv) {
                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = '<div><div class="runner-disabled">' + (status || 'SUSPENDED') + '</div></div>';
                        runnerDiv.appendChild(wrapper.firstChild);
                    } else {
                        disabledDiv.textContent = status || 'SUSPENDED';
                    }
                } else {
                    if (disabledDiv) {
                        disabledDiv.parentElement?.remove() || disabledDiv.remove();
                    }
                    priceButtons.forEach(btn => btn.style.display = '');
                    
                    // Get the visible back button (3rd .price-back with mb-show class)
                    const backBtn = runnerDiv.querySelector('.price-back.mb-show');
                    // Get the visible lay button (1st .price-lay with mb-show class)
                    const layBtn = runnerDiv.querySelector('.price-lay.mb-show');
                    
                    if (backBtn) {
                        updatePriceWithFlash(backBtn, runner.price1, runner.size1, true, 'fancy-back-' + runnerId);
                    }
                    if (layBtn) {
                        updatePriceWithFlash(layBtn, runner.lay1, runner.ls1, false, 'fancy-lay-' + runnerId);
                    }
                }
            });
        }
        
        function updateAllFancySections(allFancy, container) {
            // Clear container on first initialization
            if (!container.dataset.initialized) {
                container.innerHTML = '';
                container.dataset.initialized = 'true';
            }
            
            allFancy.forEach((market, marketIndex) => {
                const marketId = market.marketId || 'fancy-' + marketIndex;
                // Map market names to display names
                let marketName = market.marketName || 'Fancy';
                if (marketName === 'Normal' || marketName === 'normal') {
                    marketName = 'Fancy 2';
                } else if (marketName === 'fancy1' || marketName === 'Fancy1') {
                    marketName = 'Fancy 1';
                }
                const runners = market.runners || [];
                
                if (runners.length === 0) return;
                
                // Check if section exists, create if not
                let section = document.getElementById('fancy-section-' + marketId);
                if (!section) {
                    section = document.createElement('div');
                    section.id = 'fancy-section-' + marketId;
                    section.className = 'tb-content';
                    section.innerHTML = `
                        <div class="market-titlebar">
                            <p class="market-name">
                                <span class="market-name-badge">
                                    <i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i>
                                    <span>${marketName} </span>
                                    <span style="text-transform: initial;">(MaxBet: 20K)</span>
                                </span>
                                <span class="rules-badge"><i class="fa fa-info-circle"></i></span>
                            </p>
                            <div class="market-overarround"><span></span><strong>Back</strong></div>
                            <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div>
                        </div>
                        <div class="market-runners" id="fancy-runners-${marketId}"></div>
                    `;
                    container.appendChild(section);
                }
                
                const runnersContainer = document.getElementById('fancy-runners-' + marketId);
                if (!runnersContainer) return;
                
                runners.forEach((runner, runnerIndex) => {
                    const runnerId = runner.selectionId || (marketId + '-' + runnerIndex);
                    let runnerDiv = document.getElementById('fancy-runner-' + marketId + '-' + runnerId);
                    
                    if (!runnerDiv) {
                        runnerDiv = document.createElement('div');
                        runnerDiv.id = 'fancy-runner-' + marketId + '-' + runnerId;
                        runnerDiv.className = 'runner-runner';
                        runnerDiv.innerHTML = `<span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 class="clippable-spacer">${runner.name || 'Fancy'}</h4></span></div></h3> <a class="price-price price-back" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a> <a class="price-price price-back" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a> <a class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="price-odd">-</span> <span class="price-amount"></span></a> <a class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="price-odd">-</span> <span class="price-amount"></span></a> <a class="price-price price-lay" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a> <a class="price-price price-lay mr-4" style="visibility: hidden;"><span class="price-odd">-</span><span class="price-amount"></span></a>`;
                        runnersContainer.appendChild(runnerDiv);
                    }
                    
                    const nameEl = runnerDiv.querySelector('.clippable-spacer');
                    if (nameEl && runner.name) {
                        nameEl.textContent = runner.name;
                    }
                    
                    const status = runner.status;
                    let disabledDiv = runnerDiv.querySelector('.runner-disabled');
                    const priceButtons = runnerDiv.querySelectorAll('.price-price');
                    
                    if (status === 'SUSPENDED' || status === 'Ball Running' || (!runner.price1 && !runner.lay1)) {
                        priceButtons.forEach(btn => btn.style.display = 'none');
                        if (!disabledDiv) {
                            const wrapper = document.createElement('div');
                            wrapper.innerHTML = '<div><div class="runner-disabled">' + (status || 'SUSPENDED') + '</div></div>';
                            runnerDiv.appendChild(wrapper.firstChild);
                        } else {
                            disabledDiv.textContent = status || 'SUSPENDED';
                        }
                    } else {
                        if (disabledDiv) {
                            disabledDiv.parentElement?.remove() || disabledDiv.remove();
                        }
                        priceButtons.forEach(btn => btn.style.display = '');
                        
                        const backBtn = runnerDiv.querySelector('.price-back.mb-show');
                        const layBtn = runnerDiv.querySelector('.price-lay.mb-show');
                        
                        if (backBtn) {
                            updatePriceWithFlash(backBtn, runner.price1, runner.size1, true, 'allfancy-back-' + marketId + '-' + runnerId);
                        }
                        if (layBtn) {
                            updatePriceWithFlash(layBtn, runner.lay1, runner.ls1, false, 'allfancy-lay-' + marketId + '-' + runnerId);
                        }
                    }
                });
            });
        }
        
        function updateFancyMarket(marketId, runner) {
            const marketDiv = document.querySelector('#market-' + marketId);
            if (!marketDiv) return;
            
            const runnerDiv = marketDiv.querySelector('.runner-runner');
            if (!runnerDiv) return;
            
            const status = runner.status;
            const disabledDiv = runnerDiv.querySelector('.runner-disabled');
            
            if (status === 'SUSPENDED' || (!runner.price1 && !runner.lay1)) {
                // Show SUSPENDED
                if (!disabledDiv) {
                    const priceButtons = runnerDiv.querySelectorAll('.price-price');
                    priceButtons.forEach(btn => btn.style.display = 'none');
                    const suspendedHtml = '<div><div class="runner-disabled">SUSPENDED</div></div>';
                    const wrapper = document.createElement('div');
                    wrapper.innerHTML = suspendedHtml;
                    runnerDiv.appendChild(wrapper.firstChild);
                }
            } else {
                // Remove SUSPENDED and show/create prices
                if (disabledDiv) {
                    disabledDiv.parentElement?.remove();
                }
                
                // Find or create price buttons
                let priceButtons = runnerDiv.querySelectorAll('.price-price');
                if (priceButtons.length === 0) {
                    // Create price buttons for fancy markets
                    const runnerName = runnerDiv.querySelector('.runner-name');
                    if (runnerName) {
                        const priceHtml = `
                            <a class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);">
                                <span class="price-odd">${runner.price1 || '-'}</span>
                                <span class="price-amount">${formatAmount(runner.size1)}</span>
                            </a>
                            <a class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);">
                                <span class="price-odd">${runner.lay1 || '-'}</span>
                                <span class="price-amount">${formatAmount(runner.ls1)}</span>
                            </a>
                        `;
                        runnerName.insertAdjacentHTML('afterend', priceHtml);
                    }
                } else {
                    priceButtons.forEach(btn => btn.style.display = '');
                    // Update existing buttons
                    const backBtn = runnerDiv.querySelector('.price-back');
                    const layBtn = runnerDiv.querySelector('.price-lay');
                    
                    if (backBtn) {
                        updatePriceWithFlash(backBtn, runner.price1, runner.size1, true, 'fancy-back-' + marketId);
                    }
                    if (layBtn) {
                        updatePriceWithFlash(layBtn, runner.lay1, runner.ls1, false, 'fancy-lay-' + marketId);
                    }
                }
            }
        }
        
        function updateScoreboard(scoreboard) {
            // Update team1 info
            const team1Name = document.getElementById('team1-name');
            const team1Score = document.getElementById('team1-score');
            const team1Crr = document.getElementById('team1-crr');
            const commentryText = document.getElementById('commentry-text');
            const thisOverDisplay = document.getElementById('this-over-display');
            
            if (team1Name && scoreboard.team1) {
                team1Name.textContent = scoreboard.team1;
            }
            
            if (team1Score) {
                const runs = scoreboard.t1_runs || '0';
                const wickets = scoreboard.t1_wickets || '0';
                const overs = scoreboard.t1_overs || '0';
                team1Score.textContent = `${runs}/${wickets} (${overs})`;
            }
            
            if (team1Crr && scoreboard.t1_crr) {
                team1Crr.textContent = `CRR: ${scoreboard.t1_crr}`;
            }
            
            if (commentryText && scoreboard.commentry) {
                const commentary = scoreboard.commentry;
                if (commentary === 'Over' || commentary === 'Ball') {
                    commentryText.textContent = commentary === 'Over' ? 'Over Complete!' : 'Ball Chaloo!!';
                } else {
                    commentryText.textContent = commentary;
                }
            }
            
            if (thisOverDisplay && scoreboard.recent_string) {
                // Parse recent_string: "4   4   4   1   4   1   -   This Over : 18"
                const recentStr = scoreboard.recent_string;
                if (recentStr.includes('This Over')) {
                    thisOverDisplay.textContent = recentStr.split('-').pop().trim().replace('This Over :', 'This Over :');
                } else {
                    thisOverDisplay.textContent = `${scoreboard.lastOverLabel || 'This Over'} : ${recentStr}`;
                }
            }
        }
        
        // Start polling every 800ms
        setInterval(updateMatchOdds, 800);
        
        // Initial update
        updateMatchOdds();
        
        // Match time and elapsed time functions
        function formatMatchTime(isoString) {
            if (!isoString) return '';
            
            const matchDate = new Date(isoString);
            const now = new Date();
            const diffMs = now - matchDate;
            const diffMins = Math.floor(diffMs / 60000);
            const diffHours = Math.floor(diffMins / 60);
            const diffDays = Math.floor(diffHours / 24);
            
            let timeAgo = '';
            if (diffMs < 0) {
                // Future match
                const futureMins = Math.abs(diffMins);
                const futureHours = Math.floor(futureMins / 60);
                if (futureHours >= 24) {
                    timeAgo = 'in ' + Math.floor(futureHours / 24) + ' day(s)';
                } else if (futureHours > 0) {
                    timeAgo = 'in ' + futureHours + ' hour(s)';
                } else {
                    timeAgo = 'in ' + futureMins + ' min(s)';
                }
            } else {
                if (diffDays > 0) {
                    timeAgo = diffDays + ' day(s) ago';
                } else if (diffHours > 0) {
                    timeAgo = diffHours + ' hour(s) ago';
                } else if (diffMins > 0) {
                    timeAgo = diffMins + ' min(s) ago';
                } else {
                    timeAgo = 'just now';
                }
            }
            
            // Format date: "Nov 22 8:30 am"
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const month = months[matchDate.getMonth()];
            const day = matchDate.getDate();
            let hours = matchDate.getHours();
            const mins = matchDate.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12 || 12;
            
            return timeAgo + ' | ' + month + ' ' + day + ' ' + hours + ':' + mins + ' ' + ampm;
        }
        
        function formatElapsedTime(isoString) {
            if (!isoString) return 'Elapsed : --:--:--';
            
            const matchDate = new Date(isoString);
            const now = new Date();
            const diffMs = now - matchDate;
            
            if (diffMs < 0) {
                // Match hasn't started yet
                return 'Starts in : ' + formatCountdown(-diffMs);
            }
            
            // Calculate elapsed time
            const totalSeconds = Math.floor(diffMs / 1000);
            const hours = Math.floor(totalSeconds / 3600);
            const mins = Math.floor((totalSeconds % 3600) / 60);
            const secs = totalSeconds % 60;
            
            return 'Elapsed : ' + 
                hours.toString().padStart(2, '0') + ':' + 
                mins.toString().padStart(2, '0') + ':' + 
                secs.toString().padStart(2, '0');
        }
        
        function formatCountdown(ms) {
            const totalSeconds = Math.floor(ms / 1000);
            const hours = Math.floor(totalSeconds / 3600);
            const mins = Math.floor((totalSeconds % 3600) / 60);
            const secs = totalSeconds % 60;
            
            return hours.toString().padStart(2, '0') + ':' + 
                mins.toString().padStart(2, '0') + ':' + 
                secs.toString().padStart(2, '0');
        }
        
        function updateTimeDisplays() {
            if (marketStartTimeISO) {
                const matchTimeEl = document.getElementById('matchTimeDisplay');
                const elapsedEl = document.getElementById('elapsedTimeDisplay');
                
                if (matchTimeEl) {
                    matchTimeEl.textContent = formatMatchTime(marketStartTimeISO);
                }
                if (elapsedEl) {
                    elapsedEl.textContent = formatElapsedTime(marketStartTimeISO);
                }
            }
        }
        
        // Update time displays every second
        setInterval(updateTimeDisplays, 1000);
        
        // Initial time update
        updateTimeDisplays();
        
        // Fetch match details from MySQL every 10 seconds
        function fetchMatchDetailsFromDb() {
            if (!gmid) return;
            
            fetch('/api/match-details/' + gmid)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.match) {
                        const match = data.match;
                        
                        // Update match name
                        const eventTitle = document.querySelector('.event-title');
                        if (eventTitle && match.matchName) {
                            eventTitle.textContent = match.matchName;
                        }
                        
                        // Update inPlay/Upcoming status
                        const statusSpan = document.querySelector('.green-upper-text');
                        if (statusSpan) {
                            statusSpan.textContent = match.isInplay ? 'InPlay' : 'Upcoming';
                        }
                        
                        // Update scheduled time from MySQL
                        if (match.scheduledTime) {
                            marketStartTimeISO = new Date(match.scheduledTime).toISOString();
                            updateTimeDisplays();
                        }
                        
                        // Update isInPlay variable
                        isInPlay = match.isInplay;
                    }
                    
                    // Update related matches
                    if (data.relatedMatches && data.relatedMatches.length > 0) {
                        updateRelatedMatches(data.relatedMatches);
                    } else {
                        const tbody = document.getElementById('related-events-tbody');
                        if (tbody) {
                            tbody.innerHTML = '<tr><td colspan="2" style="text-align: center; padding: 10px;">No other matches today</td></tr>';
                        }
                    }
                })
                .catch(error => console.log('Match details fetch error:', error));
        }
        
        function updateRelatedMatches(matches) {
            const tbody = document.getElementById('related-events-tbody');
            if (!tbody) return;
            
            let html = '';
            matches.forEach(match => {
                html += `<tr onclick="window.location='/cricket/${match.gmid}';" class="relatedtr" style="cursor: pointer;">
                    <td class="sport-date" style="font-size: 14px; padding: 0px 20px;">
                        <div><span class="day">Today</span> <span class="market-time">${match.scheduledTime || '--:--'}</span></div>
                    </td>
                    <td><div>${match.matchName}</div></td>
                </tr>`;
            });
            
            tbody.innerHTML = html;
        }
        
        // Initial fetch
        fetchMatchDetailsFromDb();
        
        // Poll every 10 seconds
        setInterval(fetchMatchDetailsFromDb, 10000);
        
        // TV and Score Card toggle functions
        function SHOWTV() {
            document.getElementById('TVDIV').style.display = 'block';
            document.getElementById('LIVEDIV').style.display = 'none';
            document.getElementById('btnTV').classList.add('active');
            document.getElementById('btnScore').classList.remove('active');
        }
        
        function SHOWLIVE() {
            document.getElementById('TVDIV').style.display = 'none';
            document.getElementById('LIVEDIV').style.display = 'block';
            document.getElementById('btnTV').classList.remove('active');
            document.getElementById('btnScore').classList.add('active');
        }
        
        // Bet Slip Variables
        var currentBetType = 'back'; // 'back' or 'lay'
        var currentRunnerId = null;
        var currentRunnerName = '';
        var currentOdds = 0;
        
        // Open bet slip when clicking on odds
        function openBetSlip(runnerName, runnerId, odds, betType) {
            currentRunnerName = runnerName;
            currentRunnerId = runnerId;
            currentOdds = parseFloat(odds);
            currentBetType = betType;
            
            // Update bet slip display
            document.getElementById('betRunnerName').textContent = runnerName;
            document.getElementById('bet-price').value = odds;
            document.getElementById('bet-size').value = '';
            document.getElementById('betProfitDisplay').textContent = '0 / 0';
            
            // Set row color based on bet type
            var betRow = document.getElementById('betSlipRow');
            var betRow2 = document.getElementById('betSlipRow2');
            if (betType === 'back') {
                betRow.className = 'back';
                betRow2.className = 'back';
            } else {
                betRow.className = 'lay';
                betRow2.className = 'lay';
            }
            
            // Show bet slip
            document.getElementById('betSlip').style.display = 'block';
            
            // Focus on stake input
            document.getElementById('bet-size').focus();
        }
        
        // Close bet slip
        function closeBetSlip() {
            document.getElementById('betSlip').style.display = 'none';
            currentRunnerId = null;
            currentRunnerName = '';
            currentOdds = 0;
        }
        
        // Clear bet slip
        function clearBetSlip() {
            document.getElementById('bet-size').value = '';
            document.getElementById('betProfitDisplay').textContent = '0 / 0';
        }
        
        // Set stake amount
        function setStake(amount) {
            document.getElementById('bet-size').value = amount;
            calculateProfit();
        }
        
        // Add to stake amount
        function addStake(amount) {
            var currentStake = parseInt(document.getElementById('bet-size').value) || 0;
            document.getElementById('bet-size').value = currentStake + amount;
            calculateProfit();
        }
        
        // Adjust odds
        function adjustOdds(delta) {
            var priceInput = document.getElementById('bet-price');
            var newOdds = (parseFloat(priceInput.value) || 1) + delta;
            if (newOdds >= 1.01) {
                priceInput.value = newOdds.toFixed(2);
                currentOdds = newOdds;
                calculateProfit();
            }
        }
        
        // Calculate profit/liability
        function calculateProfit() {
            var stake = parseFloat(document.getElementById('bet-size').value) || 0;
            var odds = parseFloat(document.getElementById('bet-price').value) || 0;
            
            var profit = 0;
            var liability = 0;
            
            if (currentBetType === 'back') {
                profit = stake * (odds - 1);
                liability = stake;
            } else {
                profit = stake;
                liability = stake * (odds - 1);
            }
            
            document.getElementById('betProfitDisplay').textContent = 
                profit.toLocaleString('en-IN', {maximumFractionDigits: 0}) + ' / -' + 
                liability.toLocaleString('en-IN', {maximumFractionDigits: 0});
        }
        
        // Submit bet
        function submitBet() {
            var stake = parseFloat(document.getElementById('bet-size').value) || 0;
            var odds = parseFloat(document.getElementById('bet-price').value) || 0;
            
            if (stake <= 0) {
                alert('Please enter a valid stake amount');
                return;
            }
            
            if (odds < 1.01) {
                alert('Invalid odds');
                return;
            }
            
            var submitBtn = document.querySelector('#betSlip .btn-primary');
            submitBtn.classList.add('running');
            submitBtn.style.pointerEvents = 'none';
            
            var betData = {
                market_id: marketId,
                event_id: eventId,
                event_name: document.querySelector('.event-title')?.textContent || 'Match',
                market_name: 'Match Odds',
                selection_name: currentRunnerName,
                selection_id: currentRunnerId,
                bet_type: currentBetType,
                odds: odds,
                stake: stake,
                sport_type: 'cricket'
            };
            
            fetch('/api/bets/place', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify(betData)
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.classList.remove('running');
                submitBtn.style.pointerEvents = 'auto';
                
                if (data.success) {
                    alert('Bet placed successfully!\n' + 
                          currentRunnerName + ' @ ' + odds + '\n' +
                          'Stake: ' + stake.toLocaleString('en-IN') + '\n' +
                          'New Balance: ' + data.new_balance.toLocaleString('en-IN'));
                    closeBetSlip();
                    
                    updateHeaderValues(data.new_balance, data.total_liability);
                    loadOpenBets();
                } else {
                    alert('Failed to place bet: ' + data.message);
                }
            })
            .catch(error => {
                submitBtn.classList.remove('running');
                submitBtn.style.pointerEvents = 'auto';
                console.error('Bet error:', error);
                alert('Error placing bet. Please try again.');
            });
        }
        
        function updateHeaderValues(newBalance, totalLiability) {
            var balanceEl = document.querySelector('.wallet-balance');
            if (balanceEl) {
                balanceEl.textContent = 'B: Rs. ' + parseFloat(newBalance).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }
            
            var liableEl = document.querySelector('.wallet-exposure');
            if (liableEl) {
                liableEl.textContent = ' | L: ' + parseFloat(totalLiability).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }
        }
        
        function loadOpenBets() {
            fetch('/api/bets/open?market_id=' + marketId)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateOpenBetsDisplay(data.bets);
                    }
                })
                .catch(error => console.error('Error loading open bets:', error));
        }
        
        function updateOpenBetsDisplay(bets) {
            var openBetsSection = document.querySelector('.bets strong');
            if (openBetsSection && openBetsSection.textContent.includes('Open Bets')) {
                openBetsSection.innerHTML = 'Open Bets (' + bets.length + ')';
            }
            
            var tbody = document.querySelector('.bets .betting-table tbody');
            if (tbody && openBetsSection && openBetsSection.textContent.includes('Open Bets')) {
                tbody.innerHTML = '';
                bets.forEach(function(bet) {
                    var row = document.createElement('tr');
                    row.className = bet.bet_type;
                    row.innerHTML = 
                        '<td>' + bet.selection_name + '</td>' +
                        '<td>' + bet.odds + '</td>' +
                        '<td>' + parseFloat(bet.stake).toLocaleString('en-IN') + '</td>' +
                        '<td><button class="btn btn-xs btn-danger" onclick="cancelBet(' + bet.id + ')">X</button></td>';
                    tbody.appendChild(row);
                });
            }
        }
        
        function cancelBet(betId) {
            if (!confirm('Are you sure you want to cancel this bet?')) return;
            
            fetch('/api/bets/' + betId + '/cancel', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
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
                alert('Error cancelling bet. Please try again.');
            });
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            loadOpenBets();
        });
        
        // Add click handlers to odds cells after DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            attachOddsClickHandlers();
        });
        
        function attachOddsClickHandlers() {
            // Back odds (price-back class)
            document.querySelectorAll('.price-back').forEach(function(el) {
                el.style.cursor = 'pointer';
                el.addEventListener('click', function() {
                    var oddsEl = this.querySelector('.price-odd');
                    var odds = oddsEl ? oddsEl.textContent.trim() : '-';
                    if (odds === '-' || odds === '') return;
                    
                    // Find runner name from parent
                    var runnerDiv = this.closest('.runner-runner');
                    var runnerName = 'Unknown';
                    var runnerId = '';
                    
                    if (runnerDiv) {
                        var nameEl = runnerDiv.querySelector('.runner-display-name h4');
                        if (nameEl) runnerName = nameEl.textContent.trim();
                        runnerId = runnerDiv.id.replace('runner-', '');
                    }
                    
                    openBetSlip(runnerName, runnerId, odds, 'back');
                });
            });
            
            // Lay odds (price-lay class)
            document.querySelectorAll('.price-lay').forEach(function(el) {
                el.style.cursor = 'pointer';
                el.addEventListener('click', function() {
                    var oddsEl = this.querySelector('.price-odd');
                    var odds = oddsEl ? oddsEl.textContent.trim() : '-';
                    if (odds === '-' || odds === '') return;
                    
                    // Find runner name from parent
                    var runnerDiv = this.closest('.runner-runner');
                    var runnerName = 'Unknown';
                    var runnerId = '';
                    
                    if (runnerDiv) {
                        var nameEl = runnerDiv.querySelector('.runner-display-name h4');
                        if (nameEl) runnerName = nameEl.textContent.trim();
                        runnerId = runnerDiv.id.replace('runner-', '');
                    }
                    
                    openBetSlip(runnerName, runnerId, odds, 'lay');
                });
            });
        }
        
        // Re-attach handlers after odds update (for dynamically updated content)
        function reattachOddsHandlers() {
            attachOddsClickHandlers();
        }
    </script>
    <script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;99ac001e6ec6fdb0&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}"
        crossorigin="anonymous"></script>

</body>

</html>