<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>
        <strong>{{ $username }} - Sports Wise</strong>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm compact">
            <thead>
                <tr>
                    <th>Sport</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sportTotals as $sport)
                    <tr>
                        <td><a href="#" data-id="{{ $sport->sport_name }}">{{ $sport->sport_name ?? 'Unknown' }}</a></td>
                        <td>{{ number_format($sport->total_amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td valign="top" colspan="2" class="dataTables_empty">No data available in table</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
