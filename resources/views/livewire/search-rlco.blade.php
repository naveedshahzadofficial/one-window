<div class="container my-5" style="min-height: 310px;">
    <div class="row">
        <div class="col-md-12  col-sm-12">
            <div class="search-box">
                <div class="row">
                <div class="col-md-3  col-sm-12">
                    <label class="lable fw-bold" for="Deparrtment">Deparrtment</label>
                    <br>
                    <div wire:ignore >
                    <select wire:model.defer="department_id" name="deparrtment" id="department_id" class="w-100 shadow-sm rounded">
                        <option value="">Select</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('department_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3  col-sm-12">
                    <label class="lable fw-bold" for="business">Business</label>
                    <br>

                    <div wire:ignore >
                        <select wire:model.defer="business_category_id" name="business_category_id" id="business_category_id" class="select2 w-100">
                            <option value="">Select</option>
                            @foreach($businesses as $business)
                                <option value="{{ $business->id }}">{{ $business->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('business_category_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3  col-sm-12">
                    <label class="lable fw-bold" for="activity">Activity</label>
                    <br>
                    <div wire:ignore >
                    <select wire:model.defer="activity_id" name="activity_id" id="activity_id" class="select2 w-100">
                        <option value="">Select</option>
                        @foreach($activities as $activity)
                            <option value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('activity_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3  col-sm-12 text-center">
                    <button type="button" wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled" wire:click.prevent="searchForm" class="btn btn-sm px-5 text-light">Search</button>
                </div>
                </div>
            </div>

                @if($search)

                <div class="row " wire:loading>
                    <div class="col-md-12 col-sm-12">
                        Searching RLCOs...
                    </div>
                </div>
            
                <div class="row" wire:loading.remove>
                    @if($rlcos->isNotEmpty())
                    <div class="row">
                        <div class="col-md-12 my-3 col-sm-12">
                            <span style="margin-left: 30px; color: #000c60;">Search Results</span>
                            <br>
                            <span style="margin-left: 30px; font-size: 12px;">{{ number_format($rlcos->count()) }}&nbsp;{{ $rlcos->count()>1?'results':'result'}} found.</span>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                    <div class="col-md-12 my-3 col-sm-12">
                    <div class="whole-desc-box">
                    @forelse($rlcos as $rlco)
                            <div class="desc-box">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <span class="desc-title"><a target="_blank" href="{{ route('rlco.detail',$rlco) }}">{{ $rlco->rlco_name }}</a></span>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <p class="desc-content">{{ \Illuminate\Support\Str::limit(strip_tags($rlco->description), 200, $end='...') }}</p>
                                    </div>
                                    <div class="col-md-2 col-sm-12 text-center">
                                        <a target="_blank" href="{{ route('rlco.detail',$rlco) }}" class="btn detail-btn">View Detail</a>
                                    </div>
                                </div>
                            </div>
                    @empty
                    <div class="text-gray-500 text-sm">
                         No matching result was found.
                    </div>
                    @endforelse
                    </div>

                    <div class="row my-3">
                            {{$rlcos->links()}}
                    </div>

                    </div>
                    </div>

            </div>
                @endif

        </div>
    </div>

</div>


@push('post-scripts')
    <script>
        $(function (){
            $('#department_id').select2();
            $('#department_id').on('change', function (e) {
                @this.set('department_id', $(this).val());
            });

            $('#business_category_id').select2();
            $('#business_category_id').on('change', function (e) {
                @this.set('business_category_id', $(this).val());
            });

            $('#activity_id').select2();
            $('#activity_id').on('change', function (e) {
            @this.set('activity_id', $(this).val());
            });
        })
    </script>

@endpush
