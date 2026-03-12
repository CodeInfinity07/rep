<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>
        <strong>{{ $sportName }} - Market Details</strong>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm compact">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Market</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($marketDetails as $detail)
                    <tr>
                        <td>{{ $detail->event_name }}</td>
                        <td>{{ $detail->market_name }}</td>
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
