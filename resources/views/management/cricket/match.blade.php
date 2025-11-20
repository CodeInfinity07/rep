@extends('layouts.management')

@section('title', 'Cricket Match')

@section('content')

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
    @endphp

<div class="row" id="loadedmarkettoshow">
    <div id="MarketData" role="tablist" aria-multiselectable="true" class="content panel-group col-md-8">
        <div class="card card-accent-primary">
            <div class="card-header" id="{{ $marketId }}">
                <h4>
                    <strong>{{ $matchName }}</strong> 
                    <span style="color: {{ $statusColor }};"><strong>{{ $status }}</strong></span> 
                    <i class="fa fa-address-book"></i>
                </h4>
            </div>

            <div class="card-body market-box MBoxNopadding">
                <div class="row bg-gray-100 market-head">
                    <div class="col">
                        <strong>{{ $inplay ? 'IN-PLAY' : 'Pre-Match' }}</strong>
                    </div>
                    <div class="col text-right">
                        <strong>Total Matched: {{ number_format($totalMatched, 0) }}</strong>
                    </div>
                </div>

                @foreach($runners as $index => $runner)
                    @php
                        $selectionId = $runner['selectionId'] ?? 0;
                        $runnerStatus = $runner['status'] ?? 'UNKNOWN';
                        $backPrices = $runner['ex']['availableToBack'] ?? [];
                        $layPrices = $runner['ex']['availableToLay'] ?? [];
                        $runnerName = $runnerNames[$selectionId] ?? 'Runner ' . $selectionId;
                        $isLastItem = ($index === count($runners) - 1);
                    @endphp

                    <div id="runner-{{ $selectionId }}" class="row runners{{ $isLastItem ? ' lastItemBorder' : '' }}">
                        <div class="col-7 col-md-4 runner-name">
                            <strong>{{ $runnerName }}</strong>
                            <br>
                            <span><span class="position-plus"><strong></strong></span></span>
                        </div>

                        <div class="col-5 col-md-8 price">
                            <div class="row">
                                {{-- Back prices: B3 = [2], B2 = [1], B1 = [0] (right to left display) --}}
                                @for($i = 2; $i >= 0; $i--)
                                    @if($i > 0)
                                        <div class="col-md-2 d-none d-md-block cta-back">
                                    @else
                                        <div class="col-6 col-md-2 cta-back">
                                    @endif
                                        @php
                                            $position = $i + 1; // B3=3, B2=2, B1=1
                                            $priceIndex = $i; // B3 uses [2], B2 uses [1], B1 uses [0]
                                        @endphp
                                        @if(isset($backPrices[$priceIndex]))
                                            <div id="b{{ $position }}-{{ $selectionId }}" class="col-12 price" style="{{ $position === 1 ? 'background-color: rgb(227, 248, 255);' : '' }}" data-position="{{ $position }}" data-type="back">
                                                {{ $backPrices[$priceIndex]['price'] ?? '' }}
                                            </div>
                                            <div id="bs{{ $position }}-{{ $selectionId }}" class="col-12 size" style="{{ $position === 1 ? 'background-color: rgb(227, 248, 255);' : '' }}">
                                                @if(isset($backPrices[$priceIndex]['size']))
                                                    @php
                                                        $size = $backPrices[$priceIndex]['size'];
                                                        if ($size >= 1000000) {
                                                            echo number_format($size / 1000000, 1) . 'M';
                                                        } elseif ($size >= 1000) {
                                                            echo number_format($size / 1000, 1) . 'K';
                                                        } else {
                                                            echo number_format($size, 0);
                                                        }
                                                    @endphp
                                                @endif
                                            </div>
                                        @else
                                            <div id="b{{ $position }}-{{ $selectionId }}" class="col-12 price" data-position="{{ $position }}" data-type="back"></div>
                                            <div id="bs{{ $position }}-{{ $selectionId }}" class="col-12 size"></div>
                                        @endif
                                    </div>
                                @endfor

                                @for($i = 0; $i < 3; $i++)
                                    @if($i === 0)
                                        <div class="col-6 col-md-2 cta-lay">
                                    @else
                                        <div class="col-md-2 d-none d-md-block cta-lay">
                                    @endif
                                        @if(isset($layPrices[$i]))
                                            <div id="l{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 price" style="{{ $i === 0 ? 'background-color: rgb(255, 205, 204);' : '' }}" data-position="{{ $i+1 }}" data-type="lay">
                                                {{ $layPrices[$i]['price'] ?? '' }}
                                            </div>
                                            <div id="ls{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 size" style="{{ $i === 0 ? 'background-color: rgb(255, 205, 204);' : '' }}">
                                                @if(isset($layPrices[$i]['size']))
                                                    @php
                                                        $size = $layPrices[$i]['size'];
                                                        if ($size >= 1000000) {
                                                            echo number_format($size / 1000000, 1) . 'M';
                                                        } elseif ($size >= 1000) {
                                                            echo number_format($size / 1000, 1) . 'K';
                                                        } else {
                                                            echo number_format($size, 0);
                                                        }
                                                    @endphp
                                                @endif
                                            </div>
                                        @else
                                            <div id="l{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 price" data-position="{{ $i+1 }}" data-type="lay"></div>
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

    <div id="Pnl-Orders" class="col-md-4">
        <div class="card card-accent-primary right-content">
            <div class="card-body pt-1 pb-1">
                <div class="d-flex">
                    <div class="dropdown mr-2">
                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle">
                            Bet Lock
                        </a>
                        <div aria-labelledby="dropdownMenuLink" class="dropdown-menu">
                            <a href="#" class="dropdown-item">Match Odds</a>
                            <a href="#" class="dropdown-item">Other Markets</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">
                        User Book
                    </button>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary right-content">
            <div class="btn-group btn-group-xs" style="width: 100%; height: 30px; margin-bottom: 2px;">
                <button id="tvbackbtn" onclick="SHOWTV()" class="btn btn-primary btn-xs col" style="border-right: solid;">Tv</button>
                <button id="livebackbtn" onclick="SHOWLIVE()" class="btn btn-primary btn-xs col">Score Card</button>
            </div>
            <div id="TVDIV" style="display: none;">
                <div class="card-body video-container">
                    <div class="bets">
                        <p>TV streaming not configured</p>
                    </div>
                </div>
            </div>
            <div id="TVDIVIFRAME"></div>
            <div id="LIVEDIV" style="display: none;">
                <iframe id="livesc" src="" style="width: 100%;"></iframe>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <strong>Open Bets (0)</strong>
            </div>
            <div class="card-body Orders-Widget">
                <div class="row">
                    <div class="col-4 no-pad"><strong>Runner</strong></div>
                    <div class="col-2 no-pad"><strong>Price</strong></div>
                    <div class="col-2 no-pad"><strong>Size</strong></div>
                    <div class="col-2 no-pad"><strong>Better</strong></div>
                    <div class="col-2 no-pad"><strong>Master</strong></div>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <strong>Matched Bets (0)</strong>
                <button class="btn btn-sm btn-primary">Full Bet List</button>
            </div>
            <div class="card-body Orders-Widget">
                <div class="row">
                    <div class="col-4 no-pad"><strong>Runner</strong></div>
                    <div class="col-2 no-pad"><strong>Price</strong></div>
                    <div class="col-2 no-pad"><strong>Size</strong></div>
                    <div class="col-2 no-pad"><strong>Better</strong></div>
                    <div class="col-2 no-pad"><strong>Master</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// AJAX refresh every 1 second
const marketId = '{{ $marketId }}';
let refreshInterval;

function updateOdds() {
    fetch('/api/match-odds/' + marketId)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error fetching odds:', data.error);
                return;
            }

            // Update status
            const status = data.status || 'UNKNOWN';
            const statusColor = (status === 'OPEN') ? 'rgb(232, 62, 140)' : 'rgb(0, 144, 105)';
            document.querySelector('#{{ $marketId }} span').style.color = statusColor;
            document.querySelector('#{{ $marketId }} span strong').textContent = status;

            // Update runners
            const runners = data.runners || [];
            runners.forEach(runner => {
                const selectionId = runner.selectionId;
                const backPrices = runner.ex?.availableToBack || [];
                const layPrices = runner.ex?.availableToLay || [];

                // Update back prices: B3=[2], B2=[1], B1=[0]
                for (let i = 2; i >= 0; i--) {
                    const position = i + 1; // B3=3, B2=2, B1=1
                    const priceIndex = i; // B3 uses [2], B2 uses [1], B1 uses [0]
                    const priceEl = document.getElementById('b' + position + '-' + selectionId);
                    const sizeEl = document.getElementById('bs' + position + '-' + selectionId);
                    
                    if (backPrices[priceIndex]) {
                        if (priceEl) priceEl.textContent = backPrices[priceIndex].price || '';
                        if (sizeEl) {
                            const size = backPrices[priceIndex].size || 0;
                            let sizeText = '';
                            if (size >= 1000000) {
                                sizeText = (size / 1000000).toFixed(1) + 'M';
                            } else if (size >= 1000) {
                                sizeText = (size / 1000).toFixed(1) + 'K';
                            } else {
                                sizeText = size.toString();
                            }
                            sizeEl.textContent = sizeText;
                        }
                    } else {
                        if (priceEl) priceEl.textContent = '';
                        if (sizeEl) sizeEl.textContent = '';
                    }
                }

                // Update lay prices
                for (let i = 0; i < 3; i++) {
                    const priceEl = document.getElementById('l' + (i+1) + '-' + selectionId);
                    const sizeEl = document.getElementById('ls' + (i+1) + '-' + selectionId);
                    
                    if (layPrices[i]) {
                        if (priceEl) priceEl.textContent = layPrices[i].price || '';
                        if (sizeEl) {
                            const size = layPrices[i].size || 0;
                            let sizeText = '';
                            if (size >= 1000000) {
                                sizeText = (size / 1000000).toFixed(1) + 'M';
                            } else if (size >= 1000) {
                                sizeText = (size / 1000).toFixed(1) + 'K';
                            } else {
                                sizeText = size.toString();
                            }
                            sizeEl.textContent = sizeText;
                        }
                    } else {
                        if (priceEl) priceEl.textContent = '';
                        if (sizeEl) sizeEl.textContent = '';
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error updating odds:', error);
        });
}

// Start refresh on page load
document.addEventListener('DOMContentLoaded', function() {
    // Initial update after 1 second
    setTimeout(updateOdds, 1000);
    // Then every 1 second
    refreshInterval = setInterval(updateOdds, 1000);
});

// TV/Scorecard toggle functions
function SHOWTV() {
    document.getElementById('TVDIV').style.display = 'block';
    document.getElementById('LIVEDIV').style.display = 'none';
}

function SHOWLIVE() {
    document.getElementById('TVDIV').style.display = 'none';
    document.getElementById('LIVEDIV').style.display = 'block';
    // Set iframe source if not set
    const iframe = document.getElementById('livesc');
    if (!iframe.src || iframe.src === '') {
        iframe.src = 'https://bpexch.xyz/Common/LiveScoreCard?id={{ $marketId }}';
    }
}

// Show scorecard by default
document.addEventListener('DOMContentLoaded', function() {
    SHOWLIVE();
});
</script>

@else
    <div class="alert alert-warning">
        No match data available
    </div>
@endif

@endsection
