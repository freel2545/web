<?php  
 include "connect.php"; 
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
 include "admin_menu.php"; 
  
 $id = $_GET["id"]; 
 $sql = "select * from product_type where type_id=$id"; 
 $ex = mysqli_query($conn, $sql); 
 $rs = mysqli_fetch_array($ex); 
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <html> 
<body><br><br> 
 <form action="admin_edit2_product_type.php" method="post">  <table width="600" align="center" border="0"> 
 <tr> 
 <td width="150">แก้ไขประเภทสินค้า</td> 
 <td><input type="text" name="type_name" size="50"  
value="<?=$rs['type_name'] ?>"> 
<input type="hidden" name="type_id" value="<?=$rs['type_id'] ?>"></td>  </tr> 
 <tr> 
 <td width="150"></td> 
 <td><input type="submit" value="submit"> 
 <input type="button" value="back" onClick="history.back()"></td>  </tr> 
 </table> 
 </form> 
<?php 
 mysqli_close($conn); 
?> 
</body> 
</html>
