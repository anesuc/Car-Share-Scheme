@include('layouts.header')
<script type="text/javascript">

    $(document).ready(function(){
        $("form").submit(function(e){
           
            if($.isNumeric($("#cap").val())) {
                 // Enable submit button
            } else {
                    alert("Capacity must be a number"); 
                    e.preventDefault();

            }
            
        });
    });
</script>

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


                                <input id="autocomplete" type="text" name="address" class="form-control" placeholder="Address"  aria-label="address" aria-describedby="basic-addon1" required>
                                <p><a id="autolocate" href="#" onclick="autolocate()" class="btn btn-light btn-xs hidden" style="background-color: buttonface; color: black;">Auto locate</a></p>
                                Latitude:
                                <input id="lat" type="text" name="lat" class="form-control" placeholder="Latitude" aria-label="lat" aria-describedby="basic-addon1" required>
                                Longitude:
                                <input id="long" type="text" name="long" class="form-control" placeholder="Longitude" aria-label="lng" aria-describedby="basic-addon1" required>
                                Capacity:
                                <input id="cap" type="text" name="capacity" class="form-control" placeholder="Capacity" aria-label="capacity" aria-describedby="basic-addon1" required>
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


<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAyVeo5Jmh144e-tKY3nPIGq49XYqoRt8&libraries=places&callback=initAutocomplete"
        async defer></script>
@include('layouts.footer')