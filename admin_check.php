<?php 
 include "connect.php"; 
 session_start(); 
 $user = $_POST["user"]; 
 $pass = $_POST["pass"]; 
 $sql = "select * from login"; 
 $ex = mysqli_query($conn, $sql); 
 while ($rs = mysqli_fetch_array($ex)){ 
 if (($user==$rs["username"]) and ($pass==$rs["password"])) {  $_SESSION["username"] = $user; 
 $_SESSION["password"] = $pass; 
 $show = header("Location:admin_home.php");
 } else { 
 $show = "<H1>Your username or password is invalid</H1>";  } 
 }  
 echo $show; 
 mysqli_close($conn); 
?>
