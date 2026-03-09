<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>
        <strong>{{ $username }}</strong>
        <div class="form-group pull-right">
            <input type="checkbox" onclick="toggleZeroAccounts(this)" class="">
            Hide Zero Amounts
        </div>
        <div class=""><b> <span id="DateFromNew">{{ $from }}</span>-<span id="DateToNew">{{ $to }}</span></b></div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <table id="tblReport" class="table table-responsive-sm table-bordered table-striped table-sm compact">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($positives as $entry)
                            <tr class="report-row" data-amount="{{ $entry['amount'] }}">
                                <td><a href="#" data-id="{{ $entry['id'] }}">{{ $entry['name'] }}</a></td>
                                <td>{{ number_format($entry['amount'], 2) }}</td>
                            </tr>
                        @empty
                            <tr class="odd">
                                <td valign="top" colspan="2" class="dataTables_empty">No data available in table</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table id="tblReport2" class="table table-responsive-sm table-bordered table-striped table-sm compact">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($negatives as $entry)
                            <tr class="report-row" data-amount="{{ $entry['amount'] }}">
                                <td><a href="#" data-id="{{ $entry['id'] }}">{{ $entry['name'] }}</a></td>
                                <td>{{ number_format($entry['amount'], 2) }}</td>
                            </tr>
                        @empty
                            <tr class="odd">
                                <td valign="top" colspan="2" class="dataTables_empty">No data available in table</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <table class="table table-sm" id="DataTables_Table_0">
                    <tbody>
                        <tr class="bg-primary">
                            <th>Total</th>
                            <th>{{ number_format($totalPositive, 2) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-sm">
                    <tbody>
                        <tr class="bg-danger">
                            <th>Total</th>
                            <th>{{ number_format($totalNegative, 2) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
function toggleZeroAccounts(checkbox) {
    var rows = document.querySelectorAll('.report-row');
    rows.forEach(function(row) {
        var amount = parseFloat(row.getAttribute('data-amount'));
        if (checkbox.checked && amount === 0) {
            row.style.display = 'none';
        } else {
            row.style.display = '';
        }
    });
}
</script>
