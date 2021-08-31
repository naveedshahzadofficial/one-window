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
        <div class="row">
            <div class="col-md-2 col-sm-12">
            </div>
            <div class="col-md-8  col-sm-12">
                <div class="row">
                    <div class="col-md-4  col-sm-12">
                        <label class="lable fw-bold" for="Deparrtment">Deparrtment</label>
                        <br>
                        <select name="deparrtment" id="deparrtment" class="select2 w-100 shadow-sm rounded">
                            <option value="Select">Select</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                    <div class="col-md-4  col-sm-12">
                        <label class="lable fw-bold" for="business">Business</label>
                        <br>
                        <input class="w-100" type="text">
                    </div>
                    <div class="col-md-4  col-sm-12">
                        <label class="lable fw-bold" for="activity">Activity</label>
                        <br>
                        <select name="activity" id="activity" class="select2 w-100">
                            <option value="Select">Select</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
            </div>
        </div>
        <div class="col-md-12  col-sm-12 text-center"><button type="button"
                                                              class="btn btn-sm px-5 text-light">Search</button></div>
    </div>
    <!-- grid end for select options  -->
@endsection
