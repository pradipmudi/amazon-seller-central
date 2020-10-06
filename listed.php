<?php
require_once("./dbcon/dbcon.php");

$sql = 'INSERT INTO `listing`(`asin`, `seller`, `price`, `shipping_price`, `qty`) VALUES ("'.$_POST["asin"].'","'.$_POST["seller"].'","'.$_POST["price1"].'","80","'.$_POST["qty"].'")';
		$query1=mysqli_query($dbhandle,$sql);
echo "<h1>Listing Confirm</h1>";
?>