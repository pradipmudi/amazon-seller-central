<?php
	require_once("./head.php");
	require_once("../dbcon/dbcon.php");
	error_reporting(0);
	$seller_id=$_POST['seller_id'];
	$asin=$_POST['asin'];
	$order_no=$_POST['order_no'];
	$courier_partner=$_POST['courier_partner'];
	$ship_id=$_POST['ship_id'];
	$sql1="update order_details set courier_partner='".$courier_partner."',ship_id='".$ship_id."',ship_status='1',payment_status=1 where seller_id='".$seller_id."' and asin='".$asin."' and order_no='".$order_no."'";
	$query1=mysqli_query($dbhandle,$sql1);
	echo "<h1><br><br><br>Thank you. Shipped Successfully</h1>";
?>
<?php	require_once("./footer.php");?>