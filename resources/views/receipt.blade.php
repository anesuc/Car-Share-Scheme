@include('layouts.header')


<script type="text/javascript">
    var getUrl = new URLSearchParams(document.location.search.substring(1));
    
    var receipt_number = getUrl.get("number");
    var access_token = getUrl.get("access_token");

    
</script>


<script type="text/javascript">

    $(document).ready(function(){
       
   
           var jsonURL = 'api/get_single_receipt/receipt_number='+receipt_number+'&access_token='+access_token;
            var r = new Array(), j = -1;
            $.getJSON(jsonURL, function(data) {   
                $.each(data, function(key, value){    
                     $('#start_time').append(value.start_time);
                     $('#physical_location').append(value.physical_location);
                     $('#title').append(value.title);
                });
            });

    });
</script>
<table id="#dataTable">
<tr><td><div>Start Time:</div></td><td><div id="start_time"></div></td></tr>
<tr><td><div>Start Location:</div></td><td><div id="physical_location"></div></td></tr>
<tr><td><div>Car:</div></td><td><div id="title"></div></td></tr>
</table>

@include('layouts.footer')
