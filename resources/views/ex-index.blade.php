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
    <title>Dashboard | BetPro</title>
    <!-- Icons-->
    <link rel="shortcut icon" href="/img/favicon/BetPro.ico">
    <link rel="stylesheet" href="css/all.css" />
    <link href="css/style.css" rel="stylesheet" />
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

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
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
                <a class="nav-link" href="/index.html">Dashboard</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/users.html">Users</a>
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
                    <strong>B:</strong> <span class="wallet-balance"> </span>
                    <strong>Exp:</strong> <span class="wallet-exposure"></span>
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
                        .rightMenu {
                            position: absolute;
                            float: right;
                            top: 0;
                            left: 160px;
                        }

                        .bcicustom {
                            float: left;
                            margin: auto 0px;
                        }

                        .bccustom2 {
                            margin-top: -6px;
                        }

                        @media screen and (max-width: 635px) {
                            #breadcrumbcustom {
                                margin-top: -16px;
                            }
                        }

                        .blink_me {
                            animation: blinker 1s linear infinite;
                        }

                        @keyframes blinker {
                            50% {
                                opacity: 0.3;
                            }
                        }
                    </style>

                    <div>
                        <div class="modal fade modalCasinoToS" data-backdrop="static" data-keyboard="false"
                            id="modalPasswordChange" tabindex="-10" role="dialog" aria-labelledby="modalPasswordChange"
                            aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Your Password</h5>
                                    </div>
                                    <div id="casino-tos-text" class="modal-body">
                                        <p>
                                            <center>
                                                <h3 class="text-danger blink_me">
                                                    Change Your Password
                                                    <i class='fa fa-warning'></i>
                                                </h3>
                                            </center>
                                        </p>
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
                            aria-labelledby="modalPasswordChange" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Password Changed Successfully</h5>
                                    </div>
                                    <div id="casino-tos-text" class="modal-body">
                                        <p>
                                            <center>
                                                <h3 class="text-danger blink_me">
                                                    Password Changed Successfully
                                                    <i class="fa fa-check" style="font-size:48px;color:forestgreen"></i>
                                                </h3>
                                            </center>
                                        </p>
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

                        <div class="card col-12" id="Usersearchcustom">
                            <div class="card-header">
                                <i class="fa fa-filter"></i>
                                <strong>Search-Users</strong>
                            </div>
                            <div class="card-body" style="padding-bottom:0px; margin:0px;">
                                <div class="row" id="searchUsers">
                                    <div class="col-md-6 col-12">
                                        <form class="form-horizontal" v-on:submit.prevent="search" autocomplete="off">
                                            <div class="form-group row">
                                                <div class="col-12 autocomplete">
                                                    <div class="input-group">
                                                        <div class="inputWithIcon" style="width:30vw;">
                                                            <input class="form-control" type="search"
                                                                placeholder="Username" v-model="query" id="myInput">
                                                        </div>
                                                        <span class="input-group-prepend">
                                                            <button id="myBtn" class="btn btn-primary" type="button"
                                                                v-on:click="search">
                                                                <i class="fa fa-search"></i> Search
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-6 col-12" style="padding: 0px; height: 65px;">
                                        <img src="/img/preloader.gif" v-show="isLoading" style="height:20px;" />
                                        <nav aria-label="breadcrumb" class="col-12 bccustom2" id="breadcrumbcustom"
                                            v-show="!isLoading && users.length > 0">
                                            <ol class="breadcrumb" style="max-height:40px;">
                                                <li class="breadcrumb-item bcicustom" v-for="(user, index) in users">

                                                    <a target="_blank" :href="'/Accounts?MID=' + user.id"
                                                        v-if="user.type !== 4">{{ user.username }}</a>
                                                    <a target="_blank" :href="'/Users/Edit?id=' + user.id"
                                                        v-if="user.type === 4">{{ user.username }}</a>


                                                    <div class="btn-group"
                                                        v-if="index == Object.keys(users).length - 1">
                                                        <a onclick="POPUPWINDOW('/Accounts/Cash?id=' ,user.id)"
                                                            v-on:click="POPUPWINDOW('/Accounts/Cash?id=' ,user.id)"
                                                            v-if="index == Object.keys(users).length - 1"
                                                            class="btn btn-warning"><strong>C</strong></a>
                                                        <a v-if="index == Object.keys(users).length - 1" target="_blank"
                                                            :href="'/Users/Edit?id='+user.id" class="btn btn-primary"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="POPUPWINDOW('/accounts/L2?id=' ,user.id)"
                                                            v-on:click="POPUPWINDOW('/accounts/L2?id=' ,user.id)"
                                                            v-if="index == Object.keys(users).length - 1"
                                                            class="btn btn-info"> <strong>L</strong></a>
                                                    </div>
                                                </li>

                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="Bookmarkets">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            Sport Highlights
                                        </strong>
                                        <a class="btn btn-sm btn-primary" href="/">
                                            <strong>Refresh</strong>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Soccer</th>
                                                    <th style="width: 20%">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248688268">Austria v San Marino /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        1,244,958
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248800415">Bangladesh v Hong Kong /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        15,744
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248582889">Belarus v Denmark / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        1,106,971
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248819043">Bochum v Alemannia Aachen /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        10,124
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248599237">Botswana v Uganda / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        25,713
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248598030">Burundi v Kenya / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        8,504
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248715308">Chernomorets Odesa v FC
                                                                Viktoriya Sumy / Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        32,354
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248560965">Cyprus v Bosnia / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        155,812
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248562670">Czechia v Croatia / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        303,715
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248673100">England v Wales / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        321,508
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248561094">Faroe Islands v Montenegro
                                                                / Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        99,815
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248568509">Ferroviaria v Chapecoense /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        10,730
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248562562">Finland v Lithuania / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        536,441
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248800523">Lebanon v Bhutan / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        55,207
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248598228">Liberia v Namibia / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        80,070
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248598353">Malawi v Equatorial Guinea
                                                                / Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        14,678
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248669909">Malta v Netherlands / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        1,642,317
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248766085">Morocco v Bahrain / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        13,480
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248597154">Mozambique v Guinea / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        15,661
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248707219">Poland v New Zealand /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        19,643
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248707348">Romania v Moldova / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        11,397
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248794856">Scotland U21 v Gibraltar
                                                                U21 / Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        21,265
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248562388">Scotland v Greece / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        271,424
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248805202">Singapore v India / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        18,382
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248771973">Somalia v Algeria / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        33,933
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248805100">Sri Lanka v Turkmenistan /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        60,380
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248718959">USA U20 v Italy U20 / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        20,212
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248800199">Vietnam v Nepal / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        13,323
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Tennis</th>
                                                    <th style="width: 20%">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248792238">Bencic v Iga Swiatek /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        151,864
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248772556">Hol Rune v Vacherot / Match
                                                                Odds</a>
                                                            <i class="fa fa-circle position-plus"></i>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        26,876,764
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248811890">L Noskova v E Rybakina /
                                                                Match Odds</a>
                                                            <i class="fa fa-circle position-plus"></i>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        5,353,345
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248813099">Mar Carle v Te Kostovic /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248814122">Medvedev v Alex de Minaur /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        101,126
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248771363">Ole Oliynykova v Lol
                                                                Radivojevic / Match Odds</a>
                                                            <i class="fa fa-circle position-plus"></i>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        127,869
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248808912">Rinderknech v F
                                                                Auger-Aliassime / Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        16,023
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248799507">S Zhang v C Gauff / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        142,719
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248818357">So Sierra v Gorgodze /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248765821">Ziz Bergs v Djokovic /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        1,100,833
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Cricket</th>
                                                    <th style="width: 20%">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248776739">England W v Sri Lanka W /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        25,006
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248622840">India v West Indies / Match
                                                                Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        2,076,708
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248715085">India W v South Africa W /
                                                                Match Odds</a>
                                                            <i class="fa fa-circle position-plus"></i>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        2,158,295
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248776813">New Zealand W v Bangladesh
                                                                W / Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        30,416
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5>
                                                            <a href="/Markets/#!1.248474875">Pakistan v South Africa /
                                                                Match Odds</a>
                                                        </h5>
                                                    </td>
                                                    <td class="position-plus">
                                                        330,973
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
        </main>
    </div>

    <div class="modal fade" id="modalMarketRules" tabindex="-1" role="dialog" aria-labelledby="modalMarketRules"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Market Rules</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="market-rules-text" class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <footer class="app-footer">
        <ul id="news-ticker-foot">
            <li data-update="item1">Welcome to BetPro</li>
        </ul>
    </footer>
    <!-- CoreUI and necessary plugins-->

    <script type="text/javascript" src="https://wurfl.io/wurfl.js"></script>
    <script src="/js/signalr/dist/browser/signalr.js"></script>


    <script src="js/vue.min.js"></script>
    <script src="https://unpkg.com/vuex@3.1.3/dist/vuex.min.js"></script>
    <script src="js/site.min.js?10900"></script>
    <script src="js/bof.js?10900"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C1WVLP1K0K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('set', { 'user_id': 'Rana19470' });
        gtag('config', 'G-C1WVLP1K0K');
    </script>


    <script type="text/javascript" src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/js/src/client-locales.js?10900"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {


            showNewsFlash();

            myFunction2();
            setInterval(myFunction2, 60000);
        });

        function myFunction2() {
            $.ajax({
                type: "GET",
                url: "/Index?handler=Markets",
                success: function (result) {
                    document.getElementById("Bookmarkets").innerHTML = result;
                    convertAllToClientTime();
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    if (errorThrown == "Unauthorized") {
                        document.location.href = "/Users/Login";
                    }
                }
            });
        };

        function AcceptPassword() {
            var newpass = document.getElementById("Newpasswordmodal").value;
            $.ajax({
                type: "GET",
                url: "/Common/Profile?handler=UpdatePassword&NewPassword=" + newpass,
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
            location.href = "/Common/Logout";
        }

        $(function () {
            $("#myInput")
                .on("keydown", function (event) {
                    if (event.keyCode != 13 && event.keyCode != 8) {
                        // document.getElementById('smloading').style.display = 'block';
                        if (event.keyCode === $.ui.keyCode.TAB &&
                            $(this).autocomplete("instance").menu.active) {
                            event.preventDefault();
                        }
                    } else {
                        // document.getElementById('smloading').style.display = 'none';
                    }
                    var ib = document.getElementById("myInput").value;
                    if (ib.length == 0) {
                        //  document.getElementById('smloading').style.display = 'none';
                    }

                })
                .autocomplete({
                    source: function (request, response) {
                        // /api/users/searchUsers
                        $.getJSON("/api/v2/users", {
                            q: request.term
                        }, response);

                    },
                    search: function () {
                        // custom minLength
                        var term = this.value;
                        if (term.length < 3) {
                            return false;
                        }
                    },
                    focus: function () {
                        // document.getElementById('smloading').style.display = 'none';
                        // prevent value inserted on focus
                        // return false;
                    },
                    select: function (event, ui) {
                        if (searchVM != "undefined") {
                            searchVM.query = ui.item.value;
                            //  document.getElementById('smloading').style.display = 'none';
                        }
                    }

                });


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
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"98bce8b0ead8f9ee","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.9.1","token":"412e616bee9c418bbf775c35ab07c6d0"}'
        crossorigin="anonymous"></script>
</body>

</html>