<input readonly {{ $attributes }} id="{{ $id }}"  type="text" class="form-control w-100 date-picker" autocomplete="off"
       onchange="this.dispatchEvent(new InputEvent('input'))" />
@push('post-scripts')
    <script>
        $(function (){
            $('#{{ $id }}').datetimepicker({
                timepicker:false,
                format:'d-m-Y',
                formatDate:'d-m-Y',
                scrollInput : false
            });
        })
    </script>
@endpush
