@extends('layouts.bettor')

@section('title', '{{ $marketDetails["marketName"] ?? "Match" }} | BetPro')

@section('content')
<div class="container-fluid">
    @if(isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info mb-3">
                    <strong>✓ BETTOR MATCH PAGE</strong> - Match ID: {{ $marketId }}
                </div>
                
                <h4 class="text-white mb-3">
                    {{ $marketDetails['marketName'] ?? 'Match Details' }}
                </h4>
                
                <div class="card mb-3">
                    <div class="card-header bg-dark text-white">
                        <strong>Match Information</strong>
                    </div>
                    <div class="card-body">
                        <p><strong>Event:</strong> {{ $marketDetails['event']['name'] ?? 'N/A' }}</p>
                        <p><strong>Competition:</strong> {{ $marketDetails['competition']['name'] ?? 'N/A' }}</p>
                        <p><strong>Market Start:</strong> {{ $marketDetails['marketStartTime'] ?? 'N/A' }}</p>
                    </div>
                </div>

                @if(isset($marketDetails['runners']) && count($marketDetails['runners']) > 0)
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <strong>Runners & Odds</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Runner</th>
                                            <th colspan="2" class="text-center">Back</th>
                                            <th colspan="2" class="text-center">Lay</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($marketDetails['runners'] as $runner)
                                            <tr>
                                                <td><strong>{{ $runner['runnerName'] ?? 'Runner' }}</strong></td>
                                                <td class="bg-info text-white text-center">
                                                    @if(isset($marketsData[$marketId]['runners']))
                                                        @php
                                                            $runnerOdds = collect($marketsData[$marketId]['runners'])->firstWhere('selectionId', $runner['selectionId']);
                                                            $backPrice = $runnerOdds['ex']['availableToBack'][0]['price'] ?? '-';
                                                            $backSize = $runnerOdds['ex']['availableToBack'][0]['size'] ?? '-';
                                                        @endphp
                                                        {{ $backPrice }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="bg-info text-white text-center">
                                                    {{ isset($backSize) ? number_format($backSize) : '-' }}
                                                </td>
                                                <td class="bg-danger text-white text-center">
                                                    @if(isset($marketsData[$marketId]['runners']))
                                                        @php
                                                            $layPrice = $runnerOdds['ex']['availableToLay'][0]['price'] ?? '-';
                                                            $laySize = $runnerOdds['ex']['availableToLay'][0]['size'] ?? '-';
                                                        @endphp
                                                        {{ $layPrice }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="bg-danger text-white text-center">
                                                    {{ isset($laySize) ? number_format($laySize) : '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if(isset($allMarketIds) && count($allMarketIds) > 1)
                    <div class="card mt-3">
                        <div class="card-header bg-dark text-white">
                            <strong>Other Markets</strong>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($allMarketIds as $mktId)
                                    @if($mktId !== $marketId && isset($marketsData[$mktId]))
                                        <a href="/cricket/{{ $mktId }}" class="list-group-item list-group-item-action">
                                            Market: {{ $mktId }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>

<script>
// Auto-refresh odds every 5 seconds
setInterval(function() {
    location.reload();
}, 30000);
</script>
@endsection
