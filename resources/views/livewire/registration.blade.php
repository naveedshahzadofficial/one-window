<form x-data wire:submit.prevent="submitFormRegistration" class="kt_auth_form" id="kt_auth_form" name="kt_auth_form">

    <div class="row">

        <div class="col-lg-6">
            <div class="form-group text-left">
            <label class="text-white">Prefix <span class="text-danger">*</span></label>
            <div class="radio-inline">
                @foreach($prefixes as $prefix)
                    <label class="radio text-white">
                        <input wire:model.defer="user.prefix" type="radio" name="user.prefix" value="{{ $prefix }}">
                        <span></span>{{ $prefix }}</label>
                @endforeach
            </div>
            @error('user.prefix')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-user"></i>
																</span>
                </div>
                <input wire:model.defer="user.first_name" type="text" name="first_name" class="form-control @error('user.first_name') is-invalid @enderror"
                       placeholder="First name" autocomplete="off">
            </div>
            @error('user.first_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror

        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-user"></i>
																</span>
                    </div>
                    <input wire:model.defer="user.middle_name" type="text" name="first_name" class="form-control @error('user.middle_name') is-invalid @enderror"
                           placeholder="Middle name" autocomplete="off">
                </div>
                @error('user.middle_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-user"></i>
																</span>
                    </div>
                    <input wire:model.defer="user.last_name" type="text" name="first_name" class="form-control @error('user.last_name') is-invalid @enderror"
                           placeholder="Last name" autocomplete="off">
                </div>
                @error('user.last_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-passport"></i>
																</span>
                    </div>
                    <x-input-mask wire:model.defer="user.cnic_no"  mask="99999-9999999-9" placeholder="CNIC No." class="cnic_no" />
                </div>
                @error('user.cnic_no')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div></div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-telegram"></i>
																</span>
                    </div>
                    <select @if($verified_at) disabled="disabled" @endif wire:model="user.telecom_company_id" name="telecom_company_id" class="form-control @error('user.telecom_company_id') is-invalid @enderror">
                        <option value="">Select Network</option>
                        @foreach($telecom_companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>

                </div>
                @error('user.telecom_company_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div></div>
        </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-mobile"></i>
																</span>
                    </div>
                    <select @if($verified_at) disabled="disabled" @endif wire:model="user.mobile_code_id" name="mobile_code_id"  class="form-control @error('user.mobile_code_id') is-invalid @enderror">
                        <option value="">Select Code</option>
                        @foreach($mobile_codes as $code)
                            <option value="{{ $code->id }}">{{ $code->code_number }}</option>
                        @endforeach

                    </select>


                </div>
                @error('user.mobile_code_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror


            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-mobile"></i>
																</span>
                    </div>
                    <x-input-mask wire:model="user.mobile_no" readonly="{{ $verified_at?'readonly':'' }}" mask="9999999" placeholder="Mobile No." class="mobile_no" autocomplete="off" />

                @error('user.mobile_no')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-envelope"></i>
																</span>
                    </div>
                    <input  @if($verified_at) readonly="readonly" @endif wire:model="user.email" type="email" name="email" class="form-control @error('user.email') is-invalid @enderror"
                            placeholder="Email" autocomplete="off">

                </div>
                @error('user.email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
           <div class="col-md-6" x-data="{ isResend: false }">
            <div class="form-group">
                <button @if(!$btn_get_code) disabled="disabled" @endif  wire:click.prevent="sendVerificationCode()" wire:loading.attr="disabled"  type="button" class="btn btn-dark btn-block auth-default-btn" @click="isResend = true" x-text="isResend?'Resend Code':'Get Code'">Get Code</button>
            </div>
            </div>
    </div>

    <div class="separator separator-dashed my-5 @if(!$box_verification) d-none @endif"></div>
    <p class="alert-success @if(!$box_verification) d-none @endif">Please enter the One Time Password (OTP) send to your mobile phone and email address.</p>

    <div class="row @if(!$box_verification) d-none @endif">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
                    </div>
                    <input @if($verified_at) readonly="readonly" @endif wire:model.defer="mobile_otp_code" type="text" class="form-control"  placeholder="One Time Password (OTP)" maxlength="6" autocomplete="off">

                </div>
            </div>

        </div>
        <div class="col-md-6">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
                    </div>
                    <input @if($verified_at) readonly="readonly" @endif wire:model.defer="email_otp_code" type="text" class="form-control"  placeholder="Email OTP" maxlength="6" autocomplete="off">

                </div>
            </div>

        </div>
    </div>

    @if($fail_verified)
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            Your One Time Password (OTP) of Mobile or Email is invalid.
        </div>
    @endif

    <div class="row  @if(!$box_verification) d-none @endif">
        <div class="col-md-6">
            @if($verified_message)
                <div class="alert alert-success" role="alert">
                    <button  wire:click="$set('verified_message', false)" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    Verified Successfully.
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button @if($verified_at) disabled="disabled" @endif wire:click.prevent="verificationCode()" wire:loading.attr="disabled"  type="button" class="btn btn-dark btn-block"   style="background-color: #404040;">Confirm</button>
            </div>
        </div>
    </div>




    <div class="separator separator-dashed my-5 @if(!$box_verification) d-none @endif"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
                    </div>
                    <input wire:model.defer="user.password" type="password" name="password" class="form-control @error('user.password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                </div>
                @error('user.password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div></div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
                    </div>
                    <input wire:model.defer="user.password_confirmation" type="password" name="confirm_password" class="form-control @error('user.confirm_password') is-invalid @enderror" placeholder="Confirm Password" autocomplete="off">
                </div>
                @error('user.confirm_password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div></div>
    </div>

    <div class="pb-lg-0 pb-5 pt-10">
        <button type="submit"  class="btn auth-login-btn font-weight-bolder font-size-h6 px-6 py-2" @if(!$verified_at) disabled="disabled" @endif>Register</button>
    </div>

</form>

