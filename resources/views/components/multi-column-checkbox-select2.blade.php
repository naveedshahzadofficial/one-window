<select {{ $attributes }} class="form-control" id="{{ $id }}" multiple="multiple"
        style="width: 100% !important;" >
    <option value="" >--- Please Select ---</option>
    @isset($listing)
        @foreach($listing as $row)
            <option data-json="{{ json_encode($row) }}" value="{{ $row->id }}">{{ $row->{$fieldName} }}</option>
        @endforeach
    @endif
</select>

@push('post-scripts')
    <script>
        let matcher = function (params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }
            // Do not display the item if there is no 'text' property
            if (typeof data.text === 'undefined') {
                return null;
            }
            if(data.text=="--- Please Select ---"){
                return $.extend({}, data, true);
            }

            var activity = $(data.element).data('json');
            if(activity==undefined || activity==null || activity=="" ||  activity=="undefined")
                return null;

            var personJSONString=JSON.stringify(activity);

            // `params.term` should be the term that is used for searching
            // `data.text` is the text that is displayed for the data object
            if (personJSONString.toLowerCase().indexOf(params.term.toLowerCase()) > -1) {
                var modifiedData = $.extend({}, data, true);

                // You can return modified objects from here
                // This includes matching the `children` how you want in nested data sets
                return modifiedData;
            }

            // Return `null` if the term should not be displayed
            return null;
        }

        let formatTemplate = function (result) {

            if (result.id!=undefined && result.id.length==0) {
                return '<div class="row" style="z-index: 10; position: absolute; top: 0; width: 100%; background-color: #30807D; padding: 6px; color: white; "><div class="col-md-1"><label class="checkbox checkbox-primary"><input type="checkbox" name="activity_all_sectors" id="activity_all_sectors" onclick="all_activity_checked(this)" value="all_sectors"><span></span>&nbsp;</label></div><div class="col-md-2"><b>Section Name</b></div><div class="col-md-3"><b>Division Name</b></div><div class="col-md-3"><b>Group Name</b></div><div class="col-md-3"><b>Class Name</b></div></div>';
            }
            let activity = $(result.element).data('json');

            if(activity==undefined || activity==null || activity=="" ||  activity=="undefined")
                return false;

            return '<div class="row"><div class="col-md-1"><label class="checkbox checkbox-primary"><input type="checkbox" name="business_activity_'+activity.id+'" id="business_activity_'+activity.id+'" value="'+activity.id+'"><span></span>&nbsp;</label></div><div class="col-md-2">'+activity.section_name+'</div><div class="col-md-3">'+activity.division_name+'</div><div class="col-md-3">'+activity.group_name+'</div><div class="col-md-3">'+activity.class_name+'</div></div>';
        }


        $(function (){
            $('#{{ $id }}').select2({
                closeOnSelect:false,
                allowHtml: true,
                allowClear: true,
                tags: true,
                multiple: true,
                templateResult: formatTemplate,
                escapeMarkup: function(m) { return m; },
                matcher: matcher,
            });
            $('#{{ $id }}').on('change', function (e) {
                let data = $(this).val();
            @this.set('{{ $setFieldName }}', data);
            });
            $('#{{ $id }}').on('select2:select', function (e) {
                var row = e.params.data;
                console.log(row);
                $('#business_activity_'+row.id).attr('checked',true);
            });

            $('#{{ $id }}').on('select2:unselect', function (e) {
                var row = e.params.data;
                console.log(row);
                $('#business_activity_'+row.id).attr('checked',false);
            });

           $('#{{ $id }}').on('select2:open', function (e) {
               $('#{{ $id }}').find(':selected').each(function (id,row){
                  // console.log($(row).find('input').attr('id'));
                   setTimeout(function(){
                       $('#business_activity_'+$(row).val()).attr('checked',true);
                       }, 100);

                });
            });

        });

        function all_activity_checked(obj){
            if($(obj).is(':checked') ){
                $("#{{ $id }} > option").each(function (id,row){
                    if(row.text=="--- Please Select ---"){
                        $(row).prop("selected", false);
                    }else{
                        $(row).prop("selected", true);
                        $('#business_activity_'+$(row).val()).attr('checked',true);
                    }
                });
                $('#{{ $id }}').trigger("change");
            }else{

                $("#{{ $id }} > option").each(function (id,row){
                    if(row.text=="--- Please Select ---"){
                        $(row).prop("selected", false);
                    }else{
                        $(row).prop("selected", false);
                        $('#business_activity_'+$(row).val()).attr('checked',false);
                    }
                });
                $('#{{ $id }}').trigger("change");

                $("#{{ $id }}").select2("destroy").select2({
                    closeOnSelect:false,
                    allowHtml: true,
                    allowClear: true,
                    tags: true,
                    multiple: true,
                    templateResult: formatTemplate,
                    escapeMarkup: function(m) { return m; },
                    matcher: matcher,
                });
                $("#{{ $id }}").select2('open');

            }
        }


    </script>
@endpush
