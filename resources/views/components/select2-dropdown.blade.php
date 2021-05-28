@props(['id'])
<select {{ $attributes }} class="form-control select2" id="{{ $id ?? '' }}" onchange="this.dispatchEvent(new InputEvent('input'))">
            <option value="">Select Option</option>
            <option value="1">Check Value</option>
</select>


@push('post-scripts')

    <script>

        $(document).ready(function () {
            $('.select2').select2();
            $('.select2').on('change', function (e) {
                let data = $(this).val();
                //window.livewire.find('BIuoVywoMTuI39A42Cx1').set({{ $attributes }}, data);
                @this.set({{ $attributes }}, data);
            });
            Livewire.on('setCategoriesSelect', values => {
                $('.select2').val(values).trigger('change.select2');
            })
        });

    </script>

@endpush
