@extends('layouts.management')

@section('title', 'Position')

@section('content')
                <div class="animated fadeIn">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        Market Position
                                    </strong>
                                    <a class="btn btn-sm btn-primary" href="/Markets/Liables">
                                        <strong>Refresh</strong>
                                    </a>
                                </div>
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        var intervalId = setInterval(RefreshLiables, 60000);

                        function RefreshLiables() {
                            document.location.href = document.location.href;
                        }

                        window.onbeforeunload = function () {
                            clearInterval(intervalId);
                        };
                    </script>
                </div>
@endsection

@section('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/site.min.js"></script>
    <script src="/js/ReportViewer.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/js/bof.js"></script>
@endsection
