@extends('layouts.management')

@section('title', 'Cricket Match')

@section('content')

@if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@else
    @php
        // Extract match name and runners from market details
        $matchName = $marketDetails['event']['name'] ?? 'Match Odds';
        $mainMarket = null;
        
        // Find the main market from marketsData
        if (isset($marketsData[$marketId])) {
            $mainMarket = $marketsData[$marketId];
        }
        
        // Build runner names lookup from market details
        $runnerNames = [];
        if (isset($marketDetails['runners']) && is_array($marketDetails['runners'])) {
            foreach ($marketDetails['runners'] as $runner) {
                $selectionId = $runner['selectionId'] ?? null;
                $runnerName = $runner['runnerName'] ?? null;
                if ($selectionId && $runnerName) {
                    $runnerNames[$selectionId] = $runnerName;
                }
            }
        }
        
        $status = $mainMarket['status'] ?? 'UNKNOWN';
        $inplay = $mainMarket['inplay'] ?? false;
    @endphp

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
</style>

<div class="row" id="loadedmarkettoshow">
    <div id="MarketData" role="tablist" aria-multiselectable="true" class="content panel-group col-md-8">
        @if($mainMarket)
        <div class="card card-accent-primary">
            <div class="card-header" id="{{ $marketId }}">
                <h4>
                    <strong>{{ $matchName }} - {{ $marketDetails['marketName'] ?? 'Match Odds' }}</strong> 
                    @if($inplay)
                    <span style="color: rgb(232, 62, 140);"><strong>InPlay</strong></span>
                    @endif
                    <i class="fa fa-address-book"></i>
                </h4>
            </div>

            <div class="card-body market-box MBoxNopadding">
                @foreach($mainMarket['runners'] ?? [] as $index => $runner)
                    @php
                        $selectionId = $runner['selectionId'] ?? 0;
                        $runnerStatus = $runner['status'] ?? 'ACTIVE';
                        // Handle both response formats: ex.availableToBack and back
                        $backPrices = $runner['ex']['availableToBack'] ?? $runner['back'] ?? [];
                        $layPrices = $runner['ex']['availableToLay'] ?? $runner['lay'] ?? [];
                        // Use runnerName from response, or fallback to lookup
                        $runnerName = $runner['runnerName'] ?? $runnerNames[$selectionId] ?? 'Runner ' . $selectionId;
                        $isLastItem = ($index === count($mainMarket['runners']) - 1);
                    @endphp

                    <div id="runner-{{ $selectionId }}" class="row runners{{ $isLastItem ? ' lastItemBorder' : '' }}">
                        <div class="col-7 col-md-4 runner-name">
                            <strong>{{ $runnerName }}</strong>
                            <br>
                            <span><span class="position-plus"><strong></strong></span></span>
                        </div>

                        <div class="col-5 col-md-8 price">
                            <div class="row">
                                @for($i = 2; $i >= 0; $i--)
                                    @if($i > 0)
                                        <div class="col-md-2 d-none d-md-block cta-back">
                                    @else
                                        <div class="col-6 col-md-2 cta-back">
                                    @endif
                                        @php
                                            $position = $i + 1;
                                            $priceIndex = $i;
                                        @endphp
                                        @if(isset($backPrices[$priceIndex]))
                                            <div id="b{{ $position }}-{{ $selectionId }}" class="col-12 price" style="{{ $position === 1 ? 'background-color: rgb(227, 248, 255);' : '' }}" data-position="{{ $position }}" data-type="back">
                                                @php
                                                    $price = $backPrices[$priceIndex]['price'] ?? '';
                                                    echo ($price && $price != 0) ? $price : '';
                                                @endphp
                                            </div>
                                            <div id="bs{{ $position }}-{{ $selectionId }}" class="col-12 size" style="{{ $position === 1 ? 'background-color: rgb(234, 246, 170);' : '' }}">
                                                @if(isset($backPrices[$priceIndex]['size']))
                                                    @php
                                                        $size = $backPrices[$priceIndex]['size'];
                                                        if ($size > 0) {
                                                            if ($size >= 1000000) {
                                                                echo number_format($size / 1000000, 1) . 'M';
                                                            } elseif ($size >= 1000) {
                                                                echo number_format($size / 1000, 1) . 'K';
                                                            } else {
                                                                echo number_format($size, 0);
                                                            }
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
                                            <div id="l{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 price" style="{{ $i === 0 ? 'background-color: rgb(255, 205, 204);' : '' }}">
                                                @php
                                                    $price = $layPrices[$i]['price'] ?? '';
                                                    echo ($price && $price != 0) ? $price : '';
                                                @endphp
                                            </div>
                                            <div id="ls{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 size" style="{{ $i === 0 ? 'background-color: rgb(252, 220, 138);' : '' }}">
                                                @if(isset($layPrices[$i]['size']))
                                                    @php
                                                        $size = $layPrices[$i]['size'];
                                                        if ($size > 0) {
                                                            if ($size >= 1000000) {
                                                                echo number_format($size / 1000000, 1) . 'M';
                                                            } elseif ($size >= 1000) {
                                                                echo number_format($size / 1000, 1) . 'K';
                                                            } else {
                                                                echo number_format($size, 0);
                                                            }
                                                        }
                                                    @endphp
                                                @endif
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
        @endif

        @foreach($marketsData as $mktId => $market)
            @if($mktId !== $marketId && $market)
                @php
                    $marketName = $market['marketName'] ?? 'Market';
                    $cardClass = 'card-accent-success';
                    if (str_contains(strtolower($marketName), 'fancy')) {
                        $cardClass = 'card-accent-danger';
                    } elseif (str_contains(strtolower($marketName), 'bookmaker')) {
                        $cardClass = 'card-accent-success';
                    }
                @endphp
                <div class="card {{ $cardClass }}">
                    <div class="row bg-gray-100 market-head">
                        <div class="col-12">
                            <strong>{{ $marketName }}</strong>
                            <i class="fa fa-address-book"></i>
                        </div>
                    </div>

                    <div id="market-{{ $mktId }}">
                        @foreach($market['runners'] ?? [] as $runner)
                            @php
                                $selectionId = $runner['selectionId'] ?? 0;
                                $runnerName = $runner['runnerName'] ?? $runnerNames[$selectionId] ?? 'Runner ' . $selectionId;
                                // Handle both response formats: ex.availableToBack and back
                                $backPrices = $runner['ex']['availableToBack'] ?? $runner['back'] ?? [];
                                $layPrices = $runner['ex']['availableToLay'] ?? $runner['lay'] ?? [];
                                $runnerStatus = $runner['status'] ?? 'ACTIVE';
                            @endphp

                            <div id="runner-{{ $selectionId }}" class="row runners">
                                <div class="col-7 col-md-4 runner-name">
                                    <strong>{{ $runnerName }}</strong>
                                    <br>
                                    <span><span class="position-plus"><strong></strong></span></span>
                                    @if(str_contains(strtolower($marketName), 'fancy'))
                                        <button class="btn btn-link btn-fullBook">Full Book</button>
                                    @endif
                                </div>

                                <div class="col-5 col-md-8 price">
                                    @if($runnerStatus === 'SUSPENDED')
                                        <div class="" style="width: 102%; line-height: 45px; color: red; text-align: center; background: rgb(236, 236, 237); text-transform: uppercase;">
                                            SUSPENDED
                                        </div>
                                    @else
                                        <div class="row">
                                            @for($i = 2; $i >= 0; $i--)
                                                @if($i > 0)
                                                    <div class="col-md-2 d-none d-md-block cta-back">
                                                @else
                                                    <div class="col-6 col-md-2 cta-back">
                                                @endif
                                                    @php
                                                        $position = $i + 1;
                                                        $priceIndex = $i;
                                                    @endphp
                                                    @if(isset($backPrices[$priceIndex]))
                                                        <div id="b{{ $position }}-{{ $selectionId }}" class="col-12 price" style="{{ $position === 1 ? 'background-color: rgb(227, 248, 255);' : '' }}">
                                                            @php
                                                                $price = $backPrices[$priceIndex]['price'] ?? '';
                                                                echo ($price && $price != 0) ? $price : '';
                                                            @endphp
                                                        </div>
                                                        <div id="bs{{ $position }}-{{ $selectionId }}" class="col-12 size" style="{{ $position === 1 ? 'background-color: rgb(227, 248, 255);' : '' }}">
                                                            @if(isset($backPrices[$priceIndex]['size']))
                                                                @php
                                                                    $size = $backPrices[$priceIndex]['size'];
                                                                    if ($size > 0) {
                                                                        if ($size >= 1000000) {
                                                                            echo number_format($size / 1000000, 1) . 'M';
                                                                        } elseif ($size >= 1000) {
                                                                            echo number_format($size / 1000, 1) . 'K';
                                                                        } else {
                                                                            echo number_format($size, 0);
                                                                        }
                                                                    }
                                                                @endphp
                                                            @endif
                                                        </div>
                                                    @else
                                                        <div id="b{{ $position }}-{{ $selectionId }}" class="col-12 price"></div>
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
                                                        <div id="l{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 price" style="{{ $i === 0 ? 'background-color: rgb(255, 205, 204);' : '' }}">
                                                            @php
                                                                $price = $layPrices[$i]['price'] ?? '';
                                                                echo ($price && $price != 0) ? $price : '';
                                                            @endphp
                                                        </div>
                                                        <div id="ls{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 size" style="{{ $i === 0 ? 'background-color: rgb(255, 205, 204);' : '' }}">
                                                            @if(isset($layPrices[$i]['size']))
                                                                @php
                                                                    $size = $layPrices[$i]['size'];
                                                                    if ($size > 0) {
                                                                        if ($size >= 1000000) {
                                                                            echo number_format($size / 1000000, 1) . 'M';
                                                                        } elseif ($size >= 1000) {
                                                                            echo number_format($size / 1000, 1) . 'K';
                                                                        } else {
                                                                            echo number_format($size, 0);
                                                                        }
                                                                    }
                                                                @endphp
                                                            @endif
                                                        </div>
                                                    @else
                                                        <div id="l{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 price"></div>
                                                        <div id="ls{{ $i+1 }}-{{ $selectionId }}" class="col-md-12 col-sm-12 size"></div>
                                                    @endif
                                                </div>
                                            @endfor
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div id="Pnl-Orders" class="col-md-4">
        <div class="card card-accent-primary right-content">
            <div class="card-body pt-1 pb-1">
                <div class="d-flex">
                    <div class="dropdown mr-2">
                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle">Bet Lock</a>
                        <div aria-labelledby="dropdownMenuLink" class="dropdown-menu">
                            <a href="#" class="dropdown-item">Match Odds</a>
                            <a href="#" class="dropdown-item">Other Markets</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">User Book</button>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary right-content">
            <div class="btn-group btn-group-xs" style="width: 100%; height: 30px; margin-bottom: 2px;">
                <button id="tvbackbtn" onclick="SHOWTV()" class="btn btn-primary btn-xs col" style="border-right: solid;">Tv</button>
                <button id="livebackbtn" onclick="SHOWLIVE()" class="btn btn-primary btn-xs col">Score Card</button>
            </div>
            <div id="TVDIV" style="display: none;"></div>
            <div id="TVDIVIFRAME"></div>
            <div id="LIVEDIV" style="display: none;">
                <iframe id="livesc" src="about:blank" style="width: 100%;"></iframe>
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
    function SHOWTV() {
        document.getElementById('TVDIV').style.display = 'block';
        document.getElementById('LIVEDIV').style.display = 'none';
    }

    function SHOWLIVE() {
        document.getElementById('TVDIV').style.display = 'none';
        document.getElementById('LIVEDIV').style.display = 'block';
    }

    // Auto-refresh odds every 1 second
    function updateOdds() {
        fetch('/api/match-odds/{{ $marketId }}')
            .then(response => response.json())
            .then(data => {
                if (data && data.runners) {
                    data.runners.forEach(runner => {
                        const selectionId = runner.selectionId;
                        const backPrices = runner.ex?.availableToBack || [];
                        const layPrices = runner.ex?.availableToLay || [];

                        // Update back prices
                        for (let i = 2; i >= 0; i--) {
                            const position = i + 1;
                            const priceIndex = i;
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
                }
            })
            .catch(error => console.error('Error updating odds:', error));
    }

    // Start polling
    setInterval(updateOdds, 1000);
</script>
@endif

@endsection
