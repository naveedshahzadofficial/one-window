<div class="mb-10">

    <h4 class="main_section_heading">{!! __('labels.application_status') !!}
    </h4>

    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>  {!! __('labels.status_form') !!}</span>
    </h4>

    <div class="section_box">

        @component("_components.alerts-default") @endcomponent

        <div class="form-group row align-items-center">
            <label class="col-lg-3 col-form-label  text-right">{!! __('labels.status') !!}<span class="text-danger">*</span></label>
            <div class="col-lg-6">
                <div wire:ignore>
                    <x-select2-dropdown wire:model.defer="status_id"
                                        setFieldName="status_id"
                                        id="status_id" fieldName="status_name"
                                        :listing="$statuses"/>
                </div>
            @error('status_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label class="col-lg-3 col-form-label  text-right">{!! __('labels.upload_file') !!}<span class="text-danger"></span></label>
            <div class="col-lg-6">
            <input type="file"  wire:model="status_file" class="form-control m-input" placeholder="">
            <span class="m-form__help">Files with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                @error('status_file')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label class="col-lg-3 col-form-label  text-right">{!! __('labels.remark_status') !!}<span class="text-danger"></span></label>
            <div class="col-lg-6">
                <textarea wire:model.defer="status_remark" class="form-control form-control-danger  m-input" rows="2"></textarea>
                @error('status_remark')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row align-items-center">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <button wire:click.prevent="resetForm()" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-right" type="button" class="btn btn-secondary">Reset</button>
                <button wire:click.prevent="submitStatus()" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-right" type="button" class="btn btn-success mr-2">Save</button>
            </div>
        </div>
    </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>  {!! __('labels.status_logs') !!}</span>
    </h4>

    <div class="section_box">
        <table class="table">
            <thead>
            <tr>
                <th>Status Date</th>
                <th>User</th>
                <th>Status</th>
                <th>Remarks</th>
                <th class="text-center">Attachment</th>
            </tr>
            </thead>

            <tbody>
            @isset($application_logs)
                @foreach($application_logs as $log)
            <tr>
                <td>{{ $log->created_at->format('d-M-Y') }}</td>
                <td>{{ optional($log->admin)->first_name }}</td>
                <td>{{ optional($log->status)->status_name }}</td>
                <td>{{ $log->log_remark }}</td>
                <td class="text-center">@if(!empty($log->log_file))<a href="{{ \Illuminate\Support\Facades\Storage::url($log->log_file) }}"
                                           target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a>@endif</td>
            </tr>
                @endforeach
            @endisset
            </tbody>
        </table>

    </div>

</div>

@push('post-scripts')
    <script>
        window.addEventListener('reset:select2', event =>{
            console.log(event.detail.id);
            $(event.detail.id).val('');
            $(event.detail.id).trigger('change.select2');
            $(event.detail.id).select2();
            $(event.detail.id).on('change', function (e) {
                let data = $(this).val();
            @this.set(event.detail.key_name, data);
            });
        });
    </script>
@endpush
