<?php
ob_start();
session_start();
if(isset($_SESSION['seller']))
  {
	  error_reporting(0);
	  header('location:seller_panel');
  }
  else
  {
?>
<html>
<head>
<title>Amazon</title>
</head>
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>

<script type="text/javascript">
function validate()
{
   if( document.login.user_id.value == "" )
   {
     alert( "Please enter your User ID!!" );
     document.login.user_id.focus() ;
     return false;

   }
   if( document.login.Password.value == "" )
   {
     alert( "Please enter your Password!!" );
     document.login.Password.focus() ;
     return false;

   }
   return( true );
}
</script>


<script type = "text/javascript">
function alphanumeric(alphane)
{
	var numaric = alphane;
	for(var j=0; j<numaric.length; j++)
		{
		  var alphaa = numaric.charAt(j);
		  var hh = alphaa.charCodeAt(0);
		  if((hh > 47 && hh<58) || (hh > 64 && hh<91) || (hh > 96 && hh<123))
		  {
		  }
		else	{
                         alert("PLEASE ENTER ONLY ALPHANEWMERIC WORD");
						document.login.Password.value = "";
						 Password.focus();
						 
						 
			 return false;
		  }
 		}
  return true;
}
</script>
<body style="margin:0px;" >

    <form name="login" method="post" action="login_check.php" onsubmit="return(validate());">
          <table width="20%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>
          <td colspan="2" align="center">
          <font color=""><h2>Login Here</h2></font>
          </td>
          </tr>
          <tr><td colspan="2" align="center">  <?php
          		error_reporting(0);

          	$response=0;
          	$response = $_GET['response'];	
          	if($_GET['response']==1)
          	{
          	?>
               <label for="User"><font color="#FF3333"><b>User Id or Password is not Valid</b></font></label>
          <?php }?>&nbsp;</td></tr>
          <tr>
          <td align="center">User ID
          </td>
          <td align="center"><input type="text" name="user_id" placeholder="Username"/></td>
          </tr>
          <tr><td colspan="2" align="center">&nbsp;</td></tr>
          <tr>
          <td align="center">Password</td>
          <td align="center"><input type="password" onKeyUp="alphanumeric(login.Password.value)" name="Password" placeholder="Password"/></td>
          </tr>
          <tr><td colspan="2" align="center">&nbsp;</td></tr>
          <tr><td colspan="2" align="center"><input type="Submit" name="adm_login" value="Log In"/></td></tr>
          <tr><td colspan="2" align="center">&nbsp;</td></tr>
          <tr><td colspan="2" align="center"><a href="seller_rgst.php"></td></tr>
          </table>
    </form>
<br/>


</body>
</html>

<?php 

	
}
 ?>