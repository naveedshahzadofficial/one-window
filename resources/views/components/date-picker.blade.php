<input readonly {{ $attributes }}  type="text" class="form-control w-100 date-picker" autocomplete="off"
       onchange="this.dispatchEvent(new InputEvent('input'))" />
@push('post-scripts')
    <script>
        $(function (){
            $('.date-picker').datetimepicker({
                timepicker:false,
                format:'d-m-Y',
                formatDate:'d-m-Y',
                scrollInput : false
            });
        })
    </script>
@endpush
