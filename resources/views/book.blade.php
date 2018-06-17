@include('layouts.header')
<?php 
if(isset($_GET['type'])) {
    echo '<div id="book-header" class="book-locatio-header">'; // Reduce bottom margin
    
    if ($_GET['type'] != "Standard" && $_GET['type'] != "People Mover" && $_GET['type'] != "Luxury") {
            echo '<div class="alert alert-warning">
  <strong>Error 404.</strong> Page not found! </div>'; // If someone tries to hack the URL and input the data directly and it's wrong
            exit("");
        }
    
} else {
    echo '<div id="book-header">';
}
        
        ?>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center booking-info">
                    <?php
                    if(isset($_GET['type'])) {
                        echo '<h2>Select the location you want to reserve the car from</h2>';
                    } else {
                        echo '<h2>Select the type of car you are interested in</h2>';
                    }
                    ?>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-12 text-center col-md-offset-2" style="margin-left: 0;">
                    <?php
                    if(isset($_GET['type'])) {
                        echo '<div id="car_type" type="'.$_GET['type'].'" class="dropdown">'
                        .'<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <span class="current_selection" >'.$_GET['type']
                            .'</span> <span class="caret"></span></button>'
                        .'<ul class="dropdown-menu">'
                            .'<li><a href="#" onclick="changeCarType(`Standard`)">Standard</a></li>'
                            .'<li><a href="#" onclick="changeCarType(`People Mover`)">People Mover</a></li>'
                            .'<li><a href="#" onclick="changeCarType(`Luxury`)">Luxury</a></li>'
                        .'</ul>'
                    .'</div>';
                        
                        
                    /*echo '<div class="well">'
                        .'<div id="datetimepicker6" class="input-append date">'
                            .'<input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>'
                        .'<span class="add-on">'
                            .'<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>'
                            .'</span>'
                        .'</div>'
                    .'</div>';*/
                        

                     /*echo '<div class="well">'
                        .'<div id="datetimepicker7" class="input-append date">'
                            .'<input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>'
                        .'<span class="add-on">'
                            .'<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>'
                            .'</span>'
                        .'</div>'
                    .'</div>';*/
                        echo '<input type="text" name="datetimes" class="timepicker" placeholder="Select start time" id = "start_datetimepicker" class="time_picker">';

                        echo '<div id="start_locations" class="dropdown">'
                        .'<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="current_selection" >Select start location </span>'
                            .'<span class="caret"></span></button>'
                        .'<ul class="dropdown-menu">'
                        .'</ul>'
                    .'</div>';
                        

                        
                        echo '<div id="end_locations" class="dropdown">'
                        .'<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="current_selection" >Select end location </span>'
                            .'<span class="caret"></span></button>'
                        .'<ul class="dropdown-menu">'
                        .'</ul>'
                    .'</div>';

                        
                    } else {
                        echo '<a href="booking?type=Standard" class="btn btn-primary btn-outline btn-lg">Standard</a>'
                        .'<a href="booking?type=People Mover" class="btn btn-primary btn-outline btn-lg">People Mover</a>'
                        .'<a href="booking?type=Luxury" class="btn btn-primary btn-outline btn-lg">Luxury</a>';
                    }
                    
                    ?>
                    
                    <input type="hidden" id="access_token" value="{{ Auth::user()->access_token }}">
                </div>
            </div>
        </div>
    </div>



<?php
echo '<div>'.
    '<div id="map_placeholder" class="hidden"></div>'.
    '<div id="map" class="animate-box hide_map" data-animate-effect="fadeIn"></div>'.
'</div>';


                     /*echo '<div class="col-md-5">'
                            .'<div class="form-group">'
                            .'<div class="input-group date" id="datetimepicker6">'
                            .'<input type="text" class="form-control" />'
                            .'<span class="input-group-addon">'
                            .'<span class="glyphicon glyphicon-calendar"></span>'
                            .'</span>'
                            .'</div>'
                            .'</div>'
                            .'</div>';
                        
                     echo '<div class="col-md-5">'
                            .'<div class="form-group">'
                            .'<div class="input-group date" id="datetimepicker7">'
                            .'<input type="text" class="form-control" />'
                            .'<span class="input-group-addon">'
                            .'<span class="glyphicon glyphicon-calendar"></span>'
                            .'</span>'
                            .'</div>'
                            .'</div>'
                            .'</div>';*/




    //echo '<script src="js/map.js"></script>';

?>

@include('layouts.resources')
@include('layouts.footer')


