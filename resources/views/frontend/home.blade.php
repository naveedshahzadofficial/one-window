@extends('_layouts.frontend.app')
@section('content')
    <!-- div start for heading -->
    <div class="heading text-center">
        <p> FIND THE PERMITS AND LICENCS YOU NEED TO YOUR BUSINESS.</p>
    </div>
    <!-- div end for heading -->

    <!-- description paragraph start -->
    <p class="description text-center">BizPal helps you find the permits and licencs you may require whrn
        starting
        and/or operating<br>
        your business. Filter permits based on your location, industry and business activities and save <br>
        the ones that apply to your situation.</p>
    <!-- description paragraph end -->

    <!-- grid starts for select options -->
    <div class="container my-5">
        <form action="{{ route('searching') }}" method="GET" >
        <div class="row">
            <div class="col-md-2 col-sm-12">
            </div>
            <div class="col-md-8  col-sm-12">
                <div class="row">
                    <div class="col-md-4  col-sm-12">
                        <label class="lable fw-bold" for="department_id">Department</label>
                        <br>
                        <select required name="department_id" id="department_id" class="select2 w-100 shadow-sm rounded">
                            <option value="">Select</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4  col-sm-12">
                        <label class="lable fw-bold" for="business_category_id">Business</label>
                        <br>
                        <select name="business_category_id" id="business_category_id" class="select2 w-100">
                            <option value="">Select</option>
                            @foreach($businesses as $business)
                                <option value="{{ $business->id }}">{{ $business->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4  col-sm-12">
                        <label class="lable fw-bold" for="activity_id">Activity</label>
                        <br>
                        <select name="activity_id" id="activity_id" class="select2 w-100">
                            <option value="">Select</option>
                            @foreach($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
            </div>
        </div>
        <div class="col-md-12  col-sm-12 text-center"><button type="submit"
                                                              class="btn btn-sm px-5 text-light">Search</button></div>
        </form>
    </div>
    <!-- grid end for select options  -->
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/style_home.css') }}">

@endsection
