<form x-data wire:submit.prevent="submitFormRegistration" class="kt_auth_form" id="kt_auth_form" name="kt_auth_form">

    <div class="first_registration_form @if($step==0){{ 'd-box' }}@else{{ 'd-none' }}@endif">
        <h4 class="font-weight-bold text-white text-left">STEP - I</h4>
        <div class="separator separator-dashed my-5"></div>

        <div class="form-group row">
            <div class="col-lg-12 alert alert-warning" style="background-color: #DFF0D7; border: none;" role="alert">
                <p class="text-black-50 text-left" >
                    You must enter a valid Mobile No. and Email address. To activate your account; we will send you verification code on your mobile and email address.
                </p>
                <p class="text-black-50 text-right urdu-label line-height-xl" dir="rtl">
                     اکاؤنٹ بنانے کے لئے آپ کو ایک درست موبائل نمبر اور ای میل اڈریس درج کرنا ہوگا۔  ہم آپ کو آپ کے موبائل اور ای میل اڈریس پر تصدیقی کوڈ بھیجیں گے۔
                </p>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.mobile_network') !!}<span
                        class="text-danger">*</span></label>
                <div wire:ignore>
                    <x-select2-dropdown wire:model.defer="user.telecom_company_id"
                                        setFieldName="user.telecom_company_id"
                                        id="telecom_company_id" fieldName="company_name"
                                        :listing="$telecom_companies"/>
                </div>
                @error('user.telecom_company_id')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.mobile_no') !!}<span
                        class="text-danger">*</span></label>
                <div wire:ignore>
                    <x-input-mask wire:model.defer="user.mobile_no"  mask="0399-9999999" placeholder="Mobile No." class="mobile_no" autocomplete="off" />
                </div>
                @error('user.mobile_no')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.confirm_mobile_no') !!}<span
                        class="text-danger">*</span></label>
                <div wire:ignore>
                    <x-input-mask wire:model="user.mobile_no_confirmation"  mask="0399-9999999" placeholder="Confirm Mobile No." class="confirm_mobile_no" autocomplete="off" />
                </div>
                @error('user.mobile_no_confirmation')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.email_address') !!}<span
                        class="text-danger">*</span></label>
                <div wire:ignore>
                    <input  wire:model.defer="user.email" type="email" name="email" class="form-control"
                            placeholder="Email" autocomplete="off">
                </div>
                @error('user.email')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.confirm_email_address') !!}<span
                        class="text-danger">*</span></label>
                <div wire:ignore>
                    <input  wire:model.defer="user.email_confirmation" type="email" name="email_confirmation" class="form-control"
                            placeholder="Email" autocomplete="off">
                </div>
                @error('user.email_confirmation')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>

    <div class="second_registration_form @if($step==1){{ 'd-box' }}@else{{ 'd-none' }}@endif">
        <h4 class="font-weight-bold text-white text-left">STEP - II</h4>
        <div class="separator separator-dashed my-5"></div>
        <div class="form-group row">
        <div class="col-lg-12 alert alert-warning" style="background-color: #DFF0D7; border: none;" role="alert">
            <p class="text-black-50 text-left" >
               Please enter the mobile verification code and email verification code you received at mobile no. <b>{{ isset($mobile_number)?$mobile_number:'' }}</b> and email address: <b>{{ isset($this->user['email'])?$this->user['email']:'' }}</b> to verify your mobile number and email address.
            </p>
            <p class="text-black-50 text-right urdu-label" dir="rtl">
                براہ کرم اپنے موبائل نمبر اور ای میل ایڈریس کی تصدیق کے لئے موبائل نمبر اور ای میل ایڈریس پر موصول ہونے والا موبائل تصدیقی کوڈ اور ای میل تصدیقی کوڈ درج کریں۔
            </p>
        </div>
        </div>

        @if($fail_verified)
            <div class="form-group row">
                <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                Your One Time Password (OTP) of Mobile or Email is invalid.
            </div>
                </div>
            </div>
        @endif

        <div class="form-group row">
                <div class="col-lg-6">
                    <label class="text-white d-block text-left">{!! __('labels.mobile_no') !!}</label>
                    <label class="text-white d-block text-left">{{ isset($mobile_number)?$mobile_number:'' }}</label>
                </div>
                <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.mobile_otp_code') !!}<span
                        class="text-danger">*</span></label>
                <div wire:ignore>
                    <input  wire:model.defer="mobile_otp_code" type="number" name="mobile_otp_code" class="form-control"
                           placeholder="Mobile OTP" maxlength="6">
                </div>
                @error('mobile_otp_code')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
                </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.email_address') !!}</label>
                <label class="text-white d-block text-left">{{ isset($this->user['email'])?$this->user['email']:'' }}</label>
            </div>

            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.email_otp_code') !!}<span
                        class="text-danger">*</span></label>
                <div wire:ignore>
                    <input  wire:model.defer="email_otp_code" type="number" name="email_otp_code" class="form-control"
                            placeholder="Email OTP" maxlength="6">
                </div>
                @error('email_otp_code')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>

    <div class="third_registration_form @if($step==2){{ 'd-box' }}@else{{ 'd-none' }}@endif">

        <h4 class="font-weight-bold text-white text-left">STEP - III</h4>
        <div class="separator separator-dashed my-5"></div>

        <div class="form-group row">
            <div class="col-lg-12">
                <label class="text-white d-block text-left">{!! __('labels.prefix') !!}<span class="text-danger">*</span></label>
                <div class="radio-inline" wire:ignore>
                    @foreach($prefixes as $prefix)
                        <label class="radio radio-success text-white">
                            <input wire:model.defer="user.prefix_id" type="radio" name="prefix"
                                   value="{{ $prefix->id }}">
                            <span></span>{{ $prefix->prefix_name }}</label>
                    @endforeach
                </div>
                @error('user.prefix_id')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
        <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.first_name') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="user.first_name" type="text"
                   class="form-control @error('user.first_name') is-invalid @enderror"
                   placeholder="First Name"/>
            @error('user.first_name')
            <div class="invalid-feedback d-block text-left">{{ $message }}</div>
            @enderror
        </div>

            <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.middle_name') !!}<span class="text-danger"></span></label>
                <input wire:model.defer="user.middle_name" type="text"
                       class="form-control @error('user.middle_name') is-invalid @enderror"
                       placeholder="Middle Name"/>
                @error('user.middle_name')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="form-group row">
            <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.last_name') !!}<span class="text-danger">*</span></label>
                <input wire:model.defer="user.last_name" type="text"
                       class="form-control @error('user.last_name') is-invalid @enderror"
                       placeholder="Last Name"/>
                @error('user.last_name')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.cnic_no') !!}<span class="text-danger">*</span></label>
                <div wire:ignore>
                <x-input-mask wire:model.defer="user.cnic_no"  mask="99999-9999999-9" placeholder="CNIC No." class="cnic_no_class" />
                </div>
                @error('user.cnic_no')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.mobile_no') !!}</label>
                <label class="text-white d-block text-left">{{ isset($mobile_number)?$mobile_number:'' }}</label>
            </div>

            <div class="col-lg-6">
                <label class="text-white d-block text-left">{!! __('labels.email_address') !!}</label>
                <label class="text-white d-block text-left">{{ isset($this->user['email'])?$this->user['email']:'' }}</label>
            </div>
        </div>

        <div class="separator separator-dashed my-5"></div>

        <div class="form-group row">

            <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.password') !!}<span class="text-danger">*</span></label>
                <input wire:model.defer="user.password" type="password" name="password" class="form-control @error('user.password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                @error('user.password')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.confirm_password') !!}<span class="text-danger">*</span></label>
                <input wire:model.defer="user.password_confirmation" type="password" name="confirm_password" class="form-control @error('user.confirm_password') is-invalid @enderror" placeholder="Confirm Password" autocomplete="off">
                @error('user.password_confirmation')
                <div class="invalid-d-block text-left">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row form-group">
            <div class="col-lg-12" wire:ignore>
                <label class="checkbox checkbox-success text-white">
                    <input wire:model.defer="user.declaration" type="checkbox"
                           name="user.declaration"
                           id="user_declaration"
                           value="1">
                    <span></span>&nbsp;&nbsp;I agree &nbsp;<a class="text-white" href="javascript:;"><b>Terms & Conditions</b></a>&nbsp; of SMEs Portal.&nbsp;</label>
            </div>
            <div class="col-lg-12 text-right">
                <lable wire:click="$toggle('user.declaration', 1)" for="user_declaration" class="urdu-label cursor-pointer text-white text-right" dir="rtl">میں راضی ہوں شرائط و ضوابط ایس ایم ایز پورٹل کا۔</lable>
                @error('user.declaration')
                <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                @enderror
            </div>


        </div>

    </div>

    <!--begin: Wizard Actions-->
    <div class="d-flex justify-content-between">
        <div class="mr-2">
            @if($step> 0 && $step<2)
                <button type="button"
                        class="btn auth-login-btn font-weight-bold  px-10 py-3 d-block"
                        data-wizard-type="action-prev"
                        wire:loading.class="spinner spinner-white spinner-right"
                        wire:click.prevent="decreaseStep"
                        wire:loading.attr="disabled">{!! __('labels.back') !!}
                </button>
            @endif
        </div>

        <div>
            @if($step >= 2)
                <button type="button"
                        class="btn auth-login-btn font-weight-bold  px-10 py-3 d-block"
                        data-wizard-type="action-submit"
                        wire:loading.class="spinner spinner-white spinner-right"
                        wire:loading.attr="disabled"
                        wire:click.prevent="submitRegistration">{!! __('labels.sign_up') !!}
                </button>
            @else
                <button type="button"
                        class="btn auth-login-btn font-weight-bold  px-10 py-3 d-block"
                        data-wizard-type="action-next"
                        wire:loading.class="spinner spinner-white spinner-right"
                        wire:loading.attr="disabled"
                        wire:click.prevent="submitRegistration"
                >{!! $step==0?__('labels.send_code'):($step==1?__('labels.verify_nd_next'):'Next') !!}
                </button>
            @endif
        </div>
    </div>
    <!--end: Wizard Actions-->

</form>

