<input {{ isset($attributes)?$attributes:'' }} type="text"  class="form-control  {{isset($class)?$class:''}}" placeholder="{{ isset($placeholder)?$placeholder:'' }}" onchange="this.dispatchEvent(new InputEvent('input'))" />

@push('post-scripts')
    <script>
        $('.{{isset($class)?$class:'no_class'}}').inputmask("currency",{
            radixPoint:"",
            groupSeparator: ",",
            allowMinus: false,
            prefix: '',
            digits: 0,
            digitsOptional: false,
            rightAlign: false,
            unmaskAsNumber: true,
            removeMaskOnSubmit:true,
            autoUnmask:false,
            greedy:true,
            insertMode:true,
            clearIncomplete:false,
            clearMaskOnLostFocus:true,
            placeholder: ''
        });
    </script>
@endpush
