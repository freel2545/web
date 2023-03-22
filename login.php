<?php
ob_start();
include("bootstrap.php");
if(isset($_COOKIE["username"])){
  $cookie_username = $_COOKIE["username"];
}
if(isset($_COOKIE["password"])){
  $cookie_password = $_COOKIE["password"];
}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
if(empty($cookie_username)AND empty($cookie_password)){
?>
<form name="form1" action="login_db.php" method="post">
<!-- <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center">ล็อคอินเข้าสู่ระบบ</td>
    </tr>
  <tr>
    <td width="250">User</td>
    <td width="250">
    <label for="textfield"></label>
      <input type="text" name="user" id="textfield"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
    <label for="textfield2"></label>
      <input type="text" name="passwd" id="textfield2"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="เข้าระบบ"></td>
  </tr>
</table> -->

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2>USER LOGIN</h2>
                    </div>
                    <div class="card-body">
                        <form name="form1" action="login_db.php" method="POST">
                            <label for="username">ชื่อผู้ใช้</label>
                            <input type="text" name="user" class="form-control" id="username" required>
                            <label for="password">รหัสผ่าน</label>
                            <input type="password" name="passwd" class="form-control" id="password" required>
                            <button name="button" type="submit" class="btn btn-success form-control mt-2">เข้าสู่ระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</form>
<br>
<center>
<a href="register.php">สมัครสมาชิก</a> ||
<a href="admin.htm" class="m-0 text-center">ผู้ดูแลระบบ</a>
</center>
<?php
}else{
?>
<!-- 
<center>
<?php
include("connect.php");
include("name.php");

header("location: index.php")

?>
<center>
<a href="edit_member.php">แก้ไขสมาชิก </a> |
<a href="../webboard/new_topic.php">webboard </a> |
<a href="cookie_2.php">cookie_2</a> | <a href="logout_cookie.php">logout</a>
</center> -->

<?php
}
?>
</body>
