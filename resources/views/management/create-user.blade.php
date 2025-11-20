@extends('layouts.management')

@section('title', 'Create New User')

@section('content')
<div class="animated fadeIn">
    <form class="form-horizontal" method="POST" action="/users/create" onsubmit="return validateForm()">
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>Create New User</strong>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="username">Username</label>
                            <div class="col-md-9">
                                <input minlength="6" maxlength="30" class="form-control" required="" type="text" id="username" name="username" value="{{ old('username') }}">
                                <span class="field-validation-valid text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="password">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" minlength="8" maxlength="30" required="" type="password" id="password" name="password">
                                <span class="field-validation-valid text-danger" id="password-error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="type">Type</label>
                            <div class="col-md-9">
                                @foreach($allowedTypes as $index => $type)
                                    @php
                                        $typeLabel = ucfirst($type);
                                        if ($type === 'supermaster') $typeLabel = 'SuperMaster';
                                    @endphp
                                    <div class="form-check form-check-inline mr-1">
                                        <input onclick="ToggleDownline()" class="form-check-input accountType" id="type_{{ $type }}" type="radio" value="{{ $type }}" {{ $index === 0 && !old('type') ? 'checked' : '' }} {{ old('type') == $type ? 'checked' : '' }} required="" name="type">
                                        <label class="form-check-label" for="type_{{ $type }}">{{ $typeLabel }}</label>
                                    </div>
                                @endforeach
                                <span class="field-validation-valid text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row" id="down-share" style="display:none;">
                            <label class="col-md-3 col-form-label">Downline Share (%)</label>
                            <div class="col-md-9">
                                <input class="form-control col-4 col-md-4" type="number" min="0" step="0.01" max="{{ auth()->user()->downline_share }}" id="downline_share" name="downline_share" value="{{ old('downline_share', 0) }}">
                                <span class="help-block">Max allowed: {{ auth()->user()->downline_share }}%. Must be less than your share for non-bettor accounts.</span>
                                <span class="field-validation-valid text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="is_active">IsActive</label>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                                    <span class="field-validation-valid text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="phone">Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="reference">Reference</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="reference" name="reference" value="{{ old('reference') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="notes">Notes</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="notes" name="notes">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" id="IsPointsSystem" value="False">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <a href="/users" class="btn btn-sm btn-danger">
                    <i class="fa fa-ban"></i> Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function ToggleDownline() {
        var types = document.getElementsByClassName("accountType");
        var downShare = document.getElementById("down-share");
        var downLine = document.getElementById("downline_share");

        for (i = 0; i < types.length; i++) {
            if (types[i].checked) {
                if (types[i].value == 'bettor') {
                    downShare.style.display = 'none';
                } else {
                    downShare.style.display = '';
                }
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        ToggleDownline();
        
        var radios = document.getElementsByClassName("accountType");
        for (var i = 0; i < radios.length; i++) {
            radios[i].addEventListener('change', ToggleDownline);
        }
    });

    function validateForm() {
        isValid = false;
        pwd = document.getElementById('password').value;
        
        if (pwd.length >= 8 && /[a-zA-Z]/.test(pwd) && /[0-9]/.test(pwd)) {
            isValid = true;
        }

        var errorSpan = document.getElementById('password-error');
        if (!isValid) {
            errorSpan.textContent = 'Min length is 8 characters and password must contain alphabets and numerics.';
        } else {
            errorSpan.textContent = '';
        }
        
        return isValid;
    }
</script>
@endsection
