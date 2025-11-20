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
    <title>@yield('title', 'Dashboard') | BetPro</title>
    <link rel="shortcut icon" href="/img/favicon/BetPro.ico">
    <link rel="stylesheet" href="/css/all.css" />
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/css/site.min.css?10900" rel="stylesheet" />
    <link href="/css/BetPro-style.css?10900" rel="stylesheet" />
    @yield('styles')
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
            <a href="/">
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
                <a class="nav-link" href="/">Dashboard</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/users">Users</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/report">Reports</a>
            </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item px-2">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Admin User <i class="fas fa-caret-down"></i>
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
                        <a class="nav-link" href="/">
                            <i class="nav-icon fas fa-tachometer-alt fa-inverse"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">
                            <i class="nav-icon fas fa-users fa-inverse"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/position">
                            <i class="nav-icon fas fa-funnel-dollar fa-inverse"></i> Current Position
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/report">
                            <i class="nav-icon fas fa-money-check fa-inverse"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lock">
                            <i class="nav-icon fas fa-unlock-alt fa-inverse"></i> Bet Lock
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/star">
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
                                <a class="nav-link" href="/soccer">
                                    Malta v Netherlands </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/soccer">
                                    Belarus v Denmark </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/soccer">
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
                                <a class="nav-link" href="/tennis">
                                    Rinderknech v F Auger-Aliassime </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tennis">
                                    Medvedev v Alex de Minaur </a>
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
                                <a class="nav-link" href="/cricket">
                                    Pakistan v South Africa </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cricket">
                                    India v West Indies </a>
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
                                <a class="nav-link" href="/horse">
                                    <span class="slidedate market-time">11:50 AM</span>
                                    <span class="slidename">
                                        Cloncurry (AU)
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
                                <a class="nav-link" href="/hound">
                                    <span class="slidedate market-time">11:52 AM</span>
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
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    @yield('scripts')
</body>

</html>
