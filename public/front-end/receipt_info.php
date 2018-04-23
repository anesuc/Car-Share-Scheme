<?php include("include/header.php"); ?>


<?php
$Name = "Joe Smith";

$Receipt_ID = $_GET['receipt'];
$ReceiptDate = "". $Receipt_ID;//TODO replace ID with the receipt date
$ReceiptTransactions = array("transactionA"=>32.5, "transactionB"=>45.23);

?>


<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/cars/tesla_model_x.jpg);">
		<div class="container">
			<div class="col-lg-6 col-lg-offset-2 col-lg-pull-2 col-md-7 col-md-offset-2 col-md-pull-2 col-sm-8 col-sm-offset-1 col-sm-pull-1" style="background-color:#FFFFFF">

				<h4><?php printf("Receipt for %s on the %s", $Name, $ReceiptDate); ?></h4>
				<table class="col-sm-12 col-md-12 col-lg-12">
					<tr>
						<th class="col-xs-1 col-sm-4 col-md-4 col-lg-4">Item</th><th class="col-xs-1 col-sm-4 col-md-4 col-lg-4 text-right">Cost</th>
					</tr>
					<?php
						$total = 0.0;
						foreach($ReceiptTransactions as $name => $value) {
							$total += $value;

							//print the total
							printf("<tr><td>%s</td><td class=\"text-right\">$%.2f</td></tr>", $name, $value);
						}
						printf("<tr style=\"background-color:#F2F2F2;\"><td>Total</td><td class=\"text-right\">$%.2f</td></tr>", $total);
					?>
				</table>

			</div>
		</div>
        
                </li>
        </ul>
	</div>
</aside>

<?php include("include/footer.php"); ?>
