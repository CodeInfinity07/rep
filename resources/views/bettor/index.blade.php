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

    <title>Dashboard | BETGURU</title>
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
                                {{ strtoupper($username) }}
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
                    <div id="Highlights" class="row">
                        <div class="modal fade modalCasinoToS" data-backdrop="static" data-keyboard="false"
                            id="modalPasswordChange" tabindex="-10" role="dialog" aria-labelledby="modalPasswordChange"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Your Password</h5>
                                    </div>
                                    <div id="casino-tos-text" class="modal-body">
                                        <p>
                                        </p>
                                        <center>
                                            <h3 class="text-danger blink_me">
                                                Change Your Password
                                                <i class="fa fa-warning"></i>
                                            </h3>
                                        </center>
                                        <p></p>
                                        <p>Password Checkup Detected that your password is no longer <b>safe!</b>.</p>
                                        <p>You should change your password now to use the Exchange .</p>
                                    </div>

                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <input type="email" id="Newpasswordmodal" class="form-control validate">
                                            <label for="defaultForm-email">Enter Your New Password Here!</label>
                                        </div>
                                    </div>
                                    <h5 id="alertmodaltitle" style="color: red;background-color: black;"
                                        class="modal-title"></h5>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger ml-4" onclick="AcceptPassword();">
                                            <strong>Change Now</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade modalCasinoToS" data-backdrop="static" data-keyboard="false"
                            id="modalRedirectToLogout" tabindex="-11" role="dialog"
                            aria-labelledby="modalPasswordChange" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Password Changed Successfully</h5>
                                    </div>
                                    <div id="casino-tos-text" class="modal-body">
                                        <p>
                                        </p>
                                        <center>
                                            <h3 class="text-danger blink_me">
                                                Password Changed Successfully
                                                <i class="fa fa-check" style="font-size:48px;color:forestgreen"></i>
                                            </h3>
                                        </center>
                                        <p></p>
                                        <p>Your password is changed successfully. <b>Kindly Login Again </b>.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger ml-4" onclick="ReLogin();">
                                            <strong>Login Again</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade bd-example-modal-lg" id="modalCasinoToS" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="padding:0px 15px;">
                                        <button type="button" class="close btn-sm" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <a href="/Common/BetProGames">
                                            <img class="img-responsive img-fluid"
                                                src="/img/favicon/BannerDefault.jpeg?11700">
                                        </a>
                                    </div>
                                    <div class="modal-footer" style="padding:5px 15px;">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <link rel="stylesheet" href="/lib/ckeditor/ckeditor5.css">
                        <style>
                            #news-flash p {
                                color: black;
                            }

                            .ck-content p {
                                font-size: 16px;
                            }
                        </style>
                        <div class="modal fade bd-example-modal-lg" id="news-flash" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content ck-content">
                                    <!--<div class="modal-header" style="padding:0px 15px;">
                <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer" style="padding:5px 15px;">
                                        <button type="button" class="btn btn-primary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function showNewsFlash() {
                                let isFlash = localStorage.getItem('news-flash');

                                let hasContent = document.querySelector("#news-flash .modal-body").innerText.trim() !== '';

                                if (isFlash && hasContent) {
                                    $('#news-flash').modal('show');
                                }

                                localStorage.removeItem('news-flash');
                            }
                        </script>

                        <div class="col-lg-12 Bl_NT_DB_LITE">
                            <div class="left-content" id="cust-wallet">
                                <div class="table-wrap">
                                    <div class="table-box-header tb-top-text">
                                        <span>Credit: {{ number_format($credit, 2) }}</span>
                                        <span class="runrate">Balance: {{ number_format($balance, 2) }}</span>
                                        <span class="runrate">Liable: {{ number_format($liable, 2) }}</span>
                                        <span class="runrate">Active Bets: {{ $active_bets }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="table-wrap">
                                    <div class="table-box-body">
                                        <div class="bets">
                                            <!--<strong>Sport Highlights</strong>-->
                                            <div class="text-center page_loader" style="display: none;">
                                                <img src="/img/loadinggif.gif" alt="Loading...">
                                            </div>
                                            <div id="horsenhound" class="">

                                                <div class="row games_slider_container">
                                                    <div class="games_slider slick-initialized slick-slider">














                                                        <div class="slick-list draggable">
                                                            <div class="slick-track"
                                                                style="opacity: 1; width: 8738px; transform: translate3d(-2056px, 0px, 0px);">
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="-6"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/WorldCasino" tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino6.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="-5"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino7.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="-4"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino8.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="-3"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900001&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino9.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="-2"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900014&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino10.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="-1"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/WorldCasino" tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino11.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="0" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/BetProGames?GameId=9022"
                                                                        tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/Aviator.png">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="1" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/Sap" tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/sportsbook.png">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-current slick-active"
                                                                    style="width: 253px;" data-slick-index="2"
                                                                    aria-hidden="false" tabindex="0">
                                                                    <a href="/Common/BetProGames?GameId=9040"
                                                                        tabindex="0">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/AviatorNew.png">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-active"
                                                                    style="width: 253px;" data-slick-index="3"
                                                                    aria-hidden="false" tabindex="0">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="0">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino1.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-active"
                                                                    style="width: 253px;" data-slick-index="4"
                                                                    aria-hidden="false" tabindex="0">
                                                                    <a href="/Common/RSC?id=900003&amp;d=d"
                                                                        tabindex="0">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino2.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-active"
                                                                    style="width: 253px;" data-slick-index="5"
                                                                    aria-hidden="false" tabindex="0">
                                                                    <a href="/Common/RSC?id=900003&amp;d=d"
                                                                        tabindex="0">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino3.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-active"
                                                                    style="width: 253px;" data-slick-index="6"
                                                                    aria-hidden="false" tabindex="0">
                                                                    <a href="/Common/RSC?id=900003&amp;d=d"
                                                                        tabindex="0">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino4.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-active"
                                                                    style="width: 253px;" data-slick-index="7"
                                                                    aria-hidden="false" tabindex="0">
                                                                    <a href="/Common/WorldCasino" tabindex="0">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino5.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="8" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/WorldCasino" tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino6.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="9" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino7.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="10" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino8.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="11" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/RSC?id=900001&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino9.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="12" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/RSC?id=900014&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino10.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide" style="width: 253px;"
                                                                    data-slick-index="13" aria-hidden="true"
                                                                    tabindex="-1">
                                                                    <a href="/Common/WorldCasino" tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino11.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="14"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/BetProGames?GameId=9022"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/Aviator.png"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="15"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/Sap" tabindex="-1">
                                                                        <img data-lazy="/img/casino/sportsbook.png"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="16"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/BetProGames?GameId=9040"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/AviatorNew.png"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="17"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino1.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="18"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900003&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino2.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="19"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900003&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino3.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="20"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900003&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino4.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="21"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/WorldCasino" tabindex="-1">
                                                                        <img data-lazy="/img/casino/casino5.jpeg"
                                                                            class="img-fluid img-thumbnail slick-loading">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="22"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/WorldCasino" tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino6.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="23"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino7.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="24"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900002&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino8.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="25"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900001&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino9.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="26"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/RSC?id=900014&amp;d=d"
                                                                        tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino10.jpeg">
                                                                    </a>
                                                                </div>
                                                                <div class="image slick-slide slick-cloned"
                                                                    style="width: 253px;" data-slick-index="27"
                                                                    aria-hidden="true" tabindex="-1">
                                                                    <a href="/Common/WorldCasino" tabindex="-1">
                                                                        <img class="img-fluid img-thumbnail"
                                                                            style="opacity: 1;"
                                                                            src="/img/casino/casino11.jpeg">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="Dashboardmarkets">
                                                <div class="Bl_NT_DB_LITE">
                                                    <div class="RaceCards__main___1LtHz Bl_NT_DB"
                                                        style="background-color:#43444A;">
                                                        <div class="RaceCards__header___M-uFV Bl_NT_DB_LITE">
                                                            <span class="svg-horse svg-horse-dims svg-racing" role="img"
                                                                aria-label="horse icon"></span>
                                                            <b class="imghorseb"> Horse Race</b>
                                                        </div>

                                                        <div class="row" id="raceslider">
                                                            <section class="center slick-initialized slick-slider"
                                                                style="width:80vw;"><button
                                                                    class="slick-prev slick-arrow slick-disabled"
                                                                    aria-label="Previous" type="button"
                                                                    aria-disabled="true" style="">Previous</button>

                                                                <div class="slick-list draggable">
                                                                    <div class="slick-track"
                                                                        style="opacity: 1; width: 2752px; transform: translate3d(0px, 0px, 0px);">
                                                                        <div class="chk11 slick-slide slick-current slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="0" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250158572"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">2:45
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T09:45:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Pakenham (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="1" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209995"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">2:58
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T09:58:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Gloucester Park (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="2" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209559"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:03
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:03:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Melton (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="3" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209312"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:06
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:06:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Bunbury (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="4" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209054"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:10
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:10:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Newcastle (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="5" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250158580"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:15
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:15:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Pakenham (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="6" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209739"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:21
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:21:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Albion Park (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="7" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209010"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:24
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:24:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Dubbo (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="8" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250209998"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:28
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:28:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Gloucester Park (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="9" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250209562"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:33
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:33:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Melton (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="10" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250209314"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:35
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:35:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Bunbury (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="11" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250214346"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:35
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:35:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Fairview (ZA)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="12" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250209057"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:40
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:40:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Newcastle (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="13" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250158588"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:45
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:45:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Pakenham (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="14" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250209742"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:51
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:51:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Albion Park (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="15" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250209012"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:55
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:55:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Dubbo (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>














                                                                <button class="slick-next slick-arrow" aria-label="Next"
                                                                    type="button" style=""
                                                                    aria-disabled="false">Next</button>
                                                            </section>
                                                        </div>
                                                    </div>

                                                    <div class="RaceCards__main___1LtHz Bl_NT_DB"
                                                        style="background-color:#43444A;">
                                                        <div class="RaceCards__header___M-uFV Bl_NT_DB_LITE">
                                                            <span
                                                                class="svg-greyhound-racing svg-greyhound-racing-dims svg-racing"
                                                                role="img" aria-label="greyhound icon"></span>
                                                            <b class="imghorseb"> Grey Hound</b>
                                                        </div>

                                                        <div class="row" id="raceslider">
                                                            <section class="center slick-initialized slick-slider"
                                                                style="width:80vw;"><button
                                                                    class="slick-prev slick-arrow slick-disabled"
                                                                    aria-label="Previous" type="button"
                                                                    aria-disabled="true" style="">Previous</button>

                                                                <div class="slick-list draggable">
                                                                    <div class="slick-track"
                                                                        style="opacity: 1; width: 2752px; transform: translate3d(0px, 0px, 0px);">
                                                                        <div class="chk11 slick-slide slick-current slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="0" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209693"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:02
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:02:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Bendigo (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="1" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250208472"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:08
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:08:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Richmond (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="2" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250208645"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:11
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:11:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Wagga (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="3" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250210132"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:19
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:19:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Geelong (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="4" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250209698"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:22
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:22:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Bendigo (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="5" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250208477"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:26
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:26:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Richmond (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="6" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250208650"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:29
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:29:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Wagga (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide slick-active"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="7" aria-hidden="false"
                                                                            tabindex="0">
                                                                            <a href="/Common/Market?id=1.250230237"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="0">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:32
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:32:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Harlow (GB)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="8" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250210137"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:38
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:38:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Geelong (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="9" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250208655"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:44
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:44:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Wagga (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="10" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250209703"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:47
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:47:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Bendigo (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="11" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250230239"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:48
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:48:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Harlow (GB)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="12" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250208482"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:49
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:49:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Richmond (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="13" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250211384"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:52
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:52:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Mandurah (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="14" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250210142"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">3:56
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T10:56:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Geelong (AU)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chk11 slick-slide"
                                                                            style="text-align: center; margin: 2px; width: 168px;"
                                                                            data-slick-index="15" aria-hidden="true"
                                                                            tabindex="-1">
                                                                            <a href="/Common/Market?id=1.250229792"
                                                                                style="color:white; width:auto;"
                                                                                tabindex="-1">
                                                                                <b class="chkmobile">
                                                                                    <span
                                                                                        class="slidedate market-time">4:01
                                                                                        PM</span>
                                                                                    <span class="d-none utctime"
                                                                                        data-format="h:mm A">
                                                                                        2025-11-07T11:01:00.0000000Z
                                                                                    </span>
                                                                                    <br>
                                                                                    <span class="slidename">
                                                                                        Hove (GB)
                                                                                    </span>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>














                                                                <button class="slick-next slick-arrow" aria-label="Next"
                                                                    type="button" style=""
                                                                    aria-disabled="false">Next</button>
                                                            </section>
                                                        </div>
                                                    </div>


                                                    <!--TABS SYSTEM FOR INPLAY AND OTHERS--->

                                                    <div class="row bbcustom"
                                                        style="display: flex;flex-wrap: nowrap;overflow-x: scroll;overflow-y: hidden;">

                                                        <div class="tab-content active mobilewidth bg-primary"
                                                            id="owlitemactive1"
                                                            onclick="ActivateTab(0); highlightLink(this);">
                                                            <div style="min-width:80px; max-width:80px;">
                                                                <a href="javascript:void(0)"
                                                                    style="text-decoration : none; color:inherit;">
                                                                    <div id="owlitemactive1t">
                                                                        <div><i style="margin-left: 54px;">0</i></div>
                                                                        <i class="material-icons">timer</i>
                                                                        <div style="margin-top:-2px;">Inplay</div>
                                                                    </div>

                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="tab-content mobilewidth" id="owlitemactive2"
                                                            onclick="ActivateTab(1); highlightLink(this);">
                                                            <div style="min-width:80px; max-width:80px;">
                                                                <a href="#"
                                                                    style="text-decoration : none; color:inherit;">
                                                                    <div class="img-block" id="owlitemactive2t">
                                                                        <div><i style="margin-left: 54px;">6</i></div>
                                                                        <div class="tabsvgdiv">
                                                                            <div class="svg-cricket svg-cricket-dims"
                                                                                role="img" aria-label="cricket icon">
                                                                            </div>
                                                                        </div>
                                                                        <span>Cricket</span>
                                                                    </div>

                                                                </a>
                                                            </div>
                                                        </div>


                                                        <div class="tab-content mobilewidth" id="owlitemactive3"
                                                            onclick="ActivateTab(2); highlightLink(this);">
                                                            <div style="min-width:80px; max-width:80px;">
                                                                <a href="#"
                                                                    style="text-decoration : none; color:inherit;">
                                                                    <div class="img-block" id="owlitemactive3t">
                                                                        <div><i style="margin-left: 54px;">8</i></div>
                                                                        <div class="tabsvgdiv">
                                                                            <div class="svg-tennis svg-tennis-dims"
                                                                                role="img" aria-label="tennis icon">
                                                                            </div>
                                                                        </div>
                                                                        <span>Tennis</span>
                                                                    </div>

                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="tab-content mobilewidth" id="owlitemactive4"
                                                            onclick="ActivateTab(3); highlightLink(this);">
                                                            <div style="min-width:80px; max-width:80px;">
                                                                <a href="#"
                                                                    style="text-decoration : none; color:inherit;">
                                                                    <div class="img-block" id="owlitemactive4t">
                                                                        <div><i style="margin-left: 54px;">3</i></div>
                                                                        <div class="tabsvgdiv">
                                                                            <div class="svg-soccer svg-soccer-dims sprite-transform-15"
                                                                                role="img" aria-label="soccer icon">
                                                                            </div>
                                                                        </div>
                                                                        <span>Soccer</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="tab-content mobilewidth" id="owlitemactive4">
                                                            <a href="/Common/sap" style="text-decoration: none;">
                                                                <div style="min-width:80px; max-width:80px;">
                                                                    <div class="img-block" id="owlitemactive4t">
                                                                        <div><i
                                                                                style="margin-left: 54px; color:white;">80</i>
                                                                        </div>
                                                                        <div>
                                                                            <img src="/img/v2/SB_ico.png" alt=""
                                                                                style="max-width:60px; max-height:40px; margin-bottom:-4px;margin-top:-5px;">
                                                                        </div>
                                                                        <span style="color:white;">SportsBook</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>


                                                    <div class="tabcontent active" style="">
                                                        <div class="high_lights">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="sport">
                                                                            <div class="sport">
                                                                                <svg id="baseball"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 56.7 56.7"
                                                                                    style="fill: #000;">
                                                                                    <defs>
                                                                                        <style>
                                                                                            .cls-1 {
                                                                                                fill: #fff;
                                                                                            }
                                                                                        </style>
                                                                                    </defs>
                                                                                    <title>cricket</title>
                                                                                    <path class="cls-1"
                                                                                        d="M47,8.9a.91.91,0,0,1,.7.3l.9.8a1.12,1.12,0,0,1,.1,1.6L39.8,21.9l1.7,1.4a2.09,2.09,0,0,1,.2,3L21,50.1a2,2,0,0,1-1.6.7,2.39,2.39,0,0,1-1.4-.5l-6-5.1a2.09,2.09,0,0,1-.2-3l2.1-2.4L23.2,29l9.3-10.6a2,2,0,0,1,1.6-.7,2.39,2.39,0,0,1,1.4.5l1.7,1.4L46.1,9.3a1.8,1.8,0,0,1,.9-.4">
                                                                                    </path>
                                                                                    <circle class="cls-1" cx="40.7"
                                                                                        cy="43.3" r="5.4"></circle>
                                                                                    <polygon class="cls-1"
                                                                                        points="27.2 56.7 31.5 56.7 31.5 43 27.2 47.9 27.2 56.7">
                                                                                    </polygon>
                                                                                    <path class="cls-1"
                                                                                        d="M17.4,53.8v2.9h4.3V53.6a5,5,0,0,1-2.4.6A16.25,16.25,0,0,1,17.4,53.8Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M8.1,44a5.26,5.26,0,0,1,1.3-4L12,37V4.6a1.71,1.71,0,0,0-1.7-1.8h1.5a.43.43,0,0,1,.4.4v.5a.43.43,0,0,0,.4.4h4.1a.43.43,0,0,0,.4-.4V3.2a.43.43,0,0,1,.4-.4h1.7a1.77,1.77,0,0,0-1.7,1.8V30.7l4.3-4.9V4.6a1.71,1.71,0,0,0-1.7-1.8h1.7a.43.43,0,0,1,.4.4v.5a.43.43,0,0,0,.4.4h4.1a.43.43,0,0,0,.4-.4V3.2a.43.43,0,0,1,.4-.4H29a1.77,1.77,0,0,0-1.7,1.8V19.5l2.8-3.2a4.43,4.43,0,0,1,1.5-1.2V4.6a1.71,1.71,0,0,0-1.7-1.8h-.6a.43.43,0,0,0,.4-.4V1.6a.43.43,0,0,0-.4-.4H27.5a.43.43,0,0,1-.4-.4V.4c-.1-.2-.2-.4-.4-.4H22.6a.43.43,0,0,0-.4.4V.9a.43.43,0,0,1-.4.4H20a.43.43,0,0,0-.4.4.43.43,0,0,0-.4-.4H17.4A.43.43,0,0,1,17,.9V.4a.43.43,0,0,0-.4-.4H12.5a.43.43,0,0,0-.4.4V.9a.43.43,0,0,1-.4.4H9.9a.43.43,0,0,0-.4.4v.8a.43.43,0,0,0,.4.4H9.3A1.77,1.77,0,0,0,7.6,4.7V56.8H12V49.6L9.9,47.8A5.9,5.9,0,0,1,8.1,44ZM19.6,2.5a.43.43,0,0,0,.4.4h-.8C19.4,2.8,19.6,2.7,19.6,2.5Z">
                                                                                    </path>
                                                                                    <style
                                                                                        xmlns="http://www.w3.org/1999/xhtml"
                                                                                        type="text/css"></style>
                                                                                </svg>
                                                                                Cricket
                                                                            </div>
                                                                        </th>
                                                                        <th>Matched</th>
                                                                        <th colspan="2">1</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">2</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="high_lights">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="sport">
                                                                            <div class="sport">
                                                                                <svg id="soccer"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 20 20">
                                                                                    <defs>
                                                                                        <style>
                                                                                            .cls-1 {
                                                                                                fill: #fff;
                                                                                            }
                                                                                        </style>
                                                                                    </defs>
                                                                                    <title>soccer</title>
                                                                                    <path class="cls-1"
                                                                                        d="M12.5.3A11.34,11.34,0,0,0,10,0,11.34,11.34,0,0,0,7.5.3l2.5.9Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M14.3,19.1a9.83,9.83,0,0,0,3.7-3l-2.4.9Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M19.3,6.3a7.19,7.19,0,0,0-1.2-2.1V6.8L20,8.9A7.71,7.71,0,0,0,19.3,6.3Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M2,16.1a9.83,9.83,0,0,0,3.7,3l-1.3-2Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M1.8,4.2A11.78,11.78,0,0,0,.7,6.1,12.76,12.76,0,0,0,0,8.9L1.8,6.7Z">
                                                                                    </path>
                                                                                    <polygon class="cls-1"
                                                                                        points="7 9.4 8.2 12.9 11.8 12.9 13 9.4 10 7.3 7 9.4">
                                                                                    </polygon>
                                                                                    <path class="cls-1"
                                                                                        d="M14.1,16.6l-2-2.1H7.9l-2,2.1,2,3.2A14.92,14.92,0,0,0,10,20a14.92,14.92,0,0,0,2.1-.2Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M19.2,14a.1.1,0,0,1,.1-.1,9,9,0,0,0,.7-2.7L17.3,8,14.5,9.6l-1.3,3.8,2,2.1Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M.8,14a.1.1,0,0,0-.1-.1A13.43,13.43,0,0,1,0,11.2L2.7,8,5.5,9.6l1.3,3.8-2,2.1Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M5.5,1.1A16.44,16.44,0,0,0,3.3,2.5V6.6L6,8.2,9.2,5.9V2.5Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M14.5,1.1,10.7,2.5V5.9l3.2,2.3,2.7-1.6V2.5A11,11,0,0,0,14.5,1.1Z">
                                                                                    </path>
                                                                                </svg>
                                                                                Football
                                                                            </div>
                                                                        </th>
                                                                        <th>Matched</th>
                                                                        <th colspan="2">1</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">2</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="high_lights">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="sport">
                                                                            <div class="sport">
                                                                                <svg id="baseball"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 56.7 56.7">
                                                                                    <defs>
                                                                                        <style>
                                                                                            .cls-1 {
                                                                                                fill: #fff;
                                                                                            }
                                                                                        </style>
                                                                                    </defs>
                                                                                    <title>tennis</title>
                                                                                    <path class="cls-1"
                                                                                        d="M56.7,49.7,44.2,37.2h0l-4.1-4.1a4.76,4.76,0,0,1-1.2-4.7h0a18.66,18.66,0,0,0,.4-2.5,9.28,9.28,0,0,1-2.4.3,4.87,4.87,0,0,1-1.2-.1h0L20.4,10.8l4.4-4.4a20,20,0,0,1,3.7,2.8,9.92,9.92,0,0,1,2.6-2.4A24,24,0,0,0,15.1,0,15.1,15.1,0,0,0,4.3,4.2C-2.5,10.9-1,23.3,7.5,31.8c4.9,4.9,11.1,7.5,16.8,7.5a16.11,16.11,0,0,0,4.4-.6A4.76,4.76,0,0,1,33,39.9L49.4,56.3h0l.2.2,5.6-5.6,1.5-1.2ZM26.2,20.5l-5.4,5.4L13,18.2l5.4-5.4ZM15.1,3.5a16.33,16.33,0,0,1,7.1,1.6L18.5,8.8,13.4,3.7A7.93,7.93,0,0,1,15.1,3.5Zm-5,.9,6.3,6.3L11,16.2,4.7,9.8a11,11,0,0,1,2-3.1A11.34,11.34,0,0,1,10.1,4.4ZM3.6,16.9a14,14,0,0,1,.1-4.1L9,18.2l-4,4A19.78,19.78,0,0,1,3.6,16.9Zm2.8,7.9L11,20.2,18.8,28l-4.7,4.7A24.72,24.72,0,0,1,10,29.4,26,26,0,0,1,6.4,24.8Zm10.3,9.3L20.8,30l5.7,5.7a15,15,0,0,1-2.2.2A19.19,19.19,0,0,1,16.7,34.1Zm16-1.4a10.29,10.29,0,0,1-3.1,2l-6.8-6.8,5.4-5.4,6.7,6.7A9.88,9.88,0,0,1,32.7,32.7Z">
                                                                                    </path>
                                                                                    <circle class="cls-1" cx="36.9"
                                                                                        cy="15.6" r="7.1"></circle>
                                                                                </svg>
                                                                                Tennis
                                                                            </div>
                                                                        </th>
                                                                        <th>Matched</th>
                                                                        <th colspan="2">1</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">2</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <div class="tabcontent" style="display: none;">
                                                        <div class="high_lights">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="sport">
                                                                            <div class="sport">
                                                                                <svg id="baseball"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 56.7 56.7"
                                                                                    style="fill: #000;">
                                                                                    <defs>
                                                                                        <style>
                                                                                            .cls-1 {
                                                                                                fill: #fff;
                                                                                            }
                                                                                        </style>
                                                                                    </defs>
                                                                                    <title>cricket</title>
                                                                                    <path class="cls-1"
                                                                                        d="M47,8.9a.91.91,0,0,1,.7.3l.9.8a1.12,1.12,0,0,1,.1,1.6L39.8,21.9l1.7,1.4a2.09,2.09,0,0,1,.2,3L21,50.1a2,2,0,0,1-1.6.7,2.39,2.39,0,0,1-1.4-.5l-6-5.1a2.09,2.09,0,0,1-.2-3l2.1-2.4L23.2,29l9.3-10.6a2,2,0,0,1,1.6-.7,2.39,2.39,0,0,1,1.4.5l1.7,1.4L46.1,9.3a1.8,1.8,0,0,1,.9-.4">
                                                                                    </path>
                                                                                    <circle class="cls-1" cx="40.7"
                                                                                        cy="43.3" r="5.4"></circle>
                                                                                    <polygon class="cls-1"
                                                                                        points="27.2 56.7 31.5 56.7 31.5 43 27.2 47.9 27.2 56.7">
                                                                                    </polygon>
                                                                                    <path class="cls-1"
                                                                                        d="M17.4,53.8v2.9h4.3V53.6a5,5,0,0,1-2.4.6A16.25,16.25,0,0,1,17.4,53.8Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M8.1,44a5.26,5.26,0,0,1,1.3-4L12,37V4.6a1.71,1.71,0,0,0-1.7-1.8h1.5a.43.43,0,0,1,.4.4v.5a.43.43,0,0,0,.4.4h4.1a.43.43,0,0,0,.4-.4V3.2a.43.43,0,0,1,.4-.4h1.7a1.77,1.77,0,0,0-1.7,1.8V30.7l4.3-4.9V4.6a1.71,1.71,0,0,0-1.7-1.8h1.7a.43.43,0,0,1,.4.4v.5a.43.43,0,0,0,.4.4h4.1a.43.43,0,0,0,.4-.4V3.2a.43.43,0,0,1,.4-.4H29a1.77,1.77,0,0,0-1.7,1.8V19.5l2.8-3.2a4.43,4.43,0,0,1,1.5-1.2V4.6a1.71,1.71,0,0,0-1.7-1.8h-.6a.43.43,0,0,0,.4-.4V1.6a.43.43,0,0,0-.4-.4H27.5a.43.43,0,0,1-.4-.4V.4c-.1-.2-.2-.4-.4-.4H22.6a.43.43,0,0,0-.4.4V.9a.43.43,0,0,1-.4.4H20a.43.43,0,0,0-.4.4.43.43,0,0,0-.4-.4H17.4A.43.43,0,0,1,17,.9V.4a.43.43,0,0,0-.4-.4H12.5a.43.43,0,0,0-.4.4V.9a.43.43,0,0,1-.4.4H9.9a.43.43,0,0,0-.4.4v.8a.43.43,0,0,0,.4.4H9.3A1.77,1.77,0,0,0,7.6,4.7V56.8H12V49.6L9.9,47.8A5.9,5.9,0,0,1,8.1,44ZM19.6,2.5a.43.43,0,0,0,.4.4h-.8C19.4,2.8,19.6,2.7,19.6,2.5Z">
                                                                                    </path>
                                                                                    <style
                                                                                        xmlns="http://www.w3.org/1999/xhtml"
                                                                                        type="text/css"></style>
                                                                                </svg>
                                                                                Cricket
                                                                            </div>
                                                                        </th>
                                                                        <th>Matched</th>
                                                                        <th colspan="2">1</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">2</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250221184"
                                                                        class="m_1_250221184 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Tomorrow</span>
                                                                                <span class="market-time">13:15</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-08T08:15:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250221184">
                                                                                        Australia v India
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span
                                                                                    class="svg-DBM svg-DBM-dims svg-span"
                                                                                    role="img" aria-label="bm"></span>
                                                                                <span class="TMFORDESK">70,188</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">70,188</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.18</strong>
                                                                                <span>2,632</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.2</strong>
                                                                                <span>591</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.83 </strong>
                                                                                <span>18.12k</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.84 </strong>
                                                                                <span>1,562</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250068500"
                                                                        class="m_1_250068500 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">9-11</span>
                                                                                <span class="market-time">7:40</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-09T02:40:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250068500">
                                                                                        Brisbane Heat W v Melbourne
                                                                                        Renegades W
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">1,857</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">1,857</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>1.76</strong>
                                                                                <span>188</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.77</strong>
                                                                                <span>2,126</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 2.28 </strong>
                                                                                <span>1,762</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.32 </strong>
                                                                                <span>143</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250068925"
                                                                        class="m_1_250068925 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">9-11</span>
                                                                                <span class="market-time">11:10</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-09T06:10:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250068925">
                                                                                        Sydney Thunder W v Hobart
                                                                                        Hurricanes W
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">204</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">204</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.18</strong>
                                                                                <span>121</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.22</strong>
                                                                                <span>143</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.82 </strong>
                                                                                <span>174</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.85 </strong>
                                                                                <span>143</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250069361"
                                                                        class="m_1_250069361 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">9-11</span>
                                                                                <span class="market-time">14:30</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-09T09:30:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250069361">
                                                                                        Perth Scorchers W v Sydney
                                                                                        Sixers W
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">37,505</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">37,505</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.08</strong>
                                                                                <span>132</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.12</strong>
                                                                                <span>142</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.9 </strong>
                                                                                <span>159</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.93 </strong>
                                                                                <span>143</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250069549"
                                                                        class="m_1_250069549 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">10-11</span>
                                                                                <span class="market-time">9:10</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-10T04:10:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250069549">
                                                                                        Melbourne Stars W v Adelaide
                                                                                        Strikers W
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">193</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">193</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.18</strong>
                                                                                <span>24</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.22</strong>
                                                                                <span>43</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.82 </strong>
                                                                                <span>52</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.85 </strong>
                                                                                <span>28</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_249449817"
                                                                        class="m_1_249449817 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">21-11</span>
                                                                                <span class="market-time">7:30</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-21T02:30:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.249449817">
                                                                                        Australia v England
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">132,512</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">132,512</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>1.67</strong>
                                                                                <span>30</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.68</strong>
                                                                                <span>387</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue m-left ">
                                                                                <strong> 12 </strong>
                                                                                <span>2,000</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink m-right ">
                                                                                <strong> 12.5 </strong>
                                                                                <span>6,318</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong> 3.1 </strong>
                                                                                <span>74</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>3.15 </strong>
                                                                                <span>16</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>




                                                    <div class="tabcontent" style="display: none;">
                                                        <div class="high_lights">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="sport">
                                                                            <div class="sport">
                                                                                <svg id="baseball"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 56.7 56.7">
                                                                                    <defs>
                                                                                        <style>
                                                                                            .cls-1 {
                                                                                                fill: #fff;
                                                                                            }
                                                                                        </style>
                                                                                    </defs>
                                                                                    <title>tennis</title>
                                                                                    <path class="cls-1"
                                                                                        d="M56.7,49.7,44.2,37.2h0l-4.1-4.1a4.76,4.76,0,0,1-1.2-4.7h0a18.66,18.66,0,0,0,.4-2.5,9.28,9.28,0,0,1-2.4.3,4.87,4.87,0,0,1-1.2-.1h0L20.4,10.8l4.4-4.4a20,20,0,0,1,3.7,2.8,9.92,9.92,0,0,1,2.6-2.4A24,24,0,0,0,15.1,0,15.1,15.1,0,0,0,4.3,4.2C-2.5,10.9-1,23.3,7.5,31.8c4.9,4.9,11.1,7.5,16.8,7.5a16.11,16.11,0,0,0,4.4-.6A4.76,4.76,0,0,1,33,39.9L49.4,56.3h0l.2.2,5.6-5.6,1.5-1.2ZM26.2,20.5l-5.4,5.4L13,18.2l5.4-5.4ZM15.1,3.5a16.33,16.33,0,0,1,7.1,1.6L18.5,8.8,13.4,3.7A7.93,7.93,0,0,1,15.1,3.5Zm-5,.9,6.3,6.3L11,16.2,4.7,9.8a11,11,0,0,1,2-3.1A11.34,11.34,0,0,1,10.1,4.4ZM3.6,16.9a14,14,0,0,1,.1-4.1L9,18.2l-4,4A19.78,19.78,0,0,1,3.6,16.9Zm2.8,7.9L11,20.2,18.8,28l-4.7,4.7A24.72,24.72,0,0,1,10,29.4,26,26,0,0,1,6.4,24.8Zm10.3,9.3L20.8,30l5.7,5.7a15,15,0,0,1-2.2.2A19.19,19.19,0,0,1,16.7,34.1Zm16-1.4a10.29,10.29,0,0,1-3.1,2l-6.8-6.8,5.4-5.4,6.7,6.7A9.88,9.88,0,0,1,32.7,32.7Z">
                                                                                    </path>
                                                                                    <circle class="cls-1" cx="36.9"
                                                                                        cy="15.6" r="7.1"></circle>
                                                                                </svg>
                                                                                Tennis
                                                                            </div>
                                                                        </th>
                                                                        <th>Matched</th>
                                                                        <th colspan="2">1</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">2</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250228563"
                                                                        class="m_1_250228563 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">16:30</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T11:30:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250228563">
                                                                                        P Kypson v Giustino
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">20,760</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">20,760</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>1.4</strong>
                                                                                <span>970</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.42</strong>
                                                                                <span>28.82k</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 3.4 </strong>
                                                                                <span>865</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>3.5 </strong>
                                                                                <span>388</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250236381"
                                                                        class="m_1_250236381 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">19:30</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T14:30:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250236381">
                                                                                        Norrie v Sonego
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">276,459</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">276,459</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.06</strong>
                                                                                <span>524</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.08</strong>
                                                                                <span>1,067</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.92 </strong>
                                                                                <span>1,939</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.93 </strong>
                                                                                <span>41</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250235709"
                                                                        class="m_1_250235709 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">20:00</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T15:00:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250235709">
                                                                                        J Pegula v E Rybakina
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">241,674</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">241,674</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>3.1</strong>
                                                                                <span>1,592</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>3.15</strong>
                                                                                <span>508</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.46 </strong>
                                                                                <span>6,910</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.48 </strong>
                                                                                <span>11.35k</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250237184"
                                                                        class="m_1_250237184 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">20:00</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T15:00:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250237184">
                                                                                        Djokovic v Hanfmann
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">133,689</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">133,689</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>1.18</strong>
                                                                                <span>128.7k</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.19</strong>
                                                                                <span>19.01k</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 6.2 </strong>
                                                                                <span>4,705</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>6.4 </strong>
                                                                                <span>5,553</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250235806"
                                                                        class="m_1_250235806 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">21:30</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T16:30:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250235806">
                                                                                        A Sabalenka v A Anisimova
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">166,604</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">166,604</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>1.5</strong>
                                                                                <span>10.54k</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.51</strong>
                                                                                <span>1,104</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 2.96 </strong>
                                                                                <span>706</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.98 </strong>
                                                                                <span>20</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250230109"
                                                                        class="m_1_250230109 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">22:00</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T17:00:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250230109">
                                                                                        Se Korda v Musetti
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">139,914</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">139,914</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.2</strong>
                                                                                <span>2,311</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.24</strong>
                                                                                <span>2,977</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.81 </strong>
                                                                                <span>1,027</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.83 </strong>
                                                                                <span>1,255</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250207856"
                                                                        class="m_1_250207856 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Tomorrow</span>
                                                                                <span class="market-time">0:00</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T19:00:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250207856">
                                                                                        J Riera v Sim Waltert
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">17,661</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">17,661</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.96</strong>
                                                                                <span>26</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>3</strong>
                                                                                <span>33</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.5 </strong>
                                                                                <span>66</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.51 </strong>
                                                                                <span>50</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_250208314"
                                                                        class="m_1_250208314 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Tomorrow</span>
                                                                                <span class="market-time">0:00</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T19:00:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.250208314">
                                                                                        An Vergara Rivera v M Sherif
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">16,842</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">16,842</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>11</strong>
                                                                                <span>328</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>13</strong>
                                                                                <span>1,407</span>
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
                                                                            <div class="box -blue ">
                                                                                <strong> 1.08 </strong>
                                                                                <span>24.97k</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.1 </strong>
                                                                                <span>3,276</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <div class="tabcontent" style="display: none;">
                                                        <div class="high_lights">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="sport">
                                                                            <div class="sport">
                                                                                <svg id="soccer"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 20 20">
                                                                                    <defs>
                                                                                        <style>
                                                                                            .cls-1 {
                                                                                                fill: #fff;
                                                                                            }
                                                                                        </style>
                                                                                    </defs>
                                                                                    <title>soccer</title>
                                                                                    <path class="cls-1"
                                                                                        d="M12.5.3A11.34,11.34,0,0,0,10,0,11.34,11.34,0,0,0,7.5.3l2.5.9Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M14.3,19.1a9.83,9.83,0,0,0,3.7-3l-2.4.9Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M19.3,6.3a7.19,7.19,0,0,0-1.2-2.1V6.8L20,8.9A7.71,7.71,0,0,0,19.3,6.3Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M2,16.1a9.83,9.83,0,0,0,3.7,3l-1.3-2Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M1.8,4.2A11.78,11.78,0,0,0,.7,6.1,12.76,12.76,0,0,0,0,8.9L1.8,6.7Z">
                                                                                    </path>
                                                                                    <polygon class="cls-1"
                                                                                        points="7 9.4 8.2 12.9 11.8 12.9 13 9.4 10 7.3 7 9.4">
                                                                                    </polygon>
                                                                                    <path class="cls-1"
                                                                                        d="M14.1,16.6l-2-2.1H7.9l-2,2.1,2,3.2A14.92,14.92,0,0,0,10,20a14.92,14.92,0,0,0,2.1-.2Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M19.2,14a.1.1,0,0,1,.1-.1,9,9,0,0,0,.7-2.7L17.3,8,14.5,9.6l-1.3,3.8,2,2.1Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M.8,14a.1.1,0,0,0-.1-.1A13.43,13.43,0,0,1,0,11.2L2.7,8,5.5,9.6l1.3,3.8-2,2.1Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M5.5,1.1A16.44,16.44,0,0,0,3.3,2.5V6.6L6,8.2,9.2,5.9V2.5Z">
                                                                                    </path>
                                                                                    <path class="cls-1"
                                                                                        d="M14.5,1.1,10.7,2.5V5.9l3.2,2.3,2.7-1.6V2.5A11,11,0,0,0,14.5,1.1Z">
                                                                                    </path>
                                                                                </svg>
                                                                                Football
                                                                            </div>
                                                                        </th>
                                                                        <th>Matched</th>
                                                                        <th colspan="2">1</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">2</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_249952836"
                                                                        class="m_1_249952836 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">22:00</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T17:00:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.249952836">
                                                                                        Genclerbirligi v Basaksehir
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">46,618</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">46,618</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>3.3</strong>
                                                                                <span>1,692</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>3.4</strong>
                                                                                <span>552</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue m-left ">
                                                                                <strong> 3.5 </strong>
                                                                                <span>46.5k</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink m-right ">
                                                                                <strong> 3.55 </strong>
                                                                                <span>96.88k</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong> 2.4 </strong>
                                                                                <span>398</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.42 </strong>
                                                                                <span>1,453</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_249943426"
                                                                        class="m_1_249943426 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">22:30</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T17:30:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.249943426">
                                                                                        Al Najma Club v Al-Hilal
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">61,238</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">61,238</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>23</strong>
                                                                                <span>129</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>26</strong>
                                                                                <span>47</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue m-left ">
                                                                                <strong> 10 </strong>
                                                                                <span>33.38k</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink m-right ">
                                                                                <strong> 10.5 </strong>
                                                                                <span>435</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong> 1.15 </strong>
                                                                                <span>113</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>1.16 </strong>
                                                                                <span>3,174</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                    <style>
                                                                        #containersccr {
                                                                            display: flex;
                                                                            /* establish flex container */
                                                                            flex-direction: row;
                                                                            /* default value; can be omitted */
                                                                            flex-wrap: nowrap;
                                                                            /* default value; can be omitted */
                                                                            justify-content: space-between;
                                                                            max-width: 100%;
                                                                            min-width: 63px;
                                                                        }

                                                                        #containersccr>div {
                                                                            width: 50%;
                                                                        }
                                                                    </style>

                                                                    <tr id="m_1_249941813"
                                                                        class="m_1_249941813 McomCustom">

                                                                        <td class="sport-date">
                                                                            <div>
                                                                                <span class="day">Today</span>
                                                                                <span class="market-time">23:00</span>
                                                                                <span class="d-none utctime"
                                                                                    data-format="H:mm"
                                                                                    data-target="time">
                                                                                    2025-11-07T18:00:00.0000000Z
                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="teams">
                                                                                <strong class="team-1">
                                                                                    <a
                                                                                        href="/Common/Market?id=1.249941813">
                                                                                        OB v Silkeborg
                                                                                    </a>
                                                                                </strong>
                                                                                <strong class="team-2"><a
                                                                                        href=""></a></strong>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="matched">
                                                                                <span class="TMFORDESK">32,306</span>
                                                                            </div>
                                                                            <span class="TMFORMOB">32,306</span>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong>2.12</strong>
                                                                                <span>677</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>2.16</strong>
                                                                                <span>271</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue m-left ">
                                                                                <strong> 3.85 </strong>
                                                                                <span>66.27k</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink m-right ">
                                                                                <strong> 3.9 </strong>
                                                                                <span>61.9k</span>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="box -blue ">
                                                                                <strong> 3.6 </strong>
                                                                                <span>88</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="box -pink ">
                                                                                <strong>3.65 </strong>
                                                                                <span>59</span>
                                                                            </div>
                                                                        </td>

                                                                        <td class="action">
                                                                            <a href="#"><i
                                                                                    class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
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

                    <p id="mids" class="invisible invisible col-6"></p>

                </div>
            </div>
        </div>
    </div>

    <!-- Market Rules -->
    <div class="modal fade" id="modalMarketRules" tabindex="-1" role="dialog" aria-labelledby="modalMarketRules"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Market Rules</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="market-rules-text" class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <!-- ToS -->
    <div class="modal fade" id="modalTos" tabindex="-1" role="dialog" aria-labelledby="modalTos" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
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
            document.getElementById("horsenhound").classList.remove("d-none");

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
    <script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;99ac001e6ec6fdb0&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}"
        crossorigin="anonymous"></script>

</body>

</html>