<?php	require_once("./head.php");?>

<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Pending Orders</title>
	</head>
		<body >
	<?php
	$seller_id=$_GET['seller_id'];
		require_once("../dbcon/dbcon.php");
		//$seller_id=$_SESSION['seller_id'];
		error_reporting(0);
		$seller_id=$_GET['seller_id'];

		$sql1="select * from order_details where seller_id='".$seller_id."' and ship_status='-1'";
		$query1=mysqli_query($dbhandle,$sql1);
	?>
	<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td colspan="5" align="center"><h1>Pending order details</h1></td>
		</tr>
		<tr>
			<td width="6%"><b>Date</b></td>
			<td width="20%"><b>Order ID</b></td>
			<td width="30%"><b>Address</b></td>
			<td width="10%"><b>Print Label</b></td>
			<td width="36%"><b>Enter shipping informations</b></td>
		</tr>
	
	<?php
		$i=0;
		while ($op = mysqli_fetch_array($query1)) {
			$i=$i+1;
	  		if($i%2==0)
	  			$color="white";
	  		else
	  			$color="#F2F2F2";

  			echo "<form enctype=\"multipart/form-data\" name=\"f".$i."\" action=\"updateShippingdetails.php\" method=\"post\">";
  			echo "<tr bgcolor=\"$color\">";
  			echo "<td width=\"6%\" align=\"center\" size=\"+1\"><b><font color=\"#0000FF\">".$op['date']."</font></b></td>";
  			echo "<td width=\"20%\" align=\"left\" size=\"+1\"><input type='hidden' name='order_no' value='".$op['order_no']."'><input type='hidden' name='asin' value='".$op['asin']."'><input type='hidden' name='seller_id' value='".$seller_id."'>" . strtoupper($op['order_no']) . "</td>";
			echo "<td width=\"30%\" align=\"left\" size=\"+1\">" . $op['address'] . "</td>";
			echo "<td width=\"10%\" align=\"left\" size=\"+1\"><a href='/amazon/print_order_details.php?order_no=".$op['order_no']."&asin=".$op['asin']."&seller_id=".$seller_id."'
   onclick='window.open(this.href,\"targetWindow\",\"toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=950,height=650\"); return false;' >Print</a></td>";
   			echo "<td width=\"36%\" align=\"center\" size=\"+1\"><input type='text' name='courier_partner' placeholder='Courier Partner Name'>&nbsp;<input type='text' name='ship_id' placeholder='Shipment ID'>&nbsp;<input type='submit' name='submit' value='Submit'></td>";
 			echo "</tr>";
 			echo "</form>";
		}
	?>
	</table>
</body>
</html>
<?php	require_once("./footer.php");?>