<?php
$host='localhost';
$user='root';
$password='';
$db = 'amazon';
$dh=mysqli_connect($host,$user,$password,$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_select_db($dh,$db);
if(isset($_GET["m"])){
  $pin =  $_GET["m"];
  if (strlen($pin)>0){
    $sql = 'select * from seller where `marchant_name` = "'.$pin .'" limit 1';
    $output = mysqli_query($dh,$sql);
    if (mysqli_num_rows($output)>0){
      echo "1";
    }
    else{
      echo "0"; 
    }
  }
  else{
    echo "0";
  }
}
else{
  echo "0";
}


?>
