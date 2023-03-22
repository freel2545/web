<?php  
 include "connect.php"; 
  
 session_start(); 
 if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))){  header("location:admin.htm"); 
 exit; 
 } 
  
//  $tid = $_POST["type_id"]; 
 $member_id = $_POST['member_id'];
 $fname = $_POST["fname"]; 
 $lname = $_POST["lname"]; 
 $email = $_POST["email"]; 
 $address = $_POST["address"]; 
 $tel = $_POST["tel"]; 
 $username = $_POST["username"]; 
 $password = $_POST["password"]; 
  
 if($member_id ==""){ 
 echo "<h3>กรุณากรอกข้อมูล</h3>"; 
 exit(); 
 } 
 $sql = "update member set 
 
 fname = '$fname',
 lname = '$lname',
 email = '$email',
 address = '$address',
 tel = '$tel',
 username = '$username',
 password = '$password'
 where member_id=$member_id";  $ex = mysqli_query($conn, $sql); 
 if($ex){ 
 echo "<meta http-equiv='refresh' content='0;  
url=admin_member.php'>"; 
 } else { 
 echo "<h3>ไม่สามารถทำการแก้ไขข้อมูลประเภทสินค้าได้</h3>";
 header('location: admin_member.php');
 } 
 mysqli_close($conn);  
?>
