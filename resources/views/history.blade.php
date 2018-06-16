@include('layouts.header')


<script type="text/javascript">
    var getUrl = new URLSearchParams(document.location.search.substring(1));
    
    var receipt_number = getUrl.get("number");
    var access_token = getUrl.get("access_token");

    
</script>


<script type="text/javascript">

    $(document).ready(function(){
       
   
           var jsonURL = 'api/get_user_bookings/access_token={{ Auth::user()->access_token }}';
            var r = new Array(), j = -1;
            $.getJSON(jsonURL, function(data) {   
                $.each(data, function(key, value){ 
                	$('#dataTable').append('<li><a href="receipt?number='+value.receipt+'&access_token={{ Auth::user()->access_token }}">Booking Number: '+value.receipt+'</a></li>');
                	 //$('#title').append(value.registration);
                	/*
                     $('#name').append(value.name);   
                     $('#start_time').append(value.start_time);
                     $('#start_loc').append(value.start_loc);
                     $('#end_time').append(value.end_time);
                     $('#end_loc').append(value.end_loc);
                     $('#title').append(value.title);
                     $('#rego').append(value.registration);*/
                });
            });

    });
</script>


<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(images/cars/tesla_model_x.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-0 col-md-pull-1 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc" style="float: left;margin-right:200px;">
                                <a href="" class="btn btn-light btn-xs" >Upcoming</a>
                                <a href="" class="btn btn-light btn-xs" >All</a>
                            </div>
                        </div>

                        <div class="slider-text-inner">
                            <div class="desc" style="margin: auto; width:600px">
                                <ul id="dataTable"></ul>
                            </div>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>

@include('layouts.footer')