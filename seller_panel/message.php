<?php
require_once("./head.php");

?>

<ol class="breadcrumb">
User Message: 
</ol>
<?php
require_once("../dbcon/dbcon.php");
$sql = "select * from msg";
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
</style><table><tr><th>Time</th><th>Sender</th><th>Message</th><th>Action</th></tr>";
			while($p = mysqli_fetch_array($output)){
				echo "<tr><td>".$p["time"]."</td><td>".$p["sender"]."</td><td>".$p["message"]."</td><td><button>reply</button></td></tr>";
			}
			echo "</table>";
		}
?>
<?php   require_once("./footer.php");?>