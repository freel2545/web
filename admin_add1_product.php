<?php
session_start();
if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))) {
    header("location:admin.htm");
    exit();
}
include "connect.php";

$name = $_POST["pname"];
$type = $_POST["ptype"];
$detail = $_POST["pdetail"];
$price = $_POST["pprice"];
$pic = $_FILES["pimage"];

if ($name == "") {
    echo "กรุณากรอกชื่อสินค้า";
    exit();
} else if ($type == "") {
    echo "กรุณาเลือกประเภทสินค้า";
    exit();
} else if (empty($detail)) {
    echo "กรุณากรอกรายละเอียดของสินค้า";
    exit();
} else if ($price == "") {
    echo "กรุณากรอกราคาสินค้า";
    exit();
} else if (empty($pic["size"])) {
    echo "กรุณาเลือกรูปภาพใหม่ หรือรูปภาพที่เลือกไม่ถูกประเภท";
    exit();
}
$sql = "INSERT into product (product_id, product_name, type_id,  product_detail, product_price, product_image) values ('', '$name', $type,  '$detail', $price, '')";
mysqli_query($conn, $sql)
    or die("ไม่สามารถเพิ่มข้อมูลสินค้าใหม่ได้<br>" . mysqli_error($conn));
$sqlmax = "select max(product_id) from product";
$ex = mysqli_query($conn,$sqlmax);
$row = mysqli_fetch_row($ex);
$filename = $pic["name"];
$filetemp = $pic["tmp_name"];



$tmp = explode('.', $filename);
$fileExtension = strtolower(end($tmp));
$filename = $row[0] . "." . $fileExtension;

// $ext = strtolower(end(explode('.', $filename)));
// $filename = $row[0] . "." . $ext;

copy($filetemp, "images/" . $filename);
$sql_update = "UPDATE product set product_image='$filename' where  product_id=$row[0]";
mysqli_query($conn, $sql_update);
mysqli_close($conn);
include "admin_menu.php";
echo "<center><h1>ทำการเพิ่มข้อมูลสินค้าใหม่เรียบร้อยแล้ว</h1></center>";
