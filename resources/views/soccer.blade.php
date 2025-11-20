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
                                <div class="card-header" style="" id="1.248670017">
                                    <h4><strong>Germany v Luxembourg - Match Odds</strong> <span
                                            style="color: rgb(232, 62, 140);"><strong>OPEN</strong></span> <i
                                            class="fa fa-address-book"></i></h4>
                                </div> <!----> <!---->
                                <div class="card-body market-box MBoxNopadding" style=""><!---->
                                    <div class="row bg-gray-100 market-head">
                                        <div class="col"><strong>10 Oct 23:45</strong></div>
                                        <div class="col text-right"><strong>Remaining: 11:52:19</strong></div>
                                    </div>
                                    <div id="runner-18" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Germany</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-18" class="col-12 price">
                                                        1.02
                                                    </div>
                                                    <div id="bs3-18" class="col-12 size">
                                                        16.7M
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-18" class="col-md-12 col-sm-12 price">
                                                        1.03
                                                    </div>
                                                    <div id="bs2-18" class="col-md-12 col-sm-12 size">
                                                        26.2M
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-18" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        1.04
                                                    </div>
                                                    <div id="bs1-18" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        21.7M
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-18" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        1.05
                                                    </div>
                                                    <div id="ls1-18" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        8.8M
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-18" class="col-md-12 col-sm-12 price">
                                                        1.06
                                                    </div>
                                                    <div id="ls2-18" class="col-md-12 col-sm-12 size">
                                                        13.0M
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-18" class="col-md-12 col-sm-12 price">
                                                        1.07
                                                    </div>
                                                    <div id="ls3-18" class="col-md-12 col-sm-12 size">
                                                        11.9M
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-25911" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Luxembourg</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-25911" class="col-12 price">
                                                        85
                                                    </div>
                                                    <div id="bs3-25911" class="col-12 size">
                                                        9.6K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-25911" class="col-md-12 col-sm-12 price">
                                                        90
                                                    </div>
                                                    <div id="bs2-25911" class="col-md-12 col-sm-12 size">
                                                        7.6K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-25911" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        95
                                                    </div>
                                                    <div id="bs1-25911" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        1.8K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-25911" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        110
                                                    </div>
                                                    <div id="ls1-25911" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        7.4K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-25911" class="col-md-12 col-sm-12 price">
                                                        120
                                                    </div>
                                                    <div id="ls2-25911" class="col-md-12 col-sm-12 size">
                                                        4.9K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-25911" class="col-md-12 col-sm-12 price">
                                                        130
                                                    </div>
                                                    <div id="ls3-25911" class="col-md-12 col-sm-12 size">
                                                        8.2K
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-58805" class="row runners lastItemBorder">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>The Draw</strong> <br>
                                            <span><span class="position-plus"><strong></strong></span> <!----></span>
                                            <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-58805" class="col-12 price">
                                                        24
                                                    </div>
                                                    <div id="bs3-58805" class="col-12 size">
                                                        146.8K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-58805" class="col-md-12 col-sm-12 price">
                                                        25
                                                    </div>
                                                    <div id="bs2-58805" class="col-md-12 col-sm-12 size">
                                                        99.7K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-58805" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        26
                                                    </div>
                                                    <div id="bs1-58805" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        16.5K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-58805" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        30
                                                    </div>
                                                    <div id="ls1-58805" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        800
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-58805" class="col-md-12 col-sm-12 price">
                                                        32
                                                    </div>
                                                    <div id="ls2-58805" class="col-md-12 col-sm-12 size">
                                                        33.7K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-58805" class="col-md-12 col-sm-12 price">
                                                        34
                                                    </div>
                                                    <div id="ls3-58805" class="col-md-12 col-sm-12 size">
                                                        30.5K
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        style="border-top: 1px solid lightgray; margin: 0px 5px; border-bottom: 1px solid lightgray; padding: 5px;">
                                        <p
                                            style="text-align: left; margin: 0px; padding: 0px; font-size: 16px; font-weight: inherit; color: red;">
                                            <b>LIVE VIDEO AVAILABLE</b>
                                        </p>
                                    </div>
                                </div>
                            </div> <!---->
                            <div class="card card-accent-success"><!----><!----><!----></div> <!----> <!---->
                            <div class="card card-accent-success">
                                <div id="market-1.248670021">
                                    <div class="row bg-gray-100 market-head">
                                        <div class="col-12"><strong>Over/Under 0.5 Goals</strong>
                                            &nbsp;
                                            <i class="fa fa-address-book"></i>
                                        </div>
                                    </div>
                                    <div id="runner-5851482" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Under 0.5 Goals</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-5851482" class="col-12 price">
                                                        34
                                                    </div>
                                                    <div id="bs3-5851482" class="col-12 size">
                                                        2.0K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-5851482" class="col-md-12 col-sm-12 price">
                                                        50
                                                    </div>
                                                    <div id="bs2-5851482" class="col-md-12 col-sm-12 size">
                                                        1.1K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-5851482" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        55
                                                    </div>
                                                    <div id="bs1-5851482" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        98
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-5851482" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        85
                                                    </div>
                                                    <div id="ls1-5851482" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        84
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-5851482" class="col-md-12 col-sm-12 price">
                                                        90
                                                    </div>
                                                    <div id="ls2-5851482" class="col-md-12 col-sm-12 size">
                                                        23
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-5851482" class="col-md-12 col-sm-12 price">
                                                        100
                                                    </div>
                                                    <div id="ls3-5851482" class="col-md-12 col-sm-12 size">
                                                        15
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-5851483" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Over 0.5 Goals</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-5851483" class="col-12 price">

                                                    </div>
                                                    <div id="bs3-5851483" class="col-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-5851483" class="col-md-12 col-sm-12 price">

                                                    </div>
                                                    <div id="bs2-5851483" class="col-md-12 col-sm-12 size">

                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-5851483" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        1.01
                                                    </div>
                                                    <div id="bs1-5851483" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        399.5K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-5851483" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        1.02
                                                    </div>
                                                    <div id="ls1-5851483" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        61.5K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-5851483" class="col-md-12 col-sm-12 price">
                                                        1.03
                                                    </div>
                                                    <div id="ls2-5851483" class="col-md-12 col-sm-12 size">
                                                        64.4K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-5851483" class="col-md-12 col-sm-12 price">
                                                        1.04
                                                    </div>
                                                    <div id="ls3-5851483" class="col-md-12 col-sm-12 size">
                                                        40.9K
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="market-1.248670031">
                                    <div class="row bg-gray-100 market-head">
                                        <div class="col-12"><strong>Over/Under 1.5 Goals</strong>
                                            &nbsp;
                                            <i class="fa fa-address-book"></i>
                                        </div>
                                    </div>
                                    <div id="runner-1221385" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Under 1.5 Goals</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-1221385" class="col-12 price">
                                                        10.5
                                                    </div>
                                                    <div id="bs3-1221385" class="col-12 size">
                                                        221
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-1221385" class="col-md-12 col-sm-12 price">
                                                        11
                                                    </div>
                                                    <div id="bs2-1221385" class="col-md-12 col-sm-12 size">
                                                        239
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-1221385" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        11.5
                                                    </div>
                                                    <div id="bs1-1221385" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        19
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-1221385" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        13
                                                    </div>
                                                    <div id="ls1-1221385" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        31
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-1221385" class="col-md-12 col-sm-12 price">
                                                        13.5
                                                    </div>
                                                    <div id="ls2-1221385" class="col-md-12 col-sm-12 size">
                                                        450
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-1221385" class="col-md-12 col-sm-12 price">
                                                        14
                                                    </div>
                                                    <div id="ls3-1221385" class="col-md-12 col-sm-12 size">
                                                        21
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-1221386" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Over 1.5 Goals</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-1221386" class="col-12 price">
                                                        1.06
                                                    </div>
                                                    <div id="bs3-1221386" class="col-12 size">
                                                        3.4K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-1221386" class="col-md-12 col-sm-12 price">
                                                        1.07
                                                    </div>
                                                    <div id="bs2-1221386" class="col-md-12 col-sm-12 size">
                                                        4.9K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-1221386" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        1.08
                                                    </div>
                                                    <div id="bs1-1221386" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        6.0K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-1221386" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        1.1
                                                    </div>
                                                    <div id="ls1-1221386" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        2.6K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-1221386" class="col-md-12 col-sm-12 price">
                                                        1.11
                                                    </div>
                                                    <div id="ls2-1221386" class="col-md-12 col-sm-12 size">
                                                        3.1K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-1221386" class="col-md-12 col-sm-12 price">
                                                        1.12
                                                    </div>
                                                    <div id="ls3-1221386" class="col-md-12 col-sm-12 size">
                                                        1.8K
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="market-1.248670027">
                                    <div class="row bg-gray-100 market-head">
                                        <div class="col-12"><strong>Over/Under 2.5 Goals</strong>
                                            &nbsp;
                                            <i class="fa fa-address-book"></i>
                                        </div>
                                    </div>
                                    <div id="runner-47972" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Under 2.5 Goals</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-47972" class="col-12 price">
                                                        3.8
                                                    </div>
                                                    <div id="bs3-47972" class="col-12 size">
                                                        93
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-47972" class="col-md-12 col-sm-12 price">
                                                        3.85
                                                    </div>
                                                    <div id="bs2-47972" class="col-md-12 col-sm-12 size">
                                                        1.6K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-47972" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        3.9
                                                    </div>
                                                    <div id="bs1-47972" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        218
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-47972" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        3.95
                                                    </div>
                                                    <div id="ls1-47972" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        7.5K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-47972" class="col-md-12 col-sm-12 price">
                                                        4.1
                                                    </div>
                                                    <div id="ls2-47972" class="col-md-12 col-sm-12 size">
                                                        325
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-47972" class="col-md-12 col-sm-12 price">
                                                        4.2
                                                    </div>
                                                    <div id="ls3-47972" class="col-md-12 col-sm-12 size">
                                                        561
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="runner-47973" class="row runners">
                                        <div class="col-7 col-md-4 runner-name"><!----> <strong>Over 2.5 Goals</strong>
                                            <br> <span><span class="position-plus"><strong></strong></span>
                                                <!----></span> <!---->
                                        </div>
                                        <div class="col-5 col-md-8 price">
                                            <div class="row">
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b3-47973" class="col-12 price">
                                                        1.31
                                                    </div>
                                                    <div id="bs3-47973" class="col-12 size">
                                                        962
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                                    <div id="b2-47973" class="col-md-12 col-sm-12 price">
                                                        1.32
                                                    </div>
                                                    <div id="bs2-47973" class="col-md-12 col-sm-12 size">
                                                        1.3K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-back">
                                                    <div id="b1-47973" class="col-12 price"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        1.33
                                                    </div>
                                                    <div id="bs1-47973" class="col-12 size"
                                                        style="background-color: rgb(227, 248, 255);">
                                                        23.4K
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-2 cta-lay">
                                                    <div id="l1-47973" class="col-md-12 col-sm-12 price"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        1.35
                                                    </div>
                                                    <div id="ls1-47973" class="col-md-12 col-sm-12 size"
                                                        style="background-color: rgb(255, 205, 204);">
                                                        2.0K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l2-47973" class="col-md-12 col-sm-12 price">
                                                        1.36
                                                    </div>
                                                    <div id="ls2-47973" class="col-md-12 col-sm-12 size">
                                                        4.0K
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                                    <div id="l3-47973" class="col-md-12 col-sm-12 price">
                                                        1.37
                                                    </div>
                                                    <div id="ls3-47973" class="col-md-12 col-sm-12 size">
                                                        718
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!----><!----><!----> <!---->
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
                                                    class="dropdown-item">Other Markets</a>
                                            </div>
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
                                        onclick="SHOWLIVE()" class="btn btn-primary btn-xs col">Score Card</button>
                                </div>
                                <div id="TVDIV" style="display: none;">
                                    <div class="card-body video-container">
                                        <div class="bets">
                                            <div id="VBox1" style="display: none;">
                                                <unrealhtml5videoplayer id="UnrealPlayer1"></unrealhtml5videoplayer>
                                                <video id="streamVideo1" width="465" autoplay="autoplay" playsinline=""
                                                    controls="controls" onloadedmetadata="OnMetadata()"></video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="TVDIVIFRAME"></div>
                                <div id="LIVEDIV" style="height: 165px;"><iframe id="livesc"
                                        src="https://bpexch.xyz/Common/LiveScoreCard?id=1.248670017"
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