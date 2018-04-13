<?php include("include/header.php"); ?>


<?php
$User = Null;

$Receipt_ID = $_GET['receipt'];
$ReceiptDate = "29th Oct 1977";
$ReceiptTransactions = array("transactionA"=>32.5, "transactionB"=>45.23);

?>


<?php
	print($ReceiptDate);
?>
<table class="Areceipt">
	<tr>
		<th>Item</th><th>Cost</th>
	</tr>
	<?php
		$total = 0.0;
		foreach($ReceiptTransactions as $name => $value) {
			$total += $value;
			printf("<tr><td>%s</td><td>$%.2f</td></tr>", $name, $value);
		}
		printf("<tr class=\"total\"><td>Total</td><td>$%.2f</td></tr>", $total);
	?>
</table>


<?php include("include/footer.php"); ?>
