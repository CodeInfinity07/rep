@extends('layouts.management')

@section('title', 'Cash/Credit Management')

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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        @media screen and (max-width: 635px) {
            .editsbmtbtn {
                margin: auto;
                margin-top: -30px;
                margin-right: 15px;
                background: transparent;
                border: none;
            }
        }
    </style>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link {{ $tab === 'cash' ? 'active' : '' }}" href="/users/{{ $user->id }}/cash-credit?tab=cash"><b>Cash</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $tab === 'credit' ? 'active' : '' }}" href="/users/{{ $user->id }}/cash-credit?tab=credit"><b>Credit</b></a>
                        </li>
                    </ul>
                    <hr>

                    <h5><strong>{{ strtoupper($user->username) }}</strong></h5>
                    <table class="table table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td>Credit</td>
                                <td>Balance</td>
                                <td>Cash</td>
                            </tr>
                            <tr>
                                <th>{{ number_format($user->credit_received, 2) }} {{ $user->currency }}</th>
                                <th>{{ number_format($user->balance, 2) }} {{ $user->currency }}</th>
                                <th>{{ number_format($user->cash, 2) }} {{ $user->currency }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if($tab === 'cash')
        <div class="col-md-9">
            <form method="POST" action="/users/{{ $user->id }}/cash/deposit">
                @csrf
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        <strong>Deposit</strong> Cash in <strong>{{ strtoupper($user->username) }}</strong> Account
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input value="Cash deposit to {{ $user->username }} from {{ Auth::user()->username }}" class="form-control" type="text" name="description" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $user->currency }}</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="amount" value="0" required min="0.01">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer editsbmtbtn">
                        <button class="btn btn-primary btn-submit" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-9">
            <form method="POST" action="/users/{{ $user->id }}/cash/withdraw">
                @csrf
                <div class="card">
                    <div class="card-header text-white bg-danger">
                        <strong>Withdraw</strong> Cash from <strong>{{ strtoupper($user->username) }}</strong> Account
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input value="Cash withdrawal from {{ $user->username }} to {{ Auth::user()->username }}" class="form-control" type="text" name="description" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $user->currency }}</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="amount" value="0" required min="0.01" max="{{ $user->cash }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer editsbmtbtn">
                        <button class="btn btn-danger btn-submit" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="col-md-9">
            <form method="POST" action="/users/{{ $user->id }}/credit/deposit">
                @csrf
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        <strong>Give Credit</strong> to <strong>{{ strtoupper($user->username) }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input value="Credit given to {{ $user->username }} from {{ Auth::user()->username }}" class="form-control" type="text" name="description" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $user->currency }}</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="amount" value="0" required min="0.01">
                                </div>
                                @if(Auth::user()->type !== 'owner')
                                    <small class="text-muted">Available credit: {{ number_format(Auth::user()->credit_remaining, 2) }} {{ Auth::user()->currency }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer editsbmtbtn">
                        <button class="btn btn-primary btn-submit" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-9">
            <form method="POST" action="/users/{{ $user->id }}/credit/withdraw">
                @csrf
                <div class="card">
                    <div class="card-header text-white bg-danger">
                        <strong>Take Back Credit</strong> from <strong>{{ strtoupper($user->username) }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input value="Credit taken back from {{ $user->username }} to {{ Auth::user()->username }}" class="form-control" type="text" name="description" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $user->currency }}</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="amount" value="0" required min="0.01" max="{{ $user->credit_received }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer editsbmtbtn">
                        <button class="btn btn-danger btn-submit" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection
