@extends('layouts.management')

@section('title', 'Final Sheet | BetPro')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <style>
        @media screen and (max-width: 635px) {
            .reportmenubuttons { text-align: center; }
        }
        .loader {
            position: fixed;
            z-index: 99;
            top: 0; left: 0;
            width: 100%; height: 100%;
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
        #loadinggif { display: none; }
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
                <a href="/report" id="book-detail" class="btn btn-outline-primary">Book Detail</a>
                <a href="/report2" id="book-detail-2" class="btn btn-outline-primary">Book Detail 2</a>
                <a href="/report-daily-pl" id="dailyPl" class="btn btn-outline-primary">Daily PL</a>
                <a href="/report-daily" id="daily" class="btn btn-outline-primary">Daily Report</a>
                <a href="/report-final-sheet" id="final-sheet" class="btn btn-primary">Final Sheet</a>
                <a href="/users" id="ledger" class="btn btn-outline-primary">Accounts</a>
                <a href="/Reports/Commission" id="commission" class="btn btn-outline-primary">Commission Report</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-9" id="final-sheet-view">
        <div class="loader" id="loadinggif">
            <img src="/img/loadinggif.gif" />
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/site.min.js"></script>
    <script src="/js/bof.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script>
        var reportUsername = @json(Auth::user()->username);

        $("#loadinggif").show();

        $(document).ready(function () {
            LoadReport();
        });

        function LoadReport() {
            $.get("/report-final-sheet?handler=Report", function (data) {
                $("#final-sheet-view").html(data);

                $('.table-accounts-balance').DataTable({
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
                            title: reportUsername + '  Detail',
                            titleAttr: 'Copy'
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class=""> Excel</i>',
                            title: reportUsername + '  Detail',
                            titleAttr: 'Excel'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class=""> PDF</i>',
                            title: reportUsername + '  Detail',
                            titleAttr: 'PDF'
                        }
                    ]
                });
            });
        }

        function toggleZeroAccounts() {
            $('.table-accounts-balance tbody tr').filter(function () {
                return $.trim($(this).find('td').eq(1).text()) === "0"
            }).toggle();
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
