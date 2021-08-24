<div class="section_box">
    <div class="row form-group">
        <div class="col-lg-6">
            <label>{!! __('Observation') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="fos_form.fos_observation" type="text"
                   class="form-control @error('fos_form.fos_observation') is-invalid @enderror"
                   placeholder="Observation"/>
            @error('fos_form.fos_observation')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            <label>{!! __('Order') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="fos_form.fos_order" type="text"
                   class="form-control @error('fos_form.fos_order') is-invalid @enderror"
                   placeholder="Order No."/>
            @error('fos_form.fos_order')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        <div x-data="{ open: false }" class="col-lg-6">
            <label>{!!__('Attachment (if any)') !!}<span class="text-danger"></span></label>
            @if(isset($fos_form['fos_file']) && !empty($fos_form['fos_file']))
                <br><a href="{{ asset('storage/'.$fos_form['fos_file']) }}"
                       target="_blank" class="file_viewer" title="Attachment FAQ">View File</a>
                &nbsp;|&nbsp;
                <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('fos_file', null)">Do Not Change File</a>
            @endif

            <input
                @if(isset($fos_form['fos_file']) && !empty($fos_form['fos_file'])) x-show="open"
                @endif  type="file" class="form-control" wire:model="fos_file">
            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf, doc, docx are allowed, Max. upload size is 5MB.</span>
            @error('fos_file')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="row form-group d-none">

        <div class="col-lg-12">
            <label>{!! __('Solution') !!}<span class="text-danger">*</span></label>
            <div wire:ignore>
                <x-c-k-editor wire:model.debounce.999999s="fos_form.fos_solution" id="fos_solution-ckeditor" placeholder="Solution" setFieldName="fos_form.fos_solution" ></x-c-k-editor>
            </div>
            @error('fos_form.fos_solution')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        <button class="btn btn-custom-color" wire:click.prevent="addFos()" >Add Fos</button>
    </div>

    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionFoss">
        @forelse($foss as $fos)
            <div class="card bg-custom-color">
                <div class="card-header" id="heading_fos_{{$loop->iteration}}">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse_fos_{{$loop->iteration}}" aria-expanded="false">
																<span class="svg-icon svg-icon-primary">
																	<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
																			<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                        <div class="card-label pl-4">{{ $fos->fos_observation }}</div>
                        @if(!empty($fos->fos_file))
                        <a  href="{{ asset('storage/'.$fos->fos_file) }}" target="_blank" title="Attachment FOS" class="btn btn-info text-center btn-circle btn-icon btn-xs"><i class="flaticon2-file text-white"></i></a>&nbsp;&nbsp;
                        @endif
                        <button wire:click.prevent="confirmDialog('fos',{{ $fos->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button>
                    </div>
                </div>
                <div id="collapse_fos_{{$loop->iteration}}" class="collapse" data-parent="#accordionFoss" style="">
                    <div class="card-body pl-12 d-none">{!! $fos->fos_solution !!}</div>
                </div>
            </div>
        @empty
            <span class="opacity-70">Currently no observation is added.</span>
        @endforelse
    </div>

</div>
