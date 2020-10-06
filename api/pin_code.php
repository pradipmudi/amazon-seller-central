<?php
$host='localhost';
$user='root';
$password='';
$db = 'pin_code';

$dh=mysqli_connect($host,$user,$password,$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_select_db($dh,$db);
if(isset($_GET["pin"])){
	$pin =  $_GET["pin"];
	if (strlen($pin)==6 and $pin>100000 and $pin<999999){
		$sql = 'select * from pin_code where `pin` = '.$pin .' limit 1';
		$output = mysqli_query($dh,$sql);$no = mysqli_num_rows($output);
		if ($no>0){
			$p = mysqli_fetch_array($output);
			echo "T+".$p["city"]."+".$p["dist"]."+".$p["state"];
		}
		else{
			echo "F+na+na+na";	
		}

	}
	else{
		echo "F+na+na+na";
	}
	

}
else{
	echo "F+na+na+na";
}


?>
