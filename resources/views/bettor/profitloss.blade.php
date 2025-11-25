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
                    <link rel="stylesheet" href="/css/all.css">
<style>
    .totalAmount {
        float: right;
        margin-top: -30px;
    }
    @media screen and (max-width: 635px) {
        .totalAmount {
            float: right;
            margin-top:10px;
        }
    }
</style>
<div class="table-wrap">
    
<style>
    .datee {
        background-color: white;
    }
    @media screen and (max-width: 635px) {
        .editsbmtbtn {
            margin: auto;
            margin-right: 15px;
        }
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                Report Filter
            </div>
            <div class="card-body">
                <form id="ReportFilterForm" class="form-inline" method="get">
                    <div class="row" style="text-align-last:justify;">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <div class="input-group date" id="ReportFrom" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#ReportFrom" id="DisplayFrom">
                                    <div class="input-group-append" data-target="#ReportFrom" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <span class="market-time d-none">8/25/2025 10:07 AM</span>
                                <span class="d-none utctime" data-nofirst="0" data-format="M/D/YYYY h:mm A">
                                    2025-08-25T05:07:23.0000000Z
                                </span>
                                <input type="hidden" name="From" id="From" value="2025-08-25T05:07:23.0000000Z">
                            </div>
                        </div>

                        <strong style="margin:auto">&nbsp;-&nbsp;</strong>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <div class="input-group date" id="ReportTo" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#ReportTo" id="DisplayTo">
                                    <div class="input-group-append" data-target="#ReportTo" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <span class="market-time d-none">11/25/2025 11:59 PM</span>
                                <span class="d-none utctime" data-nofirst="0" data-format="M/D/YYYY h:mm A">
                                    2025-11-25T18:59:00.0000000Z
                                </span>
                                <input type="hidden" name="To" id="To" value="2025-11-25T18:59:00.0000000Z">
                            </div>
                        </div>

                        <div class="form-group editsbmtbtn">
                            <label class="mx-1"> </label>
                            <button class="btn btn-primary" type="submit" onclick="return updateDates();">
                                <strong>Submit</strong>
                            </button>
                        </div>
                        <input type="hidden" data-val="true" data-val-required="The ClientId field is required." id="ClientId" name="ClientId" value="5325466">
                        <input type="hidden" data-val="true" data-val-required="The EventTypeId field is required." id="EventTypeId" name="EventTypeId" value="0">
                        <input type="hidden" data-val="true" data-val-required="The IsFirstVisit field is required." id="IsFirstVisit" name="IsFirstVisit" value="False">
                    </div>
                    <div class="row col-12">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<div class="table-wrap">
    <div class="">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Sports ProfitLoss <b> (HAFIZ6969) </b>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills">
                </ul>

            </div>
        </div>
    </div>
</div>
<script>
    function popup_report(vid, aid) {
        var url = "/Customer/Statements?VID=" + vid + "&AID=" + aid;
        newwindow = window.open(url, "Market Repo", 'height=500,width=700,titlebar=0,menubar=0');
        if (window.focus) { newwindow.focus() }
        return false;
    }
</script>
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