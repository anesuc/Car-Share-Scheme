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
                                <h2>Luxury</h2>
                                <p>Want to travel in luxury of your choice? Then you have come to the right place. We have all kinds of luxury cars such as the Tesla Model X and much more!</p>
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
                                <h2>Standard</h2>
                                <p>Need a car just to get from point A to B? We've got you covered! We have a great selection of good cars just for you!</p>
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