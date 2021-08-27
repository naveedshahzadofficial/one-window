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
        <div class="col-lg-6">
            <label>{!!__('Attachment') !!}<span class="text-danger"></span></label>
            <input type="file" class="form-control" wire:model="other_document_file">
            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf, doc, docx are allowed, Max. upload size is 5MB.</span>
            @error('other_document_file')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="row form-group">
        <button class="btn btn-custom-color" wire:click.prevent="addOtherDocument()" >Add Document</button>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th class="text-center">Attachment</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($other_documents as $document)
            <tr>
                <td>{{ $document->document_title }}</td>
                <td class="text-center"><a  href="{{ asset('storage/'.$document->document_file) }}" target="_blank" title="{{ $document->document_title }} attachment" class="btn btn-info text-center btn-circle btn-icon btn-xs"><i class="flaticon2-file text-white"></i></a></td>
                <td><button wire:click.prevent="confirmDialog('other_document',{{ $document->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
            </tr>
        @empty
            <tr><td colspan="4" class="opacity-70">Currently no Other Document is added.</td></tr>
        @endforelse

        </tbody>
    </table>

</div>

