@include('layouts.header')

<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li class="forceHeight" style="background-image: url(images/cars/tesla_model_x.jpg); height: 100%">
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ action('CarController@index') }}"  enctype="multipart/form-data">
                            <div class="desc" style="margin: auto; width:450px">
                                Car Type:<br/>
                                <select name="car_type" class="form-control">
                                  <option value="Standard">Standard</option>
                                  <option value="People">People Mover</option>
                                  <option value="Lux">Luxury</option>
                                
                                </select>
                       
                                Year, Make, Model (Eg. "2017 Toyato Camry"):
                                <input type="text" name="car_title" class="form-control" placeholder="Year, Make, Model" aria-label="car_title" aria-describedby="basic-addon1" required>
                                Registration:
                                <input type="text" name="car_registration" class="form-control" placeholder="Registration" aria-label="car_registration" aria-describedby="basic-addon1" required>
                                Date Purchased:
                                <input type="date" name="purchase_date" class="form-control" placeholder="mm/dd/yyyy" aria-label="purchase_date" aria-describedby="basic-addon1" required>
                                Last Service:
                                <input type="date" name="last_service" class="form-control" placeholder="mm/dd/yyyy" aria-label="last_service" aria-describedby="basic-addon1" required>
                                Initial/Start location:
                                <select name="start_location" class="form-control" id="sel1" required>
                                    @foreach($allCarparks as $carpark)
                                        <option value="{{$carpark->id}}">{{$carpark->id}} - "{{$carpark->physical_location}}"</option>
                                    @endforeach
                                </select>
                                Image of the car (optional):
                                <input type="file" name="car_image" accept="image/*">
                                <br>
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <button type="submit" class="btn btn-light btn-xs">Add Car</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>

@include('layouts.footer')