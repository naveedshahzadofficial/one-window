<div class="section_box">

    <div class="row form-group">
        <div class="col-lg-6">
            <label>{!! __('Title') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="other_document_form.document_title" type="text"
                   class="form-control @error('other_document_form.document_title') is-invalid @enderror"
                   placeholder="Document Title"/>
            @error('other_document_form.document_title')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6"  x-data="{ open: false }">
            <label>{!!__('Attachment') !!}<span class="text-danger"></span></label>

            @if(isset($other_document_form['document_file']) && !empty($other_document_form['document_file']))
                <br><a href="{{ asset('storage/'.$other_document_form['document_file']) }}"
                       target="_blank" class="file_viewer" title="Attachment">View File</a>
                &nbsp;|&nbsp;
                <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('other_document_file', null)">Do Not Change File</a>
            @endif

            <input @if(isset($other_document_form['document_file']) && !empty($other_document_form['document_file'])) x-show="open" @endif type="file" class="form-control" wire:model="other_document_file">
            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf, doc, docx are allowed, Max. upload size is 5MB.</span>
            @error('other_document_file')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row form-group">
    <div class="col-lg-6">
        <label>{!! __('Order No.') !!}<span class="text-danger">*</span></label>
        <input wire:model.defer="other_document_form.document_order" type="number"
               class="form-control @error('other_document_form.document_order') is-invalid @enderror"
               placeholder="Order No." min="1"/>
        @error('other_document_form.document_order')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    </div>


    <div class="row form-group">
        @if(isset($other_document_form['id']) && !empty($other_document_form['id']))
        <button class="btn btn-custom-color" wire:click.prevent="updateOtherDocument({{ $other_document_form['id'] }})"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled">Update Document</button>
        @else
        <button class="btn btn-custom-color" wire:click.prevent="addOtherDocument()"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled">Add Document</button>
        @endif
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Title</th>
            <th class="text-center">Attachment</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($other_documents as $document)
            <tr>
                <td>
                    @if ($document->document_order > 1)
                        <a wire:click.prevent="otherDocumentUp({{ $document->id }},{{ $document->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-up text-primary"></i>
                        </a>
                    @endif
                    @if ($document->document_order < $other_documents->max('document_order'))
                        <a wire:click.prevent="otherDocumentDown({{ $document->id }},{{ $document->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-down text-primary"></i>
                        </a>
                    @endif
                </td>

                <td>{{ $document->document_title }}</td>
                <td class="text-center"><a  href="{{ asset('storage/'.$document->document_file) }}" target="_blank" title="{{ $document->document_title }} attachment" class="btn btn-info text-center btn-circle btn-icon btn-xs"><i class="flaticon2-file text-white"></i></a></td>
                <td><button wire:click.prevent="editOtherDocument({{ $document->id }})" class="btn btn-bg-primary text-center btn-circle btn-icon btn-xs"><i class="flaticon2-edit text-white"></i></button> &nbsp; <button wire:click.prevent="confirmDialog('other_document',{{ $document->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
            </tr>
        @empty
            <tr><td colspan="4" class="opacity-70">Currently no other document is added.</td></tr>
        @endforelse

        </tbody>
    </table>

</div>

