<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta name="google" content="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sports Trading Platform">
    <meta name="keyword" content="sports trading, bet, betfair">
    <title>Chart | BetPro</title>
    <!-- Icons-->
    <link rel="shortcut icon" href="/img/favicon/BetPro.ico">
    <link rel="stylesheet" href="css/all.css" />
    <link href="css/style.css?10900" rel="stylesheet" />
    <link href="css/site.min.css?10900" rel="stylesheet" />
    <link href="css/BetPro-style.css?10900" rel="stylesheet" />
    <script>
        var pricesUrl = "https://prices9.mgs11.com/api";
        var ordersUrl = "https://orders.mgs11.com/api";
        const SsocketUrl = "https://orders-ws.mgs11.com/signalr";
        const LiquidityRate = 35;
        let dealerSck = 1;
    </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show menu-collapsed">
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="logo-bar">
            <a href="/index">
                <span class="green-logo-text d-sm-down-none">
                    BetPro
                </span>
            </a>
        </div>

        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>



        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="/index">Dashboard</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/Accounts/Chart">Users</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/Reports/BookDetail">Reports</a>
            </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item px-2">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Rana19470 (SuperMaster) <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/Common/Profile">
                        <i class="fa fa-user"></i> Profile
                    </a>
                    <a class="dropdown-item" id="btn-logout" href="/Common/Logout">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/" role="button" aria-haspopup="true" aria-expanded="false">
                    <strong>B:</strong> <span class="wallet-balance">0</span>
                    <strong>Exp:</strong> <span class="wallet-exposure">0</span>
                </a>
            </li>
        </ul>
    </header>
    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">


              <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/index.html">
                            <i class="nav-icon fas fa-tachometer-alt fa-inverse"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users.html">
                            <i class="nav-icon fas fa-users fa-inverse"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/position.html">
                            <i class="nav-icon fas fa-funnel-dollar fa-inverse"></i> Current Position
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/report.html">
                            <i class="nav-icon fas fa-money-check fa-inverse"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lock.html">
                            <i class="nav-icon fas fa-unlock-alt fa-inverse"></i> Bet Lock
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/star.html">
                            <i class="nav-icon fas fa-star fa-inverse"></i> Star Casino
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Markets/WorldCasino">
                            <i class="nav-icon fas fa-globe fa-inverse"></i> World Casino
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Markets/ExGames">
                            <i class="nav-icon fas fa-globe fa-inverse"></i> BetFair Games
                        </a>
                    </li>



                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <img src="/img/v2/soccer.svg" alt="C">
                            Soccer
                        </a>

                       <ul class="nav-dropdown-items" href="#">
                            <li class="nav-item">
                                <a class="nav-link" href="/soccer.html">
                                    Malta v Netherlands </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/soccer.html">
                                    Belarus v Denmark </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/soccer.html">
                                    Austria v San Marino </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <img src="/img/v2/tennis.svg" alt="C">
                            Tennis
                        </a>

                        <ul class="nav-dropdown-items" href="#">
                            <li class="nav-item">
                                <a class="nav-link" href="/tennis.html">
                                    Rinderknech v F Auger-Aliassime </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tennis.html">
                                    Medvedev v Alex de Minaur </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tennis.html">
                                    Mar Carle v Te Kostovic </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tennis.html">
                                    So Sierra v Gorgodze </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <img src="/img/v2/cricket.svg" alt="C">
                            Cricket
                        </a>

                        <ul class="nav-dropdown-items" href="#">
                            <li class="nav-item">
                                <a class="nav-link" href="/cricket.html">
                                    Pakistan v South Africa </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cricket.html">
                                    India v West Indies </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cricket.html">
                                    New Zealand W v Bangladesh W </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cricket.html">
                                    England W v Sri Lanka W </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <img src="/img/v2/horse.svg" alt="C">
                            Horse Race
                        </a>

                        <ul class="nav-dropdown-items" href="#">
                            <li class="nav-item">
                                <a class="nav-link" href="/horse.html">
                                    <span class="slidedate market-time">11:50 AM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T06:50:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        Cloncurry (AU)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/horse.html">
                                    <span class="slidedate market-time">11:54 AM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T06:54:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        Morphettville (AU)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/horse.html">
                                    <span class="slidedate market-time">11:59 AM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T06:59:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        Melton (AU)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/horse.html">
                                    <span class="slidedate market-time">12:02 PM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T07:02:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        Bathurst (AU)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <img src="/img/v2/greyhound-racing.svg" alt="C">
                            Greyhound
                        </a>

                        <ul class="nav-dropdown-items" href="#">
                            <li class="nav-item">
                                <a class="nav-link" href="/hound.html">
                                    <span class="slidedate market-time">11:52 AM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T06:52:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        The Gardens (AU)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/hound.html">
                                    <span class="slidedate market-time">12:04 PM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T07:04:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        Q1 Lakeside (AU)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/hound.html">
                                    <span class="slidedate market-time">12:07 PM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T07:07:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        Warragul (AU)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/hound.html">
                                    <span class="slidedate market-time">12:13 PM</span>
                                    <span class="d-none utctime" data-format="h:mm A">
                                        2025-10-10T07:13:00.0000000Z
                                    </span>
                                    <span class="slidename">
                                        The Gardens (AU)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
        <main class="main">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <style>
                        .checknow {
                            -webkit-user-select: none;
                            /* Safari */
                            -ms-user-select: none;
                            /* IE 10+ and Edge */
                            user-select: none;
                            /* Standard syntax */
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
                            background-color: white;
                            border: 1px solid black;
                            padding: 0.25rem;
                        }

                        .scores .runnername {
                            margin-top: 7px;
                            line-height: 0.2;
                            color: black;
                            font-size: 18px;
                        }

                        .scores .runner-score {
                            color: black;
                            font-size: 18px;
                            margin-top: 2px;
                            padding: 0px;
                        }

                        .scores .active {
                            color: #009069
                        }

                        .scores .col-divider {
                            border-left: 1px solid black;
                        }

                        .tablefoter {
                            font-size: 14px;
                            border: 1px solid black;
                            color: black;
                        }

                        .socindivs {
                            padding: 0px;
                        }

                        .timeshow {
                            color: black;
                            font-size: 18px;
                        }

                        .scoresocer {
                            color: black;
                            font-size: 18px
                        }

                        .tablefotercs {
                            font-size: 12px;
                            color: black;
                        }

                        .colwidthset {
                            width: 1vw;
                        }

                        .lasttrgt {
                            float: right;
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
                                color: black;
                                font-size: 10px;
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
                                color: black;
                                font-size: 13px;
                                margin-top: 2px;
                                padding: 0px;
                                line-height: 1.2;
                            }

                            .socindivs {
                                padding: 0px;
                            }

                            .timeshow {
                                color: black;
                                font-size: 12px;
                            }

                            .scoresocer {
                                color: black;
                                font-size: 18px;
                                padding: 0px;
                                margin-bottom: 7px;
                            }

                            .tablefotercs {
                                font-size: 11px;
                                color: black;
                            }

                            .scores .runnername {
                                margin-top: 7px;
                                line-height: 0.2;
                                color: black;
                                font-size: 11px;
                            }

                            .colwidthset {
                                width: 50px;
                            }

                            .MBoxNopadding {
                                padding: 0px;
                            }

                            .firstspn {
                                float: right;
                            }

                            .secondspn {
                                margin-left: auto;
                                float: right;
                            }

                            .lasttrgt {
                                float: left;
                            }

                            .trgtspn {
                                margin-left: 45vw;
                            }

                            #MarketData {
                                padding-right: 16px;
                            }
                        }

                        .fa-basketball-ball {
                            color: black;
                        }

                        @media only screen and (max-width: 600px) {
                            #MarketData .card-header {
                                padding: 0.3rem 0.5rem;
                            }

                            #MarketData .card-header h4 {
                                font-size: 1.1rem;
                                margin-bottom: 0.1rem;
                            }
                        }

                        .timelineNS {
                            background: white;
                            height: 32px;
                            position: relative;
                        }
                    </style>
                    <script>
                        const score_url = "https://bpexch.xyz/Common/LiveScoreCard?id=";
                        const video_url = "https://www.bpexch.xyz/Common/TvIframe?id=";
                    </script>
                    <script src="/js/unreal_html5_player_script_v2.js?0001"></script>
                    <div class="row" id="loadedmarkettoshow">
                        <div id="MarketData" role="tablist" aria-multiselectable="true"
                            class="content panel-group col-md-8">
                            <div class="card card-accent-primary">
                                <div class="card-header" style="" id="1.248790206">
                                    <h4><strong>11:50 am Cloncurry (AUS) 10th Oct - R8 1600m Cup</strong> <span
                                            style="color: rgb(232, 62, 140);"><strong>CLOSED</strong></span> <i
                                            class="fa fa-address-book"></i></h4>
                                </div> <!----> <!---->
                                <div class="card-body market-box MBoxNopadding" style=""><!---->
                                    <div class="row bg-gray-100 market-head">
                                        <div class="col"><strong>10 Oct 11:50</strong></div>
                                        <div class="col text-right"><strong>Elapsed: 00:18:20</strong></div>
                                    </div>
                                    <div id="runner-53183617" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1591823.png"
                                                onerror="this.style.display='none'"> <strong>1. Testator Silens</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-53183617" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-53183617" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-53183617" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-53183617" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-53183617" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-53183617" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-53183617" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-53183617" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-53183617" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-53183617" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-53183617" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-53183617" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-47207972" class="row runners winner">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1711753.png"
                                                onerror="this.style.display='none'"> <strong>2. Divine Okay</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-47207972" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-47207972" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-47207972" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-47207972" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-47207972" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-47207972" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-47207972" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-47207972" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-47207972" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-47207972" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-47207972" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-47207972" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-61861676" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1772964.png"
                                                onerror="this.style.display='none'"> <strong>4. Cacofonix</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-61861676" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-61861676" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-61861676" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-61861676" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-61861676" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-61861676" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-61861676" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-61861676" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-61861676" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-61861676" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-61861676" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-61861676" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-39161698" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1582734.png"
                                                onerror="this.style.display='none'"> <strong>5. Metal Bar</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-39161698" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-39161698" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-39161698" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-39161698" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-39161698" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-39161698" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-39161698" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-39161698" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-39161698" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-39161698" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-39161698" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-39161698" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-72948607" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/2097117.png"
                                                onerror="this.style.display='none'"> <strong>7. Revved Up Ready</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-72948607" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-72948607" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-72948607" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-72948607" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-72948607" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-72948607" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-72948607" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-72948607" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-72948607" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-72948607" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-72948607" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-72948607" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-71837517" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1950725.png"
                                                onerror="this.style.display='none'"> <strong>8. Yalla</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-71837517" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-71837517" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-71837517" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-71837517" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-71837517" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-71837517" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-71837517" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-71837517" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-71837517" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-71837517" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-71837517" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-71837517" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-3532485" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/2136522.png"
                                                onerror="this.style.display='none'"> <strong>9. Benevento</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-3532485" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-3532485" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-3532485" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-3532485" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-3532485" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-3532485" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-3532485" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-3532485" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-3532485" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-3532485" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-3532485" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-3532485" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-89670203" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1874101.png"
                                                onerror="this.style.display='none'"> <strong>10. Breaking
                                                Ground</strong> <br> <span><span
                                                    class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-89670203" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-89670203" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-89670203" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-89670203" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-89670203" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-89670203" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-89670203" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-89670203" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-89670203" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-89670203" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-89670203" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-89670203" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-74039538" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1920679.png"
                                                onerror="this.style.display='none'"> <strong>11. Summer
                                                Sizzling</strong> <br> <span><span
                                                    class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-74039538" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-74039538" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-74039538" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-74039538" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-74039538" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-74039538" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-74039538" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-74039538" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-74039538" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-74039538" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-74039538" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-74039538" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-2176255" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/2069585.png"
                                                onerror="this.style.display='none'"> <strong>12. The Last
                                                Crusade</strong> <br> <span><span
                                                    class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-2176255" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-2176255" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-2176255" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-2176255" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-2176255" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-2176255" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-2176255" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-2176255" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-2176255" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-2176255" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-2176255" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-2176255" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-58371330" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1739735.png"
                                                onerror="this.style.display='none'"> <strong>13. Zouhope</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-58371330" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-58371330" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-58371330" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-58371330" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-58371330" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                    <div id="bs1-58371330" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-58371330" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                    <div id="ls1-58371330" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-58371330" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls2-58371330" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-58371330" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="ls3-58371330" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-49199765" class="row runners lastItemBorder">
                                        <div class="col-7 col-md-4 runner-name"><img
                                                src="https://bp-silks.lhre.net/proxy/c20251010-Cloncurry (AUS)-T/1779807.png"
                                                onerror="this.style.display='none'"> <strong>3. Pervade</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!----></div>
                                        <div class="col-5 col-md-8 price">
                                            <div
                                                style="width: 102%; line-height: 45px; color: red; text-align: center; background: rgb(236, 236, 237); text-transform: uppercase;">
                                                REMOVED
                                            </div>
                                        </div>
                                    </div>
                                </div> <!---->
                            </div> <!----> <!----> <!----> <!----> <!----> <!---->
                        </div>

                        <div id="Pnl-Orders" class="col-md-4">
                            <div class="card card-accent-primary right-content">
                                <div class="card-body pt-1 pb-1">
                                    <div class="d-flex">
                                        <div class="dropdown mr-2"><a href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                class="btn btn-primary dropdown-toggle">Bet Lock</a>
                                            <div aria-labelledby="dropdownMenuLink" x-placement="bottom-start"
                                                class="dropdown-menu"
                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                <a href="#" class="dropdown-item">Match Odds</a> <a href="#"
                                                    class="dropdown-item">Other Markets</a></div>
                                            <div id="modalLocker" tabindex="-1" role="dialog"
                                                aria-labelledby="betSlipMobile" aria-hidden="true" class="modal fade">
                                                <div role="document" class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-body"><img src="/img/preloader.gif"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <button type="button" class="btn btn-primary">
                                            User Book
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-accent-primary right-content">
                                <div class="btn-group btn-group-xs"
                                    style="width: 100%; height: 30px; margin-bottom: 2px;"><button id="tvbackbtn"
                                        onclick="SHOWTV()" class="btn btn-primary btn-xs col"
                                        style="border-right: solid;">Tv</button> <button id="livebackbtn"
                                        onclick="SHOWLIVE()" class="btn btn-primary btn-xs col"
                                        style="display: none;">Score Card</button></div>
                                <div id="TVDIV" style="">
                                    <div class="card-body video-container">
                                        <div class="bets">
                                            <div id="VBox1" style="display: block;">
                                                <unrealhtml5videoplayer id="UnrealPlayer1"
                                                    style="display: block; width: 470px; height: 300px; position: relative;">
                                                    <video id="UnrealPlayer1_Video" width="199" height="300"
                                                        style="background-color: black" autoplay="" poster=""
                                                        src="blob:https://bpexch.net/6662d1b9-95f2-4f8a-a5ca-ad722256816e"></video>
                                                    <div id="UnrealPlayer1_videoControls" class="controls"
                                                        data-state="visible" style="width: 199px;"><button
                                                            id="UnrealPlayer1_playpause" type="button"
                                                            data-state="pause">Play/Pause</button><button
                                                            id="UnrealPlayer1_stop" type="button"
                                                            data-state="stop">Stop</button>
                                                        <div id="UnrealPlayer1_showTime"
                                                            style="width:130px; text-align:center; margin-top: 11px; padding-left: 2px; color: #FFFFFF;">
                                                            0:10 / 0:11</div><input type="range"
                                                            id="UnrealPlayer1_progress" min="0" max="11.168" step="0.1"
                                                            value="0"
                                                            style="cursor: pointer; margin-top: 14px; width: 93px;"><button
                                                            id="UnrealPlayer1_volume" type="button"
                                                            data-state="volume">Volume</button><button
                                                            id="UnrealPlayer1_fullscreen" type="button"
                                                            data-state="go-fullscreen">Fullscreen</button>
                                                    </div>
                                                    <div id="UnrealPlayer1_progressTip"
                                                        style="z-index: 100; white-space: nowrap; position: absolute; display: none; color: #FFFFFF; ">
                                                    </div><input type="range" id="UnrealPlayer1_volSlider" min="0"
                                                        max="1" step="0.01" value="0.5"
                                                        style="cursor:pointer; z-index: 100; position: absolute; display: none; width: 100px; height: 12px; padding:20px; -webkit-transform:rotate(270deg); -moz-transform:rotate(270deg); -o-transform:rotate(270deg); -ms-transform:rotate(90deg); transform:rotate(270deg);">
                                                    <div id="UnrealPlayer1_statusmessage"
                                                        style="z-index: 100; position: absolute; display: none; color: red; top: 0px; left: 5px;">
                                                        Connecting...</div>
                                                </unrealhtml5videoplayer> <video id="streamVideo1" width="465"
                                                    autoplay="autoplay" playsinline="" controls="controls"
                                                    onloadedmetadata="OnMetadata()" style="display: none;"></video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="TVDIVIFRAME" style="display: none;"></div>
                                <div id="LIVEDIV" style="height: 165px; display: none;"><iframe id="livesc"
                                        src="https://bpexch.xyz/Common/LiveScoreCard?id=1.248474875"
                                        style="width: 100%; height: 165px;"></iframe></div>
                            </div>
                            <div class="card card-accent-primary">
                                <div class="card-header"><strong>Open Bets (0)</strong> <img src="/img/reconnecting.gif"
                                        alt="dc" class="rounded disconnected" style="display: none;"> <!----></div>
                                <div class="card-body  Orders-Widget">
                                    <div class="row">
                                        <div class="col-4 no-pad"><strong>Runner</strong></div>
                                        <div class="col-2 no-pad"><strong>Price</strong></div>
                                        <div class="col-2 no-pad"><strong>Size</strong></div>
                                        <div class="col-2 no-pad"><strong>Better</strong></div>
                                        <div class="col-2 no-pad"><strong>Master</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-accent-primary">
                                <div class="card-header"><strong>Matched Bets (0)</strong> <button
                                        class="btn btn-sm btn-primary">Full Bet List</button></div>
                                <div class="card-body Orders-Widget">
                                    <div class="row">
                                        <div class="col-4 no-pad"><strong>Runner</strong></div>
                                        <div class="col-2 no-pad"><strong>Price</strong></div>
                                        <div class="col-2 no-pad"><strong>Size</strong></div>
                                        <div class="col-2 no-pad"><strong>Better</strong></div>
                                        <div class="col-2 no-pad"><strong>Master</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </main>
    </div>

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

    <footer class="app-footer">
        <div class="tickercontainer" style="height: 25px; overflow: hidden;">
            <div class="mask">
                <ul id="news-ticker-foot"
                    style="position: relative; overflow: hidden; float: left; font: bold 10px Verdana; list-style-type: none; margin: 0px; padding: 0px; width: 453.297px; transition-timing-function: linear; transition-duration: 2.53282s; left: -126.641px;">

                    <li class="ticker-spacer"
                        style="float: left; width: 126.656px; height: 25px; white-space: nowrap; padding: 0px 7px; line-height: 25px;">
                    </li>
                    <li data-update="item1"
                        style="white-space: nowrap; float: left; padding: 0px 7px; line-height: 25px;"><b>Welcome to
                            Exchange </b></li>
                </ul><span class="tickeroverlay-left" style="display: none;">&nbsp;</span><span
                    class="tickeroverlay-right" style="display: none;">&nbsp;</span>
            </div>
        </div>
    </footer>
    <!-- CoreUI and necessary plugins-->

    <script type="text/javascript" src="https://wurfl.io/wurfl.js"></script>
    <script src="/js/signalr/dist/browser/signalr.js"></script>


    <script src="/js/vue.min.js"></script>
    <script src="https://unpkg.com/vuex@3.1.3/dist/vuex.min.js"></script>
    <script src="/js/site.min.js?101000"></script>
    <script src="/js/bof.js?101000"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-C1WVLP1K0K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('set', { 'user_id': 'Rana19470' });
        gtag('config', 'G-C1WVLP1K0K');
    </script>


    <script type="text/javascript" src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/js/src/client-locales.js?101000"></script>



    <script>
        var show_tv_tab = false;

        $(document).ready(function () {
            marketStore.state.userId = 6589548;
            if (show_tv_tab) {
                SHOWTV();
            } else {
                SHOWLIVE(MarketId)
            }
            $("#LIVEDIV").show();
        });

        function show(v) {

            if (show_tv_tab) {
                return;
            }

            if (v != 0) {
                $("#LIVEDIV").show();
            } else {
                $("#LIVEDIV").hide();
            }
        }

        var lastheight = 0;

        function setIframeHeight(h) {

            if (Math.abs(lastheight - h) < 10) {
                return;
            }

            lastheight = h + 45;


            var obj = document.getElementById("LIVEDIV");
            obj.style.height = lastheight + "px";

            var obj = document.getElementById("livesc");
            obj.style.height = lastheight + "px";
        }

        function onMessage(event) {
            setIframeHeight(event.data['h']);
            show(event.data['show']);
        }

        if (window.addEventListener) {
            window.addEventListener("message", onMessage, false);
        }
        else if (window.attachEvent) {
            window.attachEvent("onmessage", onMessage, false);
        }

        function SHOWTV() {
            show_tv_tab = true;
            if ($("#TVDIV").is(":visible")) {
                $("#TVDIV").hide();
                $("#LIVEDIV").hide();
                $("#sr-widget").hide();
                var element = document.getElementById("UnrealPlayer1_Video");
                if (element != null) {
                    element.parentNode.removeChild(element);
                    streams.forEach(function (str) {
                        if (str.player !== null) {
                            str.player.Stop();
                        }
                        document.querySelector(str.container).style.display = 'none';
                        document.querySelector(str.el).style.display = 'none';
                        document.querySelector(str.unreal).style.display = 'none';
                        document.querySelector(str.unreal).player = null;
                    });
                }
            } else {
                GetChannelData(MarketEVID);
                $("#LIVEDIV").hide();
                $("#sr-widget").hide();
            }
        }

        function SHOWLIVE() {
            show_tv_tab = false;
            if ($("#LIVEDIV").is(":visible")) {
                $("#TVDIV").hide();
                $("#LIVEDIV").hide();
                $("#sr-widget").hide();
                var element = document.getElementById("UnrealPlayer1_Video");
                if (element != null) {
                    element.parentNode.removeChild(element);
                    streams.forEach(function (str) {
                        if (str.player !== null) {
                            str.player.Stop();
                        }
                        document.querySelector(str.container).style.display = 'none';
                        document.querySelector(str.el).style.display = 'none';
                        document.querySelector(str.unreal).style.display = 'none';
                        document.querySelector(str.unreal).player = null;
                    });
                }
            } else {
                var element = document.getElementById("UnrealPlayer1_Video");
                if (element != null) {
                    element.parentNode.removeChild(element);
                    streams.forEach(function (str) {
                        if (str.player !== null) {
                            str.player.Stop();
                        }
                        document.querySelector(str.container).style.display = 'none';
                        document.querySelector(str.el).style.display = 'none';
                        document.querySelector(str.unreal).style.display = 'none';
                        document.querySelector(str.unreal).player = null;
                    });
                }

                $("#TVDIV").hide();
                $("#LIVEDIV").show();
                $("#sr-widget").show();
            }
        }



    </script>


    <script>
        const token = getCookie('wexscktoken');
        const sess = getCookie('wex3authtoken');
        const reft = getCookie('wex3reftoken');

        $(document).ready(function () {
            pollUserData();

            pollRefreshToken();
        });
    </script>
    <script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;98c43327faa2de57&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}"
        crossorigin="anonymous"></script>

</body>
<ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front"
    style="display: none;"></ul>
<div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
</body>

</html>