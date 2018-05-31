@include('layouts.header')


<script type="text/javascript">
    var getUrl = new URLSearchParams(document.location.search.substring(1));
    
    var start_loc = getUrl.get("start_loc");
    var end_loc = getUrl.get("end_loc");
    var start_time = getUrl.get("start_time");
    var end_time = getUrl.get("end_time");
    var id = getUrl.get("car_id");
    var access_token = getUrl.get("access_token");
    
    document.write(start_loc);
    document.write(end_loc);
    document.write(end_time);
    document.write(id);
    document.write(access_token);


    
</script>


<script type="text/javascript">

    $(document).ready(function(){
        $("form").submit(function(e){
            
            document.getElementById("test").value="hi";
           var jsonURL = 'api/add_booking/start_loc='+start_loc+'&end_loc='+end_loc+'&start_time='+start_time+'&end_time='+end_time+'&car_id='+id+'&access_token='+access_token;
           e.preventDefault();

            $.getJSON(jsonURL, function(data) {
                window.location.replace("receipt?number="+data+"&access_token="+access_token);
                /*
                $.each(data, function(key, value){    
                    document.getElementById("test").value=value; 
                });*/

            });

            
        });
    });
</script>




    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
            <li style="background-image: url({{ asset('images/cars/tesla_model_x.jpg') }});">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-4 col-md-pull-1 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc" style="margin: auto;">
          
                                <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form"   action="">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="subscribe btn btn-success btn-lg btn-block" type="submit">Pay</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    
                </div>
            </div>            
                



            
            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            </ul>
        </div>
    </aside>


<div id="test">hello</div>

@include('layouts.footer')
