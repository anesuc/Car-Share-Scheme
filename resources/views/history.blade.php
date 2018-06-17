@include('layouts.header')


<script type="text/javascript">
    var getUrl = new URLSearchParams(document.location.search.substring(1));
    
    var receipt_number = getUrl.get("number");
    var access_token = getUrl.get("access_token");

    
</script>


<script type="text/javascript">

    $(document).ready(function(){
       
            



        /*
        code taken from
        https://stackoverflow.com/questions/19491336/get-url-parameter-jquery-or-how-to-get-query-string-values-in-js
        */

        var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };


        var sort = getUrlParameter('sort');
        if(sort=='upcoming'){
            var jsonURL = 'api/get_upcoming_bookings/access_token={{ Auth::user()->access_token }}';
            $.getJSON(jsonURL, function(data) { 
                if(data.length == 0){$('#dataTable').append('No upcoming bookings to display')}  
                $.each(data, function(key, value){ 
                    $('#dataTable').append('<li class="uh-li"><a href="receipt?number='+value.receipt+'&access_token={{ Auth::user()->access_token }}">'+value.start_time+'</a>');
                    $('#dataTable').append('<ul><li class="uh-li" style="font-size:small">'+value.title+' at '+value.start_loc+'</li></ul>');
                    $('#dataTable').append('</li>');
                });
            });
        }
        else if(sort=='past'){
            var jsonURL = 'api/get_past_bookings/access_token={{ Auth::user()->access_token }}';
            
            $.getJSON(jsonURL, function(data) { 
            if(data.length == 0){$('#dataTable').append('No past bookings to display')}  
                $.each(data, function(key, value){ 
                    $('#dataTable').append('<li class="uh-li"><a href="receipt?number='+value.receipt+'&access_token={{ Auth::user()->access_token }}">'+value.start_time+'</a>');
                    $('#dataTable').append('<ul><li class="uh-li" style="font-size:small">'+value.title+' at '+value.start_loc+'</li></ul>');
                    $('#dataTable').append('</li>');                
                });
            });
        }
        else{
            var jsonURL = 'api/get_user_bookings/access_token={{ Auth::user()->access_token }}';
            $.getJSON(jsonURL, function(data) {  
            if(data.length == 0){$('#dataTable').append('No bookings to display')} 
                $.each(data, function(key, value){ 
                    $('#dataTable').append('<li class="uh-li"><a href="receipt?number='+value.receipt+'&access_token={{ Auth::user()->access_token }}">'+value.start_time+'</a>');
                    $('#dataTable').append('<ul><li class="uh-li" style="font-size:small">'+value.title+' at '+value.start_loc+'</li></ul>');
                    $('#dataTable').append('</li>');
                });
            });
        }

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
                                <a href="?sort=all" class="btn btn-light btn-xs" >All</a>
                                <a href="?sort=upcoming" class="btn btn-light btn-xs" >Upcoming</a>
                                <a href="?sort=past" class="btn btn-light btn-xs" >Past</a>
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