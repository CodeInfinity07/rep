@extends('layouts.bettor')

@section('title', '{{ $marketDetails["marketName"] ?? "Match" }} | BetPro')

@section('content')
<style>
.content-wrap {
    padding: 0;
}
.table-wrap {
    background: #fff;
    border-radius: 5px;
    margin-bottom: 15px;
}
.table-box-header {
    background: #243a48;
    color: #fff;
    padding: 15px;
}
.event-title {
    font-size: 20px;
    font-weight: bold;
    margin: 10px 0;
}
.green-upper-text {
    color: #00e396;
    font-weight: bold;
}
.black-light-text {
    color: #ccc;
    font-size: 13px;
}
.medium-black {
    color: #ddd;
    font-weight: 500;
}
.market-titlebar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #f5f5f5;
    padding: 10px 15px;
    border-bottom: 2px solid #ddd;
}
.market-name {
    flex: 1;
    font-weight: bold;
    margin: 0;
}
.market-overarround {
    min-width: 100px;
    text-align: center;
    font-weight: bold;
    color: #72bbef;
}
.market-overarround-lay {
    color: #faa9ba;
}
.market-runners {
    background: #fff;
}
.runner-runner {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    border-bottom: 1px solid #eee;
}
.runner-name {
    flex: 1;
    margin: 0;
    font-size: 14px;
    font-weight: 600;
}
.price-price {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-width: 75px;
    height: 50px;
    border: 1px solid #ddd;
    margin: 0 2px;
    cursor: pointer;
    text-decoration: none;
    color: #000;
}
.price-back {
    background-color: #8dd2f0;
}
.price-lay {
    background-color: #feafb2;
}
.price-odd {
    font-size: 16px;
    font-weight: bold;
}
.price-amount {
    font-size: 11px;
    color: #666;
}
.runner-position {
    font-size: 12px;
    margin-left: 10px;
}
.position-minus {
    color: #dc3545;
}
.position-plus {
    color: #28a745;
}
</style>

<div class="content-wrap body">
    @if(isset($error))
        <div class="alert alert-danger m-3">
            {{ $error }}
        </div>
    @else
        <div class="left-content">
            <div class="table-wrap">
                <div class="table-box-header">
                    <div class="row no-gutters">
                        <div class="col-md-auto">
                            <div class="box-main-icon">
                                <img src="/img/v2/cricket.svg" alt="Cricket" style="width: 50px;">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="tb-top-text">
                                <p>
                                    @if(isset($marketDetails['inplay']) && $marketDetails['inplay'])
                                        <img src="/img/v2/clock-green.svg" style="width: 16px;"> 
                                        <span class="green-upper-text">InPlay</span>
                                    @endif
                                    <span class="black-light-text">{{ $marketDetails['marketStartTime'] ?? '' }}</span>
                                    <span class="black-light-text"> | Winners: 1</span>
                                </p>
                                <h4 class="event-title">{{ $marketDetails['event']['name'] ?? $marketDetails['marketName'] ?? 'Match Details' }}</h4>
                                <p><span class="medium-black">Market ID: {{ $marketId }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Match Odds Market --}}
                @if(isset($marketDetails['runners']) && count($marketDetails['runners']) > 0)
                    <div>
                        <div class="market-titlebar">
                            <p class="market-name">
                                <span>Match Odds</span>
                                <span style="text-transform: initial; font-weight: normal; font-size: 12px;"> (MaxBet: 200K)</span>
                            </p>
                            <div class="market-overarround">
                                <strong>Back</strong>
                            </div>
                            <div class="market-overarround market-overarround-lay">
                                <strong>Lay</strong>
                            </div>
                        </div>
                        <div class="market-runners">
                            @foreach($marketDetails['runners'] as $runner)
                                @php
                                    $selectionId = $runner['selectionId'] ?? null;
                                    $runnerOdds = null;
                                    
                                    // Find odds for this runner
                                    if (isset($marketsData[$marketId]['runners']) && is_array($marketsData[$marketId]['runners'])) {
                                        foreach ($marketsData[$marketId]['runners'] as $odds) {
                                            if (isset($odds['selectionId']) && $odds['selectionId'] == $selectionId) {
                                                $runnerOdds = $odds;
                                                break;
                                            }
                                        }
                                    }
                                    
                                    // Helper function to format size
                                    $formatSize = function($size) {
                                        if (!$size || $size == 0) return '';
                                        if ($size >= 1000000) return number_format($size / 1000000, 1) . 'M';
                                        if ($size >= 1000) return number_format($size / 1000, 1) . 'K';
                                        return number_format($size);
                                    };
                                    
                                    // Extract back prices
                                    $back1 = '-';
                                    $back2 = '-';
                                    $back3 = '-';
                                    $backSize1 = '';
                                    $backSize2 = '';
                                    $backSize3 = '';
                                    
                                    if ($runnerOdds && isset($runnerOdds['ex']['availableToBack'])) {
                                        $backs = $runnerOdds['ex']['availableToBack'];
                                        if (isset($backs[0])) {
                                            $back1 = $backs[0]['price'] ?? '-';
                                            $backSize1 = isset($backs[0]['size']) ? $formatSize($backs[0]['size']) : '';
                                        }
                                        if (isset($backs[1])) {
                                            $back2 = $backs[1]['price'] ?? '-';
                                            $backSize2 = isset($backs[1]['size']) ? $formatSize($backs[1]['size']) : '';
                                        }
                                        if (isset($backs[2])) {
                                            $back3 = $backs[2]['price'] ?? '-';
                                            $backSize3 = isset($backs[2]['size']) ? $formatSize($backs[2]['size']) : '';
                                        }
                                    }
                                    
                                    // Extract lay prices
                                    $lay1 = '-';
                                    $lay2 = '-';
                                    $lay3 = '-';
                                    $laySize1 = '';
                                    $laySize2 = '';
                                    $laySize3 = '';
                                    
                                    if ($runnerOdds && isset($runnerOdds['ex']['availableToLay'])) {
                                        $lays = $runnerOdds['ex']['availableToLay'];
                                        if (isset($lays[0])) {
                                            $lay1 = $lays[0]['price'] ?? '-';
                                            $laySize1 = isset($lays[0]['size']) ? $formatSize($lays[0]['size']) : '';
                                        }
                                        if (isset($lays[1])) {
                                            $lay2 = $lays[1]['price'] ?? '-';
                                            $laySize2 = isset($lays[1]['size']) ? $formatSize($lays[1]['size']) : '';
                                        }
                                        if (isset($lays[2])) {
                                            $lay3 = $lays[2]['price'] ?? '-';
                                            $laySize3 = isset($lays[2]['size']) ? $formatSize($lays[2]['size']) : '';
                                        }
                                    }
                                @endphp
                                
                                <div class="runner-runner">
                                    <h3 class="runner-name">
                                        <div class="runner-info">
                                            <span class="runner-display-name">
                                                <h4 style="margin: 0; font-size: 14px;">{{ $runner['runnerName'] ?? 'Runner' }}</h4>
                                            </span>
                                        </div>
                                        <div class="runner-position">
                                            <span class="position-minus"><strong></strong></span>
                                        </div>
                                    </h3>
                                    
                                    {{-- Back prices (B3, B2, B1) --}}
                                    <a class="price-price price-back">
                                        <span class="price-odd">{{ $back3 }}</span>
                                        <span class="price-amount">{{ $backSize3 }}</span>
                                    </a>
                                    <a class="price-price price-back">
                                        <span class="price-odd">{{ $back2 }}</span>
                                        <span class="price-amount">{{ $backSize2 }}</span>
                                    </a>
                                    <a class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);">
                                        <span class="price-odd">{{ $back1 }}</span>
                                        <span class="price-amount">{{ $backSize1 }}</span>
                                    </a>
                                    
                                    {{-- Lay prices (L1, L2, L3) --}}
                                    <a class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);">
                                        <span class="price-odd">{{ $lay1 }}</span>
                                        <span class="price-amount">{{ $laySize1 }}</span>
                                    </a>
                                    <a class="price-price price-lay">
                                        <span class="price-odd">{{ $lay2 }}</span>
                                        <span class="price-amount">{{ $laySize2 }}</span>
                                    </a>
                                    <a class="price-price price-lay mr-4">
                                        <span class="price-odd">{{ $lay3 }}</span>
                                        <span class="price-amount">{{ $laySize3 }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Other Markets --}}
                @if(isset($allMarketIds) && count($allMarketIds) > 1)
                    <div class="mt-3 p-3 bg-white">
                        <h5>Other Markets</h5>
                        <div class="list-group">
                            @foreach($allMarketIds as $mktId)
                                @if($mktId !== $marketId)
                                    <a href="/cricket/{{ $mktId }}" class="list-group-item list-group-item-action">
                                        Market: {{ $mktId }}
                                    </a>
                                @endif
                            @endforeach
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
}, 5000);
</script>
@endsection
