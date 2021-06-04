<input {{ isset($attributes)?$attributes:'' }} type="text" {{isset($readonly) && !empty($readonly)?$readonly:''}} class="form-control  {{isset($class)?$class:''}}" placeholder="{{ isset($placeholder)?$placeholder:'' }}" onchange="this.dispatchEvent(new InputEvent('input'))" />
@push('post-scripts')
    <script>
        $(function (){
            $('.{{isset($class)?$class:'no_class'}}').inputmask({
                "mask": "{{isset($mask)?$mask:'no_mask'}}",
                placeholder: "{{ isset($maskPlaceholder)?$maskPlaceholder:'' }}"
            });
        })
    </script>
@endpush
