<input {{ $attributes }} type="text" class="form-control cnic_no" placeholder="CNIC No." onchange="this.dispatchEvent(new InputEvent('input'))" />
@push('post-scripts')
    <script>
        $(function (){
            $('.cnic_no').inputmask({
                "mask": "99999-9999999-9",
                placeholder: ""
            });
        })
    </script>
@endpush
