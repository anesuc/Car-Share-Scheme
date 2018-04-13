<?php include("include/header.php"); ?>



<?php

$Name = "Joe Smith";
$Credit = 54.3265;
$Date_Registered = "29th Oct 1977";
$Receipts = array(2, 4, 5);

?>

<aside id="fh5co-hero" class="js-fullheight">
	<div style="background-image: url(images/cars/tesla_model_x.jpg);">
		<div class="container">
			<div class="col-lg-6 col-lg-offset-2 col-lg-pull-2 col-md-7 col-md-offset-2 col-md-pull-2 col-sm-8 col-sm-offset-1 col-sm-pull-1" style="background-color:#FFFFFF">

				<div class="page-header">
					<h2><?php printf("%s", $Name); ?></h2>
				</div>
				<table>
				<tr><th class="col-xs-1 col-sm-4 col-md-4 col-lg-4"></th><th class="col-xs-1 col-sm-2 col-md-2 col-lg-4"></th></tr>
				<tr><?php printf("<td>Credit:</td><td>$%.2f</td>", $Credit); ?></tr>
				<tr><?php printf("<td>Registration Date:</td><td>%s</td>", $Date_Registered); ?></tr>
				</table>
			</div>



			<!-- need to have 2 different ones because they have different backgrounds -->
			<!-- dropdown button large screen -->
			<div class="Adropdown col-lg-4 col-md-3 col-sm-3 hidden-xs"><!-- the dropdown in the existing CSS files is no good -->
				<button onclick="toggleShow('receiptDropLG')" class="Adropdown-btn btn-primary btn-lg btn-outline">receipts</button>
				<div id="receiptDropLG" class="Adropdown-content">
					<?php 
						// insert receipt link as dropdown button
						foreach($Receipts as $Receipt_Num) {
							//TODO set receipt date below
							$Receipt_Date = $Receipt_Num;
							printf("<a href=\"receipt_info.php?receipt=%d\">%d</a>", $Receipt_Num, $Receipt_Date);
						}
					?>
				</div>
				</br>TODO display receipt date instead of id
			</div>

			<!-- dropdown button small screen -->
			<div class="Adropdown hidden-lg hidden-md hidden-sm col-xs-12" style="background-color:#FFFFFF"><!-- the dropdown in the existing CSS files is no good -->
				<button onclick="toggleShow('receiptDropSM')" class="Adropdown-btn btn-primary btn-lg btn-outline">receipts</button>
				<div id="receiptDropSM" class="Adropdown-content">
					<?php 
						// insert receipt link as dropdown button
						foreach($Receipts as $Receipt_Num) {
							//TODO set receipt date below
							$Receipt_Date = $Receipt_Num;
							printf("<a href=\"receipt_info.php?receipt=%d\">%d</a>", $Receipt_Num, $Receipt_Date);
						}
					?>
				</div>
				</br>TODO display receipt date instead of id
			</div>

		</div>
	
	</div>
</aside>

<script src="js/Ascript.js"></script>

<?php include("include/footer.php"); ?>
