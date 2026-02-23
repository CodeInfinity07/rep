<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Ledger - {{ strtoupper($user->username) }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
    <style>
        body {
            padding: 15px;
            background-color: #f8f9fa;
        }
        .datee {
            background-color: white;
        }
        @media screen and (max-width: 635px) {
            .editsbmtbtn {
                margin: auto;
                margin-right: 15px;
            }
        }
        button.dt-button, div.dt-button, a.dt-button {
            padding: 5px;
        }
    </style>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            Report Filter
        </div>
        <div class="card-body">
            <form id="ReportFilterForm" class="form-inline" method="get" action="/users/{{ $user->id }}/ledger">
                <div class="row" style="text-align-last:justify;">
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <input type="date" class="form-control" name="from" value="{{ $from }}" required>
                        </div>
                    </div>

                    <strong style="margin:auto">&nbsp;-&nbsp;</strong>

                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <input type="date" class="form-control" name="to" value="{{ $to }}" required>
                        </div>
                    </div>

                    <div class="form-group editsbmtbtn">
                        <label class="mx-1"> </label>
                        <button class="btn btn-primary" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>{{ strtoupper($user->username) }}</strong> - Account Ledger
        </div>
        <div class="card-body">
            <table id="tableLedger" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Debit/Credit</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ \Carbon\Carbon::parse($from)->format('m/d/Y h:i:s A') }}</td>
                        <td>Opening Balance</td>
                        <td>0</td>
                        <td>{{ number_format($openingBalance, 0) }}</td>
                    </tr>
                    @foreach($entries as $index => $entry)
                    <tr>
                        <td>{{ $index + 2 }}</td>
                        <td>{{ $entry->created_at->format('m/d/Y h:i:s A') }}</td>
                        <td>{{ $entry->description }}</td>
                        <td>{{ $entry->amount > 0 ? number_format($entry->amount, 0) : number_format($entry->amount, 0) }}</td>
                        <td>{{ number_format($entry->balance, 0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#tableLedger").DataTable({
                "order": [[0, "asc"]],
                "lengthMenu": [100, 250, 500, 1000],
                dom: "<'row'<'col-sm-2'l><'col-sm-5'B><'col-sm-5'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                        extend: 'print',
                        text: ' Print',
                        title: '{{ strtoupper($user->username) }}\'s Account Ledger',
                        titleAttr: 'Print'
                    },
                    {
                        extend: 'excelHtml5',
                        text: ' Excel',
                        title: '{{ strtoupper($user->username) }}\'s Account Ledger',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: ' PDF',
                        title: '{{ strtoupper($user->username) }}\'s Account Ledger',
                        titleAttr: 'PDF'
                    }
                ]
            });
        });
    </script>
</body>
</html>
