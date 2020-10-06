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
?>