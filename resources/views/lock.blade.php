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
                <a class="nav-link" href="/report.html">Reports</a>
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
                    <script>
                        window.searchConfig = {
                            isGlobalSearch: true,
                            showBettors: false
                        };
                    </script>

                    <div class="row">
                        <div class="col-12 col-md-6" id="eventresults">
                            <style>
                                .bigcb {
                                    width: 20px;
                                    height: 20px;
                                    margin-bottom: 10px;
                                }

                                @media screen and (max-width: 635px) {
                                    .editsbmtbtn {
                                        margin: auto;
                                        margin-top: 5px;
                                        margin-right: 15px;
                                        text-align: end;
                                    }
                                }
                            </style>
                            <div class="card">
                                <div class="card-header">
                                    <strong>Allowed Market Types (Rana19470)</strong>
                                </div>
                                <div class="card-body" id="betlockcardbody" style="padding-left:40px;">
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="12|EVENT_TYPE_ID|12" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>All Casino</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|BETPRO" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            TeenPatti Studio </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|DreamCasino" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Royal Casino </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|ExGames" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Betfair Games </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|FAWK" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Star Casino </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|Galaxy" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Galaxy Casino </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|SAP" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Sports Book </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|SuperNova" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Super Nowa </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="4|EVENT_TYPE_ID|4" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Cricket</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|FIGURE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Figure </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|LOCAL_FANCY" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Fancy </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|MATCH_ODDS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Match Odds </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|ODD_FIGURE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Even / Odd </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|TOSS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Toss </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|TOURNAMENT_WINNER" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Cup Winner </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="4339|EVENT_TYPE_ID|4339" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Greyhound</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4339|COUNTRY|AU" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Australia </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4339|COUNTRY|GB" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Britian </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4339|COUNTRY|NZ" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            New Zealand </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="7|EVENT_TYPE_ID|7" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Horse Race</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|AE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Dubai </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|AU" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Australia </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|BH" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Bahrain </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|FR" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            France </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|GB" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            England </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY_&amp;_MARKET_TYPE|GB_&amp;_PLACE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            England (PLACE) </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|IE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Ireland </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY_&amp;_MARKET_TYPE|IE_&amp;_PLACE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Ireland (PLACE) </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|NZ" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            New Zealand </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|SE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Sweden </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|SG" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Singapore </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|US" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            America </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|ZA" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Africa </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="1|EVENT_TYPE_ID|1" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Soccer</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="1|MARKET_TYPE|MATCH_ODDS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Match Odds </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="1|MARKET_TYPE_GROUP|OVER_UNDER" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Over/Under Goals </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="2|EVENT_TYPE_ID|2" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Tennis</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="2|MARKET_TYPE|MATCH_ODDS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Match Odds </label>
                                    </div>
                                    <br>
                                    <div class="editsbmtbtn">
                                        <input type="button" class="btn btn-primary" id="betlocksavebtnn" value="Save"
                                            onclick="LoadList();">
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
                    style="position: relative; overflow: hidden; float: left; font: bold 10px Verdana; list-style-type: none; margin: 0px; padding: 0px; width: 425.078px; transition-timing-function: linear; transition-duration: 1.96844s; left: -98.4219px;">

                    <li class="ticker-spacer"
                        style="float: left; width: 98.422px; height: 25px; white-space: nowrap; padding: 0px 7px; line-height: 25px;">
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
    <script src="/js/site.min.js?10900"></script>
    <script src="/js/bof.js?10900"></script>

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
    <script src="/js/src/client-locales.js?10900"></script>


    <script>
        function getUidIfChecked() {
            const checkbox = document.querySelector('ol.breadcrumb input[type="checkbox"]');

            if (checkbox && checkbox.checked) {
                const listItems = document.querySelectorAll('ol.breadcrumb > li');

                const checkboxLiIndex = Array.from(listItems).findIndex(li => li.contains(checkbox));

                if (checkboxLiIndex > 0) {
                    const previousLi = listItems[checkboxLiIndex - 1];
                    const span = previousLi.querySelector('span');
                    return span ? span.id.replace('u-', '') : null;
                }
            }

            return null;
        }

        function loadByUser() {
            toggleProgressBar();

            let uid = getUidIfChecked();

            showeventprops(uid);
        }

        function showeventprops(uid) {
            // var qs = "sportId=" + Enenttype;

            let qs = "";
            if (uid) {
                qs = "uid=" + uid;
            }

            $.ajax({
                type: 'GET',
                url: "/Markets/BetLocker/?handler=Fetchprops&" + qs,
                success: function (result) {
                    document.getElementById("eventresults").innerHTML = result;
                },
                error: function (exception) {
                }
            });
        }

        function LoadList() {
            document.getElementById("betlocksavebtnn").disabled = true;
            var favorite = [];
            $.each($("input[name='subprops']:not(:checked)"), function () {
                favorite.push($(this).val());
            });

            let uid = getUidIfChecked();
            let qs = '';

            if (uid) {
                qs = "uid=" + uid + "&";
            }

            var data = favorite.join(", ").toString();

            qs += "keyvalue=" + encodeURIComponent(data);

            $.ajax({
                type: 'GET',
                url: "/Markets/BetLocker/?handler=Savedata&" + qs,
                success: function (result) {
                    toastr.success("Saved successfully.");

                    loadByUser();
                },
                error: function (exception) {
                }
            });
        };

        function toggleProgressBar() {
            document.getElementById("betlockcardbody").innerHTML = "<h3 style='text-align:center'>Loading...</h3>";
        }

        $(document).ready(function () {
            showeventprops(null);
        });
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
        data-cf-beacon="{&quot;rayId&quot;:&quot;98bd09520842f9ec&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}"
        crossorigin="anonymous"></script>

</body>
<ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front"
    style="display: none;"></ul>
<div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
</body>

</html>