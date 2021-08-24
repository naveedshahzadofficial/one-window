<div class="section_box">
    <div class="row form-group">
        <div class="col-lg-6">
            <label>{!! __('Department / Organization Name') !!}<span class="text-danger">*</span></label>
            <div wire:ignore>
                <x-select2-dropdown wire:model.defer="dependency_form.department_id"
                                    setFieldName="dependency_form.department_id"
                                    id="organization_id" fieldName="department_name"
                                    :listing="$departments"/>
            </div>
            @error('dependency_form.department_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            <label>{!! __('RLCO Name') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="dependency_form.activity_name" type="text"
                   class="form-control @error('dependency_form.activity_name') is-invalid @enderror"
                   placeholder="RLCO Name"/>
            @error('dependency_form.activity_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="row form-group">

        <div class="col-lg-12">
            <label>{!! __('Remarks (if any):') !!}<span class="text-danger"></span></label>
            <div wire:ignore>
                <x-c-k-editor wire:model.debounce.999999s="dependency_form.remark" id="dependency_remark-ckeditor" placeholder="Remarks" setFieldName="dependency_form.remark" ></x-c-k-editor>
            </div>
            @error('dependency_form.remark')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        <button class="btn btn-custom-color" wire:click.prevent="addDependency()" >Add Dependency</button>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Organization</th>
            <th>RLCO Name</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($dependencies as $dependency)
            <tr>
                <td>{{ optional($dependency->department)->department_name }}</td>
                <td>{{ $dependency->activity_name }}</td>
                <td>{!! $dependency->remark !!}</td>
                <td><button wire:click.prevent="confirmDialog('dependency',{{ $dependency->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
            </tr>
        @empty
            <tr><td colspan="4" class="opacity-70">Currently no Dependency is added.</td></tr>
        @endforelse

        </tbody>
    </table>

</div>

@push('post-scripts')
    <script>
        window.addEventListener('dependency:select2', event =>{
            $(event.detail.id).select2();
            $(event.detail.id).on('change', function (e) {
                let data = $(this).val();
            @this.set(event.detail.key_name, data);
            });
        });
    </script>
@endpush
