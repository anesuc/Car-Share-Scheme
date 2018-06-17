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
                                <a href="booking" class="btn btn-light btn-xs" >Book a car</a>
                                <a href="history?sort=all" class="btn btn-light btn-xs" >View Past Bookings</a>
                            </div>
                        </div>

                        <div class="slider-text-inner">
                            <div class="desc" style="margin: auto; width:600px">
                                <h1>Welcome {{ Auth::user()->name }}</h1>
                                <div id="upcoming"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>

@include('layouts.resources')
<script type="text/javascript">

    $(document).ready(function(){


        var jsonURL = 'api/get_upcoming_bookings/access_token={{Auth::user()->access_token }}';
        $.getJSON(jsonURL, function(data) {
            if(data != null){
                $('#upcoming').append('<h2>Upcoming Bookings:</h2>');
                $.each(data, function(key, value){
                    $('#upcoming').append(value.start_time+' at '+value.start_loc+'<br>');
                });
            }
        });

    });
</script>

@include('layouts.footer')