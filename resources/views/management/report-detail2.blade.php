@extends('layouts.management')

@section('title', 'Detail2 | BetPro')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <style>
        @media screen and (max-width: 635px) {
            .reportmenubuttons {
                text-align: center;
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
                <a href="/report2" id="book-detail-2" class="btn btn-primary">
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
                <a href="/users" id="ledger" class="btn btn-outline-primary">
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
    <div class="col-md-6 report-left">
        <div id="sportreportdiv">
        </div>
    </div>
    <div class="col-md-6 report-Right">
        <div class="container" id="marketreportsdiv" style="display: block;">
        </div>
        <div class="container" id="marketreportsdivdt2" style="display: block;">
        </div>
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
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script>
        var username = @json(Auth::user()->username);

        function showLoader() {
            $("#loadinggif").show();
        }

        function hideLoader() {
            $("#loadinggif").hide();
        }

        function fetchSportReport() {
            showLoader();
            var from = localDateToUtc($("#DisplayFrom").val());
            var to = localDateToUtc($("#DisplayTo").val());

            $.ajax({
                type: 'GET',
                url: '/report2?handler=Detail2Sports',
                data: { from: from, to: to },
                success: function (result) {
                    $("#sportreportdiv").html(result);
                    initSportTable();
                    $("#marketreportsdiv").empty();
                    $("#marketreportsdivdt2").empty();
                    hideLoader();
                },
                error: function () {
                    hideLoader();
                }
            });
        }

        function initSportTable() {
            if ($.fn.DataTable.isDataTable('#tblReport')) {
                $('#tblReport').DataTable().destroy();
            }
            $('#tblReport').DataTable({
                "paging": false,
                "info": false,
                "searching": false,
                "order": [[0, "asc"]],
                dom: "<'row'<'col-sm-12'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class=""> Print</i>',
                        title: username + '  Detail',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class=""> Excel</i>',
                        title: username + '  Detail',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class=""> PDF</i>',
                        title: username + '  Detail',
                        titleAttr: 'PDF'
                    }
                ]
            });
        }

        function bindEventTypeLinks() {
            $("#sportreportdiv").on('click', 'td > a', function (e) {
                e.preventDefault();
                var eventTypeId = $(this).data('id');
                if (eventTypeId === undefined || eventTypeId === null) return;

                fetchMarketReport(eventTypeId);
            });
        }

        function fetchMarketReport(eventTypeId) {
            showLoader();
            var from = localDateToUtc($("#DisplayFrom").val());
            var to = localDateToUtc($("#DisplayTo").val());

            $.ajax({
                type: 'GET',
                url: '/report2?handler=Detail2Markets',
                data: { from: from, to: to, id: eventTypeId },
                success: function (result) {
                    $("#marketreportsdiv").html(result);
                    $("#marketreportsdivdt2").empty();
                    hideLoader();
                },
                error: function () {
                    hideLoader();
                }
            });
        }

        function fetchMarketDetail(eventTypeId, marketName) {
            showLoader();
            var from = localDateToUtc($("#DisplayFrom").val());
            var to = localDateToUtc($("#DisplayTo").val());

            $.ajax({
                type: 'GET',
                url: '/report2?handler=Detail2MarketDetail',
                data: { from: from, to: to, id: eventTypeId, id2: marketName },
                success: function (result) {
                    $("#marketreportsdivdt2").html(result);
                    hideLoader();
                },
                error: function () {
                    hideLoader();
                }
            });
        }

        function popup_report(id, Url) {
            var url = Url + id;
            newwindow = window.open(url, "Market Position", 'height=650,width=800');
            if (window.focus) { newwindow.focus() }
            return false;
        }

        $(document).ready(function () {
            $('#ReportFilterForm').on('submit', function(e) {
                e.preventDefault();
                updateDates();
                fetchSportReport();
            });

            bindEventTypeLinks();

            $("#marketreportsdiv").on('click', 'td > a', function (e) {
                e.preventDefault();
                var marketName = $(this).data('id');
                var eventTypeId = $(this).data('eventtype');
                if (marketName === undefined || marketName === null) return;

                fetchMarketDetail(eventTypeId, marketName);
            });

            hideLoader();
        });
    </script>
    <script>
        const token = getCookie('wexscktoken');
        const sess = getCookie('wex3authtoken');
        const reft = getCookie('wex3reftoken');

        $(document).ready(function () {
            if (typeof pollUserData === 'function') pollUserData();
            if (typeof pollRefreshToken === 'function') pollRefreshToken();
        });
    </script>
@endsection
