<div class="section_box">
    <div class="row form-group">
        <div class="col-lg-6">
            <label>{!! __('Question') !!}<span class="text-danger"></span></label>
            <input wire:model.defer="faq_form.faq_question" type="text"
                   class="form-control @error('faq_form.faq_question') is-invalid @enderror"
                   placeholder="Question"/>
            @error('faq_form.faq_question')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            <label>{!! __('Order') !!}<span class="text-danger"></span></label>
            <input wire:model.defer="faq_form.faq_order" type="text"
                   class="form-control @error('faq_form.faq_order') is-invalid @enderror"
                   placeholder="Order No."/>
            @error('faq_form.faq_order')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="row form-group">

        <div class="col-lg-12">
            <label>{!! __('Answer') !!}<span class="text-danger"></span></label>
            <textarea wire:model.defer="faq_form.faq_answer" class="form-control" @error('faq_form.faq_answer') is-invalid @enderror></textarea>
            @error('faq_form.faq_answer')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        <button class="btn btn-primary" wire:click.prevent="addFaq()" >Add</button>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Order</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($faqs as $index => $faq)
            <tr>
                <td>{{ $faq->faq_question }}</td>
                <td>{{ $faq->faq_answer }}</td>
                <td>{{ $faq->faq_order }}</td>
                <td><button wire:click.prevent="deleteFaq({{ $faq->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
