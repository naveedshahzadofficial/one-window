<div class="section_box">
    <div class="row form-group">
        <div class="col-lg-6">
            <label>{!! __('Organization') !!}<span class="text-danger"></span></label>
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
            <label>{!! __('Activity Name') !!}<span class="text-danger"></span></label>
            <input wire:model.defer="dependency_form.activity_name" type="text"
                   class="form-control @error('dependency_form.activity_name') is-invalid @enderror"
                   placeholder="Activity Name"/>
            @error('dependency_form.activity_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="row form-group">

        <div class="col-lg-12">
            <label>{!! __('Remarks (if any):') !!}<span class="text-danger"></span></label>
            <textarea wire:model.defer="dependency_form.remark" class="form-control" @error('dependency_form.fos_solution') is-invalid @enderror></textarea>
            @error('dependency_form.remark')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        <button class="btn btn-custom-color" wire:click.prevent="addDependency()" >Add</button>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Organization</th>
            <th>Activity name</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dependencies as $index => $dependency)
            <tr>
                <td>{{ optional($dependency->department)->department_name }}</td>
                <td>{{ $dependency->activity_name }}</td>
                <td>{{ $dependency->remark }}</td>
                <td><button wire:click.prevent="deleteDependency({{ $dependency->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
            </tr>
        @endforeach

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
