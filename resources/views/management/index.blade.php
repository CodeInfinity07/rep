@extends('layouts.management')

@section('title', 'Dashboard')

@section('styles')
<link rel="stylesheet" href="/lib/ckeditor/ckeditor5.css">
@endsection

@section('content')
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
                                        <form class="form-horizontal" autocomplete="off">
                                            <div class="form-group row">
                                                <div class="col-12 autocomplete">
                                                    <div class="input-group">
                                                        <div class="inputWithIcon" style="width:30vw;">
                                                            <input class="form-control" type="search"
                                                                placeholder="Username" id="myInput">
                                                        </div>
                                                        <span class="input-group-prepend">
                                                            <button id="myBtn" class="btn btn-primary" type="button">
                                                                <i class="fa fa-search"></i> Search
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-6 col-12" style="padding: 0px; height: 65px;">
                                        <nav aria-label="breadcrumb" class="col-12 bccustom2" id="breadcrumbcustom">
                                            <ol class="breadcrumb" style="max-height:40px;">
                                                <li class="breadcrumb-item bcicustom">
                                                    <a target="_blank" href="/Accounts?MID=123">SuperMaster</a>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-warning"><strong>C</strong></a>
                                                        <a target="_blank" href="/Users/Edit?id=123" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" class="btn btn-info"><strong>L</strong></a>
                                                    </div>
                                                </li>
                                            </ol>
                                        </nav>
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
                                            <tbody id="soccer-data">
                                                <tr>
                                                    <td colspan="2" class="text-center">
                                                        <img src="/img/preloader.gif" style="height:20px;" alt="Loading..."/>
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
                                            <tbody id="tennis-data">
                                                <tr>
                                                    <td colspan="2" class="text-center">
                                                        <img src="/img/preloader.gif" style="height:20px;" alt="Loading..."/>
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
                                            <tbody id="cricket-data">
                                                <tr>
                                                    <td colspan="2" class="text-center">
                                                        <img src="/img/preloader.gif" style="height:20px;" alt="Loading..."/>
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

@endsection

@section('scripts')
    <script>
        function formatNumber(num) {
            return new Intl.NumberFormat('en-US').format(num);
        }

        function loadSportsData() {
            fetch('/api/sports-data')
                .then(response => response.json())
                .then(data => {
                    const soccerTbody = document.getElementById('soccer-data');
                    const tennisTbody = document.getElementById('tennis-data');
                    const cricketTbody = document.getElementById('cricket-data');
                    
                    if (!soccerTbody || !tennisTbody || !cricketTbody) {
                        console.error('Missing table elements!');
                        return;
                    }
                    
                    soccerTbody.innerHTML = '';
                    tennisTbody.innerHTML = '';
                    cricketTbody.innerHTML = '';
                    
                    if (data.soccer && data.soccer.length > 0) {
                        data.soccer.forEach((match, index) => {
                            const amount = match.totalMatched > 0 ? formatNumber(match.totalMatched) : '';
                            const row = `
                                <tr>
                                    <td>
                                        <h5>
                                            <a href="/Markets/#!${match.marketId}">${match.marketName} / Match Odds</a>
                                            ${match.inplay ? '<i class="fa fa-circle position-plus"></i>' : ''}
                                        </h5>
                                    </td>
                                    <td class="position-plus">${amount}</td>
                                </tr>
                            `;
                            soccerTbody.innerHTML += row;
                        });
                    } else {
                        soccerTbody.innerHTML = '<tr><td colspan="2" class="text-center">No live soccer matches available</td></tr>';
                    }
                    
                    if (data.tennis && data.tennis.length > 0) {
                        data.tennis.forEach(match => {
                            const amount = match.totalMatched > 0 ? formatNumber(match.totalMatched) : '';
                            const row = `
                                <tr>
                                    <td>
                                        <h5>
                                            <a href="/Markets/#!${match.marketId}">${match.marketName} / Match Odds</a>
                                            ${match.inplay ? '<i class="fa fa-circle position-plus"></i>' : ''}
                                        </h5>
                                    </td>
                                    <td class="position-plus">${amount}</td>
                                </tr>
                            `;
                            tennisTbody.innerHTML += row;
                        });
                    } else {
                        tennisTbody.innerHTML = '<tr><td colspan="2" class="text-center">No live tennis matches available</td></tr>';
                    }
                    
                    if (data.cricket && data.cricket.length > 0) {
                        data.cricket.forEach(match => {
                            const amount = match.totalMatched > 0 ? formatNumber(match.totalMatched) : '';
                            const row = `
                                <tr>
                                    <td>
                                        <h5>
                                            <a href="/Markets/#!${match.marketId}">${match.marketName} / Match Odds</a>
                                            ${match.inplay ? '<i class="fa fa-circle position-plus"></i>' : ''}
                                        </h5>
                                    </td>
                                    <td class="position-plus">${amount}</td>
                                </tr>
                            `;
                            cricketTbody.innerHTML += row;
                        });
                    } else {
                        cricketTbody.innerHTML = '<tr><td colspan="2" class="text-center">No live cricket matches available</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error loading sports data:', error);
                    document.getElementById('soccer-data').innerHTML = '<tr><td colspan="2" class="text-center text-danger">Error loading data</td></tr>';
                    document.getElementById('tennis-data').innerHTML = '<tr><td colspan="2" class="text-center text-danger">Error loading data</td></tr>';
                    document.getElementById('cricket-data').innerHTML = '<tr><td colspan="2" class="text-center text-danger">Error loading data</td></tr>';
                });
        }

        // Use try-catch to ensure errors from other scripts don't break this
        try {
            // Load data immediately when script runs
            setTimeout(function() {
                loadSportsData();
                setInterval(loadSportsData, 30000);
            }, 100);
        } catch (e) {
            console.error('Error initializing sports data loader:', e);
        }
        
        // Also try on DOMContentLoaded as backup
        document.addEventListener('DOMContentLoaded', function() {
            try {
                loadSportsData();
            } catch (e) {
                console.error('Error on DOMContentLoaded:', e);
            }
        });
    </script>
@endsection
