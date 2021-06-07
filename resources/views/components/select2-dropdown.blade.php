<select {{ $attributes }} class="form-control select2" id="{{ $id }}" style="width: 100% !important;" onchange="this.dispatchEvent(new InputEvent('input'))">
            <option value="">--- Please Select ---</option>
            @isset($listing)
            @foreach($listing as $row)
            <option value="{{ $row->id }}">{{ $row->{$fieldName} }}</option>
            @endforeach
            @endif
</select>



@push('post-scripts')
    <script>
        $(function (){
            $('#{{ $id }}').select2();
            $('#{{ $id }}').on('change', function (e) {
                let data = $(this).val();
                @this.set('{{ $setFieldName }}', data);
            });
        })
    </script>

@endpush
