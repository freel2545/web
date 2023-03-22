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
    <p align="center">เพิ่มข้อมูลสินค้า </p>
    <form action="admin_add1_product.php" method="post" enctype="multipart/form-data">
        <table width="500" border="0" align="center" cellpadding="5">
            <tr>
                <td>ชื่อสินค้า</td>
                <td><input name="pname" type="text"></td>
            </tr>
            <tr>
                <td>ประเภทสินค้า</td>
                <td><select name="ptype">
                        <option value="" class="form-select"> -- เลือกข้อมูลประเภทสินค้า -- </option>
                        <?php
                        include "connect.php";
                        $sql = "select * from product_type";
                        $ex = mysqli_query($conn, $sql);
                        while ($rs = mysqli_fetch_array($ex)) {
                        ?>
                        <option value="<?php echo $rs['type_id'] ?>"><?php echo $rs['type_name'] ?></option>
                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top">รายละเอียดสินค้า </td>
                <td><textarea name="pdetail" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>ราคาสินค้า</td>
                <td><input name="pprice" type="text"></td>
            </tr>
            <tr>
                <td>รูปภาพของสินค้า</td>
                <td><input name="pimage" type="file"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="เพิ่มข้อมูล" class="btn btn-success"> <input type="reset" value="ยกเลิก" class="btn btn-danger"></td>
            </tr>
        </table>
        <p>&nbsp;</p>
    </form>
</body>

</html>