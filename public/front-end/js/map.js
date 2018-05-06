/*
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

var data = httpGet("http://localhost/cosc2408/public/api/available_bookings/type=Standard&start_loc=2&end_loc=2&start_time=2018-04-15%2010:00:00&end_time=2018-04-15%2011:00:00");*/

//data = JSON.parse(data);

//console.log("data",data);



//Setting sample location ready for the API
var locations = [];

var loc1 = {
    id: 1,
    name: "28/24-28 Gladstone St, Moonee Ponds VIC 3039",
    lat: -37.768631,
    long: 144.922916
}

var loc2 = {
    id: 2,
    name: "4 Sturt St, Southbank VIC 3004",
    lat: -37.822302,
    long: 144.967775
}

var loc3 = {
    id: 3,
    name: "700 Collins St, Melbourne VIC 3000",
    lat: -37.819500,
    long: 144.950840
}



locations.push(loc1);
locations.push(loc2);
locations.push(loc3);






var google;

setTimeout(function(){ 
    $('.dropdown').on('show.bs.dropdown', function () {
        console.log("dropped down opened");
        $("#map_placeholder").removeClass("hidden"); //Using this to give some space below the dropdown menu
        $("#map").addClass("hidden"); // Hide the map
    }); 
    
    $('.dropdown').on('hide.bs.dropdown', function () {
        console.log("dropped down closed");
        $("#map").removeClass("hidden"); //Show the map
        $("#map_placeholder").addClass("hidden"); //Hide the blank placeholder
        checkAllInput();
    });
    
    $( ".time_picker" ).change(function() {
        console.log( "Handler for .change() called." );
        checkAllInput();
    });
    
    for (var i = 0; i < locations.length; i++) {
        $("#start_locations > .dropdown-menu").append('<li><a href="#" onclick="setStartLocation('+i+')">'+locations[i].name+'</a></li>');
        $("#end_locations > .dropdown-menu").append('<li><a href="#" onclick="setEndLocation('+i+')">'+locations[i].name+'</a></li>');
    }
                     }, 100);

function setStartLocation(locationPosition) {
    console.log("set location triggered")
    $("#start_locations > button > .current_selection").text(locations[locationPosition].name);
    $("#start_locations > button > .caret").addClass("hidden");
}

function setEndLocation(locationPosition) {
    console.log("set location triggered")
    $("#end_locations > button > .current_selection").text(locations[locationPosition].name);
    $("#end_locations > button > .caret").addClass("hidden");
}

function checkAllInput() {
    console.log('$( "#start_datetimepicker" ).text()',$( "#start_datetimepicker" ).val());
    console.log('$( "#end_datetimepicker" ).text()',$( "#end_datetimepicker" ).val());
    
    if ($("#end_locations > button > .caret").hasClass("hidden") && $("#start_locations > button > .caret").hasClass("hidden") && $( "#start_datetimepicker" ).val() != "" && $( "#end_datetimepicker" ).val() != "")
        $("#map").removeClass("hide_map");
}


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
                   '<div class="carTypeMapListing"><b>Premium </b>selection available at this location</div>'+
                   '<div style = "margin: 20px 0;">'+
                   '<a href="#" class="btn btn-primary btn-sm">Toyota camry</a> '+
                   '<a href="#" class="btn btn-primary btn-sm">Toyota camry</a> '+
                   '</div>'+
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