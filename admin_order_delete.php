<?php  
 include "connect.php"; 
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
 $id = $_GET["id"]; 
 $sql1 = "delete from orders where order_id=$id"; 
 $ex1 = mysqli_query($conn, $sql1); 
  
 $sql2 = "delete from order_detail where order_id = $id";  $ex2 = mysqli_query($conn, $sql2); 



 mysqli_close($conn); 
//  echo "<meta http-equiv=„refresh‟ content=„0; url=admin_order.php‟>"; 
header('location: admin_order.php');
?>
้