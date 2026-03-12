@extends('layouts.management')

@section('title', 'Reports')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <style>
        @media screen and (max-width: 635px) {
            .reportmenubuttons {
                text-align: center;
            }
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
                <a href="/report" id="book-detail" class="btn btn-primary">
                    Book Detail
                </a>
                <a href="/report2" id="book-detail-2" class="btn btn-outline-primary">
                    Book Detail 2
                </a>
                <a href="/report-daily-pl" id="dailyPl" class="btn btn-outline-primary">
                    Daily PL
                </a>
                <a href="/report-daily" id="daily" class="btn btn-outline-primary">
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

<div class="row" id="report-book-detail"></div>
@endsection

@section('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/site.min.js"></script>
    <script src="/js/bof.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/ReportViewer.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#ReportFilterForm button').click(function(e) {
                e.preventDefault();
                rv.fetchMainReport();
            });

            let rv = new ReportViewer("#report-book-detail", "/report", "BookDetail", "SportsWise", "MarketsReports");
        });

        function popup_report() {
            return true;
        }
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
