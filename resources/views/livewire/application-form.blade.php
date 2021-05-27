<div x-data class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
    <!--begin: Wizard Nav-->
    <div class="wizard-nav">
        <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
            <!--begin::Wizard Step 1 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>1.</span>Applicant Profile</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 1 Nav-->
            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>2.</span>Business Profile</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->
            <!--begin::Wizard Step 3 Nav-->
            <div class="wizard-step" data-wizard-type="step">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>3.</span>Utility Connections</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 3 Nav-->
            <!--begin::Wizard Step 4 Nav-->
            <div class="wizard-step" data-wizard-type="step">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>4.</span>Employees Info</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 4 Nav-->
            <!--begin::Wizard Step 5 Nav-->
            <div class="wizard-step" data-wizard-type="step">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>5</span>Review and Submit</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 5 Nav-->
        </div>
    </div>
    <!--end: Wizard Nav-->
    <!--begin: Wizard Body-->
    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
        <div class="col-xl-12 col-xxl-7">
            <!--begin: Wizard Form-->
            <form class="form" id="kt_form">
                <!--begin: Wizard Step 1-->
                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                    <h4 class="mb-10 font-weight-bold text-dark">Basic Info</h4>

                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label>Prefix: *</label>
                            <select wire:model="application.prefix"  class="form-control @error('application.prefix') is-invalid @enderror">
                                <option value="">Select Prefix</option>
                                @foreach($prefixes as $prefix)
                                    <option value="{{ $prefix }}">{{ $prefix }}</option>
                                @endforeach
                            </select>
                            @error('application.prefix')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-3">
                            <label>First Name: *</label>
                            <input wire:model="application.first_name" type="text" class="form-control @error('application.first_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.first_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-3">
                            <label>Middle Name:</label>
                            <input wire:model="application.middle_name" type="text" class="form-control @error('application.middle_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.middle_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-3">
                            <label>Last Name: *</label>
                            <input wire:model="application.last_name" type="text" class="form-control @error('application.last_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.last_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Full Name:</label>
                            <input type="email" class="form-control is-invalid" placeholder="Enter full name" />
                            <div class="invalid-feedback" style="display: block;">Shucks, check the formatting of that and try again.</div>
                        </div>
                        <div class="col-lg-4">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" />
                            <span class="form-text text-muted">Please enter your email</span>
                        </div>
                        <div class="col-lg-4">
                            <label>Username:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-user"></i>
																	</span>
                                </div>
                                <input type="text" class="form-control" placeholder="" />
                            </div>
                            <span class="form-text text-muted">Please enter your username</span>
                        </div>
                    </div>


                </div>
                <!--end: Wizard Step 1-->
                <!--begin: Wizard Step 2-->
                <div class="pb-5" data-wizard-type="step-content">
                    <h4 class="mb-10 font-weight-bold text-dark">Enter the Details of your Delivery</h4>

                </div>
                <!--end: Wizard Step 2-->
                <!--begin: Wizard Step 3-->
                <div class="pb-5" data-wizard-type="step-content">
                    <h4 class="mb-10 font-weight-bold text-dark">Select your Services</h4>


                </div>
                <!--end: Wizard Step 3-->
                <!--begin: Wizard Step 4-->
                <div class="pb-5" data-wizard-type="step-content">
                    <h4 class="mb-10 font-weight-bold text-dark">Setup Your Delivery Location</h4>

                </div>
                <!--end: Wizard Step 4-->
                <!--begin: Wizard Step 5-->
                <div class="pb-5" data-wizard-type="step-content">
                    <!--begin::Section-->
                    <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                    <h6 class="font-weight-bolder mb-3">Current Address:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Address Line 1</div>
                        <div>Address Line 2</div>
                        <div>Melbourne 3000, VIC, Australia</div>
                    </div>
                    <div class="separator separator-dashed my-5"></div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <h6 class="font-weight-bolder mb-3">Delivery Details:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Package: Complete Workstation (Monitor, Computer, Keyboard &amp; Mouse)</div>
                        <div>Weight: 25kg</div>
                        <div>Dimensions: 110cm (w) x 90cm (h) x 150cm (L)</div>
                    </div>
                    <div class="separator separator-dashed my-5"></div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <h6 class="font-weight-bolder mb-3">Delivery Service Type:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Overnight Delivery with Regular Packaging</div>
                        <div>Preferred Morning (8:00AM - 11:00AM) Delivery</div>
                    </div>
                    <div class="separator separator-dashed my-5"></div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <h6 class="font-weight-bolder mb-3">Delivery Address:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Address Line 1</div>
                        <div>Address Line 2</div>
                        <div>Preston 3072, VIC, Australia</div>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end: Wizard Step 5-->
                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                    <div class="mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                        <button type="button" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                    </div>
                </div>
                <!--end: Wizard Actions-->
            </form>
            <!--end: Wizard Form-->
        </div>
    </div>
    <!--end: Wizard Body-->
</div>
