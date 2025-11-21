<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sports Trading Platform">
    <meta name="keyword" content="sports trading, bet, betfair">
    <meta name="robots" content="noindex">

    <link rel="shortcut icon" href="/img/favicon/BetPro.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/img/sprites/css/sprite.css">
    <link rel="stylesheet" href="/dist/site.css?112100">
    <link href="/css/BetPro-style.css?112100" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>@yield('title', 'BetPro')</title>

    <style>
        .body {
            min-height: 91.7vh;
        }
    </style>
    
    @stack('styles')
</head>

<body class="bg-gray d-flex flex-column menu-collapsed">
    <div class="main-page">
        <div class="row no-gutters">
            <div class="col-md-3 col-lg-2" id="sidebar">
                <div class="logo-bar">
                    <a href="/">
                        <span class="green-logo-text">BetPro</span>
                    </a>
                </div>
                <div class="divider"></div>
                <div class="sidebar-menu" style="height:100%;">
                    <ul>
                        <ul class="nav">
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
                        </ul>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="top-bar">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-6 col-sm-6 col-md-6">
                                <div class="nav-toggle"><i class="material-icons">menu</i></div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6">
                                <div class="d-flex justify-content-end">
                                    <div class="dropdown userDropdown">
                                        <button class="btn dropdown-toggle p-0" type="button" id="userMenu"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <strong>{{ strtoupper(Auth::user()->username) }}</strong>
                                            <span class="TMFORDESK">(Bettor)</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Load sidebar menus
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/cricket-matches')
                .then(response => response.json())
                .then(data => {
                    populateSidebarMenus(
                        data.matches.filter(m => m.sportType === 'cricket'),
                        data.matches.filter(m => m.sportType === 'soccer'),
                        data.matches.filter(m => m.sportType === 'tennis')
                    );
                })
                .catch(error => console.error('Error loading sidebar menus:', error));
        });

        function populateSidebarMenus(cricketMatches, soccerMatches, tennisMatches) {
            const cricketMenu = document.getElementById('sidebar-cricket-menu');
            const soccerMenu = document.getElementById('sidebar-soccer-menu');
            const tennisMenu = document.getElementById('sidebar-tennis-menu');
            
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

        // Menu toggle
        $(document).ready(function() {
            $('.nav-toggle').click(function() {
                $('#sidebar').toggleClass('menu-collapsed');
                $('body').toggleClass('menu-collapsed');
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
