<form x-data wire:submit.prevent="submitFormRegistration">
    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>

        <select wire:model="user.prefix"  class="form-control">
            <option value="">Select Prefix</option>
            @foreach($prefixes as $prefix)
            <option value="{{ $prefix }}">{{ $prefix }}</option>
            @endforeach
        </select>

        @error('user.prefix')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror

    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
        <input wire:model="user.first_name" type="text" class="form-control" name='first_name' id='first_name' placeholder="First name" required>
        @error('user.first_name')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
        <input wire:model="user.middle_name" type="text" class="form-control" name='middle_name' placeholder="Middle name" >
        @error('user.middle_name')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
        <input wire:model="user.last_name" type="text" class="form-control" name='last_name' placeholder="Last name">
        @error('user.last_name')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-id-card"></span>
            </div>
        </div>
        <input wire:model="user.cnic_no" type="text" class="form-control cnic_no" name='cnic_no' placeholder="CNIC No">

        @error('user.cnic_no')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-mobile"></span>
            </div>
        </div>
        <div class="col-md-3">
            <select wire:model="user.telecom_company_id" name="telecom_company_id" class="form-control">
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

        <div class="col-md-3">
            <select wire:model="user.mobile_code_id" name="mobile_code_id"  class="form-control">
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

        <div class="col-md-5">
            <input wire:model="user.mobile_no"  type="text" class="form-control" name='mobile_no' id='mobile_no' placeholder="Number" maxlength='7'>
            @error('user.mobile_no')
            <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>


    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>

        <div class="col-md-6">
        <input wire:model="user.email" type="email" class="form-control" name='email' id='email' placeholder="Email" required='requirred'>
        @error('user.email')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        </div>

        <div class="col-md-4">
            <button wire:click.prevent="sendVerificationCode()"  type="button" class="btn btn-dark btn-block"  style="background-color: #404040;">Get Code</button>
        </div>

    </div>

    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-mobile"></span>
            </div>
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" name='verify_code' placeholder="Verification Code" required>
        </div>

        <div class="col-md-4">
            <button  type="button" class="btn btn-dark btn-block"   style="background-color: #404040;">Verify</button>
        </div>

    </div>

    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        <input wire:model="user.password" type="password" class="form-control" name='password' placeholder="Password">
        @error('user.password')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror

    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        <input wire:model="user.password_confirmation" type="password" class="form-control" name='confirm_password' placeholder="Retype password">
        @error('user.confirm_password')
        <span class="invalid-feedback d-block text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>


    <div class="row">

        <div class="col-12">
            <button type="submit" class="btn btn-dark btn-block" style="background-color: #404040;" >Register</button>
        </div>

    </div>
    <br>


</form>

