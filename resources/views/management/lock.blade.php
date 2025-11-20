@extends('layouts.management')

@section('title', 'Bet Lock')

@section('content')
                <div class="animated fadeIn">
                    <script>
                        window.searchConfig = {
                            isGlobalSearch: true,
                            showBettors: false
                        };
                    </script>

                    <div class="row">
                        <div class="col-12 col-md-6" id="eventresults">
                            <style>
                                .bigcb {
                                    width: 20px;
                                    height: 20px;
                                    margin-bottom: 10px;
                                }

                                @media screen and (max-width: 635px) {
                                    .editsbmtbtn {
                                        margin: auto;
                                        margin-top: 5px;
                                        margin-right: 15px;
                                        text-align: end;
                                    }
                                }
                            </style>
                            <div class="card">
                                <div class="card-header">
                                    <strong>Allowed Market Types (Rana19470)</strong>
                                </div>
                                <div class="card-body" id="betlockcardbody" style="padding-left:40px;">
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="12|EVENT_TYPE_ID|12" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>All Casino</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|BETPRO" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            TeenPatti Studio </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|DreamCasino" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Royal Casino </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|ExGames" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Betfair Games </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|FAWK" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Star Casino </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|Galaxy" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Galaxy Casino </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|SAP" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Sports Book </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="12|ORIGIN|SuperNova" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Super Nowa </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="4|EVENT_TYPE_ID|4" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Cricket</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|FIGURE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Figure </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|LOCAL_FANCY" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Fancy </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|MATCH_ODDS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Match Odds </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|ODD_FIGURE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Even / Odd </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|TOSS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Toss </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4|MARKET_TYPE|TOURNAMENT_WINNER" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Cup Winner </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="4339|EVENT_TYPE_ID|4339" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Greyhound</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4339|COUNTRY|AU" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Australia </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4339|COUNTRY|GB" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Britian </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="4339|COUNTRY|NZ" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            New Zealand </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="7|EVENT_TYPE_ID|7" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Horse Race</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|AE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Dubai </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|AU" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Australia </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|BH" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Bahrain </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|FR" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            France </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|GB" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            England </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY_&amp;_MARKET_TYPE|GB_&amp;_PLACE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            England (PLACE) </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|IE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Ireland </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY_&amp;_MARKET_TYPE|IE_&amp;_PLACE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Ireland (PLACE) </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|NZ" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            New Zealand </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|SE" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Sweden </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|SG" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Singapore </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|US" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            America </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="7|COUNTRY|ZA" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Africa </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="1|EVENT_TYPE_ID|1" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Soccer</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="1|MARKET_TYPE|MATCH_ODDS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Match Odds </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="1|MARKET_TYPE_GROUP|OVER_UNDER" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Over/Under Goals </label>
                                    </div>
                                    <br>
                                    <hr>
                                    <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                        value="2|EVENT_TYPE_ID|2" checked="">
                                    <label class="form-check-label" for="inlineCheckbox1" style="margin-left:5PX;">
                                        <h5><b>Tennis</b></h5>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bigcb" name="subprops" type="checkbox"
                                            value="2|MARKET_TYPE|MATCH_ODDS" checked="">

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            Match Odds </label>
                                    </div>
                                    <br>
                                    <div class="editsbmtbtn">
                                        <input type="button" class="btn btn-primary" id="betlocksavebtnn" value="Save"
                                            onclick="LoadList();">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
@endsection

@section('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/site.min.js"></script>
    <script src="/js/ReportViewer.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/js/bof.js"></script>
@endsection
