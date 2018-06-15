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
<div id="title"></div>
<ul id="dataTable">
</ul>

@include('layouts.footer')
