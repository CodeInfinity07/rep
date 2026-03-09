<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>
        <strong>{{ $eventName }} - Markets</strong>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Market</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($marketDetails as $detail)
                    <tr>
                        <td>{{ $detail->market_name }}</td>
                        <td>{{ $detail->market_type }}</td>
                        <td>{{ number_format($detail->amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td valign="top" colspan="3" class="dataTables_empty">No data available in table</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
