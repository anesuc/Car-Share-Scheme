<?php require_once("include/header.php"); 
if(isset($_GET['type'])) {
    echo '<div id="book-header" class="book-locatio-header">'; // Reduce bottom margin
    
    if ($_GET['type'] != "Basic" && $_GET['type'] != "Average" && $_GET['type'] != "Premium") {
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
				<div class="col-md-8 text-center col-md-offset-2">
                    <?php
                    if(isset($_GET['type'])) {
                        echo '<div class="dropdown">'
                        .'<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> '.$_GET['type']
                            .' <span class="caret"></span></button>'
                        .'<ul class="dropdown-menu">'
                            .'<li><a href="#">Basic</a></li>'
                            .'<li><a href="#">Average</a></li>'
                            .'<li><a href="#">Premium</a></li>'
                        .'</ul>'
                    .'</div>';
                        
                        echo '<div class="dropdown">'
                        .'<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select start location '
                            .'<span class="caret"></span></button>'
                        .'<ul class="dropdown-menu">'
                            .'<li><a href="#">RMIT University</a></li>'
                            .'<li><a href="#">CSS</a></li>'
                        .'</ul>'
                    .'</div>';
                        
                    } else {
                        echo '<a href="book.php?type=Basic" class="btn btn-primary btn-outline btn-lg">Basic</a>'
                        .'<a href="book.php?type=Average" class="btn btn-primary btn-outline btn-lg">Average</a>'
                        .'<a href="book.php?type=Premium" class="btn btn-primary btn-outline btn-lg">Premium</a>';
                    }
                    
                    ?>
                    
                    
				</div>
			</div>
		</div>
	</div>



<?php
echo '<div>'.
    '<div id="map" class="animate-box" data-animate-effect="fadeIn"></div>'.
'</div>';


if(isset($_GET['type'])) {
    echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHU34atHJNLRCfcIGJJKkK6FDufXOj-Sc&sensor=false"></script>';
	echo '<script src="js/map.js"></script>';
}

require_once("include/footer.php"); ?>

