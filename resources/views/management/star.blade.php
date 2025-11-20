@extends('layouts.management')

@section('title', 'Star Casino')

@section('content')
                <div class="animated fadeIn">

                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="livegamecasinom">

                                    <div class="card card-accent-primary">
                                        <div class="card-body">
                                            <div class="alert alert-success">
                                                <strong>No Active Market found!</strong>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="livegamecasinofp">
                                </div>
                            </div>

                            <div id="Pnl-Orders" class="col-md-4">
                                <div class="card card-accent-primary">
                                    <div class="card-header"><strong>Open Bets (0)</strong></div>
                                    <div class="card-body  Orders-Widget">
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
                                    <div class="card-header"><strong>Matched Bets (0)</strong> <button
                                            class="btn btn-sm btn-primary">Full Bet List</button></div>
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
