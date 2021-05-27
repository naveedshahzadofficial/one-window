<form x-data wire:submit.prevent="submitFormRegistration" class="kt_auth_form" id="kt_auth_form" name="kt_auth_form">

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-user"></i>
																</span>
            </div>
            <select wire:model="user.prefix"  class="form-control @error('user.prefix') is-invalid @enderror">
                <option value="">Select Prefix</option>
                @foreach($prefixes as $prefix)
                    <option value="{{ $prefix }}">{{ $prefix }}</option>
                @endforeach
            </select>
        </div>
        @error('user.prefix')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-user"></i>
																</span>
            </div>
            <input wire:model="user.first_name" type="text" name="first_name" class="form-control @error('user.first_name') is-invalid @enderror"
                   placeholder="First name">
        </div>
        @error('user.first_name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-user"></i>
																</span>
            </div>
            <input wire:model="user.middle_name" type="text" name="first_name" class="form-control @error('user.middle_name') is-invalid @enderror"
                   placeholder="Middle name">
        </div>
        @error('user.middle_name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-user"></i>
																</span>
            </div>
            <input wire:model="user.last_name" type="text" name="first_name" class="form-control @error('user.last_name') is-invalid @enderror"
                   placeholder="Last name">
        </div>
        @error('user.last_name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-passport"></i>
																</span>
            </div>
            <input wire:model="user.cnic_no" type="text" name="first_name" class="form-control @error('user.cnic_no') is-invalid @enderror"
                   placeholder="CNIC No">
        </div>
        @error('user.cnic_no')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-telegram"></i>
																</span>
            </div>
            <select @if($verified_at) disabled="disabled" @endif wire:model="user.telecom_company_id" name="telecom_company_id" class="form-control @error('user.telecom_company_id') is-invalid @enderror">
                @foreach($telecom_companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>

        </div>
        @error('user.telecom_company_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-mobile"></i>
																</span>
            </div>
            <select @if($verified_at) disabled="disabled" @endif wire:model="user.mobile_code_id" name="mobile_code_id"  class="form-control @error('user.mobile_code_id') is-invalid @enderror">
                @foreach($mobile_codes as $code)
                    <option value="{{ $code->code_number }}">{{ $code->code_number }}</option>
                @endforeach

            </select>
            <div class="col-md-7 auth-no-padding">
                <input @if($verified_at) readonly="readonly" @endif wire:model="user.mobile_no"  type="text" class="auth-no-border-radius form-control  @error('user.mobile_no') is-invalid @enderror" name='mobile_no' id='mobile_no' placeholder="Number" maxlength='7'>
            </div>

        </div>
        @error('user.mobile_no')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror


    </div>


    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-envelope"></i>
																</span>
            </div>
            <input  @if($verified_at) readonly="readonly" @endif wire:model="user.email" type="email" name="email" class="form-control @error('user.email') is-invalid @enderror"
                   placeholder="Email">

            <div class="col-md-5 auth-no-padding-right">
                <button @if(!$btn_get_code) disabled="disabled" @endif  wire:click.prevent="sendVerificationCode()" wire:loading.attr="disabled"  type="button" class="btn btn-dark btn-block auth-default-btn">Get Code</button>
            </div>

        </div>
        @error('user.email')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group" @if(!$box_verification) style="display: none;" @endif>
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
            </div>
            <input @if($verified_at) readonly="readonly" @endif wire:model="otp_code" type="text" class="form-control" name='verify_code' placeholder="Verification Code" required>

            <div class="col-md-4 auth-no-padding-right">
                <button @if($verified_at) disabled="disabled" @endif wire:click.prevent="verificationCode()" wire:loading.attr="disabled"  type="button" class="btn btn-dark btn-block"   style="background-color: #404040;">Verify</button>
            </div>

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

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
            </div>
            <input wire:model="user.password" type="password" name="password" class="form-control @error('user.password') is-invalid @enderror" placeholder="Password">
        </div>
        @error('user.password')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
            </div>
            <input wire:model="user.password_confirmation" type="password" name="confirm_password" class="form-control @error('user.confirm_password') is-invalid @enderror" placeholder="Password">
        </div>
        @error('user.confirm_password')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>


    <div class="pb-lg-0 pb-5 pt-10">
        <button type="submit"  class="btn auth-login-btn font-weight-bolder font-size-h6 px-6 py-2" @if(!$verified_at) disabled="disabled" @endif>Register</button>
    </div>

</form>

