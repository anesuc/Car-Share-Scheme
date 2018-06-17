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
                                <a href="{{ url('/history') }}?sort=all" class="btn btn-light btn-xs" >All</a>
                                <a href="{{ url('/history') }}?sort=upcoming" class="btn btn-light btn-xs" >Upcoming</a>
                                <a href="{{ url('/history') }}?sort=past" class="btn btn-light btn-xs" >Past</a>
                            </div>
                        </div>

                        <div class="slider-text-inner">
                            <div class="desc" style="margin: auto; width:800px">
                                <table id="#dataTable" class="uh-li">
                                    <tr><td><div style="margin: auto; width:200px">Customer Name:</div></td><td><div id="name"></div></td></tr>
                                    <tr><td><div>Start Time:</div></td><td><div id="start_time"></div></td></tr>
                                    <tr><td><div>Start Location:</div></td><td><div id="start_loc"></div></td></tr>
                                    <tr><td><div>End Time:</div></td><td><div id="end_time"></div></td></tr>
                                    <tr><td><div>End Location:</div></td><td><div id="end_loc"></div></td></tr>
                                    <tr><td><div>Car:</div></td><td><div id="title"></div></td></tr>
                                    <tr><td><div>Registration:</div></td><td><div id="rego"></div></td></tr>

                                </table>
                            </div> 
                            <div id="map_2" class="center-align" style="margin: auto; height:300px"></div>
                        </div>
                       
                        

                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>



@include('layouts.resources')
<script type="text/javascript">
    var getUrl = new URLSearchParams(document.location.search.substring(1));
    
    var receipt_number = getUrl.get("number");
    var access_token = getUrl.get("access_token");

    
</script>

<script type="text/javascript">
var melbourne = { lat: -37.8136, lng: 144.9631 };

function initMap() {
   
    var map = new google.maps.Map(document.getElementById('map_2'), {
        zoom: 12,
        center: melbourne
    });

}
</script>

<script type="text/javascript">

    $(document).ready(function(){
       
   
           var jsonURL = 'api/get_single_receipt/receipt_number='+receipt_number+'&access_token='+access_token;
            $.getJSON(jsonURL, function(data) { 
            var map = new google.maps.Map(document.getElementById('map_2'), {
                zoom: 10,
                center: melbourne
            });  
                $.each(data, function(key, value){ 
                     $('#name').append(value.name);   
                     $('#start_time').append(value.start_time);
                     $('#start_loc').append(value.start_loc);
                     $('#end_time').append(value.end_time);
                     $('#end_loc').append(value.end_loc);
                     $('#title').append(value.title);
                     $('#rego').append(value.registration);


                    var latitude = value.start_lat;
                    var longitude = value.start_long;
                    var marker = new google.maps.Marker({
                      position: {lat: latitude, lng: longitude},
                      map: map,
                      title: 'Start'
                    });
                    var latitude = value.end_lat;
                    var longitude = value.end_long;
                    var marker = new google.maps.Marker({
                      position: {lat: latitude, lng: longitude},
                      map: map,
                      title: 'End'
                    });
                });
            });
            

    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0PxV4cPoPvvMTAq8HbeMIzb_MFxubzqs&callback=initMap"></script>
    

@include('layouts.footer')
