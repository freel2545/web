<?php  
 include "connect.php"; 
  
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
  
 $pname = $_POST["product_type"]; 
 $sql = "insert into product_type (type_id,type_name) values ('',  '$pname')"; 
 mysqli_query($conn, $sql) 
 or die ("ไม่สามารถทำการเพิ่มข้อมูลประเภทสินค้าได้<br>" . mysqli_error($conn));  mysqli_close($conn); 
 echo "<meta http-equiv='refresh' content='0;  
url=admin_product_type.php'>"; 
?>
