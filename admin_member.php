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
                <td>รหัสลูกค้า</td>
                <td>ชื่อ</td>
                <td>นามสกุล</td>
                <td>อีเมล</td>
                <td>ที่อยู่</td>
                <td>เบอร์โทรศัพท์</td>
                <td>ชื่อผู้ใช้</td>
                <td>รหัสผาน</td>
                <td colspan="2">จัดการ</td>
            </tr>
            <?php
            include("connect.php");
            $sql = "select * from member";
            $ex = mysqli_query($conn, $sql);
            while($rs = mysqli_fetch_array($ex)) {
            ?>
                <tr align="center">
                    <td><?= $rs['member_id'] ?></td>
                    <td><?= $rs['fname'] ?></td>
                    <td><?= $rs['lname'] ?></td>
                    <td><?= $rs['email'] ?></td>
                    <td><?= $rs['address'] ?></td>
                    <td><?= $rs['tel'] ?></td>
                    <td><?= $rs['username'] ?></td>
                    <td><?= $rs['password'] ?></td>
                    <td><a href=admin_memberEdit.php?id=<?= $rs['member_id'] ?> class="btm btn-primary">แก้ไข
                        </a></td>
                    <td><a href=admin_memberDelete.php?id=<?= $rs['member_id'] ?> onclick="return confirm('ยืนยันการลบข้อมูล?')" class="btn btn-danger">ลบ</a></td>
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