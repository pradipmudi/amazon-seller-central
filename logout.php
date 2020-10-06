<?php
 session_start();
 
 session_unset();
 $_SESSION['seller']=0;
 session_destroy();
 header('location: login.php');
 ?>