<?php 
 session_start(); 
 include('bootstrap.php');
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
 include "admin_menu.php"; 
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <html> 
<body><br><br> 
 <form action="admin_add_product_type.php" method="post">  <table width="500" align="center" border="0"> 
 <tr> 
 <td width="200">เพิ่มข้อมูลประเภทสินค้า</td> 
 <td><input type="text" name="product_type" size="30"></td>  </tr> 
 <tr> 
 <td width="150"></td> 
 <td><input name="Submit" type="submit" value="เพิ่มข้อมูล">  <input name="Reset" type="reset" value="ยกเลิก"></td> 
 </tr> 
 </table> 
</form> 
<br><br> 
<?php 
 $no = 0; 
 include "connect.php";
 $sql = "select * from product_type"; 
 $ex = mysqli_query($conn, $sql); 
//  $result = mysqli_db_query($dbname,$sql); 
//  $num = mysqli_num_rows($result);
$num = mysqli_num_rows($ex);
// $result = mysqli_fetch_assoc($query);

if($num>0){ 
    $show = "<div class='container'><table width=600 cellpadding=4 align=center border class='table table-striped'></div>";  $show .= "<tr bgcolor=#00CCCC align=center><td>ลำดับ</td><td> ประเภทสินค้า  </td><td> แก้ไข</td><td> ลบ</td></tr>"; 
    while ($rs = mysqli_fetch_array($ex)){ 
    $show .= "<td align=center>$rs[type_id]</td>"; 
    $show .= "<td> $rs[type_name] </td>"; 
    $show .= "<td align=center><a  
   href=admin_edit1_product_type.php?id=$rs[type_id] class='btn btn-primary'>แก้ไข</a></td>"; 
    $show .= "<td align=center><a  
   href=admin_delete_product_type.php?id=$rs[type_id] onclick=\"return  confirm('ยืนยันการลบข้อมูล?')\" class='btn btn-danger'>ลบ</a></td>"; 
    $show .= "</tr>"; 
    } 
    $show .= "</table>"; 
    echo $show; 
   } 
    mysqli_close($conn); 
   ?> 
   </body> 
   </html>
   