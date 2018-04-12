<?php $User = Null; ?>
<?php include("include/header.php"); ?>

<?php
// set up user data, or dummy data

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//ASSUMING:
//user setup in header, if no user, is_null($User)

$Name = "Joe Smith";
$Credit = 54.3265;
$Date_Registered = "29th Oct 1977";
$Receipts = array(2, 5, 4);

if(!is_null($User)) {
	// print user info
	// TODO:
	// fill in these from the user info:
	//	Name
	//	Credit
	//	Date_Registered
	//	Receipts
	$Name = $User->Name;
	$Name = $User->Credit;
	$Name = $User->Date_Registered;
	$Name = $User->Receipts;
} else {
	print("no user, using dummy values");
	// no user
}
?>

<div id="fh5co-hero" class="js-fullheight" style="background-image: url(images/cars/tesla_model_x.jpg);">
	<div class="overlay-gradient"></div>
	<div class="container">
		<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   	<div class="slider-text-inner">
		   		<div class="desc">
					<h2><?php printf("User: %s", $Name); ?></h2>
					<p><?php printf("Credit: $%.2f", $Credit); ?></p>
					<p><?php printf("Registration Date: %s", $Date_Registered); ?></p>
					<?php 
						print("<p>");
						print("Receipts by Date: (TODO display receipt date instead of id)");
						print("<br>");
						foreach($Receipts as $Receipt_Num) {
							//asdf
							printf("<a href=front-end/Receipt_info?receipt=%d>%d</a>", $Receipt_Num, $Receipt_Num);
							print("<br>");
						}
						print("</p>");
					?>
		   		</div>
		   	</div>
		</div>
	</div>
</div>

<?php include("include/footer.php"); ?>
