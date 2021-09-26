<div>

    <div class="row form-group">

        <div class="col-lg-6">
            <label>{!! __('Required Documents') !!}<span class="text-dark-50">(Enter comma separated required documents)</span><span
                    class="text-danger"></span></label>
                <div wire:ignore>
                    <x-select2-single-tag wire:model.defer="required_document_form.required_document_id"
                                        setFieldName="required_document_form.required_document_id"
                                        id="required_document_id" fieldName="document_title"
                                        :listing="$required_documents"/>
                </div>
            @error('required_document_form.required_document_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            <label>{!! __('Order No.') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="required_document_form.position" type="number"
                   class="form-control @error('required_document_form.position') is-invalid @enderror"
                   placeholder="Order No." min="1"/>
            @error('required_document_form.position')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="row form-group">
        @if(isset($required_document_form['id']) && !empty($required_document_form['id']))
            <button class="btn btn-custom-color" wire:click.prevent="updateRequiredDocument({{ $required_document_form['id'] }})"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled">Update Document</button>
        @else
            <button class="btn btn-custom-color" wire:click.prevent="addRequiredDocument()"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled">Add Document</button>
        @endif
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Document</th>
            <th class="text-center">Order No.</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @forelse($rlcoRequiredDocuments as $document)
            <tr>
                <td>
                    @if ($document->position > 1)
                        <a wire:click.prevent="requiredDocumentUp({{ $document->id }}, {{ $document->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-up text-primary"></i>
                        </a>
                    @endif
                    @if ($document->position < $rlcoRequiredDocuments->max('position'))
                        <a wire:click.prevent="requiredDocumentDown({{ $document->id }}, {{ $document->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-down text-primary"></i>
                        </a>
                    @endif
                </td>

                <td>{{ optional($document->requiredDocument)->document_title }}</td>
                <td class="text-center">{{ $document->position }}</td>
                <td>
                    <button wire:click.prevent="editRequiredDocument({{ $document->id }})" class="btn btn-bg-primary text-center btn-circle btn-icon btn-xs"><i class="flaticon2-edit text-white"></i></button> &nbsp;
                    <button wire:click.prevent="confirmDialog('required_document',{{ $document->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="opacity-70">Currently no required document is added.</td></tr>
        @endforelse
        </tbody>
    </table>

</div>
