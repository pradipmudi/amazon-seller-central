<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<input type="radio" name="ship_cost" value="price"  onchange="testfun1()" >  Depends On Price<br>
    <input type="radio" name="ship_cost" value="weight" onchange="testfun2()" checked> Depends On Weight<br>
    <div id="item_price" style="display: block;"> 
    	<legend>Set shipping cost by price</legend>
    	< 500 Grms 		<input id="sc1" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	500 - 1Kg 		<input id="sc2" type="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name=""><br>
    	Extra 500 gm 	<input id="sc3" type="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name=""><br>
    	<button onclick="addd()">Confirm rate</button>
    	<script type="text/javascript">
    		function addd(){
    			var c = document.getElementById("sc1").value;
       			c=c.concat("+");
    			c= c.concat( document.getElementById("sc2").value);
    			c = c.concat("+");
    			c = c.concat( document.getElementById("sc3").value);
    			document.getElementById("shipping_cost").value = c;
    		}

    	</script>
    	
    </div>
	<textarea id="shipping_cost" disabled="true"></textarea>
    <div id="item_weight" style="display: none;"> 
    	<legend>Set Shipping cost by price</legend>
    	< ₹ 500  <input id="sc4" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 500 - ₹ 1000  <input id="sc5" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 1000 - ₹ 2000  <input id="sc6" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 200 - ₹ 5000  <input id="sc7" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	₹ 500 - ₹ 10000  <input id="sc8" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	>  ₹ 10000  <input id="sc9" type=" " name="" onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' ><br>
    	<button onclick="addd1()">Confirm rate</button>
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
        		



</body>
</html>