<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>
        <strong>{{ $username }}</strong>
        <div class="form-group pull-right mb-0">
            <input type="checkbox" onclick="toggleZeroAccounts()" />
            Hide Zero Amounts
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm table-accounts-balance">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($entries as $entry)
                    <tr>
                        <td>{{ $entry['name'] }}</td>
                        <td>{{ number_format($entry['amount'], 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td valign="top" colspan="2" class="dataTables_empty">No data available in table</td>
                    </tr>
                @endforelse
                <tr class="bg-primary">
                    <th>Total</th>
                    <th>{{ number_format($total, 2) }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
