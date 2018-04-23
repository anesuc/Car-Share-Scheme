
var google;

function init() {
    
    //Where to store our map information
    var mapElement = document.getElementById("map");
    
    //Get user Location
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setMapToUserLocation);
        } else {
            mapElement.innerHTML = "Geolocation is not supported by this browser."; //For now show an error. Will discuss about what to do in this case during our scrum meeting
        }
    }
    
    // Initialize the map with a given location
    function setMapToUserLocation(position) {
        var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        setupGoogleMaps(myLatlng);
    }
    
    getLocation(); //Init getting location from user
    

    function setupGoogleMaps(myLatlng) {
    var mapOptions = {
        zoom: 10, //Zoom level of the map

        center: myLatlng, // The latitude and longitude to center the map

        //  Map styling. 
        scrollwheel: false,
        styles: [{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]}]
    };

    


    // Creating the Google Map using options defined above
    var map = new google.maps.Map(mapElement, mapOptions);
        
        //Sample longitudes and latitudes. Next time load from the servers. 0 = RMIT University, 1 = Somewhere in Ringwood
        var addresses = [
            {
                lat: -37.8089, long : 144.9652,
                locationName: 'RMIT University', locationSummary: 'It is a great University! Make a better summary lol',
                basicCars: 5, averageCars: 3, premiumCars: 2 
            },
            {
                lat: -37.8143, long : 145.2274,
                locationName: 'Ringwood', locationSummary: 'Great location! Make a better summary lol',
                basicCars: 3, averageCars: 6, premiumCars: 4
            }];
        
        
    for (var x = 0; x < addresses.length; x++) {
       
            var latlng = new google.maps.LatLng(addresses[x].lat, addresses[x].long);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: 'images/loc.png'
            });
        
        // Create the popup window html content
               var contentString = '<div id="content">'+
                   '<div id="siteNotice">'+
                   '</div>'+
                   '<h1 id="firstHeading" class="firstHeading">'+addresses[x].locationName+'</h1>'+
                   '<div id="bodyContent" class="text-left">'+
                    '<p>'+addresses[x].locationSummary+'</p>'+
                    '<div class="carTypeMapListing" ><b>Basic Cars: </b> '+addresses[x].basicCars+' </div>'+
                    '<div class="carTypeMapListing"><b>Average Cars: </b> '+addresses[x].averageCars+' </div>'+
                    '<div class="carTypeMapListing"><b>Premium Cars: </b> '+addresses[x].premiumCars+' </div>'+
                   '<div class="carTypeMapListing"><b>Current selection: </b> Premium </div>'+
                   '<div class="dropdown">'
                        +'<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Select time'
                            +'<span class="caret"></span></button>'
                        +'<ul class="dropdown-menu">'
                            +'<li><a href="#">9:30 AM</a></li>'
                            +'<li><a href="#">10:30 AM</a></li>'
                        +'</ul>'
                    +'</div>'+
                    '<p  class="text-right"><a href="#" class="btn btn-primary btn-outline btn-sm">Select</a></p>'+
                    '</div>'+
                    '</div>';
        
        marker.infoWindow =  new google.maps.InfoWindow({
          content: contentString
        });
        
        marker.addListener('click', function() {
          this.infoWindow.open(map, this);
        });

    }

        
    }
    
}
google.maps.event.addDomListener(window, 'load', init);