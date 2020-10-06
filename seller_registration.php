
<?php
	ob_start();
	session_start();
?>
<?php	require_once("..seller_panel/head.php");?>
<?php	require_once("./dbcon/dbcon.php");
	//error_reporting(0);
	/* seller registration */
		$sql1="insert into seller (`store_name`,`legal_name`,`status`,`default_category`,`email`,`phone`,`pan`,`gst_no`,`account_no`,`balance`,`ifsc`,`bank_type`,`remainder`,`seller_item_property`,`express`,`standard`,`rural`,`shipment_price_type`,`other_site`,`charge_data`,`active_msg`,`request_return`,`current_sale`,`address`,`shipment_type`,`expected_selling_capacity`) 
		values('".$_POST['store_name']."','".$_POST['legal_name']."','0','".$_POST['default_category']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['pan']."','".$_POST['gst_no']."','".$_POST['account_no']."',0,'".$_POST['ifsc']."','".$_POST['bank_type']."','0','".$_POST['seller_item_property']."','".$_POST['express']."','".$_POST['standard']."','".$_POST['rural']."','".$_POST['shipment_price_type']."','".$_POST['other_site']."','".$_POST["charge_data"]."',0,0,0,'".$_POST['ad1']."\n".$_POST['ad2']."\n".$_POST['pin_code']."\n".$_POST['city']."\n".$_POST['dist']."\n".$_POST['state']."','".$_POST['shipment_type']."','".$_POST['expected_selling_capacity']."')";


		$query1=mysqli_query($dbhandle,$sql1);

	/* seller registration */


	/* seller registration in user table  */

		$sql2="insert into user(`name`,`email`,`phone`,`password`) values('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."')";
		$query2=mysqli_query($dbhandle,$sql2);

	/* seller registration in user table  */
	require_once("..seller_panel/footer.php");?>