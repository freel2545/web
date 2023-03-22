<?php
ob_start();
setcookie("username");
setcookie("password");
header("location:login.php");
?>