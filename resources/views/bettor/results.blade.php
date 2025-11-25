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

    <title>Results | BETGURU</title>
    <script>
        // EARLY: Mark this as non-homepage and setup preloader hide
        window.isNonHomePage = true;
        window.isResultsPage = true;
        window.isProfilePage = true;

        // Hide preloader as soon as DOM is ready
        document.addEventListener('DOMContentLoaded', function () {
            var preloader = document.getElementById('page-preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                preloader.style.display = 'none';
            }
            var loader = document.querySelector('.page_loader');
            if (loader) loader.style.display = 'none';
        });

        // Also try immediately when this script runs
        if (document.readyState !== 'loading') {
            var preloader = document.getElementById('page-preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                preloader.style.display = 'none';
            }
        }
    </script>
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
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

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
                                            <b>Welcome to Exchange - </b>
                                        </li>
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
                                {{ strtoupper($username) }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/Customer/Ledger/">Statement</a>
                                <a class="dropdown-item" href="/Common/Result/">Result</a>
                                <a class="dropdown-item" href="/Customer/ProfitLoss/">Profit Loss</a>
                                <a class="dropdown-item" href="/Customer/Bets">Bet History</a>
                                <a class="dropdown-item" href="/Customer/Profile">Profile</a>
                                <a class="dropdown-item" id="btn-logout" href="javascript:void(0);"
                                    onclick="document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="content-wrap body">

                    <link rel="stylesheet" type="text/css"
                        href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
                    <link rel="stylesheet" type="text/css"
                        href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

                    <form method="post">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-align-justify"></i>
                                        Market Results
                                    </div>
                                    <div class="card-body">

                                        <div class="row col-12">
                                            <div class="col-6 col-md-3">
                                                <div class="input-group datee date" id="ReportFrom"
                                                    data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#ReportFrom" id="DisplayFrom">
                                                    <div class="input-group-append" data-target="#ReportFrom"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="market-time d-none">11/21/2025 5:00 AM</span>
                                                <span class="d-none utctime" data-format="M/D/YYYY h:mm A">
                                                    2025-11-21T00:00:00.0000000Z
                                                </span>
                                                <input type="hidden" name="From" id="From"
                                                    value="2025-11-21T00:00:00.0000000Z">
                                            </div>

                                            <strong>&nbsp;-&nbsp;</strong>
                                            <div class="col-6 col-md-3">
                                                <div class="input-group date datee" id="ReportTo"
                                                    data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#ReportTo" id="DisplayTo">
                                                    <div class="input-group-append" data-target="#ReportTo"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="market-time d-none">11/26/2025 4:59 AM</span>
                                                <span class="d-none utctime" data-format="M/D/YYYY h:mm A">
                                                    2025-11-25T23:59:00.0000000Z
                                                </span>
                                                <input type="hidden" name="To" id="To"
                                                    value="2025-11-25T23:59:00.0000000Z">
                                            </div>

                                            <input type="hidden" data-val="true"
                                                data-val-required="The IsFirstVisit field is required."
                                                id="IsFirstVisit" name="IsFirstVisit" value="False">
                                        </div>

                                        <br>

                                        <p>
                                            <button class="btn btn-secondary" type="submit"
                                                onclick="return updateDates();" formaction="/Common/Result?id=1">
                                                Soccer
                                            </button>
                                            <button class="btn btn-secondary" type="submit"
                                                onclick="return updateDates();" formaction="/Common/Result?id=2">
                                                Tennis
                                            </button>
                                            <button class="btn btn-secondary" type="submit"
                                                onclick="return updateDates();" formaction="/Common/Result?id=4">
                                                Cricket
                                            </button>
                                            <button class="btn btn-secondary" type="submit"
                                                onclick="return updateDates();" formaction="/Common/Result?id=7">
                                                Horse Race
                                            </button>
                                            <button class="btn btn-primary" type="submit"
                                                onclick="return updateDates();" formaction="/Common/Result?id=8">
                                                <strong>Fancy</strong>
                                            </button>
                                            <button class="btn btn-secondary" type="submit"
                                                onclick="return updateDates();" formaction="/Common/Result?id=12">
                                                Casino
                                            </button>
                                            <button class="btn btn-secondary" type="submit"
                                                onclick="return updateDates();" formaction="/Common/Result?id=4339">
                                                Greyhound
                                            </button>
                                        </p>

                                        <div id="example_wrapper" class="dataTables_wrapper no-footer">
                                            <div class="dataTables_length" id="example_length"><label>Show <select
                                                        name="example_length" aria-controls="example" class="">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                            <div id="example_filter" class="dataTables_filter"><label>Search:<input
                                                        type="search" class="" placeholder=""
                                                        aria-controls="example"></label></div>
                                            <table id="example" width="100%"
                                                class="table-striped table-hover table-bordered table-sm display compact nowrap dataTable no-footer dtr-inline"
                                                role="grid" aria-describedby="example_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th style="width: 0.5px;" class="sorting" tabindex="0"
                                                            aria-controls="example" rowspan="1" colspan="1"
                                                            aria-label=": activate to sort column ascending"></th>
                                                        <th class="sorting" tabindex="0" aria-controls="example"
                                                            rowspan="1" colspan="1" style="width: 260.5px;"
                                                            aria-label="Match name: activate to sort column ascending">
                                                            Match name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example"
                                                            rowspan="1" colspan="1" style="width: 281.5px;"
                                                            aria-label="Market Name: activate to sort column ascending">
                                                            Market Name</th>
                                                        <th class="sorting_desc" tabindex="0" aria-controls="example"
                                                            rowspan="1" colspan="1" style="width: 133.5px;"
                                                            aria-label="Date: activate to sort column ascending"
                                                            aria-sort="descending">Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example"
                                                            rowspan="1" colspan="1" style="width: 41.5px;"
                                                            aria-label="Result: activate to sort column ascending">
                                                            Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody>








































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">1</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 3rd Wkt SA 2</td>
                                                        <td class="sorting_1">11/25/2025 5:01:00 AM</td>
                                                        <td>77</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">2</td>
                                                        <td> India v South Africa </td>
                                                        <td>Temba Bavuma Runs 2</td>
                                                        <td class="sorting_1">11/25/2025 5:01:00 AM</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">3</td>
                                                        <td> India v South Africa </td>
                                                        <td>Temba Bavuma Boundaries 2</td>
                                                        <td class="sorting_1">11/25/2025 5:01:00 AM</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">4</td>
                                                        <td> India v South Africa </td>
                                                        <td>30 Over Run SA 2</td>
                                                        <td class="sorting_1">11/25/2025 4:55:00 AM</td>
                                                        <td>76</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">5</td>
                                                        <td> India v South Africa </td>
                                                        <td>Aiden Markram Runs 2</td>
                                                        <td class="sorting_1">11/25/2025 4:48:00 AM</td>
                                                        <td>29</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">6</td>
                                                        <td> India v South Africa </td>
                                                        <td>Aiden Markram Boundaries 2</td>
                                                        <td class="sorting_1">11/25/2025 4:48:00 AM</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">7</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 2nd Wkt SA 2</td>
                                                        <td class="sorting_1">11/25/2025 4:48:00 AM</td>
                                                        <td>74</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">8</td>
                                                        <td> India v South Africa </td>
                                                        <td>25 Over Run SA 2</td>
                                                        <td class="sorting_1">11/25/2025 4:38:00 AM</td>
                                                        <td>67</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">9</td>
                                                        <td> India v South Africa </td>
                                                        <td>20 Over Run SA 2</td>
                                                        <td class="sorting_1">11/25/2025 4:21:00 AM</td>
                                                        <td>60</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">10</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 1st Wkt SA 2</td>
                                                        <td class="sorting_1">11/25/2025 4:14:00 AM</td>
                                                        <td>59</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">11</td>
                                                        <td> India v South Africa </td>
                                                        <td>Ryan Rickelton Runs 2</td>
                                                        <td class="sorting_1">11/25/2025 4:14:00 AM</td>
                                                        <td>35</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">12</td>
                                                        <td> India v South Africa </td>
                                                        <td>Ryan Rickelton Boundaries 2</td>
                                                        <td class="sorting_1">11/25/2025 4:14:00 AM</td>
                                                        <td>4</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">13</td>
                                                        <td> India v South Africa </td>
                                                        <td>15 Over Run SA 2</td>
                                                        <td class="sorting_1">11/25/2025 4:02:00 AM</td>
                                                        <td>49</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">14</td>
                                                        <td> India v South Africa </td>
                                                        <td>10 Over Run SA 2</td>
                                                        <td class="sorting_1">11/25/2025 3:42:00 AM</td>
                                                        <td>33</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">15</td>
                                                        <td> India v South Africa </td>
                                                        <td>5 Over Run SA 2</td>
                                                        <td class="sorting_1">11/24/2025 10:14:00 AM</td>
                                                        <td>22</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">16</td>
                                                        <td> India v South Africa </td>
                                                        <td>1st Innings Run IND</td>
                                                        <td class="sorting_1">11/24/2025 9:39:00 AM</td>
                                                        <td>201</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">17</td>
                                                        <td> India v South Africa </td>
                                                        <td>Kuldeep Yadav Runs</td>
                                                        <td class="sorting_1">11/24/2025 9:28:00 AM</td>
                                                        <td>19</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">18</td>
                                                        <td> India v South Africa </td>
                                                        <td>Kuldeep Yadav Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 9:28:00 AM</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">19</td>
                                                        <td> India v South Africa </td>
                                                        <td>Washington Sundar Runs</td>
                                                        <td class="sorting_1">11/24/2025 9:12:00 AM</td>
                                                        <td>48</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">20</td>
                                                        <td> India v South Africa </td>
                                                        <td>Washington Sundar Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 9:12:00 AM</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">21</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 8th Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 9:12:00 AM</td>
                                                        <td>194</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">22</td>
                                                        <td> India v South Africa </td>
                                                        <td>45 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 6:34:00 AM</td>
                                                        <td>123</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">23</td>
                                                        <td> India v South Africa </td>
                                                        <td>Ravindra Jadeja Runs</td>
                                                        <td class="sorting_1">11/24/2025 6:28:00 AM</td>
                                                        <td>6</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">24</td>
                                                        <td> India v South Africa </td>
                                                        <td>Ravindra Jadeja Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 6:28:00 AM</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">25</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 7th Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 6:27:00 AM</td>
                                                        <td>122</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">26</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 6th Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 6:17:00 AM</td>
                                                        <td>119</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">27</td>
                                                        <td> India v South Africa </td>
                                                        <td>Nitish Kumar Reddy Runs</td>
                                                        <td class="sorting_1">11/24/2025 6:17:00 AM</td>
                                                        <td>10</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">28</td>
                                                        <td> India v South Africa </td>
                                                        <td>Nitish Kumar Reddy Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 6:17:00 AM</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">29</td>
                                                        <td> India v South Africa </td>
                                                        <td>40 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 6:11:00 AM</td>
                                                        <td>113</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">30</td>
                                                        <td> India v South Africa </td>
                                                        <td>Rishabh Pant Runs</td>
                                                        <td class="sorting_1">11/24/2025 6:00:00 AM</td>
                                                        <td>7</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">31</td>
                                                        <td> India v South Africa </td>
                                                        <td>Rishabh Pant Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 6:00:00 AM</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">32</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 5th Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 5:59:00 AM</td>
                                                        <td>105</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">33</td>
                                                        <td> India v South Africa </td>
                                                        <td>35 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 5:31:00 AM</td>
                                                        <td>102</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">34</td>
                                                        <td> India v South Africa </td>
                                                        <td>Dhruv Jurel Runs</td>
                                                        <td class="sorting_1">11/24/2025 5:27:00 AM</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">35</td>
                                                        <td> India v South Africa </td>
                                                        <td>Dhruv Jurel Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 5:27:00 AM</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">36</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 4th Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 5:27:00 AM</td>
                                                        <td>102</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">37</td>
                                                        <td> India v South Africa </td>
                                                        <td>Sai Sudharsan Runs</td>
                                                        <td class="sorting_1">11/24/2025 5:24:00 AM</td>
                                                        <td>15</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">38</td>
                                                        <td> India v South Africa </td>
                                                        <td>Sai Sudharsan Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 5:24:00 AM</td>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">39</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 3rd Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 5:24:00 AM</td>
                                                        <td>96</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">40</td>
                                                        <td> India v South Africa </td>
                                                        <td>Yashasvi Jaiswal Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 5:11:00 AM</td>
                                                        <td>8</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">41</td>
                                                        <td> India v South Africa </td>
                                                        <td>Yashasvi Jaiswal Runs</td>
                                                        <td class="sorting_1">11/24/2025 5:10:00 AM</td>
                                                        <td>57</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">42</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 2nd Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 5:10:00 AM</td>
                                                        <td>95</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">43</td>
                                                        <td> India v South Africa </td>
                                                        <td>30 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 5:02:00 AM</td>
                                                        <td>92</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">44</td>
                                                        <td> India v South Africa </td>
                                                        <td>25 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 4:45:00 AM</td>
                                                        <td>73</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">45</td>
                                                        <td> India v South Africa </td>
                                                        <td>Fall of 1st Wkt IND</td>
                                                        <td class="sorting_1">11/24/2025 4:32:00 AM</td>
                                                        <td>65</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">46</td>
                                                        <td> India v South Africa </td>
                                                        <td>KL Rahul Runs</td>
                                                        <td class="sorting_1">11/24/2025 4:32:00 AM</td>
                                                        <td>22</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">47</td>
                                                        <td> India v South Africa </td>
                                                        <td>KL Rahul Boundaries</td>
                                                        <td class="sorting_1">11/24/2025 4:32:00 AM</td>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">48</td>
                                                        <td> India v South Africa </td>
                                                        <td>20 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 4:26:00 AM</td>
                                                        <td>52</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control" tabindex="0">49</td>
                                                        <td> India v South Africa </td>
                                                        <td>15 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 4:09:00 AM</td>
                                                        <td>37</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="dtr-control" tabindex="0">50</td>
                                                        <td> India v South Africa </td>
                                                        <td>10 Over Run IND</td>
                                                        <td class="sorting_1">11/24/2025 3:49:00 AM</td>
                                                        <td>20</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="dataTables_info" id="example_info" role="status"
                                                aria-live="polite">Showing 1 to 50 of 1,000 entries</div>
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="example_paginate"><a class="paginate_button previous disabled"
                                                    aria-controls="example" data-dt-idx="0" tabindex="-1"
                                                    id="example_previous">Previous</a><span><a
                                                        class="paginate_button current" aria-controls="example"
                                                        data-dt-idx="1" tabindex="0">1</a><a class="paginate_button "
                                                        aria-controls="example" data-dt-idx="2" tabindex="0">2</a><a
                                                        class="paginate_button " aria-controls="example" data-dt-idx="3"
                                                        tabindex="0">3</a><a class="paginate_button "
                                                        aria-controls="example" data-dt-idx="4" tabindex="0">4</a><a
                                                        class="paginate_button " aria-controls="example" data-dt-idx="5"
                                                        tabindex="0">5</a><span class="ellipsis">…</span><a
                                                        class="paginate_button " aria-controls="example" data-dt-idx="6"
                                                        tabindex="0">20</a></span><a class="paginate_button next"
                                                    aria-controls="example" data-dt-idx="7" tabindex="0"
                                                    id="example_next">Next</a></div>
                                        </div>
                                    </div>
                                </div>
                                <input name="__RequestVerificationToken" type="hidden"
                                    value="CfDJ8F78ByjY7DpIo9wNgC4COkC7HPsSX4pE8XR7ketj_GLhNi1waWzUL7QaulPzGP2CwyDzXaoG-vk1JMfulplXxe3R_mgh2L3zCt1rQZhREB-GMYViEVoJb5ju-QSV5nYsEHKtKnczqYdzqsn0Mw6evCC1RxOk1xbkfx8Y7U5PDuvXSCL0WeDQ2L02EGXtuUZ9yg">
                            </div>
                        </div>
                    </form>
                    <input name="__RequestVerificationToken" type="hidden"
                        value="CfDJ8F78ByjY7DpIo9wNgC4COkC7HPsSX4pE8XR7ketj_GLhNi1waWzUL7QaulPzGP2CwyDzXaoG-vk1JMfulplXxe3R_mgh2L3zCt1rQZhREB-GMYViEVoJb5ju-QSV5nYsEHKtKnczqYdzqsn0Mw6evCC1RxOk1xbkfx8Y7U5PDuvXSCL0WeDQ2L02EGXtuUZ9yg">


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
                                <p>Our site has strict policies and verification measures to prevent access to minors.
                                </p>
                                <br>
                                <p>We encourage parents consider the use of internet use protection tools. You may find
                                    the
                                    following links useful. </p>
                                <br>
                                <a href="https://www.cyberpatrol.com/" target="_blank" style="color:mediumspringgreen">
                                    Cyberpatrol</a>
                                <br>
                                <a href="https://www.cybersitter.com/" target="_blank" style="color:mediumspringgreen">
                                    Cybersitter
                                </a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

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

                        // Skip homepage-specific functions on non-homepage pages
                        if (!window.isProfitLossPage && !window.isBetsPage && !window.isProfilePage) {
                            fetchHighlights();
                            setInterval(fetchHighlights, 60000);
                        } else {
                            // Hide preloader immediately
                            $(".page_loader").hide();
                            var preloader = document.getElementById('page-preloader');
                            if (preloader) {
                                preloader.style.opacity = '0';
                                preloader.style.display = 'none';
                            }
                        }

                        isPWCRequired();
                        showWelcomeBanner();

                        $(".page_loader").hide();

                        const horseHound = document.getElementById("horsenhound");
                        if (horseHound) {
                            horseHound.classList.remove("d-none");
                        }

                        if (!window.isProfilePage && $(".games_slider").length) {
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
                        }

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

                                if (!window.isProfilePage && $(".center").length) {
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
                                }
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
                <script defer=""
                    src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
                    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
                    data-cf-beacon="{&quot;rayId&quot;:&quot;99ac001e6ec6fdb0&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}"
                    crossorigin="anonymous"></script>

</body>

</html>