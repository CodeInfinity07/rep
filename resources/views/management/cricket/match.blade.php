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

    .socindivs {
        padding: 0px;
    }

    .timeshow {
        color: black;
        font-size: 18px;
    }

    .scoresocer {
        color: black;
        font-size: 18px
    }

    .tablefotercs {
        font-size: 12px;
        color: black;
    }

    .colwidthset {
        width: 1vw;
    }

    .lasttrgt {
        float: right;
    }

    .runner-name {
        padding: 8px 12px;
    }

    .runners {
        border-bottom: 1px solid #ddd;
    }

    .market-head {
        background: #f0f0f0;
        padding: 8px 12px;
        border-bottom: 1px solid #ddd;
    }

    .cta-back .price, .cta-lay .price {
        padding: 4px;
        font-weight: bold;
        margin-bottom: 2px;
    }

    .cta-back .size, .cta-lay .size {
        font-size: 11px;
        padding: 2px 4px;
        color: #666;
    }

    .position-plus {
        color: green;
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

        .scores .runnername {
            margin-top: 7px;
            line-height: 0.2;
            color: black;
            font-size: 11px;
        }

        .colwidthset {
            width: 50px;
        }

        .MBoxNopadding {
            padding: 0px;
        }
    }

    .fa-basketball-ball {
        color: black;
    }

    @media only screen and (max-width: 600px) {
        #MarketData .card-header {
            padding: 0.3rem 0.5rem;
        }
        #MarketData .card-header h4 {
            font-size: 1.1rem;
            margin-bottom: 0.1rem;
        }
    }

    .timelineNS {
        background: white;
        height: 32px;
        position: relative;
    }
</style>

@if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@elseif(isset($matchData))
    @php
        $status = $matchData['status'] ?? 'UNKNOWN';
        $statusColor = ($status === 'OPEN') ? 'rgb(232, 62, 140)' : 'rgb(0, 144, 105)';
        $inplay = $matchData['inplay'] ?? false;
        $totalMatched = $matchData['totalMatched'] ?? 0;
        $runners = $matchData['runners'] ?? [];
        
        // Match name passed from controller
        $displayMatchName = $matchName ?? 'Match Odds';
    @endphp

    <div class="row" id="loadedmarkettoshow">
        <div id="MarketData" role="tablist" aria-multiselectable="true" class="content panel-group col-md-8">
            <div class="card card-accent-primary">
                <div class="card-header" id="{{ $marketId }}">
                    <h4>
                        <strong>{{ $displayMatchName }}</strong> 
                        <span style="color: {{ $statusColor }};"><strong>{{ $status }}</strong></span> 
                        <i class="fa fa-address-book"></i>
                    </h4>
                </div>

                <div class="card-body market-box MBoxNopadding">
                    <div class="row bg-gray-100 market-head">
                        <div class="col">
                            <strong>Market ID: {{ $marketId }}</strong>
                        </div>
                        <div class="col text-right">
                            <strong>{{ $inplay ? 'IN-PLAY' : 'Pre-Match' }}</strong>
                        </div>
                    </div>

                    @foreach($runners as $runner)
                        @php
                            $selectionId = $runner['selectionId'] ?? 0;
                            $runnerStatus = $runner['status'] ?? 'UNKNOWN';
                            $backPrices = $runner['ex']['availableToBack'] ?? [];
                            $layPrices = $runner['ex']['availableToLay'] ?? [];
                            
                            // Get runner name - for now use selectionId, can be enhanced later
                            $runnerName = 'Runner ' . $selectionId;
                        @endphp

                        <div id="runner-{{ $selectionId }}" class="row runners">
                            <div class="col-7 col-md-4 runner-name">
                                <strong>{{ $runnerName }}</strong>
                                <br>
                                <span><span class="position-plus"><strong></strong></span></span>
                            </div>

                            <div class="col-5 col-md-8 price">
                                <div class="row">
                                    {{-- Back prices (3 columns, right to left) --}}
                                    @for($i = 2; $i >= 0; $i--)
                                        @if($i > 0)
                                            <div class="col-md-2 d-none d-md-block cta-back">
                                        @else
                                            <div class="col-6 col-md-2 cta-back">
                                        @endif
                                            @if(isset($backPrices[$i]))
                                                <div id="b{{ 3-$i }}-{{ $selectionId }}" class="col-12 price" style="{{ $i === 0 ? 'background-color: rgb(227, 248, 255);' : '' }}">
                                                    {{ $backPrices[$i]['price'] ?? '' }}
                                                </div>
                                                <div id="bs{{ 3-$i }}-{{ $selectionId }}" class="col-12 size" style="{{ $i === 0 ? 'background-color: rgb(227, 248, 255);' : '' }}">
                                                    {{ isset($backPrices[$i]['size']) ? number_format($backPrices[$i]['size'] / 1000, 1) . 'K' : '' }}
                                                </div>
                                            @else
                                                <div id="b{{ 3-$i }}-{{ $selectionId }}" class="col-12 price"></div>
                                                <div id="bs{{ 3-$i }}-{{ $selectionId }}" class="col-12 size"></div>
                                            @endif
                                        </div>
                                    @endfor

                                    {{-- Lay prices (3 columns, left to right) --}}
                                    @for($i = 0; $i < 3; $i++)
                                        @if($i === 0)
                                            <div class="col-6 col-md-2 cta-lay">
                                        @else
                                            <div class="col-md-2 d-none d-md-block cta-lay">
                                        @endif
                                            @if(isset($layPrices[$i]))
                                                <div id="l{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 price" style="{{ $i === 0 ? 'background-color: rgb(255, 205, 204);' : '' }}">
                                                    {{ $layPrices[$i]['price'] ?? '' }}
                                                </div>
                                                <div id="ls{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 size" style="{{ $i === 0 ? 'background-color: rgb(255, 205, 204);' : '' }}">
                                                    {{ isset($layPrices[$i]['size']) ? number_format($layPrices[$i]['size'] / 1000, 1) . 'K' : '' }}
                                                </div>
                                            @else
                                                <div id="l{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 price"></div>
                                                <div id="ls{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 size"></div>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    <p><strong>Status:</strong> {{ $status }}</p>
                    <p><strong>In-Play:</strong> {{ $inplay ? 'Yes' : 'No' }}</p>
                    <p><strong>Total Matched:</strong> {{ number_format($totalMatched, 2) }}</p>
                    <p><strong>Active Runners:</strong> {{ $matchData['numberOfActiveRunners'] ?? 0 }}</p>
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
