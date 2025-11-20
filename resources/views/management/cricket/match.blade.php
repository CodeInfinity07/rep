@extends('layouts.management')

@section('title', 'Cricket Match')

@section('content')
<style>
    .checknow {
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .scores {
        background-color: white;
        border: 1px solid black;
        padding: 0.25rem;
    }

    .scores .runnername {
        margin-top: 7px;
        line-height: 0.2;
        color: black;
        font-size: 18px;
    }

    .scores .runner-score {
        color: black;
        font-size: 18px;
        margin-top: 2px;
        padding: 0px;
    }

    .scores .active {
        color: #009069
    }

    .scores .col-divider {
        border-left: 1px solid black;
    }

    .tablefoter {
        font-size: 14px;
        border: 1px solid black;
        color: black;
    }

    .market-head {
        background: #f0f0f0;
        padding: 8px 12px;
        border-bottom: 1px solid #ddd;
    }

    .runners {
        border-bottom: 1px solid #ddd;
        padding: 8px 0;
    }

    .runner-name {
        padding: 8px 12px;
        font-weight: bold;
    }

    .price {
        padding: 0;
    }

    .cta-back, .cta-lay {
        text-align: center;
        cursor: pointer;
        padding: 2px;
    }

    .cta-back .price {
        background-color: #e3f8ff;
        border: 1px solid #b3e5fc;
        padding: 4px;
        font-weight: bold;
        margin-bottom: 2px;
    }

    .cta-lay .price {
        background-color: #ffcdcc;
        border: 1px solid #ffb3b3;
        padding: 4px;
        font-weight: bold;
        margin-bottom: 2px;
    }

    .size {
        font-size: 11px;
        padding: 2px 4px;
        color: #666;
    }

    .position-plus {
        color: green;
    }

    .position-minus {
        color: red;
    }

    @media screen and (max-width: 480px) {
        .runnername {
            margin-top: 10px;
            line-height: 0.1;
            color: black;
            font-size: 10px;
        }

        .tablefoter {
            font-size: 10px;
        }
    }
</style>

@if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@elseif(isset($matchData))
    <div class="row" id="loadedmarkettoshow">
        <div id="MarketData" role="tablist" aria-multiselectable="true" class="content panel-group col-md-8">
            <div class="card card-accent-primary">
                <div class="card-header" id="{{ $marketId }}">
                    <h4>
                        <strong>{{ $matchData['marketName'] ?? 'Match Odds' }}</strong>
                        <span style="color: {{ $matchData['status'] === 'OPEN' ? 'rgb(232, 62, 140)' : 'rgb(0, 144, 105)' }};">
                            <strong>{{ $matchData['status'] ?? 'UNKNOWN' }}</strong>
                        </span>
                        @if(isset($matchData['inplay']) && $matchData['inplay'])
                            <span class="badge badge-success">IN-PLAY</span>
                        @endif
                    </h4>
                </div>

                <div class="card-body market-box MBoxNopadding">
                    <div class="row bg-gray-100 market-head">
                        <div class="col">
                            <strong>{{ isset($matchData['marketStartTime']) ? date('d M H:i', strtotime($matchData['marketStartTime'])) : 'Time TBD' }}</strong>
                        </div>
                        <div class="col text-right">
                            <strong>Market ID: {{ $marketId }}</strong>
                        </div>
                    </div>

                    @if(isset($matchData['runners']) && is_array($matchData['runners']))
                        @foreach($matchData['runners'] as $runner)
                            <div id="runner-{{ $runner['selectionId'] ?? '' }}" class="row runners">
                                <div class="col-7 col-md-4 runner-name">
                                    <strong>{{ $runner['runnerName'] ?? 'Unknown' }}</strong>
                                    <br>
                                    <span>
                                        <span class="position-plus"><strong></strong></span>
                                    </span>
                                </div>

                                <div class="col-5 col-md-8 price">
                                    <div class="row">
                                        @php
                                            $backPrices = $runner['back'] ?? [];
                                            $layPrices = $runner['lay'] ?? [];
                                            $backCount = count($backPrices);
                                            $layCount = count($layPrices);
                                        @endphp

                                        {{-- Back prices (3 columns, desktop only for 2nd and 3rd) --}}
                                        @for($i = 2; $i >= 0; $i--)
                                            @if($i > 0)
                                                <div class="col-md-2 d-none d-md-block cta-back">
                                            @else
                                                <div class="col-6 col-md-2 cta-back">
                                            @endif
                                                @if(isset($backPrices[$i]))
                                                    <div class="col-12 price">
                                                        {{ $backPrices[$i]['price'] ?? '-' }}
                                                    </div>
                                                    <div class="col-12 size">
                                                        {{ isset($backPrices[$i]['size']) ? number_format($backPrices[$i]['size'], 0) : '-' }}
                                                    </div>
                                                @else
                                                    <div class="col-12 price">-</div>
                                                    <div class="col-12 size">-</div>
                                                @endif
                                            </div>
                                        @endfor

                                        {{-- Lay prices (3 columns, desktop only for 2nd and 3rd) --}}
                                        @for($i = 0; $i < 3; $i++)
                                            @if($i === 0)
                                                <div class="col-6 col-md-2 cta-lay">
                                            @else
                                                <div class="col-md-2 d-none d-md-block cta-lay">
                                            @endif
                                                @if(isset($layPrices[$i]))
                                                    <div class="col-12 price">
                                                        {{ $layPrices[$i]['price'] ?? '-' }}
                                                    </div>
                                                    <div class="col-12 size">
                                                        {{ isset($layPrices[$i]['size']) ? number_format($layPrices[$i]['size'], 0) : '-' }}
                                                    </div>
                                                @else
                                                    <div class="col-12 price">-</div>
                                                    <div class="col-12 size">-</div>
                                                @endif
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            No runner data available
                        </div>
                    @endif

                    <div class="row tablefoter">
                        <div class="col-12 text-center">
                            Total Matched: <strong>{{ isset($matchData['totalMatched']) ? number_format($matchData['totalMatched'], 2) : '0.00' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Match Information</strong>
                </div>
                <div class="card-body">
                    <p><strong>Market ID:</strong> {{ $marketId }}</p>
                    <p><strong>Status:</strong> {{ $matchData['status'] ?? 'Unknown' }}</p>
                    <p><strong>In-Play:</strong> {{ isset($matchData['inplay']) && $matchData['inplay'] ? 'Yes' : 'No' }}</p>
                    @if(isset($matchData['marketStartTime']))
                        <p><strong>Start Time:</strong> {{ date('d M Y H:i:s', strtotime($matchData['marketStartTime'])) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-refresh odds every 5 seconds
        setInterval(function() {
            location.reload();
        }, 5000);
    </script>
@else
    <div class="alert alert-warning">
        No match data available
    </div>
@endif

@endsection
