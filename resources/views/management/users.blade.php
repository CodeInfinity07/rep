@extends('layouts.management')

@section('title', 'Users')

@section('content')
                <div class="animated fadeIn">


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
                                    <a href="/Reports/BookDetail" id="book-detail" class="btn btn-outline-primary">
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
                                    <a href="/Accounts/Chart?MID=0" id="ledger" class="btn btn-primary">
                                        Accounts
                                    </a>
                                    <a href="/Reports/Commission" id="commission" class="btn btn-outline-primary">
                                        Commission Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <style>
                        *

                        /*the container must be positioned relative:*/
                        .autocomplete {
                            height: 100px;
                            position: relative;
                            display: inline-block;
                        }

                        input {
                            border: 1px solid transparent;
                            background-color: #f1f1f1;
                            padding: 10px;
                            font-size: 16px;
                        }

                        input[type=text] {
                            background-color: #f1f1f1;
                            width: 100%;
                        }

                        input[type=submit] {
                            background-color: DodgerBlue;
                            color: #fff;
                            cursor: pointer;
                        }

                        .autocomplete-items {
                            position: absolute;
                            border: 1px solid #d4d4d4;
                            border-bottom: none;
                            border-top: none;
                            z-index: 99;
                            /*position the autocomplete items to be the same width as the container:*/
                            top: 100%;
                            left: 0;
                            right: 0;
                        }

                        .autocomplete-items div {
                            padding: 10px;
                            cursor: pointer;
                            background-color: #fff;
                            border-bottom: 1px solid #d4d4d4;
                        }

                        /*when hovering an item:*/
                        .autocomplete-items div:hover {
                            background-color: #e9e9e9;
                        }

                        /*when navigating through the items using the arrow keys:*/
                        .autocomplete-active {
                            background-color: DodgerBlue !important;
                            color: #ffffff;
                        }


                        .inputWithIcon input[type="text"] {
                            /*padding-left: 40px;*/
                        }

                        .inputWithIcon {
                            position: relative;
                        }

                        .inputWithIcon img {
                            position: absolute;
                            left: 0;
                            top: 8px;
                            margin-left: 170px;
                            color: #aaa;
                            transition: 0.3s;
                        }

                        /*.center {
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: -60px;
    }

    #loadingwavebutton{
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: -60px;
    z-index:10;
    position:relative;
    }
    .wave {
    width: 5px;
    height: 50px;
    background: linear-gradient(45deg, #00B181, black);
    margin: 10px;
    animation: wave 1s linear infinite;
    border-radius: 20px;
    }
    .wave:nth-child(2) {
    animation-delay: 0.1s;
    }
    .wave:nth-child(3) {
    animation-delay: 0.2s;
    }
    .wave:nth-child(4) {
    animation-delay: 0.3s;
    }
    .wave:nth-child(5) {
    animation-delay: 0.4s;
    }
    .wave:nth-child(6) {
    animation-delay: 0.5s;
    }
    .wave:nth-child(7) {
    animation-delay: 0.6s;
    }
    .wave:nth-child(8) {
    animation-delay: 0.7s;
    }
    .wave:nth-child(9) {
    animation-delay: 0.8s;
    }
    .wave:nth-child(10) {
    animation-delay: 0.9s;
    }

    @keyframes wave {
    0% {
    transform: scale(0);
    }
    50% {
    transform: scale(1);
    }
    100% {
    transform: scale(0);
    }*/

                        }
                    </style>

                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

                    <div class="card col-12" id="Usersearchcustom" style="height:140px;">
                        <div class="card-header">
                            <i class="fa fa-filter"></i>
                            <strong>Search-Users</strong>
                        </div>
                        <div class="card-body" style="padding-bottom:0px; margin:0px;">
                            <div id="searchUsers" class="row">
                                <form autocomplete="off" class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-12 autocomplete">
                                            <div class="input-group">
                                                <div class="inputWithIcon"><input type="search" placeholder="Username"
                                                        id="myInput" class="form-control ui-autocomplete-input"
                                                        autocomplete="off"></div> <span
                                                    class="input-group-prepend"><button id="myBtn" type="button"
                                                        class="btn btn-primary"><i class="fa fa-search"></i> Search
                                                    </button></span>
                                            </div>
                                        </div>
                                    </div>
                                </form> <img src="/img/preloader.gif" style="height: 20px; display: none;">
                                <nav aria-label="breadcrumb" id="breadcrumbcustom" class="col-12 col-md-6"
                                    style="display: none;">
                                    <ol class="breadcrumb"></ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="accountsChart">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>
                                        <strong>Imrantt8585</strong> - Clients List
                                    </h5>
                                </div>
                                <div class="card-body" style="padding-bottom: 0;">
                                    <div class="row col-12" style="overflow-x: auto;">
                                        <table class="table table-bordered table-sm">
                                            <tbody>
                                                <tr>
                                                    <th>Credit Received</th>
                                                    <th>Credit Remaining</th>
                                                    <th>Cash</th>
                                                    <th>P/L Downline</th>
                                                    <th>
                                                        Balance UpLine
                                                        <a href="#" onclick="ShowUplineView(); return false;">
                                                            <!--<i class="fas fa-question-circle"></i>-->
                                                        </a>
                                                    </th>
                                                    <th>Users</th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <a class="btn-block d-flex justify-content-between align-items-center"
                                                            href="#"
                                                            onclick="show_popup('/accounts/ledger?accountId=5865902'); return false;">
                                                            <span class="position-plus">
                                                                4,000,000
                                                            </span>
                                                        </a>
                                                    </th>
                                                    <th>
                                                        <a class="btn-block d-flex justify-content-between align-items-center"
                                                            href="#"
                                                            onclick="show_popup('/accounts/ledger?accountId=5865902'); return false;">
                                                            <span class="position-plus">
                                                                1,430,000
                                                            </span>
                                                        </a>
                                                    </th>
                                                    <th>
                                                        <a class="btn-block d-flex justify-content-between align-items-center"
                                                            href="#"
                                                            onclick="show_popup('/accounts/ledger?accountId=5865903'); return false;">
                                                            <span class="position-plus">
                                                                2,608
                                                            </span>
                                                        </a>
                                                    </th>
                                                    <th>
                                                        <a class="btn-block d-flex justify-content-between align-items-center"
                                                            href="#"
                                                            onclick="show_popup('/accounts/ledger?accountId=5865901'); return false;">
                                                            <span class="position-plus">
                                                                371,784
                                                            </span>
                                                        </a>
                                                    </th>
                                                    <th class="position-minus">
                                                        -30,600
                                                    </th>
                                                    <th>7</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a href="/Users/Create" type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-user-o"></i>
                                        <strong>New User</strong>
                                    </a>
                                    <a href="/Accounts/Ledger" type="button" class="btn btn-sm btn-primary"
                                        target="_blank">
                                        <i class="fa fa-book"></i>
                                        <strong>Account Ledger</strong>
                                    </a>

                                    <p class="float-right">
                                        <span class="btn btn-sm btn-warning mt-2">
                                            <strong>C</strong>
                                        </span>
                                        Cash / Credit
                                        <span class="btn btn-sm btn-primary mt-2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        Edit
                                        <span class="btn btn-sm btn-info mt-2">
                                            <strong>L</strong>
                                        </span>
                                        Ledger
                                        <span class="btn btn-sm btn-success mt-2">
                                            <strong>A</strong>
                                        </span>
                                        Active
                                        <span class="btn btn-sm btn-outline-danger mt-2">
                                            <strong>D</strong>
                                        </span>
                                        InActive
                                        <span class="btn btn-sm btn-danger">
                                            <strong>S</strong>
                                        </span>
                                        <span>Settle Account</span>
                                    </p>
                                </div>

                                <div class="card-body">
                                    <div id="tableLedger_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="tableLedger" style="width: 100%;"
                                                    class="display table table-bordered table-striped tbl-datatable1 dataTable no-footer"
                                                    role="grid" aria-describedby="tableLedger_info">
                                                    <thead>
                                                        <tr class="accounts-chart-head-bg" role="row">
                                                            <th rowspan="1" colspan="1">Total</th>
                                                            <th rowspan="1" colspan="1"></th>
                                                            <th rowspan="1" colspan="1">2,570,000</th>
                                                            <th rowspan="1" colspan="1">1,700,444</th>
                                                            <th rowspan="1" colspan="1">-404,992</th>
                                                            <th rowspan="1" colspan="1"></th>
                                                            <th rowspan="1" colspan="1">0</th>
                                                            <th rowspan="1" colspan="1">1,700,444</th>
                                                            <th rowspan="1" colspan="1"></th>
                                                        </tr>
                                                        <tr role="row">
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 193.5px;">Username</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 114.5px;">Type</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 108.5px;">Credit</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 108.5px;">Balance</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 126.5px;">Client (P/L)</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 73.5px;">Share</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 111.5px;">Exposure</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 194.5px;">Available Balance</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 263.5px;">Options</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>







                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <a href="/Accounts/Chart?MID=5408869">
                                                                    <strong>ARIFBHI6565</strong>
                                                                </a>
                                                            </td>
                                                            <td>SuperMaster</td>
                                                            <td>1,500,000</td>
                                                            <td>868,747</td>
                                                            <td class="position-minus">
                                                                -317,787
                                                            </td>

                                                            <td>65</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                868,747
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="/Accounts/Cash?id=5408869"
                                                                    onclick="popup_hawala('/Accounts/Cash', 5408869);return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="/Users/Edit?id=5408869">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="show_popup('/accounts/ledger?accountId=5960620'); return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                <a class="btn btn-success" target="_blank"
                                                                    href="/Users/Edit?id=5408869">
                                                                    <strong>A</strong>
                                                                </a>
                                                                <a class="btn btn-danger"
                                                                    href="/Accounts/Nil?UserId=5408869"
                                                                    onclick="show_popup('/Accounts/Nil?UserId=5408869', 5408869);return false;">
                                                                    <strong>S</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td>
                                                                <a href="/Accounts/Chart?MID=5320935">
                                                                    <strong>GUJRANWALA8282</strong>
                                                                </a>
                                                            </td>
                                                            <td>SuperMaster</td>
                                                            <td>1,000,000</td>
                                                            <td>781,688</td>
                                                            <td class="position-minus">
                                                                -67,214
                                                            </td>

                                                            <td>82</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                781,688
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="/Accounts/Cash?id=5320935"
                                                                    onclick="popup_hawala('/Accounts/Cash', 5320935);return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="/Users/Edit?id=5320935">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="show_popup('/accounts/ledger?accountId=5866054'); return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                <a class="btn btn-success" target="_blank"
                                                                    href="/Users/Edit?id=5320935">
                                                                    <strong>A</strong>
                                                                </a>
                                                                <a class="btn btn-danger"
                                                                    href="/Accounts/Nil?UserId=5320935"
                                                                    onclick="show_popup('/Accounts/Nil?UserId=5320935', 5320935);return false;">
                                                                    <strong>S</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <strong>HAFIZ6969</strong>
                                                            </td>
                                                            <td>Bettor</td>
                                                            <td>50,000</td>
                                                            <td>50,000</td>
                                                            <td class="position-plus">
                                                                0
                                                            </td>

                                                            <td>85</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                50,000
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="/Accounts/Cash?id=5325466"
                                                                    onclick="popup_hawala('/Accounts/Cash', 5325466);return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="/Users/Edit?id=5325466">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="show_popup('/accounts/ledger?accountId=5870909'); return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                <a class="btn btn-success" target="_blank"
                                                                    href="/Users/Edit?id=5325466">
                                                                    <strong>A</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td>
                                                                <strong>AKBARR2222</strong>
                                                            </td>
                                                            <td>Bettor</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                0
                                                            </td>

                                                            <td>85</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                0
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="/Accounts/Cash?id=5344765"
                                                                    onclick="popup_hawala('/Accounts/Cash', 5344765);return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="/Users/Edit?id=5344765">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="show_popup('/accounts/ledger?accountId=5891630'); return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                <a class="btn btn-outline-danger" target="_blank"
                                                                    href="/Users/Edit?id=5344765">
                                                                    <strong>D</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <strong>Arifbhai2222</strong>
                                                            </td>
                                                            <td>Bettor</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                0
                                                            </td>

                                                            <td>85</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                0
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="/Accounts/Cash?id=5337524"
                                                                    onclick="popup_hawala('/Accounts/Cash', 5337524);return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="/Users/Edit?id=5337524">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="show_popup('/accounts/ledger?accountId=5883847'); return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                <a class="btn btn-outline-danger" target="_blank"
                                                                    href="/Users/Edit?id=5337524">
                                                                    <strong>D</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td>
                                                                <strong>Sajid1379</strong>
                                                            </td>
                                                            <td>Bettor</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                0
                                                            </td>

                                                            <td>85</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                0
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="/Accounts/Cash?id=5483678"
                                                                    onclick="popup_hawala('/Accounts/Cash', 5483678);return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="/Users/Edit?id=5483678">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="show_popup('/accounts/ledger?accountId=6043213'); return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                <a class="btn btn-outline-danger" target="_blank"
                                                                    href="/Users/Edit?id=5483678">
                                                                    <strong>D</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <strong>Zaka1225</strong>
                                                            </td>
                                                            <td>Bettor</td>
                                                            <td>20,000</td>
                                                            <td>8</td>
                                                            <td class="position-minus">
                                                                -19,992
                                                            </td>

                                                            <td>85</td>
                                                            <td>0</td>
                                                            <td class="position-plus">
                                                                8
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="/Accounts/Cash?id=6386539"
                                                                    onclick="popup_hawala('/Accounts/Cash', 6386539);return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="/Users/Edit?id=6386539">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="show_popup('/accounts/ledger?accountId=7035852'); return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                <a class="btn btn-outline-danger" target="_blank"
                                                                    href="/Users/Edit?id=6386539">
                                                                    <strong>D</strong>
                                                                </a>
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

                        <div class="modal fade" id="modalUpline" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- End Modal content-->
                            </div>
                        </div>
                    </div>
                    <script>
                        function LoadFullAccounts(mid) {
                            $("#accountLoadGif").show();
                            $("#accountLoadGif").next().hide();
                            $.get('/Accounts/Chart?handler=Details&MID=' + mid, function (data) {
                                $("#accountsChart").html(data);

                                var tblLed = $("#tableLedger").DataTable({
                                    paging: false,
                                    ordering: false,
                                    columnDefs: [
                                        { responsivePriority: 1, targets: 0 },
                                        { responsivePriority: 2, targets: 2 }
                                    ]
                                });

                                if (IsMobile()) {
                                    new $.fn.dataTable.Responsive(tblLed, {
                                        details: {
                                            display: $.fn.dataTable.Responsive.display.childRowImmediate
                                        }
                                    });
                                }
                            });
                        }

                    </script>


                    <script>
                        function popup_hawala(Url, ClientId) {
                            var url = Url + "?id=" + ClientId;
                            newwindow = window.open(url, "Cash Hawala", 'height=800,width=650,titlebar=0,menubar=0');
                            if (window.focus) { newwindow.focus() }
                            return false;
                        }
                        function show_popup(Url, Title) {
                            newwindow = window.open(Url, Title, 'height=800,width=900,titlebar=0,menubar=0');
                            if (window.focus) { newwindow.focus() }
                            return false;
                        }
                    </script>


                </div>
@endsection

@section('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/site.min.js"></script>
    <script src="/js/ReportViewer.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/js/bof.js"></script>
@endsection
