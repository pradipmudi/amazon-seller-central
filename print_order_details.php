<?php	require_once("..seller_panel/head.php");?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Listing</title>
	<script type="text/javascript">
		function printpage()
  		{	
  			window.print()
  		}
	</script>
	</head>
		<body  onload="printpage();">

<?php
	require_once("dbcon/dbcon.php");
	error_reporting(0);
	$seller_id=$_GET['seller_id'];
	$asin=$_GET['asin'];
	$order_no=$_GET['order_no'];
	$sql1="select * from order_details  where asin='".$asin."' and seller_id='".$seller_id."' and order_no='".$order_no."'";
	$query1=mysqli_query($dbhandle,$sql1);
	$sql2="select * from seller where legal_name='".$seller_id."'";
	$query2=mysqli_query($dbhandle,$sql2);
	$fetch=mysqli_fetch_array($query2);
	while ($op=mysqli_fetch_array($query1)) {
?>
		<table border="1" cellpadding="0" cellspacing="0" width="60%" align="center">
			<tr>
				<td>To :<br><?php echo $op['address'];?> </td>
				<td>From :<br> <?php echo $seller_id."<br>".$fetch['address'];?></td>				
			</tr>
			<tr>
				<td>Order No. : </td><td align="left"><?php echo $order_no;?></td>
			</tr>
			<tr>
				<td>ASIN : </td><td align="left"><?php echo $asin;?></td>
			</tr>
			<tr>
				<td>Price : </td><td align="left"><?php echo $op['price'];?></td>						
				
			</tr>
		</table>
<?php
	}
?>
</body>
</html>
<?php	require_once("..seller_panel/footer.php");?>