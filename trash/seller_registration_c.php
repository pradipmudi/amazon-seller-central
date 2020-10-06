<?php
include_once("data_base1.php");
if (isset($_POST["marchant_name"])){
	echo $_POST["marchant_name"];

}
else{
	echo "wrong";
}
?>