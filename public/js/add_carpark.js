function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}


function autolocate() {
    if ($("#address").val() != "") {
        var data = httpGet("http://maps.google.com/maps/api/geocode/json?address="+$("#address").val()+"&sensor=false");

        var addressData = JSON.parse(data);

        if (addressData.results.length > 0) {
            $("#lat").val(addressData.results[0].geometry.location.lat);
            $("#long").val(addressData.results[0].geometry.location.lng);
        }
    }

}

$( "#address" ).change(function() {
    if ($("#address").val() != "")
        $("#autolocate").removeClass("hidden");
    else
        $("#autolocate").addClass("hidden");
});

