<?php
require_once("./head.php");

?>

<ol class="breadcrumb">
Return Request 
</ol>
<?php
require_once("../dbcon/dbcon.php");
$sql = "select * from return_product";
$output = mysqli_query($dbhandle,$sql);$no = mysqli_num_rows($output);
		if ($no>0){
			echo "<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style><table><tr><th>date</th><th>asin</th><th>product</th><th>price</th><th>Reason</th><th>Action</th></tr>";
            while($p = mysqli_fetch_array($output)){
                echo "<tr><td>".$p["date"]."</td><td>".$p["asin"]."</td><td>".$p["product"]."</td><td>".$p["price"]."</td><td>".$p["reason"]."</td><td><button>reply</button></td></tr>";
            }
			echo "</table>";
		}
?>
<?php   require_once("./footer.php");?>