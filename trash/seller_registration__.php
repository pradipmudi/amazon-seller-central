<!DOCTYPE html>
<html>
<head>
	<title>Amazon Seller Panel</title>
</head>
<img src="./assets/img/st1.gif">
<img src="./assets/img/st2.gif">
<img src="./assets/img/st3.gif"><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function pin_get(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("city").value = "";
    document.getElementById("dist").value = "";
    document.getElementById("state").value = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	var data = this.responseText;
    	var d1 = data.split("+");
    if (d1[1]=="NA" || d1[1]=="na") d1[1] = " ";
    if (d1[2]=="NA" || d1[2]=="na") d1[2] = " ";
    if (d1[3]=="NA" || d1[3]=="na") d1[3] = " ";
      document.getElementById("city").value = d1[1];
      document.getElementById("dist").value = d1[2];
      document.getElementById("state").value = d1[3];
    }
  };
  xhttp.open("GET", "api/pin_code.php?pin="+str, true);
  xhttp.send();   
}
</script><script>
function get_bank(str) {
  var xhttp;
  if (str.length <11 || str.length >11) { 
    document.getElementById("bank_name").value = "";
    document.getElementById("bank_city").value = "";
    document.getElementById("bank_state").value = "";
    document.getElementById("branch").value = "";
    document.getElementById("bank_dist").value = "";
    

    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	var data = this.responseText;
    	var d1 = data.split("+");
    if (d1[1]=="NA" || d1[1]=="na") d1[1] = " ";
    if (d1[2]=="NA" || d1[2]=="na") d1[2] = " ";
    if (d1[3]=="NA" || d1[3]=="na") d1[3] = " ";
    document.getElementById("bank_name").value = d1[1];
        document.getElementById("branch").value = d1[2];
    document.getElementById("bank_city").value = d1[3];
        document.getElementById("bank_dist").value = d1[4];
    document.getElementById("bank_state").value = d1[5];
    }
  };
  xhttp.open("GET", "api/bank_ifsc.php?ifsc="+str, true);
  xhttp.send();   
}
</script>

<body>
	<form action="seller_registration_c.php" method="post">
		Marchant Name: <input type="text" name="marchant_name" required="true" style="text-transform:capitalize"><br><br>
		Address Line 1 :<input type="text" name="a1" required="true" style="text-transform:capitalize"><br><br>
		Address Line 2 :<input type="text" name="a2" style="text-transform:capitalize">(optional)<br><br>
		Phone :<input type="number" name="phone" pattern="[0-9]" required="true"><br><br>
		pin :<input type="text" name="pin" required="true" onkeyup="pin_get(this.value)"><br><br>
		city :<input id = "city" type="text" style="text-transform:capitalize" name="city"><br><br>
		dist :<input type="text" id = "dist" style="text-transform:capitalize" name="dist"><br><br>
		State :<input type="text" id = "state" style="text-transform:capitalize" name="state"><br><br>
		PAN : <input type="" name="pan" required="true" style="text-transform:uppercase;"><br><br>
		GSTIN <input type="" name="gst" required="true" style="text-transform:uppercase;"><br><br>
		bank Account Number: <input type="number" required="true" name="ac"><br><br>
		Bank IFSC :<input type="" name="ifsc"  style="text-transform:uppercase" onkeyup="get_bank(this.value)"><br><br>
		Bank Name<input type="" id = "bank_name" name="bn" required="true" disabled="true"><br><br>
		Branch : <input type="" id = "branch" required="true" name="br" disabled="true"><br><br>
		city: <input type="" id = "bank_city" name="bc" disabled="true"><br><br>
		District: <input type="" id = "bank_dist" name="bd" disabled="true"><br><br>
		state: <input type="" id = "bank_state" name="bs" disabled="true"><br><br>
		type:  <select name="act">
			  <option value="1">Savings</option>
			  <option value="2">Current</option>
			  <option value="3">other</option>
			</select> <br><br>
		 <input type="submit" name="" onsubmit="return (check())"><br><br>
		 <script type="text/javascript">
		 	function check(){
		 		//validation
		 	}
		 	return false;


		 </script>




	</form>

</body>
</html>

<?php

?>