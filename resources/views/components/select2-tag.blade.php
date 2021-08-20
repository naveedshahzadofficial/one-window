<select {{ $attributes }} {{ $isMultiple?'multiple':'' }} class="form-control" id="{{ $id }}" style="width: 100% !important;">
    <option value="">--- Please Select ---</option>
    @isset($listing)
        @foreach($listing as $row)
            <option selected="selected" value="{{ $row->id }}">{{ $row->{$fieldName} }}</option>
        @endforeach
    @endif
</select>



@push('post-scripts')
    <script>
        $(function (){
            $('#{{ $id }}').select2({
                tags: true,
                tokenSeparators: [',']
            });
            $('#{{ $id }}').on('change', function (e) {
                let data = $(this).val();
            @this.set('{{ $setFieldName }}', data);
            });
        })
    </script>

@endpush
