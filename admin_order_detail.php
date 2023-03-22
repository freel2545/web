<?php 
 session_start(); 
 include('bootstrap.php');
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
 include "admin_menu.php"; 
 $total = 0;
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <html> 
<body> 
<br><br> <center> รายละเอียดข้อมูลใบสั่งซื้อสินค้า</center><br> 
<?php 
 include "connect.php"; 
 $id = $_GET["id"]; 
 $sql = "select * from orders where order_id = $id"; 
 $ex = mysqli_query($conn, $sql); 
 $rs = mysqli_fetch_array($ex); 
 $code = sprintf("%05d", $rs['order_id']);
 ?> 
 <table width="700" border="0" align="center" cellpadding="5">  <tr> 
  <td width="150"><b>เลขที่ใบสั่งซื้อ</b></td>  
  <td><?=$code?></td> 
  </tr> 
  <tr> 
  <td><b>วันสั่งซื้อ</b></td>  
  <td><?=$rs["order_date"]?></td> 
  </tr> 
  <tr> 
  <td><b>ชื่อ - สกุล</b></td>  
  <td><?=$rs["order_name"]?></td> 
  </tr> 
  <tr> 
  <td><b>อีเมล์</b></td>  
  <td><?=$rs["order_email"]?></td> 
  </tr> 
  <tr> 
  <td><b>ที่อยู่</b></td>  
  <td><?=$rs["order_address"]?></td> 
  </tr> 
  <tr> 
  <td><b>เบอร์โทรศัพท์</b></td>  
  <td><?=$rs["order_phone"]?></td> 
  </tr> 
 </table> 
 <br><br> 
 <table width="700" border="1" align="center"> 
  <tr bgcolor="#00CCCC" align="center"> 
  <td>รหัสสินค้า</td> 
  <td>ชื่อสินค้า</td> 
  <td>จำนวน</td> 
  <td>ราคา</td> 
  <td>ราคารวม</td> 
  </tr> 
 <?php 
  $sql2 = "select * from product inner join order_detail where  product.product_id = order_detail.product_id and order_id = $id ";  $ex2 = mysqli_query($conn, $sql2); 
  while($rs2=mysqli_fetch_array($ex2)) { 
  $product_code = sprintf("%05d", $rs2['product_id']);  $total_unit = $rs2['order_number'] * $rs2['order_price'];
  $total += $total_unit; 
 ?> 
  <tr align="center"> 
  <td><?=$product_code?></td> 
  <td><?=$rs2['product_name']?></td> 
  <td><?=$rs2['order_number']?></td> 
  <td><?=$rs2['order_price']?></td> 
  <td><?=$total_unit?></td> 
  </tr> 
 <?php 
  }
  mysqli_close($conn); 
?> 
</table> 
<br><br> <center><b>จำนวนเงินทั้งหมด <?php echo $total?> บาท</b></center> <br> 
</body> 
</html>
