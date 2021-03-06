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
                            <form class="form-horizontal" role="form" method="POST" action="{{ action('CarServiceController@index') }}">
                            <div class="desc" style="margin: auto; width:450px">
                                Car Id:
                                <select name="car_id" class="form-control" id="sel1" required>
                                    @foreach($allCars as $car)
                                        <option value="{{$car->id}}">{{$car->id}} - "{{$car->title}}"</option>
                                    @endforeach
                                </select>
                                Date of Service:
                                <input name="date_of_service" type="date" class="form-control" placeholder="Password" aria-label="car_title" aria-describedby="basic-addon1" required>
                                Invoice No.:
                                <input name="invoice_no" type="text" class="form-control" placeholder="Invoice" aria-label="purchase_date" aria-describedby="basic-addon1" required>
                                <br>
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <button type="submit" class="btn btn-light btn-xs">Adding Service</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>

@include('layouts.resources')

@include('layouts.footer')