@extends('layouts.bettor')

@section('title', 'Match Details | BETGURU')

@section('content')
                    

<style>

    .match-iframe-container {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    /* Then style the iframe to fit in the container div with full height and width */
    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .containerofiframe {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: max-content;
        padding-top: 88%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
    }

    .checknow {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* IE 10+ and Edge */
        user-select: none; /* Standard syntax */
    }

    .controls {
        overflow: hidden;
        background: #2b2f35;
        /* height: 35px; */
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .scores {
        background-color: #2b2f35;
        border: 1px solid #2b2f35;
        padding: 0.25rem;
    }

    .scores .runnername {
        margin-top: 7px;
        line-height: 0.2;
        color: white;
        font-size: 18px;
    }

    .scores .runner-score {
        color: white;
        font-size: 18px;
        margin-top: 2px;
        padding: 0px;
    }

    .scores .active {
        color: #009069
    }

    .scores .col-divider {
        border-left: 1px solid white;
    }

    .tablefoter {
        font-size: 14px;
        border: 1px solid white;
        color: white;
    }

    .socindivs {
        padding: 0px;
    }

    .timeshow {
        color: white;
        font-size: 18px;
    }

    .scoresocer {
        color: white;
        font-size: 18px
    }

    .tablefotercs {
        font-size: 12px;
        color: white;
    }

    .colwidthset {
        width: 1vw;
    }

    .right-nav {
        padding-left: 10px;
    }

    #TVDIVIFRAME iframe {
        height: 330px;
        width: 100%;
        border: none;
        overflow: hidden;
    }

    @media screen and (max-width: 480px) {
        #TVDIVIFRAME iframe {
            height: 230px;
            width: 100%;
            border: none;
            overflow: hidden;
        }

        .runnername {
            margin-top: 10px;
            line-height: 0.1;
            color: white;
            font-size: 9px;
        }

        .colwidthset {
            width: 50px;
        }

        .tableresp {
            display: inline-table;
        }

        .lrhom {
            display: none;
        }

        .sethourshow {
            line-height: 0.3;
            font-size: 15px;
        }

        .tablefoter {
            font-size: 10px;
        }

        .runnersocer {
            color: white;
            font-size: 13px;
            margin-top: 2px;
            padding: 0px;
            line-height: 1.2;
        }

        .socindivs {
            padding: 0px;
        }

        .timeshow {
            color: white;
            font-size: 12px;
        }

        .scoresocer {
            color: white;
            font-size: 18px;
            padding: 0px;
            margin-bottom: 7px;
        }

        .tablefotercs {
            font-size: 11px;
            color: white;
        }

        .scores .runnername {
            margin-top: 7px;
            line-height: 0.2;
            color: white;
            font-size: 12px;
        }
    }

    @media screen and (max-width: 480px) {
        .runnername {
            margin-top: 10px;
            line-height: 0.1;
            color: white;
            font-size: 9px;
        }

        .colwidthset {
            width: 50px;
        }

        .tableresp {
            display: inline-table;
        }

        .lrhom {
            display: none;
        }

        .sethourshow {
            line-height: 0.3;
            font-size: 15px;
        }

        .tablefoter {
            font-size: 10px;
        }

        .runnersocer {
            color: white;
            font-size: 13px;
            margin-top: 2px;
            padding: 0px;
            line-height: 1.2;
        }

        .socindivs {
            padding: 0px;
        }

        .timeshow {
            color: white;
            font-size: 12px;
        }

        .scoresocer {
            color: white;
            font-size: 18px;
            padding: 0px;
            margin-bottom: 7px;
        }

        .tablefotercs {
            font-size: 11px;
            color: white;
        }

        .scores .runnername {
            margin-top: 7px;
            line-height: 0.2;
            color: white;
            font-size: 12px;
        }

        iframe {
            width: 1px;
            min-width: 100%;
        }
    }

    iframe {
        width: 1px;
        min-width: 100%;
    }

    /* Style the tab */
    .tabcontent {
        margin-top: -4px;
        display: none;
        border: 1px solid #ccc;
        border-top: none;
        background-color: white;
    }

    div.scrollmenu {
        overflow: auto;
        white-space: nowrap;
        margin-bottom: -10px;
        transition: 0.5s;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    div.scrollmenu a {
        display: inline-block;
        color: black;
        text-align: center;
        padding: 0px 20px;
        text-decoration: none;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    div.scrollmenu a:hover {
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
</style>

<script>
    const marketId = '{{ $marketId ?? "1.249449817" }}';
    const eventId = '{{ $eventId ?? "34872738" }}';
    const timeCode = '';

    const CommentrySignalR = 1;
    const SsocketEnable = 1;
    const CatalogSignalR = 0; //1;
</script>
<script src="/js/unreal_html5_player_script_v2.js?00001"></script>

<div id="MarketView"><div class="text-center mt-10" style="display: none;"><img src="/img/loadinggif.gif" alt="Loading..."></div> <div class="match-detail-content"><div class="left-content"><div class="table-wrap"><div class="table-box-header"><div class="row no-gutters"><div class="col-md-auto"><div class="box-main-icon"><img src="/img/v2/cricket.svg" alt="Box Icon"></div></div> <div class="col-md"><div class="tb-top-text"><p><img src="/img/v2/clock-green.svg"> <span class="green-upper-text">InPlay</span> <span class="black-light-text">7 hours ago | Nov 21 7:20 am</span> <span class="black-light-text"> | Winners: 1</span></p> <h4 class="event-title">Australia v England</h4> <p><span class="medium-black">Elapsed : 07:08:46</span></p><div id="DisplayOnBox" class="form-group form-check pull-right"><input type="checkbox" id="IsDisplayOn" class="form-check-input"> <label for="IsDisplayOn" class="form-check-label">Keep Display On</label></div> <p></p></div></div></div> <div class="scrollmenu"><a id="Alltab" class="tablink btn btn-primary">
                                ALL
                            </a> <!----> <a id="BMtab" href="#" onclick="MarketTab('BM')" class="tablink btn btn-primary">Bookmaker</a> <!----> <a id="Fancy2tab" href="#" onclick="MarketTab('Fancy2')" class="tablink btn btn-primary">Fancy-2</a> <a id="Figuretab" href="#" onclick="MarketTab('Figure')" class="tablink btn btn-primary">Figure</a> <a id="OddFiguretab" href="#" onclick="MarketTab('OddFigure')" class="tablink btn btn-primary">Even-Odd</a> <!----> </div></div> <!----> <!----> <div class="table-box-header"><div class="row no-gutters"><div class="col-md"><div class="tb-top-text"><p></p><div><span>AUS</span> <span class="medium-black">112/6 (35)</span> <span class="runrate">CRR: 3.20</span></div> <span class="green-upper-text" style="margin-top: -8px;"><div class="row"><div>
                                                    Four
                                                </div> <div style="margin-left: 8px; margin-top: -3px;"><input type="checkbox" class="fas fa-volume-mute fa-inverse" style="width: 0px; margin-right: 35px; font-size: 15px;"></div></div></span> <p></p> <p>This Over : &nbsp; 0   1   1   1   1   4   -   This Over : 8</p> <!----></div></div></div></div> <div id="All" class="tabcontent" style="display: block;"><div id="nav-tabContent" class="tab-content"><div id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab" class="tab-pane fade show active"><div class="table-box-body"><!----> <div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Match Odds </span> <span style="text-transform: initial;">
                    (MaxBet: 200K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners"><div id="runner-16606" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img src="" class="ml-2"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer" data-original-title="" title="">
                        Australia
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-16606" role="button" class="price-price price-back"><span class="price-odd">1.99</span> <span class="price-amount">73.5K</span></a> <a id="B2-16606" class="price-price price-back"><span class="price-odd">2</span> <span class="price-amount">2.2M</span></a> <a id="B1-16606" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.02</span> <span class="price-amount">873.7K</span></a> <a id="L1-16606" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.04</span> <span class="price-amount">14.5M</span></a> <a class="price-price price-lay"><span class="price-odd">2.06</span> <span class="price-amount">17.3M</span></a> <a class="price-price price-lay mr-4"><span class="price-odd">2.08</span> <span class="price-amount">939.4K</span></a></div><div id="runner-10301" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img src="" class="ml-2"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer" data-original-title="" title="">
                        England
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-10301" role="button" class="price-price price-back"><span class="price-odd">1.98</span> <span class="price-amount">10.8M</span></a> <a id="B2-10301" class="price-price price-back"><span class="price-odd">1.99</span> <span class="price-amount">801.4K</span></a> <a id="B1-10301" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2</span> <span class="price-amount">5.3M</span></a> <a id="L1-10301" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.02</span> <span class="price-amount">705.2K</span></a> <a class="price-price price-lay"><span class="price-odd">2.04</span> <span class="price-amount">1.1M</span></a> <a class="price-price price-lay mr-4"><span class="price-odd">2.06</span> <span class="price-amount">1.5M</span></a></div><div id="runner-60443" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img src="" class="ml-2"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer" data-original-title="" title="">
                        The Draw
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-60443" role="button" class="price-price price-back"><span class="price-odd">85</span> <span class="price-amount">67.1K</span></a> <a id="B2-60443" class="price-price price-back"><span class="price-odd">90</span> <span class="price-amount">4.1K</span></a> <a id="B1-60443" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">95</span> <span class="price-amount">425</span></a> <a id="L1-60443" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">100</span> <span class="price-amount">351</span></a> <a class="price-price price-lay"><span class="price-odd">110</span> <span class="price-amount">2.9K</span></a> <a class="price-price price-lay mr-4"><span class="price-odd">120</span> <span class="price-amount">6.2K</span></a></div></div></div> <!----> <!----> <div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Bookmaker </span> <span style="text-transform: initial;">
                    (MaxBet: 1M)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners"><div id="runner-330218" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Australia
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-330218" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-330218" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-330218" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.01</span> <span class="price-amount">100</span></a> <a id="L1-330218" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.05</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div><div id="runner-132390" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        England
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div><div id="runner-514539" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        The Draw
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div> <!----> <div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Fancy 2 </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div id="market-9.20530059"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Alex Carey Boundaries
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">6</span> <span class="price-amount">100</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">5</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530058"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Alex Carey Runs
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">44</span> <span class="price-amount">100</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">43</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530063"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Fall of 7th Wkt AUS
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">127</span> <span class="price-amount">90</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">127</span> <span class="price-amount">110</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530065"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Mitchell Starc Boundaries
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2</span> <span class="price-amount">100</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530064"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Mitchell Starc Runs
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">19</span> <span class="price-amount">90</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">19</span> <span class="price-amount">110</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div></div>  <div class="tb-content"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Australia 40 Over Total Last Figure </span> <span style="text-transform: initial;">
                    (MaxBet: 100K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <!----> <!----></div> <div><div class="card" style="padding: 1px 18px;"><div class="row"><div class="col-3 col-lg-4 mobilehide"></div> <div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="10"><b><span class="priceodd">0</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="1"><b><span class="priceodd">1</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="2"><b><span class="priceodd">2</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="3"><b><span class="priceodd">3</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="4"><b><span class="priceodd">4</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><!----><!----><!----><!----><!----> <div class="col-3 col-lg-4 mobilehide"></div></div> <div class="row"><div class="col-3 col-lg-4 mobilehide"></div> <!----><!----><!----><!----><!----><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="5"><b><span class="priceodd">5</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="6"><b><span class="priceodd">6</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="7"><b><span class="priceodd">7</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="8"><b><span class="priceodd">8</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="9"><b><span class="priceodd">9</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div> <div class="col-3 col-lg-4 mobilehide"></div></div></div></div></div></div> <div><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Even / Odd </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="tb-content"><div class="tb-content"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        2nd Inn 40 Over Run Odd (Kalli)
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show" style="background-color: rgb(141, 210, 240);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1.98</span> <span class="price-amount">98</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show" style="background-color: rgb(254, 175, 178);"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.02</span> <span class="price-amount">102</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div></div></div></div></div></div></div> <!----> <div id="BM" class="tabcontent"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Bookmaker </span> <span style="text-transform: initial;">
                    (MaxBet: 1M)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="market-runners"><div id="runner-330218" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Australia
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-330218" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-330218" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-330218" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.01</span> <span class="price-amount">100</span></a> <a id="L1-330218" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.05</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div><div id="runner-132390" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        England
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div><div id="runner-514539" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        The Draw
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <div><div class="runner-disabled">
                SUSPENDED
            </div></div></div></div></div></div> <!----> <div id="Fancy2" class="tabcontent"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Fancy 2 </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div id="market-9.20530059"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Alex Carey Boundaries
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">6</span> <span class="price-amount">100</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">5</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530058"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Alex Carey Runs
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">44</span> <span class="price-amount">100</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">43</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530063"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Fall of 7th Wkt AUS
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">127</span> <span class="price-amount">90</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">127</span> <span class="price-amount">110</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530065"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Mitchell Starc Boundaries
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2</span> <span class="price-amount">100</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1</span> <span class="price-amount">100</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div><div id="market-9.20530064"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        Mitchell Starc Runs
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <span>
                    &nbsp;&nbsp;<a href="#">Book</a></span></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">19</span> <span class="price-amount">90</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">19</span> <span class="price-amount">110</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div></div></div></div></div> <!----> <div id="Figure" class="tabcontent"><div class="tb-content"><div class="tb-content"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Australia 40 Over Total Last Figure </span> <span style="text-transform: initial;">
                    (MaxBet: 100K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <!----> <!----></div> <div><div class="card" style="padding: 1px 18px;"><div class="row"><div class="col-3 col-lg-4 mobilehide"></div> <div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="10"><b><span class="priceodd">0</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="1"><b><span class="priceodd">1</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="2"><b><span class="priceodd">2</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="3"><b><span class="priceodd">3</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="4"><b><span class="priceodd">4</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><!----><!----><!----><!----><!----> <div class="col-3 col-lg-4 mobilehide"></div></div> <div class="row"><div class="col-3 col-lg-4 mobilehide"></div> <!----><!----><!----><!----><!----><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="5"><b><span class="priceodd">5</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="6"><b><span class="priceodd">6</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="7"><b><span class="priceodd">7</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="8"><b><span class="priceodd">8</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div><div class="col customcheck" style="text-align: center; border: 1px solid black;"><div id="9"><b><span class="priceodd">9</span><br></b> <span class="priceamount">8.85</span><br><hr style="margin: 0px;"> <div style="background-color: rgb(233, 246, 252);"><span class="positioncustom" style="color: red;"><strong></strong></span></div></div></div> <div class="col-3 col-lg-4 mobilehide"></div></div></div></div></div></div></div> <div id="OddFigure" class="tabcontent"><div class="market-titlebar"><p class="market-name"><span class="market-name-badge"><i class="market-name-icon"><img src="/img/time.png" style="filter: invert(100%); margin-top: -8px; margin-left: -1px;"></i> <span>Even / Odd </span> <span style="text-transform: initial;">
                    (MaxBet: 20K)
                </span></span> <span class="rules-badge"><i class="fa fa-info-circle"></i></span></p> <div class="market-overarround"><span></span><strong>Back</strong></div> <div class="market-overarround market-overarround-lay"><strong>Lay</strong></div></div> <div class="tb-content"><div class="tb-content"><div class="market-runners"><div id="runner-1" class="runner-runner"><span class="selector ml-2" style="display: none;"></span> <img class="ml-2" style="display: none;"> <h3 class="runner-name"><div class="runner-info"><span class="clippable runner-display-name"><h4 data-toggle="tooltip" data-placement="top" data-html="true" class="clippable-spacer">
                        2nd Inn 40 Over Run Odd (Kalli)
                    </h4></span></div> <div class="runner-position"><span><span class="position-minus"><strong></strong></span> <!----></span> <span class="ml-1" style="font-weight: normal;"><!---->
                    
                </span> <!----></div></h3> <a id="B3-1" role="button" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B2-1" class="price-price price-back"><span class="price-odd"></span> <span class="price-amount"></span></a> <a id="B1-1" class="price-price price-back mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">1.98</span> <span class="price-amount">98</span></a> <a id="L1-1" class="price-price price-lay ml-4 mb-show"><span class="fa fa-long-arrow-up" style="display: none;"></span> <span class="fa fa-long-arrow-down" style="display: none;"></span> <span class="price-odd">2.02</span> <span class="price-amount">102</span></a> <a class="price-price price-lay"><span class="price-odd"></span> <span class="price-amount"></span></a> <a class="price-price price-lay mr-4"><span class="price-odd"></span> <span class="price-amount"></span></a></div><div class="right-content"><div class="table-wrap"><div class="table-box-body"><div class="btn-group btn-group-xs" style="width: 100%; height: 30px; margin-bottom: 2px;"><button onclick="SHOWTV()" class="btn btn-primary btn-xs" style="width: 50%; border-right: solid;">Tv</button> <button onclick="SHOWLIVE('1.249449817')" class="btn btn-primary btn-xs" style="width: 50%;">Score Card</button></div> <div id="TVDIVIFRAME" style="display: none;"></div> <div id="TVDIV" style="display: none;"><div class="bets"><div id="VBox1" style="display: none;"><unrealhtml5videoplayer id="UnrealPlayer1"></unrealhtml5videoplayer> <video id="streamVideo1" width="465" autoplay="autoplay" playsinline="" controls="controls" onloadedmetadata="OnMetadata()"></video></div></div></div> <div id="LIVEDIV" class="match-iframe-container" style="height: 191px;"><iframe id="livesc" src="https://bpexch.xyz/Common/LiveScoreCard?id=1.249449817" scrolling="no" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="responsive-iframe" style="height: 230px;"></iframe></div> <div id="betSlip" class="bets" style="display: none;"><strong>Bet Slip <a target="_blank" href="/Customer/Profile" class="button" style="color: white; float: right;">Edit Bet Sizes</a></strong> <div class="betting-table"><table class="table"><thead><tr><th>Bet for</th> <th>Odds</th> <th>Stake</th> <th>Profit</th></tr></thead> <tbody><tr class="back"><td></td> <td width="10%"><div class="quantity"><input type="text" id="bet-price"> <div class="quantity-nav"><div class="quantity-button quantity-up"><span class="fa fa-caret-up"></span></div> <div class="quantity-button quantity-down"><span class="fa fa-caret-down"></span></div></div></div></td> <td width="10%"><div class="stake"><input type="text" id="bet-size"></div></td> <td> / -</td></tr> <tr class="back"><td colspan="5"><table class="table"><tbody><tr class="checknow"><td><span data-amount="2000" class="points">2,000</span></td> <td><span class="points">5,000</span></td> <td><span class="points">10,000</span></td> <td><span class="points">25,000</span></td></tr> <tr class="checknow"><td><span class="points">+ 1,000</span></td> <td><span class="points">+ 5,000</span></td> <td><span class="points">+ 10,000</span></td> <td><span class="points">+ 25,000</span></td></tr> <tr><td colspan="4" class="alert-danger pr-5"></td></tr> <tr><td><button type="reset" class="align-left btn btn-danger"><b>Close</b></button></td> <td><button type="reset" class="align-left btn btn-warning"><b>Clear</b></button></td> <td colspan="1"></td> <td><div class="btn btn-primary ld-over" style="cursor: pointer;"><b>Submit</b> <div class="ld ld-ball ld-flip"></div></div></td></tr></tbody></table></td></tr></tbody></table></div></div> <div id="betSlipMobile" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog modal-md"><div class="modal-content back"><div class="modal-body"><table><tbody><tr><td>&nbsp;</td> <th colspan="3"></th></tr> <tr><td>ODDS</td> <td colspan="2"><div class="input-group mt-2"><div class="input-group-prepend"><button type="button" class="btn btn-outline-secondary"><strong>-</strong></button></div> <input type="number" id="bet-price" step="0.01" min="1.01" max="1000" class="form-control"> <div class="input-group-append"><button type="button" class="btn btn-outline-secondary"><strong>+</strong></button></div></div></td></tr> <tr><td>Amount</td> <td colspan="2"><input type="number" id="bet-size-m" class="form-control mt-2"></td></tr> <tr><td style="width: 25%;"><button type="button" data-amount="2000" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                2,000
                            </button></td> <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                5,000
                            </button></td> <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                10,000
                            </button></td> <td style="width: 25%;"><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                25,000
                            </button></td></tr> <tr><td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +1,000
                            </button></td> <td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +5,000
                            </button></td> <td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +10,000
                            </button></td> <td><button type="button" class="btn btn-secondary btn-block mt-2" style="touch-action: manipulation;">
                                +25,000
                            </button></td></tr> <tr><td><button type="button" data-dismiss="modal" class="btn btn-danger mt-2" style="touch-action: manipulation;">
                                Close
                            </button></td> <td colspan="2"><div class="btn btn-primary ld-over mt-2" style="cursor: pointer;"><b>Submit</b> <div class="ld ld-ball ld-flip"></div></div> <span> / -</span></td></tr> <tr style="display: none;"><td colspan="4" class="alert-danger pr-5"></td></tr></tbody></table></div></div></div></div> <div class="bets"><strong>
        Open Bets (0)
        <img src="/img/reconnecting.gif" alt="dc" class="rounded disconnected" style="display: none;"> <!----> <!----></strong> <div class="betting-table"><table class="table"><thead><tr><th>Runner</th> <th>Price</th> <th>Size</th> <th></th></tr></thead> <tbody></tbody></table></div></div> <div class="bets"><strong>Matched Bets (0)</strong> <div class="betting-table"><table class="table"><thead><tr><th>Runner</th> <th>Price</th> <th>Size</th></tr></thead> <tbody></tbody></table></div></div> <div style="margin-top: 7px;"><strong class="RM_In_Markets" style="display: block; background: rgb(43, 47, 53); color: rgb(255, 255, 255); padding: 10px;">Related Events</strong> <div><table class="table compact" style="margin-bottom: 0px;"><tbody><tr id="m_1_250542387" onclick="window.location='/Common/Market?id=1.250542387';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">8:30</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-21T03:30:00.0000000Z
                                        </span></div></td> <td><div>
                                    Bangladesh v Ireland
                                </div></td></tr> <tr id="m_1_250754045" onclick="window.location='/Common/Market?id=1.250754045';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">14:10</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-21T09:10:00.0000000Z
                                        </span></div></td> <td><div>
                                    Brisbane Heat W v Sydney Thunder W
                                </div></td></tr> <tr id="m_1_250786640" onclick="window.location='/Common/Market?id=1.250786640';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">16:30</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-21T11:30:00.0000000Z
                                        </span></div></td> <td><div>
                                    Deccan Gladiators v Quetta Qavalry
                                </div></td></tr> <tr id="m_1_250791443" onclick="window.location='/Common/Market?id=1.250791443';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">18:45</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-21T13:45:00.0000000Z
                                        </span></div></td> <td><div>
                                    Northern Warriors v Ajman Titans
                                </div></td></tr> <tr id="m_1_250791349" onclick="window.location='/Common/Market?id=1.250791349';" class="relatedtr" style="cursor: pointer;"><td class="sport-date" style="font-size: 14px; padding: 0px 20px;"><div><span class="day">Today</span> <span class="market-time">21:00</span> <span data-format="H:mm" data-target="time" class="d-none utctime">
                                            2025-11-21T16:00:00.0000000Z
                                        </span></div></td> <td><div>
                                    Delhi Bulls v Royal Champs
                                </div></td></tr></tbody></table></div></div></div></div></div></div> <div id="fancyPosition" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 id="exampleModalLabel" class="modal-title"></h5> <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button></div> <div id="fancypos-body" class="modal-body"><table class="table"><tbody><tr><th>Score</th> <th>Position</th></tr> </tbody></table></div> <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button></div></div></div></div> <div id="modalRules" tabindex="-1" role="dialog" aria-labelledby="fancyPosition" aria-hidden="true" class="modal fade"><div role="document" class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 id="exampleModalLabel" class="modal-title">Market Rules</h5> <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button></div> <div id="rules-box" class="modal-body"></div></div></div></div></div></div>


                </div>
            </div>
        </div>
    </div>

    <!-- Market Rules -->
    <div class="modal fade" id="modalMarketRules" tabindex="-1" role="dialog" aria-labelledby="modalMarketRules" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Market Rules</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="market-rules-text" class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <!-- ToS -->
    <div class="modal fade" id="modalTos" tabindex="-1" role="dialog" aria-labelledby="modalTos" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <b>Protection of minors</b>
                    <br>
                    <p> It is illegal for anybody under the age of 18 to gamble. </p>
                    <br>
                    <p>Our site has strict policies and verification measures to prevent access to minors.</p>
                    <br>
                    <p>We encourage parents consider the use of internet use protection tools. You may find the following links useful. </p>
                    <br>
                    <a href="https://www.cyberpatrol.com/" target="_blank" style="color:mediumspringgreen">  Cyberpatrol</a>
                    <br>
                    <a href="https://www.cybersitter.com/" target="_blank" style="color:mediumspringgreen">  Cybersitter </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <footer id="sticky-footer" class="py-1 bg-dark text-white-50 Bl_NT_SF">
        <div class="col-12 container" style="background-color:#4dbd74; height:6px; margin-top:-4px;">
        </div>
        <div class="container text-center">
            <center>
                    
<style>
    p{
        font-size:12px;
        color:white;
    }
    .caoimg{
        max-width:60px;
    }
    .bffooter{
                    width: 135px;
                    height: 30px;
            }
            .curasaoLinks {
               pointer-events: none;
               cursor: default;
               margin-top:10px;
            }
@media screen and (max-width: 635px) {
            .caoimg {
                max-width:40px;
            }
            .bffooter{
                    width: 100px;
                    height: 30px;
            }
        }
</style>


<div class="curasaoLinks row" style="display:inline-flex;" id="curacaodiv"><hr>
                <div class="col-sm-12 col-md-4"></div>
                <div class="col-md-4"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        document.querySelector('#curacaodiv').insertAdjacentHTML(
            'afterbegin',
            `<hr>
                <div class="col-sm-12 col-md-4"></div>
                <div class="col-md-4"></div>`);
    });
</script>

            </center>
           
        </div>
    </footer>
    <script type="text/javascript" src="https://wurfl.io/wurfl.js"></script>
</div>

    <script type="text/javascript" src="/dist/bundle0a.js?112100"></script>

    <script>
        const token = getCookie('wexscktoken');
        const sess = getCookie('wex3authtoken');
        const reft = getCookie('wex3reftoken');
    </script>

    
    
        <script src="/js/mv2.min.js?112100"></script>
    
    
    <script>
        var show_tv_tab = false;
        var LastTab = "";
        var lastheight = 0;


        $(document).ready(function () {
            MarketFactory();
            $("#TVDIV").on("click", "#UnrealPlayer1_volume", function () {
                displayDate();
            });
            if (show_tv_tab) {
                SHOWTV();
            } else {
                SHOWLIVE("1.249449817")
            }
            $("#LIVEDIV").show();

            setInterval(removeTabs, 500);
            setInterval(resizeiframe, 500);

            let ifrEl = document.querySelector("#livesc");
            if (ifrEl != null) {
                setTimeout(function () { 
                    ifrEl.src = "https://bpexch.xyz/Common/LiveScoreCard?id=1.249449817"; 
                }, 2000);
            }
            setTimeout(function() { PremiumSportsIframeset()}, 2000);
            
        });

        function PremiumSportsIframeset() {
            var DivFound = document.getElementById("premiumsportsiframediv");
            if (DivFound !== null && DivFound !== undefined) {
                document.getElementById("premiumsportsiframediv").innerHTML = '<iframe id="premiumsportsiframe" frameborder="0" scrolling="yes" style="display:block; width:100%; height:800px;" src=""/>';
            };
        }

        function resizeiframe() {
            if (lastheight != 0) {
                setIframeHeight(lastheight);
            }
            var Iframe = document.getElementById('TVIFRAME');
            if (Iframe != null && Iframe != undefined) {
                resizeIFrameToFitContent(Iframe);
            }
            var Data = document.getElementById("premiumsportsiframe");
            if(Data != null)
            {
                document.getElementById("premiumsportsiframediv").style.height = document.getElementById("premiumsportsiframe").contentWindow.parent.innerHeight + 'px';
            }
        }

        function resizeIFrameToFitContent(iFrame) {
            try{
                iFrame.width = '100%';
                iFrame.height = iFrame.contentWindow.document.body.scrollHeight;
                var height = iFrame.contentWindow.document.body.scrollHeight + 'px';
                document.getElementById('TVIFRAME').style.height = height;
            }
            catch {}
        }

        function removeTabs() {
            if (LastTab !== "") {
                var closed = document.getElementById(LastTab);
                if (closed === null) {
                    MarketTab('All');
                }
            }

        }

        var Show = true;

        function displayDate() {
            var avail = document.getElementById('UnrealPlayer1_volSlider');
            if (avail != null) {
                var width = screen.width;
                if (width <= 470) {
                    avail.style.top = '206px';
                    avail.style.left = '71vw';
                } else {
                    avail.style.top = '200px';
                    avail.style.left = '461px';
                }
            }
        }
        
        function StatusCon() {
            setTimeout(function () {
                var avail = document.getElementById('UnrealPlayer1_statusmessage');
                if (avail != null) {
                    var width = screen.width;
                    if (width <= 470) {
                        avail.style.top = '0px';
                        avail.style.width = '100vw';
                    }
                }
            }, 700)
        }

        function show(v) {

            if (show_tv_tab) {
                return;
            }
            if (v != 0) {
                $("#LIVEDIV").show();
            } else {
                $("#LIVEDIV").hide();
            }
        }

        function setIframeHeight(h) {

            if (h < 5) {
                $("#LIVEDIV").hide();
            }

            if (h === undefined || h == null) {
                h = 0;
            }

            if (Math.abs(lastheight - h) < 10) {
                return;
            }

            lastheight = h;
            var formain = h + 11;
            var foriframe = h + 50;

            var obj = document.getElementById("LIVEDIV");
            obj.style.height = formain + "px";

            var obj = document.getElementById("livesc");
            obj.style.height = foriframe + "px";
        }

        function onMessage(event) {
            if (Show) {
                setIframeHeight(event.data['h']);
                show(event.data['show']);
            }
        }

        if (window.addEventListener) {
            window.addEventListener("message", onMessage, false);
        }
        else if (window.attachEvent) {
            window.attachEvent("onmessage", onMessage, false);
        }
        
        function SHOWTV() {
            show_tv_tab = true;
            if ($("#TVDIV").is(":visible")) {
                $("#TVDIV").hide();
                $("#LIVEDIV").hide();
                clearInterval();
                $("#sr-widget").hide();
                var element = document.getElementById("UnrealPlayer1_Video");
                if (element != null) {
                    element.parentNode.removeChild(element);
                    streams.forEach(function (str) {
                        if (str.player !== null) {
                            str.player.Stop();
                        }
                        document.querySelector(str.container).style.display = 'none';
                        document.querySelector(str.el).style.display = 'none';
                        document.querySelector(str.unreal).style.display = 'none';
                        document.querySelector(str.unreal).player = null;
                    });
                }
            } else {
                PlayChannelFunction();
                $("#LIVEDIV").hide();
                $("#sr-widget").hide();
                StatusCon();
            }
        }

        function PlayChannelFunction() {
            $.get('/Common/Market?handler=ChannelData&Evid=' + 34872738, function (data) {
                if (data == '') {
                    if ($("#TVDIVIFRAME").is(":visible")) {
                        document.getElementById('TVDIVIFRAME').innerHTML = "";
                        $("#TVDIVIFRAME").hide();
                    } else {
                        document.getElementById('TVDIVIFRAME').innerHTML = "<iframe scrolling=no frameborder='no' id='TVIFRAME' src='https://www.bpexch.xyz/Common/TvIframe?id=34872738'></iframe>";
                        $("#TVDIVIFRAME").show();
                    }
                } else {
                    document.getElementById('TVDIVIFRAME').innerHTML = "";
                    $("#TVDIVIFRAME").hide();
                    $("#TVDIV").show();
                    playChannel(data);
                }
            });
        }
        
        function SHOWLIVE(MID) {
            show_tv_tab = false;
            if ($("#TVDIVIFRAME").is(":visible")) {
                $("#TVDIVIFRAME").hide();
            }
            if ($("#LIVEDIV").is(":visible")) {
                $("#TVDIV").hide();
                $("#LIVEDIV").hide();
                $("#sr-widget").hide();
                var element = document.getElementById("UnrealPlayer1_Video");
                if (element != null) {
                    element.parentNode.removeChild(element);
                    streams.forEach(function (str) {
                        if (str.player !== null) {
                            str.player.Stop();
                        }
                        document.querySelector(str.container).style.display = 'none';
                        document.querySelector(str.el).style.display = 'none';
                        document.querySelector(str.unreal).style.display = 'none';
                        document.querySelector(str.unreal).player = null;
                    });
                }
            } else {
                var element = document.getElementById("UnrealPlayer1_Video");
                if (element != null) {
                    element.parentNode.removeChild(element);
                    streams.forEach(function (str) {
                        if (str.player !== null) {
                            str.player.Stop();
                        }
                        document.querySelector(str.container).style.display = 'none';
                        document.querySelector(str.el).style.display = 'none';
                        document.querySelector(str.unreal).style.display = 'none';
                        document.querySelector(str.unreal).player = null;
                    });
                }

                $("#TVDIV").hide();
                $("#LIVEDIV").show();
                $("#sr-widget").show();
            }
        }

        function MarketTab(cityName, element) {
            if (cityName === null) {
                cityName = element.id.replace('tab', '');
            }
            LastTab = cityName;
            // Declare all variables
            var i, tabcontent, tablinks;
            var tabclr = cityName + 'tab';

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("bbactive");
            }

            for (i = 0; i < tablinks.length; i++) {
                //tablinks[i].className = tablinks[i].className.replace(" active", "");
                tablinks[i].style.backgroundColor = "";
                tablinks[i].style.display = "inline-block"
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            document.getElementById(tabclr).style.backgroundColor = "black";
            document.getElementById(tabclr).style.color = "white";
            document.getElementById(tabclr).classList.add("bbactive");
        }

    </script>


    <script>
        $(document).ready(function () {
            pollRefreshToken();
        });

        if (genSck === 1) {
            const signalRConnection = new UWS(uwsUrl, token, sess);
            signalRConnection.connect();
        }
        else {
            pollUserData();
        }
    </script>  
<script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon="{&quot;rayId&quot;:&quot;9a1f090629319a42&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.9.1&quot;,&quot;token&quot;:&quot;412e616bee9c418bbf775c35ab07c6d0&quot;}" crossorigin="anonymous"></script>


@endsection
