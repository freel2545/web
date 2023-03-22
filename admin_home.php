<?php 
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
  
 include "admin_menu.php";
 echo "<br><br><center><h1> ระบบร้านค้าออนไลน์ </h1></center>";


 ?>