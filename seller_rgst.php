<?php   require_once("..seller_panel/head.php");?>
<!doctype html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery formToWizard Plugin Example</title>
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
    <div id='progress'><div id='progress-complete'></div></div>
    <form id="SignupForm" action="seller_registration.php" method="post">
        <fieldset>
            <legend>Seller Registration </legend>
            <div class="form-group">
            <label for="Name">Your Name</label>
            <input id="Name" type="text" name = "name" class="form-control" required />
            </div>
            <div class="form-group">
            <label for="Name">Phone</label>
            <input id="Name" type="text" name = "phone" class="form-control" required />
            </div>
            <div class="form-group">
            <label for="Email">Email</label>
            <input id="Email" type="email" name="email" class="form-control" required />
            </div>
            <div class="form-group">
            <label for="Password">Password</label>
            <input id="Password" type="password" name="password" class="form-control" required/>
            </div>
        </fieldset>

        <fieldset>
            <legend>Seller information</legend>
            <div class="form-group">
            <label for="CompanyName">Leagal Name</label>
            <input id="CompanyName" type="text" name="legal_name" class="form-control" required />
            </div>

        </fieldset>
        <fieldset>
        	<legend>Seller Verification</legend>
            <div class="form-group">
            <label class="ontrol-label">Enter verification code send on your mail</label>
            <input id="verify_mail" type="text" class="form-control" />
            </div>
        </fieldset>

        <fieldset>
        	<legend>About Your Business</legend>
        	<div class="form-group">
        		<label>Store Name :</label>
        		<input type="text" name="store_name" class="form-control" required="true" />
        	</div>
        	<div class="form-group">
        		<label>Select Primary Product Catagory:</label>
        		<select name="default_category">
        			<option value = "A">Kindle eReaders & eBooks</option>
					<option value = "B">Mobiles, Computers</option>
					<option value = "C">TV, Appliances, Electronics</option>
					<option value = "D">Men's Fashion</option>
					<option value = "E">Women's Fashion</option>
					<option value = "F">Home, Kitchen, Pets</option>
					<option value = "G">Beauty, Health, Grocery</option>
					<option value = "H">Sports, Fitness, Bags, Luggage</option>
					<option value = "I">Toys, Baby Products, Kids' Fashion</option>
					<option value = "J">Car, Motorbike, Industrial</option>
					<option value = "K">Books</option>
					<option value = "L">Movies, Music & Video Games</option>
					<option value = "M">Gift Cards</option>
					<option value = "N">Global Store</option>
        		</select>

        	</div>
        	<div class="form-group">
        		<legend>Enter Address</legend>
        		<label>Address 1</label>
        		<input type="text" name="ad1" class="form-control" required="true">
        		<label>Address 2 (Optional)</label>
        		<input type="text" name="ad2" class="form-control">        		
        		<label>Pin Code</label>
        		<input type="text" name="pin_code" class="form-control" onkeyup="pin_get(this.value)" required="true">
        		<label>City</label>
        		<input type="text" name="city" id = "city" class="form-control" required="true">
        		<label>District</label>
        		<input type="text" name="dist" id = "dist" class="form-control" required="true">
        		<label>State</label>
        		<input type="text" name="state" id = "state" class="form-control" required="true">
        		<legend>Shipment Type</legend>
        		<select name="shipment_type" class="form-control"> 
        			<option value="1"> Prime</option>
        			<option value="2"> Self Ship</option>
        		</select>
        	</div>
        </fieldset>
        <fieldset>
        	<div class="form-group">
        		<legend>Tax Information</legend>
        		<label>Enter Provisional GSTIN</label>
        		<input type="text" class="form-control" name="gst_no"/></div>
        	<div class="form-group">
        		<label> Enter PAN</label>
        		<input type="text" class="form-control" name="pan"/>


        	</div>
        </fieldset>
        <fieldset>
        	<div class="form-group" >
        		<legend>Seller Item Properties</legend>
        		<input type="checkbox" name="seller_item_property"  value="1">I manufacture Them<br>
        		<input type="checkbox" name="seller_item_property"  value="10">I resale product that I buy<br>
        		<input type="checkbox" name="seller_item_property"  value="100">I import Them<br>        		
				<legend>Monthly Selling Capacity</legend>
				<select name="expected_selling_capacity">
					<option value="100">0-100</option>
					<option value=1000"">100-1000</option>
					<option value="100000">1000></option>
				</select>
				<legend>Do you Sale on Other Site</legend>
				<input type="url" placeholder="Enter Website" name="other_site" class="form-control">

        	</div>
        </fieldset>
        <fieldset>
        	<div class="form-group" >
        	<legend>Set Shipping Speed</legend>
        	<label>Express </label>
        	<select name="express">
        		<option value="1"> 1 Days </option>
        		<option value="2"> 2 Days </option>
        		<option value="3"> 3 Days </option>
        		<option value="4"> 4 Days </option>
        		<option value="5"> 5 Days </option>
        		<option value="6"> 6 Days </option>
        		<option value="7"> 7 Days </option>
        	</select>
        	<label>Standard </label>
        	<select name="standard">
        		<option value="1"> 1 Days </option>
        		<option value="2"> 2 Days </option>
        		<option value="3"> 3 Days </option>
        		<option value="4"> 4 Days </option>
        		<option value="5"> 5 Days </option>
        		<option value="6"> 6 Days </option>
        		<option value="7"> 7 Days </option>
        		<option value="8"> 8 Days </option>
        		<option value="9"> 9 Days </option>
        		<option value="10"> 10 Days </option>
        		<option value="11"> 11 Days </option>
        		<option value="12"> 12 Days </option>
        		<option value="13"> 13 Days </option>
        		<option value="14"> 14 Days </option>
        		<option value="15"> 15 Days </option>
        		<option value="16"> 16 Days </option>
        		<option value="17"> 17 Days </option>
        		<option value="18"> 18 Days </option>
        		<option value="19"> 19 Days </option>
        		<option value="20"> 20 Days </option>
        		<option value="21"> 21 Days </option>
        	</select>
        	<label>Rural </label>
        	<select name="rural">
        		<option value="1"> 1 Days </option>
        		<option value="2"> 2 Days </option>
        		<option value="3"> 3 Days </option>
        		<option value="4"> 4 Days </option>
        		<option value="5"> 5 Days </option>
        		<option value="6"> 6 Days </option>
        		<option value="7"> 7 Days </option>
        		<option value="8"> 8 Days </option>
        		<option value="9"> 9 Days </option>
        		<option value="10"> 10 Days </option>
        		<option value="11"> 11 Days </option>
        		<option value="12"> 12 Days </option>
        		<option value="13"> 13 Days </option>
        		<option value="14"> 14 Days </option>
        		<option value="15"> 15 Days </option>
        		<option value="16"> 16 Days </option>
        		<option value="17"> 17 Days </option>
        		<option value="18"> 18 Days </option>
        		<option value="19"> 19 Days </option>
        		<option value="20"> 20 Days </option>
        		<option value="21"> 21 Days </option>
        		<option value="22"> 22 Days </option>
        		<option value="23"> 23 Days </option>
        		<option value="24"> 24 Days </option>
        		<option value="25"> 25 Days </option>
        		<option value="26"> 26 Days </option>
        		<option value="27"> 27 Days </option>
        		<option value="28"> 28 Days </option>
        	</select>
        	<div class="form-group" >
        		<legend>Shipping Cost Streategy</legend>
        		<input type="radio" name="shipment_price_type" value="price"  onchange="testfun1()" >  Depends On Price<br>
    <input type="radio" name="shipment_price_type" value="weight" onchange="testfun2()" checked> Depends On Weight<br>
    <div id="item_price" style="display: block;"> 
    	<legend>Set shipping cost by price</legend>
    	< 500 Grms 		<input id="sc1" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	500 - 1Kg 		<input id="sc2" type="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name=""><br>
    	Extra 500 gm 	<input id="sc3" type="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name=""><br><input name="charge_data" id="shipping_cost" >
    	<button onclick="return addd()">Confirm rate</button>
    	<script type="text/javascript">
    		function addd(){
    			var c = document.getElementById("sc1").value;
       			c=c.concat("+");
    			c= c.concat( document.getElementById("sc2").value);
    			c = c.concat("+");
    			c = c.concat( document.getElementById("sc3").value);
    			document.getElementById("shipping_cost").value = c;
    			return false;
    		}
    	</script>    	
    </div>
	
    <div id="item_weight" style="display: none;"> 
    	<legend>Set Shipping cost by price</legend>
    	< ₹ 500  <input id="sc4" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 500 - ₹ 1000  <input id="sc5" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 1000 - ₹ 2000  <input id="sc6" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 200 - ₹ 5000  <input id="sc7" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 500 - ₹ 10000  <input id="sc8" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	>  ₹ 10000  <input id="sc9" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	<button onclick="return addd1()">Confirm rate</button>
    	    	<script type="text/javascript">
    		function addd1(){
    			var c = document.getElementById("sc4").value;
       			c=c.concat("+");
    			c= c.concat( document.getElementById("sc5").value);
    			c = c.concat("+");
    			c= c.concat( document.getElementById("sc6").value);
    			c = c.concat("+");
    			c= c.concat( document.getElementById("sc7").value);
    			c = c.concat("+");
    			c = c.concat( document.getElementById("sc8").value);
       			c = c.concat("+");
    			c = c.concat( document.getElementById("sc9").value);
    			document.getElementById("shipping_cost").value = c;
    			return false;
    		}
    	</script>
    </div>
    <script type="text/javascript">
    	function testfun1(){
    		document.getElementById("item_price").style.display = 'none';
    		document.getElementById("item_weight").style.display = 'block';
    		document.getElementById("shipping_cost").value = "0+0+0";    		
    	}
    	function testfun2(){
    		document.getElementById("item_price").style.display = 'block';
    		document.getElementById("item_weight").style.display = 'none';
    		document.getElementById("shipping_cost").value = "0+0+0+0+0+0";
    	}
    </script>
        </fieldset>
        <fieldset>
        	<div class="form-group">
        		<legend>Enter Bank Information </legend>
        		<div class="form-group">
        		<label>IFSC</label>
        		<input type=""  class="form-control" style="text-transform:uppercase" onkeyup="get_bank(this.value)" name="ifsc">
        		<div id="bank_data"></div>
        		</div>
        		<div class="form-group">
        		<label>A/C No</label>
        		<input type="" class="form-control" name="account_no">
        		</div>
				<div class="form-group">
        		<label>A/C Type</label>
        		<select name="bank_type">
        			<option value="1"> Savings A/C </option>
        			<option value="2"> Current A/C </option>
        			<option value="3"> Over Drift A/C </option>
        		</select>
        		</div>

        		
        	</div>

        </fieldset>

        <p>
            <button id="SaveAccount" class="btn btn-primary submit">Submit form</button>
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
<?php   require_once("..seller_panel/footer.php");?>