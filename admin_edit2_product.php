<?php
include "connect.php";
session_start();
if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))) {
    header("location:admin.htm");
    exit;
}
$id = $_POST["pid"];
$name = $_POST["pname"];
$type = $_POST["ptype"];
$detail = $_POST["pdetail"];
$price = $_POST["pprice"];
$pic = $_FILES["pimage"];
$oldpic = $_POST["pimageold"];
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
}
if (empty($pic["size"])) {
    $filename = $oldpic;
} else {
    $filename = $oldpic;
    unlink("images/$filename");
    $filetemp = $pic["tmp_name"];
    copy($filetemp, "images/" . $filename);
}

$sql = "INSERT INTO product (product_id, product_name, type_id,  product_detail, product_price, product_image) values ('', '$name', '$type','$detail', $price, ,'$filename')";
$sql = "UPDATE product 
 set product_name = '$name',
    type_id = '$type',
    product_detail = '$detail',
    product_price = $price,
    product_image = '$filename' 
    WHERE product_id = $id";

$ex = mysqli_query($conn, $sql);
if ($ex) {
    echo "<meta http-equiv='refresh' content='0;  
url=admin_product.php'>";
} else {
    echo "<h3>ไม่สามารถทำการแก้ไขข้อมูลสินค้าได้</h3>" . mysqli_error($conn);
}
mysqli_close($conn);
