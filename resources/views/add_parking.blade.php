@include('layouts.header')


<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(images/cars/tesla_model_x.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                        @if ($message = Session::get('failed'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                    <div class="col-md-6 col-md-offset-0 col-md-pull-1 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc" style="float: left;margin-right:200px;">
                                <a href="add_cars" class="btn btn-light btn-xs" role="button">Add New Car</a>
                                <a href="add_parking" class="btn btn-light btn-xs" role="button">Add New Parking Lot</a>
                                <a href="add_service" class="btn btn-light btn-xs" role="button">Add Car Service</a>
                            </div>
                        </div>

                        <div class="slider-text-inner">


                           <form class="form-horizontal" role="form" method="POST" action="{{ action('CarParkController@index') }}">
                            <div class="desc" style="margin: auto; width:450px">
                                Address:
                                <input id="address" type="text" name="address" class="form-control" placeholder="Address"  aria-label="address" aria-describedby="basic-addon1" required>
                                <p><a id="autolocate" href="#" onclick="autolocate()" class="btn btn-light btn-xs hidden" style="background-color: buttonface; color: black;">Auto locate</a></p>
                                Latitude:
                                <input id="lat" type="text" name="lat" class="form-control" placeholder="Latitude" aria-label="lat" aria-describedby="basic-addon1" required>
                                Longitude:
                                <input id="long" type="text" name="long" class="form-control" placeholder="Longitude" aria-label="lng" aria-describedby="basic-addon1" required>
                                Capacity:
                                <input type="text" name="capacity" class="form-control" placeholder="Capacity" aria-label="capacity" aria-describedby="basic-addon1" required>
                                <br>
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <button type="submit" class="btn btn-light btn-xs">Add Parking Lot</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>

<script src='{{ asset("js/add_carpark.js") }}'></script>;
@include('layouts.footer')