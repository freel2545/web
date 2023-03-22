<?php
$hostname = "localhost"; 
$username_db = "root"; 
$password_db = ""; //หรัส
$dbname = "webcommerce"; //ชื่อฐานข้อมูล
$conn = mysqli_connect($hostname,$username_db,$password_db); 
$tbmember = "member"; //คารางชื่อผู้ใช้
if (!$conn) 
die("cann't connect MySQL"); 
mysqli_select_db ($conn, $dbname) 
or die ("can't select database");

?>


