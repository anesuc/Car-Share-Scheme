@include('layouts.header')


<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(images/cars/tesla_model_x.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-0 col-md-pull-1 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc" style="float: left;margin-right:200px;">
                                <a href="add_cars" class="btn btn-light btn-xs" role="button">Add New Car</a>
                                <a href="add_parking" class="btn btn-light btn-xs" role="button">Add New Parking Lot</a>
                                <a href="add_service" class="btn btn-light btn-xs" role="button">Add Car Service</a>
                            </div>
                        </div>

                        <div class="slider-text-inner">
                            <div class="desc" style="margin: auto; width:450px">
                                Car Id:
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                                Date of Service:
                                <input type="date" class="form-control" placeholder="Password" aria-label="car_title" aria-describedby="basic-addon1">
                                Invoice No.:
                                <input type="text" class="form-control" placeholder="Invoice" aria-label="purchase_date" aria-describedby="basic-addon1">
                                <br>
                                <button type="button" class="btn btn-light btn-xs">Adding Service</button>
                            </div>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>

@include('layouts.footer')