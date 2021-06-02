@props(['class','readonly','placeholder','mask', 'maskPlaceholder'])
<input {{ isset($attributes)?$attributes:'' }} type="text" {{isset($readonly)?$readonly:''}} class="form-control {{isset($class)?$class:''}}" placeholder="{{ isset($placeholder)?$placeholder:'' }}" onchange="this.dispatchEvent(new InputEvent('input'))" />
@push('post-scripts')
    <script>
        $(function (){
            $('.{{$class}}').inputmask({
                "mask": "{{isset($mask)?$mask:'no_mask'}}",
                placeholder: "{{ isset($maskPlaceholder)?$maskPlaceholder:'' }}"
            });
        })
    </script>
@endpush
