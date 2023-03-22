<?php  
 session_start(); 
 include('bootstrap.php');
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
  
 include "admin_menu.php"; 
 include "connect.php"; 
 $id = $_GET["id"]; 
 $sql = "select * from product where product_id = $id"; 
 $ex = mysqli_query($conn,$sql); 
 $rs=mysqli_fetch_array($ex); 
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <html> 
<body><br><br> 
<p align="center">แก้ไขข้อมูลสินค้า </p> 
<form action="admin_edit2_product.php" method="post"  
enctype="multipart/form-data"> 
 <table width="500" border="0" align="center" cellpadding="5">  <tr> 
 <td>ชื่อสินค้า</td> 
 <td><input name="pname" type="text"  
value="<?=$rs['product_name']?>"></td> 
 </tr> 
 <tr> 
 <td>ประเภทสินค้า</td> 
 <td><select name="ptype" > 
<option value=""> -- เลือกข้อมูลประเภทสินค้า -- </option>
<?php 
 $sql_type = "select * from product_type"; 
 $ex_type = mysqli_query($conn, $sql_type); 
 while ($rs_type=mysqli_fetch_array($ex_type)) { 
 if ($rs_type['type_id'] == $rs['type_id']) { 
?> 
<option value="<?=$rs_type['type_id']?>"  
selected><?=$rs_type['type_name']?></option> 
<?php 
 } else { 
?> 
 <option  
value="<?=$rs_type['type_id']?>"><?=$rs_type['type_name']?></option> <?php 
 } 
 } 
?> 
 </select> 
 </td> 
 </tr> 
 <tr> 
 <td valign="top">รายละเอียดสินค้า </td> 
 <td><textarea name="pdetail"  
rows="5" ><?=$rs['product_detail']?></textarea></td> 
 </tr> 
 <tr> 
 <td>ราคาสินค้า</td> 
 <td><input name="pprice" type="text"  
value="<?=$rs['product_price']?>"></td> 
 </tr> 
 <tr> 
 <td valign="top">รูปภาพของสินค้า</td> 
 <td><img src="images/<?=$rs['product_image']?>" width="100"><br><br>  <input name="pimageold" type="hidden"  
value="<?=$rs['product_image']?>"> 
 <input name="pimage" type="file"></td> 
 </tr> 
 <tr> 
 <td>&nbsp;</td> 
 <td><input type="hidden" name="pid" value="<?=$rs['product_id']?>">  <input type="submit" value="แก้ไขข้อมูล" class="btn btn-primary"> <input type="button"  value="ยกเลิก" onClick="history.back(0)" class="btn btn-danger"></td> 
 </tr> 
 </table> 
 <p>&nbsp;</p> 
</form> 
<?php 
 mysqli_close($conn); 
?> 
</body> 
</html>
