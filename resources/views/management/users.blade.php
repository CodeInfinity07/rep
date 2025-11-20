@extends('layouts.management')

@section('title', 'Users')

@section('content')
                <div class="animated fadeIn">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <style>
                        @media screen and (max-width: 635px) {
                            .reportmenubuttons {
                                text-align: center;
                            }
                        }
                    </style>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-filter"></i>
                                    <strong>Report Type</strong>
                                </div>
                                <div class="card-body reportmenubuttons">
                                    <a href="/Reports/BookDetail" id="book-detail" class="btn btn-outline-primary">
                                        Book Detail
                                    </a>
                                    <a href="/Reports/Detail2" id="book-detail-2" class="btn btn-outline-primary">
                                        Book Detail 2
                                    </a>
                                    <a href="/Reports/DailyPl" id="dailyPl" class="btn btn-outline-primary">
                                        Daily PL
                                    </a>
                                    <a href="/Reports/Daily" id="daily" class="btn btn-outline-primary">
                                        Daily Report
                                    </a>
                                    <a href="/Reports/FinalSheet" id="final-sheet" class="btn btn-outline-primary">
                                        Final Sheet
                                    </a>
                                    <a href="/Accounts/Chart?MID=0" id="ledger" class="btn btn-primary">
                                        Accounts
                                    </a>
                                    <a href="/Reports/Commission" id="commission" class="btn btn-outline-primary">
                                        Commission Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <style>
                        *

                        /*the container must be positioned relative:*/
                        .autocomplete {
                            height: 100px;
                            position: relative;
                            display: inline-block;
                        }

                        input {
                            border: 1px solid transparent;
                            background-color: #f1f1f1;
                            padding: 10px;
                            font-size: 16px;
                        }

                        input[type=text] {
                            background-color: #f1f1f1;
                            width: 100%;
                        }

                        input[type=submit] {
                            background-color: DodgerBlue;
                            color: #fff;
                            cursor: pointer;
                        }

                        .autocomplete-items {
                            position: absolute;
                            border: 1px solid #d4d4d4;
                            border-bottom: none;
                            border-top: none;
                            z-index: 99;
                            /*position the autocomplete items to be the same width as the container:*/
                            top: 100%;
                            left: 0;
                            right: 0;
                        }

                        .autocomplete-items div {
                            padding: 10px;
                            cursor: pointer;
                            background-color: #fff;
                            border-bottom: 1px solid #d4d4d4;
                        }

                        /*when hovering an item:*/
                        .autocomplete-items div:hover {
                            background-color: #e9e9e9;
                        }

                        /*when navigating through the items using the arrow keys:*/
                        .autocomplete-active {
                            background-color: DodgerBlue !important;
                            color: #ffffff;
                        }


                        .inputWithIcon input[type="text"] {
                            /*padding-left: 40px;*/
                        }

                        .inputWithIcon {
                            position: relative;
                        }

                        .inputWithIcon img {
                            position: absolute;
                            left: 0;
                            top: 8px;
                            margin-left: 170px;
                            color: #aaa;
                            transition: 0.3s;
                        }

                        }
                    </style>

                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

                    <div class="card col-12" id="Usersearchcustom" style="height:140px;">
                        <div class="card-header">
                            <i class="fa fa-filter"></i>
                            <strong>Search-Users</strong>
                        </div>
                        <div class="card-body" style="padding-bottom:0px; margin:0px;">
                            <div id="searchUsers" class="row">
                                <form autocomplete="off" class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-12 autocomplete">
                                            <div class="input-group">
                                                <div class="inputWithIcon"><input type="search" placeholder="Username"
                                                        id="myInput" class="form-control ui-autocomplete-input"
                                                        autocomplete="off"></div> <span
                                                    class="input-group-prepend"><button id="myBtn" type="button"
                                                        class="btn btn-primary"><i class="fa fa-search"></i> Search
                                                    </button></span>
                                            </div>
                                        </div>
                                    </div>
                                </form> <img src="/img/preloader.gif" style="height: 20px; display: none;">
                                <nav aria-label="breadcrumb" id="breadcrumbcustom" class="col-12 col-md-6"
                                    style="display: none;">
                                    <ol class="breadcrumb"></ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="accountsChart">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>
                                        <strong>{{ $viewingUser->username }}</strong> - Clients List
                                        @if ($viewingUser->id !== $currentUser->id && $parentUser)
                                            <a href="/users?user_id={{ $parentUser->id }}" class="btn btn-sm btn-secondary float-right">
                                                <i class="fa fa-arrow-left"></i> Back
                                            </a>
                                        @endif
                                    </h5>
                                </div>
                                <div class="card-body" style="padding-bottom: 0;">
                                    <div class="row col-12" style="overflow-x: auto;">
                                        <table class="table table-bordered table-sm">
                                            <tbody>
                                                <tr>
                                                    <th>Credit Received</th>
                                                    <th>Credit Remaining</th>
                                                    <th>Cash</th>
                                                    <th>P/L Downline</th>
                                                    <th>
                                                        Balance UpLine
                                                        <a href="#" onclick="ShowUplineView(); return false;">
                                                            <!--<i class="fas fa-question-circle"></i>-->
                                                        </a>
                                                    </th>
                                                    <th>Users</th>
                                                </tr>
                                                <tr>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>{{ $users->count() }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a href="/users/create" type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-user-o"></i>
                                        <strong>New User</strong>
                                    </a>
                                    <a href="/Accounts/Ledger" type="button" class="btn btn-sm btn-primary"
                                        target="_blank">
                                        <i class="fa fa-book"></i>
                                        <strong>Account Ledger</strong>
                                    </a>

                                    <p class="float-right">
                                        <span class="btn btn-sm btn-warning mt-2">
                                            <strong>C</strong>
                                        </span>
                                        Cash / Credit
                                        <span class="btn btn-sm btn-primary mt-2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        Edit
                                        <span class="btn btn-sm btn-info mt-2">
                                            <strong>L</strong>
                                        </span>
                                        Ledger
                                        <span class="btn btn-sm btn-success mt-2">
                                            <strong>A</strong>
                                        </span>
                                        Active
                                        <span class="btn btn-sm btn-outline-danger mt-2">
                                            <strong>D</strong>
                                        </span>
                                        InActive
                                        <span class="btn btn-sm btn-danger">
                                            <strong>S</strong>
                                        </span>
                                        <span>Settle Account</span>
                                    </p>
                                </div>

                                <div class="card-body">
                                    <div id="tableLedger_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="tableLedger" style="width: 100%;"
                                                    class="display table table-bordered table-striped tbl-datatable1 dataTable no-footer"
                                                    role="grid" aria-describedby="tableLedger_info">
                                                    <thead>
                                                        <tr class="accounts-chart-head-bg" role="row">
                                                            <th rowspan="1" colspan="1">Total</th>
                                                            <th rowspan="1" colspan="1"></th>
                                                            <th rowspan="1" colspan="1">-</th>
                                                            <th rowspan="1" colspan="1">-</th>
                                                            <th rowspan="1" colspan="1">-</th>
                                                            <th rowspan="1" colspan="1"></th>
                                                            <th rowspan="1" colspan="1">-</th>
                                                            <th rowspan="1" colspan="1">-</th>
                                                            <th rowspan="1" colspan="1"></th>
                                                        </tr>
                                                        <tr role="row">
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 193.5px;">Username</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 114.5px;">Type</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 108.5px;">Credit</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 108.5px;">Balance</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 126.5px;">Client (P/L)</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 73.5px;">Share</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 111.5px;">Exposure</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 194.5px;">Available Balance</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 263.5px;">Options</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($users as $index => $user)
                                                        <tr role="row" class="{{ $index % 2 == 0 ? 'odd' : 'even' }}">
                                                            <td>
                                                                @if($user->type !== 'bettor')
                                                                    <a href="/users?user_id={{ $user->id }}">
                                                                        <strong>{{ strtoupper($user->username) }}</strong>
                                                                    </a>
                                                                @else
                                                                    <strong>{{ strtoupper($user->username) }}</strong>
                                                                @endif
                                                            </td>
                                                            <td>{{ $user->type === 'supermaster' ? 'SuperMaster' : ucfirst($user->type) }}</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>{{ number_format($user->downline_share, 0) }}</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="#"
                                                                    onclick="return false;">
                                                                    <strong>C</strong>
                                                                </a>

                                                                <a class="btn btn-primary" target="_blank"
                                                                    href="#">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-info" href="#"
                                                                    onclick="return false;">
                                                                    <strong>L</strong>
                                                                </a>
                                                                @if($user->is_active)
                                                                    <a class="btn btn-success" target="_blank"
                                                                        href="#">
                                                                        <strong>A</strong>
                                                                    </a>
                                                                @else
                                                                    <a class="btn btn-outline-danger" target="_blank"
                                                                        href="#">
                                                                        <strong>D</strong>
                                                                    </a>
                                                                @endif
                                                                @if($user->type !== 'bettor')
                                                                    <a class="btn btn-danger"
                                                                        href="#"
                                                                        onclick="return false;">
                                                                        <strong>S</strong>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="9" class="text-center">No users found. Create your first downline user using the button above.</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
