<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>
        <strong>{{ $username }}</strong>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm" id="tblReport">
            <thead>
                <tr>
                    <th>Event</th>
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
                @endforelse
                <tr class="bg-primary">
                    <th>Total</th>
                    <th>{{ number_format($total, 2) }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
