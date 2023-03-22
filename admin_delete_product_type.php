<?php  
 include "connect.php"; 
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
 $id = $_GET["id"]; 
 $sql = "delete from product_type where type_id=$id"; 
 $ex = mysqli_query($conn,$sql); 
 if($ex){ 
 echo "<meta http-equiv='refresh' content='0;  
url=admin_product_type.php'>"; 
 } else { 
 echo "<h3>ไม่สามารถลบข้อมูลประเภทสินค้านี้ได้</h3>"; 
 } 
 mysqli_close($conn); 
?>

