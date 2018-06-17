@include('layouts.header')
<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(images/cars/tesla_model_x.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc">
                                <span class="price">$50/hr</span>
                                <h2>Premium Cars</h2>
                                <p>A great selection of premium cars such as the Tesla Model X Blah blah blah.</p>
                                <p><a href="booking" class="btn btn-primary btn-outline btn-lg">Book Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/cars/toyota_camry_ascent_hybrid.jpg);">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc">
                                <span class="price">$30/hr</span>
                                <h2>Basic</h2>
                                <p>Need a car just to get from point A to B? We've got you covered! blah blah blah</p>
                                <p><a href="booking" class="btn btn-primary btn-outline btn-lg">Book Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</aside>

@include('layouts.resources')

@include('layouts.footer')