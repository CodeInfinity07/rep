<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>
        <strong>{{ $sportName }} - Events</strong>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td><a href="#" data-id="{{ $event->event_name }}" data-eventtype="{{ $sportName }}">{{ $event->event_name }}</a></td>
                        <td>{{ number_format($event->total_amount, 2) }}</td>
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
