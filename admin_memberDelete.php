<?php
include "connect.php";
session_start();
if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))) {
    header("location:admin.htm");
    exit;
}
$id = $_GET["id"];
$sql_del = "SELECT * from member where member_id=$id";
$ex_del = mysqli_query($conn, $sql_del);
$rs_del = mysqli_fetch_array($ex_del);
$sql = "delete from member where member_id=$id";
$ex = mysqli_query($conn, $sql);
if ($ex) {
    // echo "<meta http-equiv=„refresh' content=„0; url=admin_product.php'>";
    header('location: admin_member.php');
} else {
    echo "<h3>ไม่สามารถลบข้อมูลประเภทสินค้านี้ได้</h3>";
}
mysqli_close($conn);
