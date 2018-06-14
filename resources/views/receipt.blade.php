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
                     $('#name').append(value.name);   
                     $('#start_time').append(value.start_time);
                     $('#start_loc').append(value.start_loc);
                     $('#end_time').append(value.end_time);
                     $('#end_loc').append(value.end_loc);
                     $('#title').append(value.title);
                     $('#rego').append(value.registration);
                });
            });

    });
</script>
<table id="#dataTable">
<tr><td><div>Customer Name:</div></td><td><div id="name"></div></td></tr>
<tr><td><div>Start Time:</div></td><td><div id="start_time"></div></td></tr>
<tr><td><div>Start Location:</div></td><td><div id="start_loc"></div></td></tr>
<tr><td><div>End Time:</div></td><td><div id="end_time"></div></td></tr>
<tr><td><div>End Location:</div></td><td><div id="end_loc"></div></td></tr>
<tr><td><div>Car:</div></td><td><div id="title"></div></td></tr>
<tr><td><div>Registration:</div></td><td><div id="rego"></div></td></tr>

</table>

@include('layouts.footer')
