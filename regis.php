<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$username = $_POST["username"];
$password = $_POST["password"];

include("connect.php");
$sql ="select*from $tbmember";
	$query = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	$customid = $num +1;
	echo $customid;
$reg = "INSERT INTO `$tbmember` (`member_id`, `fname`, `lname`, `email`, `address`, `tel`, `username`, `password`) VALUES ('$customid', '$fname', '$lname', '$email', '$address', '$tel', '$username', '$password')";
$result = mysqli_query($conn,$reg);
if($result){
	echo "บันทึกข้อมูลเรียบร้อยแล้ว";
	echo "<meta http-equiv=\"refresh\" content=\"5
	url=login.php\">";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้";
	echo "<meta http-equiv=\"refresh\" content=\"5
	url=login.php\">";
}
mysqli_close($conn);
?>
</body>
</html>