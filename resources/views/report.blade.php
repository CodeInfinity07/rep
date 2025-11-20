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
                <div class="loader" style="display: none;"><img src="/img/loadinggif.gif"></div>
                <div class="animated fadeIn">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css">
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


                    <style>
                        @media screen and (max-width: 635px) {
                            .reportmenubuttons {
                                text-align: center;
                            }
                        }
                    </style>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-filter"></i>
                                    <strong>Report Type</strong>
                                </div>
                                <div class="card-body reportmenubuttons">
                                    <a href="/report.html" id="book-detail" class="btn btn-primary">
                                        Book Detail
                                    </a>
                                    <a href="/Reports/Detail2" id="book-detail-2" class="btn btn-outline-primary">
                                        Book Detail 2
                                    </a>
                                    <a href="/Reports/DailyPl" id="dailyPl" class="btn btn-outline-primary">
                                        Daily PL
                                    </a>
                                    <a href="/Reports/Daily" id="daily" class="btn btn-outline-primary">
                                        Daily Report
                                    </a>
                                    <a href="/Reports/FinalSheet" id="final-sheet" class="btn btn-outline-primary">
                                        Final Sheet
                                    </a>
                                    <a href="/Accounts/Chart?MID=0" id="ledger" class="btn btn-outline-primary">
                                        Accounts
                                    </a>
                                    <a href="/Reports/Commission" id="commission" class="btn btn-outline-primary">
                                        Commission Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-filter"></i>
                                    <strong>Report Filter</strong>
                                </div>
                                <div class="card-body">
                                    <form id="ReportFilterForm" class="form-inline" method="post">
                                        <div class="row" style="text-align-last:justify;">
                                            <div class="col-12 col-md-5">
                                                <div class="input-group date" id="ReportFrom"
                                                    data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#ReportFrom" value="10/10/2025 12:00 AM"
                                                        id="DisplayFrom">
                                                    <div class="input-group-append" data-target="#ReportFrom"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="market-time d-none">10/10/2025 12:00 AM</span>
                                                <span class="d-none utctime" data-nofirst="1"
                                                    data-format="M/D/YYYY h:mm A">
                                                    2025-10-09T19:00:00.0000000Z
                                                </span>
                                                <input type="hidden" name="From" id="From"
                                                    value="2025-10-09T19:00:00.0000000Z">
                                            </div>

                                            <strong style="margin:auto">&nbsp;-&nbsp;</strong>
                                            <div class="col-12 col-md-5">
                                                <div class="input-group date" id="ReportTo" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#ReportTo" value="10/10/2025 11:59 PM"
                                                        id="DisplayTo">
                                                    <div class="input-group-append" data-target="#ReportTo"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="market-time d-none">10/10/2025 11:59 PM</span>
                                                <span class="d-none utctime" data-nofirst="1"
                                                    data-format="M/D/YYYY h:mm A">
                                                    2025-10-10T18:59:59.0000000Z
                                                </span>
                                                <input type="hidden" name="To" id="To"
                                                    value="2025-10-10T18:59:59.0000000Z">
                                            </div>

                                            <div class="form-group"
                                                style="margin: auto;margin-top: 5px; margin-right:15px;">
                                                <button class="btn btn-sm btn-primary" type="submit"
                                                    onclick="return updateDates();">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>

                                            <input type="hidden" data-val="true"
                                                data-val-required="The CurrentAccountId field is required."
                                                id="CurrentAccountId" name="CurrentAccountId" value="0">
                                            <input type="hidden" data-val="true"
                                                data-val-required="The ClientId field is required." id="ClientId"
                                                name="ClientId" value="0">
                                            <input type="hidden" data-val="true"
                                                data-val-required="The EventTypeId field is required." id="EventTypeId"
                                                name="EventTypeId" value="0">
                                            <input type="hidden" id="IsFirstVisit" value="True">
                                        </div>
                                        <input name="__RequestVerificationToken" type="hidden"
                                            value="CfDJ8L0cOpiErPZOv5zWLoSoHduu8KPdEV9NDRPm_oNmYYN0feAJG-RPZfADeGC1yrVqJ479F2SS4lI9XvQ33tbZyLzERM6vQZVFeb1bF-U0P24xymmKdH8kGF66gxE4vcRhcBrTeSTkfP6ew6CE6vvqwHyWjJ42BSu8la1P3eD7Z_9H3nKcwrH5LTwFOkWSchxinw">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="report-book-detail">
                        <div class="col-12 col-md-6"></div>
                        <div class="col-12 col-md-6">
                            <div class="col-12"></div>
                            <div class="col-12"></div>
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
    <script src="js/signalr/dist/browser/signalr.js"></script>


    <script src="js/vue.min.js"></script>
    <script src="https://unpkg.com/vuex@3.1.3/dist/vuex.min.js"></script>
    <script src="js/site.min.js?10900"></script>
    <script src="js/bof.js?10900"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-C1WVLP1K0K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('set', { 'user_id': 'Rana19470' });
        gtag('config', 'G-C1WVLP1K0K');
    </script>


    <script type="text/javascript" src="js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/src/client-locales.js?10900"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/ReportViewer.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#ReportFilterForm button').click(function (e) {
                e.preventDefault();

                rv.fetchMainReport();
            });

            let rv = new ReportViewer("#report-book-detail", "/report.html", "BookDetail", "SportsWise", "MarketsReports");
        });

        // for backwards compatibility
        function popup_report() {
            return true;
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
        data-cf-beacon="{&quot;rayId&quot;:&quot;98bd07ae2e6dfa00&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}"
        crossorigin="anonymous"></script>

</body>
<ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front"
    style="display: none;"></ul>
<div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
</body>

</html>