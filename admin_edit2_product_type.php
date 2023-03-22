<?php  
 include "connect.php"; 
  
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
  
 $tid = $_POST["type_id"]; 
 $tname = $_POST["type_name"]; 
  
 if($tname ==""){ 
 echo "<h3>กรุณาป้อนชื่อประเภทสินค้า</h3>"; 
 exit(); 
 } 
 $sql = "update product_type set type_name = '$tname' where type_id=$tid";  $ex = mysqli_query($conn, $sql); 
 if($ex){ 
 echo "<meta http-equiv='refresh' content='0;  
url=admin_product_type.php'>"; 
 } else { 
 echo "<h3>ไม่สามารถท าการแก้ไขข้อมูลประเภทสินค้าได้</h3>"; 
 } 
 mysqli_close($conn);  
?>
