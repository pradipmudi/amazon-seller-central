<?php
$host='localhost';
$user='root';
$password='';
$db = 'bank';

$dh=mysqli_connect($host,$user,$password,$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_select_db($dh,$db);
if(isset($_GET["ifsc"])){
	$pin =  $_GET["ifsc"];
	if (strlen($pin)==11){
		$sql = 'select * from bank_data where `ifsc` = "'.$pin .'" limit 1';
		$output = mysqli_query($dh,$sql);$no = mysqli_num_rows($output);
		if ($no>0){
			$p = mysqli_fetch_array($output);
			echo "T+".$p["bank"]."+".$p["branch"]."+".$p["city"]."+".$p["district"]."+".$p["state"];
		}
		else{
			echo "F+na+na+na+na";
		}
	}
	else{
		echo "F+na+na+na+na";
	}
}
else{
	echo "F+na+na+na+na";
}


?>
