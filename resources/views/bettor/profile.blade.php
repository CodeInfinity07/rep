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

    <title>Profile | BETGURU</title>
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
                    <a href="/">
                        <span class="green-logo-text">BETGURU</span>
                    </a>
                </div>
                <div class="divider"></div>
                <div class="sidebar-menu" style="height:100%;">
                    <ul>
                        <li>
                            <a href="/"><i class=""></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="/cricket"><i class=""></i> <span>Cricket</span></a>
                        </li>
                        <li>
                            <a href="/soccer"><i class=""></i> <span>Soccer</span></a>
                        </li>
                        <li>
                            <a href="/tennis"><i class=""></i> <span>Tennis</span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-lg-10" id="page-content">
                <div class="main-header">
                    <div class="logo-bar-mobile d-md-none">
                        <a href="/">
                            <span class="green-logo-text">BETGURU</span>
                        </a>
                    </div>

                    <div class="dropdown-wrap">
                        <div class="dropdown">

                            <div class="designation">
                                <span class="wallet-balance">B: Rs. {{ number_format($balance ?? 0, 2) }}</span>
                                <span class="wallet-exposure"> | L: {{ number_format($liable ?? 0, 2) }}</span>
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
    .field-validation-error{
        display:inline-block;
        width:33vw;
    }

    .switch-container {
        display: flex;
        align-items: center;
        flex-direction: row;
        justify-content: center;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 55px;
        height: 25px;
        margin-left: 10px;
    }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: red;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
    }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: #ffffff;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

    input:checked + .slider {
        background-color: #3ed300;
    }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

    .switch-container p{
        font-size:20px;
        color:black;
        font-family:none;
    }

    .fa-key {
        margin-top: -13px;
        padding-right: 5px;
    }

    @media screen and (max-width: 635px) {
        .field-validation-error {
            display: inline-block;
            width: 100%;
        }

        .switch-container p {
            font-size: 15px;
        }
    }


</style>


<div class="table-wrap ">
    <div class="col-12 col-md-12">
        <div class="modal fade modalCasinoToS" id="modalRedirectToLogout" tabindex="-11" role="dialog" aria-labelledby="modalPasswordChange" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Password Changed Successfully</h5>
                    </div>
                    <div id="casino-tos-text" class="modal-body">
                        <p>
                            </p><center>
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
    </div>
</div>

    <div class="table-wrap ">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Profile</strong>
                </div>
                <div class="card-body">
                    <form method="post" action="/Customer/Profile">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="stake1">Stake1</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="stake1" name="stake1" value="2000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="stake2">Stake2</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="stake2" name="stake2" value="5000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="stake3">Stake3</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="stake3" name="stake3" value="10000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="stake4">Stake4</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="stake4" name="stake4" value="25000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>
                                <div style="display: none;">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="stake5">Stake5</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" id="stake5" name="stake5" value="50000">
                                            <span class="field-validation-valid"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="stake6">Stake6</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" id="stake6" name="stake6" value="100000">
                                            <span class="field-validation-valid"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="plus1">Plus1</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="plus1" name="plus1" value="1000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="plus2">Plus2</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="plus2" name="plus2" value="5000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="plus3">Plus3</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="plus3" name="plus3" value="10000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="plus4">Plus4</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="plus4" name="plus4" value="25000">
                                        <span class="field-validation-valid"></span>
                                    </div>
                                </div>

                                <div style="display: none;">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="plus5">Plus5</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" id="plus5" name="plus5" value="50000">
                                            <span class="field-validation-valid"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="plus6">Plus6</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" id="plus6" name="plus6" value="100000">
                                            <span class="field-validation-valid"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                    <button class="btn btn-danger" type="button">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="table-wrap">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Change Password</strong>
            </div>
            <div class="card-body">
                <form method="post" action="/Customer/ChangePassword">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="NewPassword">New Password</label>
                                <div class="col-md-6">
                                    <input value="" class="form-control" required="" type="password" id="NewPassword" maxlength="30" name="NewPassword" pattern="^(?=.*\d)(?=.*[a-zA-Z]).{8,30}$" title="Password must be 8-30 characters and contain both letters and numbers">
                                    <span class="field-validation-valid"></span>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="table-wrap">
    <div class="table-wrap col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Two Factor Authentication</strong>
            </div>
            <div class="card-body">
                    <div class="switch-container">
                        <i class="fa fa-key" aria-hidden="true"></i><p>Two factor authentication (2FA) is <strong> DISABLED </strong> for this account:</p>
                    </div>
                    <div style="" class="switch-container" id="switchbtndiv">
                        <p>Enable two factor authentication</p>
                        <label class="switch">
                            <input onclick="Mainswitch()" type="checkbox" id="mySwitch">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div id="RenderQRModal"></div>
            </div>
        </div>
    </div>
</div>
<script src="/lib/kjua/kjua.min.js"></script>

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

                <div style="width: 100%; margin-top: 0.5%; margin-bottom: 0.5%; display: inline-flex; align-items: center; justify-content: center;">
                    <span style="font-size: 17px; margin-left: 2px;"><b>BETGURU</b></span>
                </div>
                <div>
                    <p style="margin-bottom: 5px;">
                        <a href="/Common/TermsCondition/" target="_blank" style="color:white">Terms and Conditions</a> |
                        <a href="/Common/ResponsibleGaming/" target="_blank" style="color:white">Responsible Gaming</a>
                    </p>
                </div>
            </center>
        </div>
    </footer>

    <script src="/dist/bundle0a.js?11700"></script>
    <script src="/js/slick.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const preloader = document.getElementById('page-preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 300);
            }
        });

        function ReLogin() {
            window.location.href = '/logout';
        }

        function Mainswitch() {
            alert('Two-factor authentication feature coming soon!');
        }
    </script>

</body>

</html>
