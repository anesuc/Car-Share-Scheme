var modelName;
var markers = [];
var selectedCarID = -1;

// Replcase all prtotype
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};


$( document ).ready(function() {

    $(function() {
        $('#start_datetimepicker').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'YY/MM/DD hh:mm A'
            }
        });
    });

});


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





var google;

setTimeout(function(){ 
    $('.dropdown').on('show.bs.dropdown', function (something) {
        console.log("dropped down opened",$(something.currentTarget).children(".dropdown-menu").outerHeight());
        $("#map_placeholder").removeClass("hidden"); //Using this to give some space below the dropdown menu
        $("#map_placeholder").height($(something.currentTarget).children(".dropdown-menu").outerHeight());


        //$("#map").addClass("hidden"); // Hide the map
    }); 
    
    $('.dropdown').on('hide.bs.dropdown', function () {
        console.log("dropped down closed");
        //$("#map").removeClass("hidden"); //Show the map
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

    if ($("#end_locations > button > .caret").hasClass("hidden") && $("#start_locations > button > .caret").hasClass("hidden") && $( "#start_datetimepicker" ).val() != ""){
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

function changeCarType(type) {
    $("#car_type").attr("type",type);
    if (type=="Luxury")
        $("#car_type > button > .current_selection").text("Lux");
    else
        $("#car_type > button > .current_selection").text(type);
}

function makeBooking() {

    if (selectedCarID != -1) {
        var car_type = $("#car_type").attr("type");
        var start_location;
        var start_location_name = $("#start_locations > button > .current_selection").text();
        var start_location_id = -1;
        var allTimes = $( "#start_datetimepicker" ).val().split(" - ");
        var start_time =  allTimes[0].replaceAll("/","-");
        var end_location;
        var end_location_name = $("#end_locations > button > .current_selection").text();
        var end_location_id = -1;
        var end_time = allTimes[1].replaceAll("/","-");//$( "#end_datetimepicker" ).val().replaceAll("/","-");

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

        window.location.href = "payment?start_loc="+start_location_id+"&end_loc="+end_location_id+"&start_time="+start_time+"&end_time="+end_time+"&car_id="+selectedCarID+"&access_token="+$("#access_token").val();

    }
    }

function selectModel(selectedDiv,model_name,modelID) {
    modelName = model_name;
    selectedCarID = modelID;
    $(".makeBooking").removeClass("notActiveOpacity");
    $(".cars").removeClass("active");
    $(selectedDiv).addClass("active");

    console.log("selectedCarID",selectedCarID);

    $(".tempID").text(selectedCarID);
}

function setStartEndLocation() {
    var car_type = $("#car_type").attr("type");
    var start_location;
    var start_location_name = $("#start_locations > button > .current_selection").text();
    var start_location_id = -1;
    var allTimes = $( "#start_datetimepicker" ).val().split(" - ");
    var start_time =  allTimes[0].replaceAll("/","-");
    var end_location;
    var end_location_name = $("#end_locations > button > .current_selection").text();
    var end_location_id = -1;
    var end_time = allTimes[1].replaceAll("/","-");

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

    console.log("server response","api/available_bookings/type="+car_type+"&start_loc="+start_location_id+"&end_loc="+end_location_id+"&start_time="+start_time+"&end_time="+end_time)

    var data = httpGet("api/available_bookings/type="+car_type+"&start_loc="+start_location_id+"&end_loc="+end_location_id+"&start_time="+start_time+"&end_time="+end_time);

    var availableCars = JSON.parse(data);

    console.log("data",availableCars);
    console.log("locations",locations);

    var sameStartEndLocation = false;

    //Clear previous markers
    for (var i = 0; i < markers.length; i++)
        markers[i].setMap(null);

    markers = [];


    for (var x = 0; x < locations.length; x++) {

        if((locations[x].id == start_location_id || locations[x].id == end_location_id) && (sameStartEndLocation == false)) {
            var latlng = new google.maps.LatLng(locations[x].lat, locations[x].long);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: 'images/loc.png'
            });

            console.log(" locations", sameStartEndLocation);


        // Create the popup window html content
               var contentString = '<div id="content">'+
                   '<div id="siteNotice">'+
                   '</div>'+
                   '<h1 id="firstHeading" class="firstHeading">'+locations[x].name+'</h1>'+
                   '<div id="bodyContent" class="text-left">';
                    if (locations[x].id == start_location_id && locations[x].id == end_location_id) {
                        sameStartEndLocation = true;
                        console.log("set same");
                        contentString += '<div><b>Current Start & End Location </b></div>';
                    } else {
                        if (locations[x].id == start_location_id)
                        contentString += '<div><b>Current Start Location </b></div>';
                    else if (locations[x].id == end_location_id)
                        contentString += '<div><b>Current End Location </b></div>';
                    }
                   if (locations[x].id != start_location_id && locations[x].id != end_location_id)
                       contentString += '<div class="carTypeMapListing"><b>'+$('#car_type').attr("type")+' </b>selection available at this location</div>';

                   contentString += '<div style = "margin: 20px 0;">';
                    if (locations[x].id == start_location_id) { //Temporary, will make it auto update
                    for (var j = 0; j < availableCars.length; j++)
                        contentString += '<a href="javascript:void(0);" onclick="selectModel(this,&quot;'+availableCars[j].title+'&quot;,'+availableCars[j].id+')" class="cars btn btn-primary btn-sm">'+availableCars[j].title+'</a> ';

                        if (availableCars.length == 0)
                            contentString += '<div>No available <b>'+$('#car_type').attr("type")+'</b> cars at this location.</b></div>';
                    }
                   contentString += '</div>'+
                    '<p  class="makeBooking text-right notActiveOpacity"><a id="tempID" href="javascript:void(0);" onclick="makeBooking();" class="btn btn-primary btn-outline btn-sm">Select</a></p>'+
                    '</div>'+
                    '</div>';
            
            
        
        marker.infoWindow =  new google.maps.InfoWindow({
          content: contentString
        });
            
            
           /* google.maps.event.addListener(markers[markers.length-1], 'click', function() {
            for (var i = 0; i < markers.length; i++) // Close all the markers
                markers[i].infoWindow.close();
            
          this.infoWindow.open(map, this);
        });
        */
       marker.addListener('click', function() {
            for (var i = 0; i < markers.length; i++) // Close all the markers
                markers[i].infoWindow.close();
            
          this.infoWindow.open(map, this);
        });

        if (locations[x].id == start_location_id) {
            google.maps.event.trigger(marker, 'click');
        }
            
            markers.push(marker);
            
            $('a.btn-primary').click(function(e) {
                e.preventDefault(); //prevent from scrolling to the top
            });

    }
    }
    
    
}


function init() {
    
    //Where to store our map information
    var mapElement = document.getElementById("map");
    
    //Get user Location
    function getLocation() {
        setMapToMelbourneLocation();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setMapToUserLocation);
        } else {
            mapElement.innerHTML = "Geolocation is not supported by this browser."; //For now show an error. Will discuss about what to do in this case during our scrum meeting
            console.log("Geolocation is not supported by this browser.")
        }
    }
    
    // Initialize the map with a given location
    function setMapToUserLocation(position) {
        var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        setupGoogleMaps(myLatlng);
    }

    // Initialize the map with Melbourne as location
    function setMapToMelbourneLocation() {
        var myLatlng = new google.maps.LatLng(-37.8136, 144.9631);
        setupGoogleMaps(myLatlng);
    }
    
    getLocation(); //Init getting location from user
    

    function setupGoogleMaps(myLatlng) {
    var mapOptions = {
        zoom: 8, //Zoom level of the map

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