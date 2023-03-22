<?php
session_start();
include('bootstrap.php');
$sess_id = $_SESSION['sess_id'];
$sess_name = $_SESSION['sess_name'];
$sess_price = $_SESSION['sess_price'];
$sess_num = $_SESSION['sess_num'];
$total = 0;
?>
<html>

<head>
    <title> ระบบร้านค้าออนไลน์ </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body topmargin="0" leftmargin="0">
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>ใบสั่งซื้อสินค้า</h2>
        </div>
        <div class="card-body">
        <?php
                if (count($sess_id) == 0) {
                    print "ยังไม่มีสินค้าอยู่ในตะกร้า <br>";
                } else {
                ?>
    <form action="product_order2.php" method="post">
        <h3 align="center">  </h3>
        <table width="550" border="0" cellpadding="5">
            <tr>
                <td class="form-label"> ชื่อ - สกุล </td>
                <td> <input type="text" name="name" size="40" class="form-control"></td>
            </tr>
            <tr>
                <td>อีเมล์ </td>
                <td> <input type="text" name="email" size="40" class="form-control"> </td>
            </tr>
            <tr>
                <td> เบอร์โทรศัพท์ </td>
                <td> <input type="text" name="phone" size="20" class="form-control"> </td>
            </tr>
            <tr>
                <td valign="top"> ที่อยู่ </td>
                <td valign="top"> <textarea name="address" cols="40" rows="4"  class="form-control"></textarea></td>
            </tr>
        </table>
        <br><br>
        <table border="1" class="table table-striped">
            <tr>
                <th bgcolor="#CCCCCC">รหัสสินค้า</th>
                <th bgcolor="#CCCCCC">ชื่อสินค้า</th>
                <th bgcolor="#CCCCCC">จำนวน</th>
                <th bgcolor="#CCCCCC">ราคา</th>
                <th bgcolor="#CCCCCC">รวม</th>
            </tr>
            <?php
                            for ($i = 0; $i < count($sess_id); $i++) {
                                $total_unit = $sess_num[$i] * $sess_price[$i];
                                $total = $total + $total_unit;
                                $code = sprintf("%05d", $sess_id[$i]);
                                echo " 
                        <tr> 
                        <td>$code</td> 
                        <td>$sess_name[$i]</td> 
                        <td>$sess_num[$i]</td> 
                        <td>$sess_price[$i]</td> 
                        <td>$total_unit</td> 
                        </tr> ";
                            }
                            ?>
        </table>
        <p align="left">
            <br>
            <?php
                            echo "จำนวนเงินทั้งหมด $total บาท";
                            ?>
            <br><br>
            <input type="submit" value="ยืนยันการสั่งซื้อสินค้า" class="btn btn-success">
            <input type="reset" value="ยกเลิก" class="btn btn-danger">
            <input type="hidden" name="total_order" value="<?= $total ?>">
        </p>
    </form>
    <?php
                }
                ?>
        </div>
    </div>
</div>
    
</body>

</html>