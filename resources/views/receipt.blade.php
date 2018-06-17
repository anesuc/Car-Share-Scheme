@include('layouts.header')


<script type="text/javascript">
    var getUrl = new URLSearchParams(document.location.search.substring(1));
    
    var receipt_number = getUrl.get("number");
    var access_token = getUrl.get("access_token");

    
</script>


<script type="text/javascript">

    $(document).ready(function(){
       
   
           var jsonURL = 'api/get_single_receipt/receipt_number='+receipt_number+'&access_token='+access_token;
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


<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(images/cars/tesla_model_x.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-0 col-md-pull-1 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc" style="float: left;margin-right:200px;">
                                <a href="{{ url('/history') }}?sort=all" class="btn btn-light btn-xs" >All</a>
                                <a href="{{ url('/history') }}?sort=upcoming" class="btn btn-light btn-xs" >Upcoming</a>
                                <a href="{{ url('/history') }}?sort=past" class="btn btn-light btn-xs" >Past</a>
                            </div>
                        </div>

                        <div class="slider-text-inner">
                            <div class="desc" style="margin: auto; width:800px">
                                <table id="#dataTable" class="uh-li">
                                    <tr><td><div style="margin: auto; width:200px">Customer Name:</div></td><td><div id="name"></div></td></tr>
                                    <tr><td><div>Start Time:</div></td><td><div id="start_time"></div></td></tr>
                                    <tr><td><div>Start Location:</div></td><td><div id="start_loc"></div></td></tr>
                                    <tr><td><div>End Time:</div></td><td><div id="end_time"></div></td></tr>
                                    <tr><td><div>End Location:</div></td><td><div id="end_loc"></div></td></tr>
                                    <tr><td><div>Car:</div></td><td><div id="title"></div></td></tr>
                                    <tr><td><div>Registration:</div></td><td><div id="rego"></div></td></tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>
</aside>

@include('layouts.footer')
