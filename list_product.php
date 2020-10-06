




<?php
    require_once("..seller_panel/head.php");
    require_once("../dbcon/dbcon.php");


	if (isset($_GET["asin"]) && isset($_GET["seller"])){
		$sql =  "SELECT * FROM `product` where asin = '".$_GET["asin"]."'";
		$output = mysqli_query($dbhandle,$sql);$no = mysqli_num_rows($output);
		if ($no>0){
			$p = mysqli_fetch_array($output);
?>



<!doctype html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listing Product</title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        .wrap { max-width: 980px; margin: 10px auto 0; }
        #steps { margin: 80px 0 0 0 }
        .commands { overflow: hidden; margin-top: 30px; }
        .prev {float:left}
        .next, .submit {float:right}
        .error { color: #b33; }
        #progress { position: relative; height: 5px; background-color: #eee; margin-bottom: 20px; }
        #progress-complete { border: 0; position: absolute; height: 5px; min-width: 10px; background-color: #337ab7; transition: width .2s ease-in-out; }
    </style>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="./assets/js/jquery.formtowizard.js"></script>
    
    <script>
        $( function() {
            var $signupForm = $( '#SignupForm' );
            
            $signupForm.validate({errorElement: 'em'});
            
            $signupForm.formToWizard({
                submitButton: 'SaveAccount',
                nextBtnClass: 'btn btn-primary next',
                prevBtnClass: 'btn btn-default prev',
                buttonTag:    'button',
                validateBeforeNext: function(form, step) {
                    var stepIsValid = true;
                    var validator = form.validate();
                    $(':input', step).each( function(index) {
                        var xy = validator.element(this);
                        stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
                    });
                    return stepIsValid;
                },
                progress: function (i, count) {
                    $('#progress-complete').width(''+(i/count*100)+'%');
                }
            });
        });
    </script>
    
</head>

<body>
<div id="jquery-script-menu">
	<br><br><br><br><br>
<div class="row wrap"><div class="col-lg-12">
    <form id="" action="listed.php" method="post">
        <fieldset>
            <legend>List your product</legend>
            <div class="form-group">
            <label>Product: <?php echo $p["name"]?></label>
            </div>
            <div class="">
                        <label ><b>Specification:</b></label><br><?php echo $p["specification"]?>
<br><br><br>
            <label>Lowest Price For this product : </label>
            <?php
            //$sql2 = 'SELECT * FROM `listing` where asin = "'.$_GET["asin"].'" order by price limit 1';
            $sql2 = 'SELECT * FROM `listing` where asin = "'.$_GET["asin"].'" order by price limit 1 ';
            $output1 = mysqli_query($dbhandle,$sql2);$no1 = mysqli_num_rows($output1);
            

            if ($no1==0){
            	echo "Not listed from any seller";
            }else{
            	$p1 = mysqli_fetch_array($output1);
            	$d = $p1["price"]+$p1["shipping_price"];
            	echo '<input type="text" id = "shippingcost" name="shipping_COST" value="'.$d.'" >';


            	        		

            }
            ?>
            
             <button id = "btn1" onclick="return myFunction();">Show other seller Price</button>
             <script type="text/javascript">
             function myFunction() {
    var x = document.getElementById('other_seller_price');
    if (x.style.display === 'none') {
        x.style.display = 'block';
        document.getElementById("btn1").value = "Hide other seller Price";

    } else {
        x.style.display = 'none';
    }
    return false;

} </script>


            <div id="other_seller_price" style="display: none;">
            	<?php
$sql3 = 'SELECT * FROM `listing` where asin ="'.$_GET["asin"].'" order by price';
            $output11 = mysqli_query($dbhandle,$sql3);$no2 = mysqli_num_rows($output11);
            echo "<br><style>table { padding = '1px'; border = '1px';   font-family: arial, sans-serif;    border-collapse: collapse;    width: 40%;}td, th {    border: 1px solid #dddddd;    text-align: left;    padding: 8px;}tr:nth-child(even) {    background-color: #dddddd;}</style><table>  <tr>    <th>Seller</th>    <th>price+Shipping</th>  </tr>";
            if ($no2==0){
            	$other_price1 = "No data Available";
            }else{
            	while($p2 = mysqli_fetch_array($output11)){
            		$dd = $p2['price']."+".$p2['shipping_price'];
            		echo "<tr><td>".$p2['seller']."</td><td>".$dd."</td></tr>";
            	}
				echo "</table>";
            }

            ?>
            </div>

            <h3>Your Price</h3>
            <input type="text" id = "price" name="price1">
            <button onclick="return (set_price());">Auto Price</button>
            <input type="" name="seller" value="<?php echo $_GET['seller'];?>" hidden>
            <label>Enter Quantity : </label><input type="text" name="qty">
            <input type="" name="asin" value="<?php echo $_GET['asin'];?>" hidden>
            <script type="text/javascript">
            	function set_price(){
            		document.getElementById("price").value=document.getElementById("shippingcost").value;
            		return false;
            	}

            </script>
        </fieldset>


        <p>
            <button id="SaveAccount" class="btn btn-primary submit">List Your Product</button>
        </p>
    </form>

</div></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
	document.getElementById("bank_data").innerHTML = "";
  	/*
    
    document.getElementById("bank_city").value = "";
    document.getElementById("bank_state").value = "";
    document.getElementById("branch").value = "";
    document.getElementById("bank_dist").value = "";
    */

    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	var data = this.responseText;
    	var d1 = data.split("+");
    if (d1[1]=="NA" || d1[1]=="na") d1[1] = "N/A";
    if (d1[2]=="NA" || d1[2]=="na") d1[2] = "N/A";
    if (d1[3]=="NA" || d1[3]=="na") d1[3] = "N/A";
    var dd = "Bank Name: "+ d1[1] +" Branch: "+d1[2]+" City: "+d1[3]+" Dist: "+d1[4]+ " State: " + d1[5];
    document.getElementById("bank_data").innerHTML = dd;
    /*document.getElementById("bank_name").value = d1[1];
        document.getElementById("branch").value = d1[2];
    document.getElementById("bank_city").value = d1[3];
        document.getElementById("bank_dist").value = d1[4];
    document.getElementById("bank_state").value = d1[5];*/
    }
  };
  xhttp.open("GET", "api/bank_ifsc.php?ifsc="+str, true);
  xhttp.send();   
}
</script>

</body>
</html>

<?php

	
			
		}

	}
?>





