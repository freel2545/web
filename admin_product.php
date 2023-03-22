<?php
session_start();
include('bootstrap.php');
if ((empty($_SESSION["username"])) or (empty($_SESSION["password"]))) {
    header("location:admin.htm");
    exit;
}

include "admin_menu.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>

<body><br><br>
<div class="container">
    
<p align="center">แสดงข้อมูลสินค้า</p>
    <table width="700" border="1" align="center" class="table table-striped">
        <tr bgcolor="#00CCCC" align="center">
            <td>รหัสสินค้า</td>
            <td>ชื่อสินค้า</td>
            <td>ประเภทสินค้า</td>
            <td>ราคา</td>
            <td>รูปภาพ</td>
            <td>แก้ไข</td>
            <td>ลบ</td>
        </tr>
        <?php
        include("connect.php");
        $sql = "select * from product inner join product_type where  product.type_id = product_type.type_id order by product_id desc";
        $ex = mysqli_query($conn, $sql);
        while($rs = mysqli_fetch_array($ex)) {
        ?>
        

        </div>
            <tr align="center">
                <td><?= $rs['product_id'] ?></td>
                <td><?= $rs['product_name'] ?></td>
                <td><?= $rs['type_name'] ?></td>
                <td><?= $rs['product_price'] ?></td>
                <td><img src="images/<?= $rs['product_image'] ?>" width="80"></td>
                <td><a href=admin_edit1_product.php?id=<?= $rs['product_id'] ?> class="btn btn-primary">แก้ไข
                    </a></td>
                <td><a href=admin_delete_product.php?id=<?= $rs['product_id'] ?> onclick="return confirm('ยืนยันการลบข้อมูล?')" class="btn btn-danger">ลบ</a></td>
            </tr>
        <?php
        }
        mysqli_close($conn);
        ?>
    </table>
    <p>&nbsp;</p>
</div>
    
</body>

</html>