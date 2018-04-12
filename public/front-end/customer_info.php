<?php $User = Null; ?>
<link rel="stylesheet" href="css/Astyle.css">
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
	$Name = $User->Name;
	$Name = $User->Credit;
	$Name = $User->Date_Registered;
	$Name = $User->Receipts;
} else {
	print("no user, using dummy values");
	// no user
}
?>

<div class="js-fullheight">
	<div class="container">
		<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   	<div class="slider-text-inner">
		   		<div class="desc">
					TODO display receipt date instead of id
					<h2><?php printf("User: %s", $Name); ?></h2>
					<p><?php printf("Credit: $%.2f", $Credit); ?></p>
					<p><?php printf("Registration Date: %s", $Date_Registered); ?></p>
					<div class="Adropdown"><!-- the dropdown in the existing CSS files is no good -->
						<button onclick="toggleShow('receiptDrop')" class="Adropdown-btn">receipts</button>
						<div id="receiptDrop" class="Adropdown-content">
							<?php 
								// insert receipt link as dropdown button
								foreach($Receipts as $Receipt_Num) {
									//TODO set receipt date below
									$Receipt_Date = $Receipt_Num;
									printf("<a href=\"front-end/Receipt_info?receipt=%d\">%d</a>", $Receipt_Num, $Receipt_Date);
								}
							?>
						</div>
					</div>
		   		</div>
		   	</div>
		</div>
	</div>
</div>

<script src="js/Ascript.js"></script>

<?php include("include/footer.php"); ?>
