<?php
ob_start();
session_start();
require_once("./dbcon/dbcon.php");
$user_id= mysqli_real_escape_string($dbhandle,$_REQUEST['user_id']);
$Password= mysqli_real_escape_string($dbhandle,$_REQUEST['Password']);

$username='';
if(mysqli_query($dbhandle,"Select * From user where email='$user_id'")){
	$sql="Select * From user where email='$user_id' and password='$Password'";
	echo "sql1 : =".$sql;
	$username=$user_id;
}
elseif (mysqli_query($dbhandle,"Select * From user where phone='$user_id'")) {
	$sql="Select * From user where phone='$user_id' and password='$Password'";
	echo "sql2 : =".$sql;
	$username=$user_id;
}
$query=mysqli_query($dbhandle,$sql);
$w=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if($w==1){
	$_SESSION['seller']=$username;
	header('location: seller_panel');
} 
 else{	    
	   header("location:login.php?response=1");
}

	?>

