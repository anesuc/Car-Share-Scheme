
// Replcase all prtotype
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};


//Setting sample location ready for the API
var locations = [];
var map; // store map data here

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

// Replcase all prtotype
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};


//Setting sample location ready for the API
var locations = [];
var map; // store map data here

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
    
    if ($("#end_locations > button > .caret").hasClass("hidden") && $("#start_locations > button > .caret").hasClass("hidden") && $( "#start_datetimepicker" ).val() != "" && $( "#end_datetimepicker" ).val() != ""){
        $("#map").removeClass("hide_map");
        setStartEndLocation();
    }
}

function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

function setStartEndLocation() {
    var start_location;
    var start_location_name = $("#start_locations > button > .current_selection").text();
    var start_location_id = -1;
    var start_time = $( "#start_datetimepicker" ).val().replaceAll("/","-");
    var end_location;
    var end_location_name = $("#end_locations > button > .current_selection").text();
    var end_location_id = -1;
    var end_time = $( "#end_datetimepicker" ).val().replaceAll("/","-");
    
    for (var i = 0; i < locations.length; i++) {
        if (locations[i].name == start_location_name){
            start_location = locations[i];
            start_location_id = locations[i].id;
            break;
        }
    }
    
    for (var i = 0; i < locations.length; i++) {
        if (locations[i].name == end_location_name){
            end_location = locations[i];
            end_location_id = locations[i].id;
            break;
        }
    }
    
    console.log("end_time",end_time);
    
    var data = httpGet("../api/available_bookings/type=Standard&start_loc="+start_location_id+"&end_loc="+end_location_id+"&start_time="+start_time+"&end_time="+end_time);
    
    var availableCars = JSON.parse(data);
        
    console.log("data",availableCars);
    
    
    for (var x = 0; x < locations.length; x++) {
        
        if(locations[x].id == start_location_id || locations[x].id == end_location_id) {
            var latlng = new google.maps.LatLng(locations[x].lat, locations[x].long);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: 'images/loc.png'
            });
        
        // Create the popup window html content
               var contentString = '<div id="content">'+
                   '<div id="siteNotice">'+
                   '</div>'+
                   '<h1 id="firstHeading" class="firstHeading">'+locations[x].name+'</h1>'+
                   '<div id="bodyContent" class="text-left">';
                    if (locations[x].id == start_location_id)
                        contentString += '<div><b>Current Start Location </b></div>';
                    else if (locations[x].id == end_location_id)
                        contentString += '<div><b>Current End Location </b></div>';
                   contentString += '<div class="carTypeMapListing"><b>'+$('#car_type').attr("type")+' </b>selection available at this location</div>'+
                   '<div style = "margin: 20px 0;">';
                    if (locations[x].id == start_location_id) //Temporary, will make it auto update
                    for (var j = 0; j < availableCars.length; j++)
                        contentString += '<a href="#" class="btn btn-primary btn-sm">'+availableCars[j].title+'</a> ';
                   contentString += '</div>'+
                    '<p  class="text-right"><a href="#" class="btn btn-primary btn-outline btn-sm">Select</a></p>'+
                    '</div>'+
                    '</div>';
        
        marker.infoWindow =  new google.maps.InfoWindow({
          content: contentString
        });
        
        marker.addListener('click', function() {
          this.infoWindow.open(map, this);
        });
        
        if (locations[x].id == start_location_id) {
            google.maps.event.trigger(marker, 'click');
        }

    }
    }
    
    
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
    map = new google.maps.Map(mapElement, mapOptions);
        

        
    }
    
}
google.maps.event.addDomListener(window, 'load', init);