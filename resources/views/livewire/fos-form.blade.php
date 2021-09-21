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
            <input wire:model.defer="fos_form.fos_order" type="number"
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

            <input @if(isset($fos_form['fos_file']) && !empty($fos_form['fos_file'])) x-show="open" @endif  type="file" class="form-control" wire:model="fos_file">
            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf, doc, docx are allowed, Max. upload size is 5MB.</span>
            @error('fos_file')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="row form-group">
        @if(isset($fos_form['id']) && !empty($fos_form['id']))
            <button class="btn btn-custom-color" wire:click.prevent="updateFos({{ $fos_form['id'] }})"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled" >Update Observation</button>
        @else
        <button class="btn btn-custom-color" wire:click.prevent="addFos()"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled">Add Observation</button>
        @endif
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Observation</th>
            <th class="text-center">Attachment</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($foss as $fos)
            <tr>
                <td>
                    @if ($fos->fos_order > 1)
                        <a wire:click.prevent="fosUp({{ $fos->id }},{{ $fos->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-up text-primary"></i>
                        </a>
                    @endif
                    @if ($fos->fos_order < $foss->max('fos_order'))
                        <a wire:click.prevent="fosDown({{ $fos->id }},{{ $fos->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-down text-primary"></i>
                        </a>
                    @endif
                </td>

                <td>{{ $fos->fos_observation }}</td>
                <td class="text-center">@if(!empty($fos->fos_file)) <a  href="{{ asset('storage/'.$fos->fos_file) }}" target="_blank" title="{{ $fos->fos_observation }} attachment" class="btn btn-info text-center btn-circle btn-icon btn-xs"><i class="flaticon2-file text-white"></i></a>@endif</td>
                <td><button wire:click.prevent="editFos({{ $fos->id }})" class="btn btn-bg-primary text-center btn-circle btn-icon btn-xs"><i class="flaticon2-edit text-white"></i></button> &nbsp; <button wire:click.prevent="confirmDialog('fos',{{ $fos->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
            </tr>
        @empty
            <tr><td colspan="4" class="opacity-70">Currently no observation is added.</td></tr>
        @endforelse

        </tbody>
    </table>

</div>
