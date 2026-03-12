@extends('layouts.management')

@section('title', 'Daily PL | BetPro')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <style>
        @media screen and (max-width: 635px) {
            .reportmenubuttons {
                text-align: center;
            }
            .onecol6 {
                padding: 0px;
            }
            .twocol6 {
                padding-left: 4px;
                padding-right: inherit;
            }
        }

        .loader {
            position: fixed;
            z-index: 99;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            opacity: 0.6;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader > img {
            width: auto;
            margin-bottom: 100px;
            margin-top: 20%;
            margin-left: 50%;
        }

        #loadinggif {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-filter"></i>
                <strong>Report Type</strong>
            </div>
            <div class="card-body reportmenubuttons">
                <a href="/report" id="book-detail" class="btn btn-outline-primary">
                    Book Detail
                </a>
                <a href="/report2" id="book-detail-2" class="btn btn-outline-primary">
                    Book Detail 2
                </a>
                <a href="/report-daily-pl" id="dailyPl" class="btn btn-primary">
                    Daily PL
                </a>
                <a href="/report-daily" id="daily" class="btn btn-outline-primary">
                    Daily Report
                </a>
                <a href="/report-final-sheet" id="final-sheet" class="btn btn-outline-primary">
                    Final Sheet
                </a>
                <a href="/users" id="ledger" class="btn btn-outline-primary">
                    Accounts
                </a>
                <a href="/report-commission" id="commission" class="btn btn-outline-primary">
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
                    @csrf
                    <div class="row" style="text-align-last:justify;">
                        <div class="col-12 col-md-5">
                            <div class="input-group date" id="ReportFrom" data-target-input="nearest">
                                <input type="text"
                                       class="form-control datetimepicker-input"
                                       data-target="#ReportFrom"
                                       id="DisplayFrom" />
                                <div class="input-group-append" data-target="#ReportFrom" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <span class="market-time d-none"></span>
                            <span class="d-none utctime" data-nofirst="1" data-format="M/D/YYYY h:mm A">
                                {{ now()->subDay()->startOfDay()->toIso8601String() }}
                            </span>
                            <input type="hidden" name="From" id="From" value="{{ now()->subDay()->startOfDay()->toIso8601String() }}" />
                        </div>

                        <strong style="margin:auto">&nbsp;-&nbsp;</strong>
                        <div class="col-12 col-md-5">
                            <div class="input-group date" id="ReportTo" data-target-input="nearest">
                                <input type="text"
                                       class="form-control datetimepicker-input"
                                       data-target="#ReportTo"
                                       id="DisplayTo" />
                                <div class="input-group-append" data-target="#ReportTo" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <span class="market-time d-none"></span>
                            <span class="d-none utctime" data-nofirst="1" data-format="M/D/YYYY h:mm A">
                                {{ now()->endOfDay()->toIso8601String() }}
                            </span>
                            <input type="hidden" name="To" id="To" value="{{ now()->endOfDay()->toIso8601String() }}" />
                        </div>

                        <div class="form-group" style="margin: auto;margin-top: 5px; margin-right:15px;">
                            <button class="btn btn-sm btn-primary" type="submit" onclick="return updateDates();">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </div>

                        <input type="hidden" id="CurrentAccountId" name="CurrentAccountId" value="0" />
                        <input type="hidden" id="ClientId" name="ClientId" value="0" />
                        <input type="hidden" id="EventTypeId" name="EventTypeId" value="0" />
                        <input type="hidden" id="IsFirstVisit" value="True" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="loader" id="loadinggif">
    <img src="/img/loadinggif.gif" />
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Report</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 onecol6">
                        <table class="table table-bordered stripe compact table-sm" id="example">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="positive-tbody">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 twocol6">
                        <table class="table table-responsive-sm table-bordered stripe compact table-sm" id="example2">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="negative-tbody">
                            </tbody>
                        </table>
                    </div>

                    <div class="col-6 onecol6">
                        <table class="table table-sm">
                            <tr class="bg-primary">
                                <th>Total</th>
                                <th id="total-positive">0</th>
                            </tr>
                        </table>
                    </div>

                    <div class="col-6 twocol6">
                        <table class="table table-sm">
                            <tr class="bg-danger">
                                <th>Total</th>
                                <th id="total-negative">0</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 report-Right">
        <div id="sportreportdivdr" class="container"></div>
        <div class="container" id="marketreportsdivdr"></div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/site.min.js"></script>
    <script src="/js/bof.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        function showLoader() { $("#loadinggif").show(); }
        function hideLoader() { $("#loadinggif").hide(); }

        function initTables() {
            if ($.fn.DataTable.isDataTable('#example')) $('#example').DataTable().destroy();
            if ($.fn.DataTable.isDataTable('#example2')) $('#example2').DataTable().destroy();

            $('#example, #example2').DataTable({
                "paging": false,
                "info": false,
                "searching": false,
                "order": [[0, "asc"]]
            });
        }

        function fetchDailyPl() {
            showLoader();
            var from = localDateToUtc($("#DisplayFrom").val());
            var to   = localDateToUtc($("#DisplayTo").val());

            $.ajax({
                type: 'GET',
                url: '/report-daily-pl?handler=DailyPl',
                data: { from: from, to: to },
                success: function (data) {
                    var posTbody = '';
                    var negTbody = '';

                    $.each(data.positives, function (i, row) {
                        posTbody += '<tr><td><a href="#" data-id="' + row.id + '">' + row.name + '</a></td><td>' + row.amount + '</td></tr>';
                    });
                    $.each(data.negatives, function (i, row) {
                        negTbody += '<tr><td><a href="#" data-id="' + row.id + '">' + row.name + '</a></td><td>' + row.amount + '</td></tr>';
                    });

                    $('#positive-tbody').html(posTbody);
                    $('#negative-tbody').html(negTbody);
                    $('#total-positive').text(data.totalPositive);
                    $('#total-negative').text(data.totalNegative);

                    initTables();
                    $('#sportreportdivdr').empty();
                    $('#marketreportsdivdr').empty();
                    hideLoader();
                },
                error: function () { hideLoader(); }
            });
        }

        function fetchSportsWiseDr(userId) {
            showLoader();
            var from = localDateToUtc($("#DisplayFrom").val());
            var to   = localDateToUtc($("#DisplayTo").val());

            $.ajax({
                type: 'GET',
                url: '/report-daily-pl?handler=DailyPlSports',
                data: { from: from, to: to, id: userId },
                success: function (result) {
                    $('#sportreportdivdr').html(result);
                    $('#marketreportsdivdr').empty();
                    hideLoader();
                },
                error: function () { hideLoader(); }
            });
        }

        function fetchMarketsReportDr(userId, sportName) {
            showLoader();
            var from = localDateToUtc($("#DisplayFrom").val());
            var to   = localDateToUtc($("#DisplayTo").val());

            $.ajax({
                type: 'GET',
                url: '/report-daily-pl?handler=DailyPlMarkets',
                data: { from: from, to: to, id: userId, id2: sportName },
                success: function (result) {
                    $('#marketreportsdivdr').html(result);
                    hideLoader();
                },
                error: function () { hideLoader(); }
            });
        }

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('#ReportFilterForm').on('submit', function (e) {
                e.preventDefault();
                updateDates();
                fetchDailyPl();
            });

            $('#example, #example2').on('click', 'td > a', function (e) {
                e.preventDefault();
                var userId = $(this).data('id');
                if (userId === undefined || userId === null) return;
                fetchSportsWiseDr(userId);
            });

            $('#sportreportdivdr').on('click', 'td > a', function (e) {
                e.preventDefault();
                var sportName = $(this).data('id');
                var userId    = $(this).data('userid');
                if (sportName === undefined || sportName === null) return;
                fetchMarketsReportDr(userId, sportName);
            });

            hideLoader();
        });

        function popup_report(vid, aid) {
            var url = "/Accounts/Statements?VID=" + vid + "&AID=" + aid;
            newwindow = window.open(url, "Market Repo", 'height=500,width=700');
            if (window.focus) { newwindow.focus() }
            return false;
        }
    </script>
    <script>
        const token = getCookie('wexscktoken');
        const sess  = getCookie('wex3authtoken');
        const reft  = getCookie('wex3reftoken');

        $(document).ready(function () {
            if (typeof pollUserData === 'function') pollUserData();
            if (typeof pollRefreshToken === 'function') pollRefreshToken();
        });
    </script>
@endsection
