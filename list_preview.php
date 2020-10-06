<?php	require_once("..seller_panel/head.php");
		require_once("../dbcon/dbcon.php");


	if (isset($_GET["asin"])){
		$sql =  "SELECT * FROM `product`";
		$output = mysqli_query($dh,$sql);$no = mysqli_num_rows($output);
		if ($no>0){
			$p = mysqli_fetch_array($output);
			echo "<h1>".$p["name"]."</h1><br><br><br><Specification:<br>".$p["specification"]."<br><br><br>From the  Manufacturar:<br>".$p["design"];
		}

	}
require_once("..seller_panel/footer.php");
?>