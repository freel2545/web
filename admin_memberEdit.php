<?php  
 include "connect.php"; 
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
 include "admin_menu.php"; 
  
 $id = $_GET["id"]; 
 $sql = "select * from member where member_id=$id"; 
 $ex = mysqli_query($conn, $sql); 
 $rs = mysqli_fetch_array($ex); 
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <html> 
<body><br><br> 
 <form action="admin_memberEdit2.php" method="post">  <table width="600" align="center" border="0"> 
 <tr> 
<center><h3>แก้ไขข้อมูล</h3></center>
 <td width="150">ชื่อ</td> 
 <td><input type="text" name="fname" size="50"  
value="<?=$rs['fname'] ?>"> 
<input type="hidden" name="member_id" value="<?=$rs['member_id'] ?>"></td>  
</tr> 
<tr>
<td width="150">นามสกุล</td> 
 <td><input type="text" name="lname" size="50"  
value="<?=$rs['lname'] ?>"> 
</tr> 
<tr>
<td width="150">อีเมล</td> 
 <td><input type="text" name="email" size="50"  
value="<?=$rs['email'] ?>"> 
</tr> 
<tr>
<td width="150">ที่อยู่</td> 
 <td><input type="text" name="address" size="50"  
value="<?=$rs['address'] ?>"> 
</tr> 
<tr>
<td width="150">เบอร์โทรศัพท์</td> 
 <td><input type="text" name="tel" size="50"  
value="<?=$rs['tel'] ?>"> 
</tr> 
<tr>
<td width="150">ชื่อผู้ใช้</td> 
 <td><input type="text" name="username" size="50"  
value="<?=$rs['username'] ?>"> 
</tr> 
<tr>
<td width="150">รหัสผ่าน</td> 
 <td><input type="text" name="password" size="50"  
value="<?=$rs['password'] ?>"> 
</tr> 


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
