@extends('layouts.management')

@section('title', 'Edit User')

@section('content')
<div class="animated fadeIn">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
                margin-top: 5px;
                margin-right: 15px;
                background:transparent;
                border:none;
            }
            .editsbmtbtnin{
                margin-top:-60px;
            }
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="/users" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back to Users
                    </a>
                    <strong style="float:right; font-size:20px">{{ strtoupper($user->username) }}</strong>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <form method="POST" action="/users/{{ $user->id }}/update" onsubmit="return validateForm()">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Edit Client - <strong>{{ strtoupper($user->username) }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label">ID</label>
                                <div class="col-8 col-md-6">
                                    <p class="form-control-static">{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label">Username</label>
                                <div class="col-8 col-md-6">
                                    <p class="form-control-static">{{ strtoupper($user->username) }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label">Type</label>
                                <div class="col-8 col-md-6">
                                    <p class="form-control-static">{{ $user->type === 'supermaster' ? 'SuperMaster' : ucfirst($user->type) }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label">Currency</label>
                                <div class="col-8 col-md-6">
                                    <p class="form-control-static">{{ $user->currency }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label">Password</label>
                                <div class="col-8 col-md-6">
                                    <input class="form-control" type="text" id="user_Password" name="password" value="" placeholder="Leave blank to keep current password">
                                    <small class="form-text text-muted">Min 8 characters with letters and numbers</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label" for="is_active">IsActive</label>
                                <div class="col-8 col-md-6 col-form-label">
                                    <div class="form-check checkbox">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label" for="can_bet">Betting Allowed</label>
                                <div class="col-8 col-md-6 col-form-label">
                                    <div class="form-check checkbox">
                                        <input class="form-check-input" type="checkbox" id="can_bet" name="can_bet" value="1" {{ $user->can_bet ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label" for="can_settle_pl">Can Settle PL</label>
                                <div class="col-8 col-md-6 col-form-label">
                                    <div class="form-check checkbox">
                                        <input class="form-check-input" type="checkbox" id="can_settle_pl" name="can_settle_pl" value="1" {{ $user->can_settle_pl ? 'checked' : '' }}>
                                        <label class="form-check-label" for="can_settle_pl">Enable S button</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label" for="phone">Phone</label>
                                <div class="col-8 col-md-6">
                                    <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label" for="reference">Reference</label>
                                <div class="col-8 col-md-6">
                                    <input class="form-control" type="text" id="reference" name="reference" value="{{ old('reference', $user->reference) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label" for="notes">Notes</label>
                                <div class="col-8 col-md-6">
                                    <textarea class="form-control" id="notes" name="notes">{{ old('notes', $user->notes) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label" for="commission">Commission</label>
                                <div class="col-8 col-md-6">
                                    <input type="number" step="0.01" class="form-control" id="commission" name="commission" value="2.00" min="2.00" readonly>
                                    <span class="help-block">Min commission is 2.00 %</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-md-3 col-form-label">UserDomain</label>
                                <div class="col-8 col-md-6">
                                    <input value="betguru69.com" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer editsbmtbtn">
                        <button class="btn btn-primary editsbmtbtnin" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-6">
            <form method="POST" action="/users/{{ $user->id }}/update-bet-sizes">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <strong>Max Bet Sizes</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">Soccer</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_soccer" value="{{ old('max_bet_soccer', $user->max_bet_soccer ?? '1000000.00') }}">
                                <span class="help-block">Max: 1,000,000</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">Tennis</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_tennis" value="{{ old('max_bet_tennis', $user->max_bet_tennis ?? '250000.00') }}">
                                <span class="help-block">Max: 250,000</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">Cricket</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_cricket" value="{{ old('max_bet_cricket', $user->max_bet_cricket ?? '5000000.00') }}">
                                <span class="help-block">Max: 200,000</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">Fancy</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_fancy" value="{{ old('max_bet_fancy', $user->max_bet_fancy ?? '200000.00') }}">
                                <span class="help-block">Max: 20,000</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">Races</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_race" value="{{ old('max_bet_race', $user->max_bet_race ?? '200000.00') }}">
                                <span class="help-block">Max: 200,000</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">Casino</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_casino" value="{{ old('max_bet_casino', $user->max_bet_casino ?? '50000.00') }}">
                                <span class="help-block">Max: 50,000</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">Greyhound</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_greyhound" value="{{ old('max_bet_greyhound', $user->max_bet_greyhound ?? '50000.00') }}">
                                <span class="help-block">Max: 50,000</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-md-3 col-form-label">BookMaker</label>
                            <div class="col-8 col-md-6">
                                <input class="form-control" type="number" step="0.01" name="max_bet_bookmaker" value="{{ old('max_bet_bookmaker', $user->max_bet_bookmaker ?? '2000000.00') }}">
                                <span class="help-block">Max: 2,000,000</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer editsbmtbtn">
                        <button class="btn btn-primary editsbmtbtnin" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function validateForm() {
    const pwd = document.getElementById('user_Password').value;
    
    if (pwd !== '') {
        if (pwd.length < 8) {
            alert('Password must be at least 8 characters');
            return false;
        }
        
        if (!/[a-zA-Z]/.test(pwd) || !/[0-9]/.test(pwd)) {
            alert('Password must contain both letters and numbers');
            return false;
        }
    }
    
    return true;
}
</script>
@endsection
