@extends('layouts.management')

@section('title', 'Create New User')

@section('content')
<div class="animated fadeIn">
    <form class="form-horizontal" method="post" onsubmit="return validateForm()">
        <div class="card">
            <div class="card-header">
                <strong>Create New User under <i>SuperMaster</i></strong>
            </div>
            <div class="card-body">
                <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="user_Username">Username</label>
                            <div class="col-md-9">
                                <input minlength="6" maxlength="30" class="form-control" required="" type="text" id="user_Username" name="user.Username" value="">
                                <span class="field-validation-valid" data-valmsg-for="user.Username" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="user_Password">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" minlength="8" maxlength="30" required="" type="text" id="user_Password" name="user.Password" value="">
                                <span class="field-validation-valid" data-valmsg-for="user.Password" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="user_Type">Type</label>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline mr-1">
                                    <input onclick="ToggleDownline()" class="form-check-input accountType" id="SuperMaster" type="radio" value="3" required="" data-val="true" data-val-required="The Type field is required." name="user.Type">
                                    <label class="form-check-label" for="SuperMaster">SuperMaster</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input onclick="ToggleDownline()" class="form-check-input accountType" id="Bettor" type="radio" value="4" required="" name="user.Type">
                                    <label class="form-check-label" for="Bettor">Bettor</label>
                                </div>
                                <span class="field-validation-valid" data-valmsg-for="user.Type" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="form-group row" id="down-share" style="display:none;">
                            <label class="col-md-3 col-form-label">Downline Share</label>
                            <div class="col-md-9">
                                <input class="form-control col-4 col-md-4" type="number" min="0" step="1" max="85.00" data-val="true" data-val-number="The field Downline must be a number." data-val-required="The Downline field is required." id="Downline" name="Downline" value="0">
                                <input name="__Invariant" type="hidden" value="Downline">
                                <span class="help-block">Max allowed downline share is 0 - 85</span>
                                <span class="field-validation-valid" data-valmsg-for="Downline" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="user_IsActive">IsActive</label>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The IsActive field is required." id="user_IsActive" name="user.IsActive" value="true">
                                    <span class="field-validation-valid" data-valmsg-for="user.IsActive" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="user_Phone">Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="user_Phone" name="user.Phone" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="user_Reference">Reference</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="user_Reference" name="user.Reference" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="user_Notes">Notes</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="user_Notes" name="user.Notes"></textarea>
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
        <input name="__RequestVerificationToken" type="hidden" value="">
        <input name="user.IsActive" type="hidden" value="false">
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function ToggleDownline() {
        var types = document.getElementsByClassName("accountType");
        var downShare = document.getElementById("down-share");
        var downLine = document.getElementById("Downline");

        for (i = 0; i < types.length; i++) {
            if (types[i].checked) {
                if (document.getElementById("IsPointsSystem").value == "True") {
                    downShare.style.display = 'none';
                    downLine.value = 0;
                    downLine.max = 0;
                } else if (types[i].value == 4 || types[i].value == 7) {
                    downShare.style.display = 'none';
                    downLine.max = 100;
                } else {
                    downLine.max = 85.00;
                    downShare.style.display = '';
                }
            }
        }
    }

    ToggleDownline();

    function validateForm() {
        isValid = false;
        pwd = $("#user_Password").val()
        
        if (pwd.length >= 8 && /[a-zA-Z]/.test(pwd) && /[0-9]/.test(pwd)) {
            isValid = true;
        }

        if (!isValid) {
            $("#user_Password").next().text('Min length is 8 characters and password must contain alphabets and numerics.');
            $("#user_Password").next().addClass('text-danger');
        } else {
            $("#user_Password").next().text('');
            $("#user_Password").next().removeClass('text-danger');
        }
        
        return isValid;
    }
</script>
@endsection
