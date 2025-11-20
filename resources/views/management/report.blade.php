@extends('layouts.management')

@section('title', 'Reports')

@section('content')
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
@endsection

@section('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/site.min.js"></script>
    <script src="/js/ReportViewer.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/js/bof.js"></script>
@endsection
