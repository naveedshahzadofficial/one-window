<form x-data wire:submit.prevent="submitFormRegistration">

    <div class="auth-form">

        <div class="input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <select wire:model="user.prefix"  class="form-control">
            <option value="">Select Prefix</option>
            @foreach($prefixes as $prefix)
                <option value="{{ $prefix }}">{{ $prefix }}</option>
            @endforeach
        </select>
        </div>
        @error('user.prefix')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input wire:model="user.first_name" type="text" class="form-control" name='first_name' id='first_name' placeholder="First name" required>
        </div>
        @error('user.first_name')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input wire:model="user.middle_name" type="text" class="form-control" name='middle_name' placeholder="Middle name" >
        </div>
        @error('user.middle_name')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input wire:model="user.last_name" type="text" class="form-control" name='last_name' placeholder="Last name">
        </div>
        @error('user.last_name')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror


        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input wire:model="user.cnic_no" type="text" class="form-control cnic_no" name='cnic_no' placeholder="CNIC No">
        </div>
        @error('user.cnic_no')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
            <div class="col-md-4 auth-no-padding">
            <select @if($verified_at) disabled="disabled" @endif wire:model="user.telecom_company_id" name="telecom_company_id" class="form-control">
                @foreach($telecom_companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>

            @error('user.telecom_company_id')
            <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-3 auth-no-padding">

            <select @if($verified_at) disabled="disabled" @endif wire:model="user.mobile_code_id" name="mobile_code_id"  class="form-control">
                @foreach($mobile_codes as $code)
                    <option value="{{ $code->code_number }}">{{ $code->code_number }}</option>
                @endforeach

            </select>
            @error('user.mobile_code_id')
            <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="col-md-5 auth-no-padding">
                <input @if($verified_at) readonly="readonly" @endif wire:model="user.mobile_no"  type="text" class="form-control" name='mobile_no' id='mobile_no' placeholder="Number" maxlength='7'>
                @error('user.mobile_no')
                <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


        </div>


        <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <div class="col-md-8 auth-no-padding">
            <input @if($verified_at) readonly="readonly" @endif wire:model="user.email" type="email" class="form-control" name='email' id='email' placeholder="Email" required='requirred'>
            @error('user.email')
            <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-4 auth-no-padding-right">
                <button @if(!$btn_get_code) disabled="disabled" @endif  wire:click.prevent="sendVerificationCode()" wire:loading.attr="disabled"  type="button" class="btn btn-dark btn-block auth-default-btn">Get Code</button>
            </div>
        </div>
        <div class="input-group" @if(!$box_verification) style="display: none;" @endif>
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <div class="col-md-6 auth-no-padding-right">
                <input @if($verified_at) readonly="readonly" @endif wire:model="otp_code" type="text" class="form-control" name='verify_code' placeholder="Verification Code" required>
            </div>

            <div class="col-md-4 auth-no-padding-right">
                <button @if($verified_at) disabled="disabled" @endif wire:click.prevent="verificationCode()" wire:loading.attr="disabled"  type="button" class="btn btn-dark btn-block"   style="background-color: #404040;">Verify</button>
            </div>
        </div>

        @if($verified_message)
            <div class="alert alert-success" role="alert">
                <button  wire:click="$set('verified_message', false)" type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                Verified Successfully.
            </div>
        @endif

        @if($fail_verified)
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                Your OTP code is invalid.
            </div>
        @endif

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input wire:model="user.password" type="password" class="form-control" name='password' placeholder="Password">
            @error('user.password')
            <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input wire:model="user.password_confirmation" type="password" class="form-control" name='confirm_password' placeholder="Retype password">
            @error('user.confirm_password')
            <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="auth-login-btn">
            <button type="submit" class="btn btn-dark btn-block" @if(!$verified_at) disabled="disabled" @endif >Register</button>
        </div>

        <div class="auth-new-register">
            <div class="col-md-12 auth-no-padding"  style="padding-bottom: 50px;">
                <div class="col-md-6 pull-right auth-no-padding">
                <a href="{{ route('login') }}" class="register_button btn btn-dark btn-block">Sign In <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>


    </div>


</form>

