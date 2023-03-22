<?php
ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$user_login = $_POST["user"];
$passwd_login = $_POST["passwd"];
if(empty($user_login)AND empty($passwd_login)){
	echo "PLEASE KEY USER and Pass Again";
	echo "<meta http-equiv=\"refresh\" content=\"1;>
	url=login.php\">";
	exit();
	}else{
		include("connect.php");
		if(mysqli_connect_error()){
		echo "ไม่สามารถติดต่อฐานข้อมูลได้ : ".mysqli_connect_error();	
		}else{
		
		$sql = "SELECT*FROM $tbmember where username = '$user_login'and password = '$passwd_login'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
		 
		if($result){
		
		setcookie("username",$user_login,time()+36000);
		setcookie("password",$passwd_login,time()+36000);
		header("Location:index.php");
		ob_end_flush();
	}else{
		echo "คุณไม่ได้อยู่ในระบบครับ";
		echo "<meta http-equiv=\"refresh\" content=\"1;>
	url=login.php\">";
	}
	}
	}
?>
</body>
</html>