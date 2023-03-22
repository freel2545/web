<?php  include('bootstrap.php'); ?>

<html>

<head>
    <title> ระบบร้านค้าออนไลน์ </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body topmargin="0" leftmargin="0">
    <table width="850" border="0" cellpadding="10">
        <tr>
            <td width="260">
                <h1>ร้านค้าออนไลน์ </h1>
                <p>[ <a href="index.php">หน้าแรก</a> ] [ <a href="basket.php">ดูตะกร้าสินค้า
                    </a> ]</p>
            </td>
            <td width="550">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top">ประเภทสินค้า
                <?php 
 include "connect.php"; 
 include "type_menu.php"; 
 ?>
            </td>
            <td width="550">
                <table width="450" border="0" align="center" cellpadding="15">
                    <?php 
 $id = $_GET["id"]; 
 $sql = "select * from product where type_id = $id";  $ex = mysqli_query($conn, $sql); 
 while ($rs=mysqli_fetch_array($ex)) { 
 ?>
                    <tr>
                        <td width="100" valign="top"><img src="images/<?=$rs['product_image']?>" width="100"></td>
                        <td>
                            <?php 
 $product_id = $rs['product_id']; 
$code = sprintf("%05d", $product_id ); 
 ?>
                            <b> รหัสสินค้า : </b> <?=$code?> <br>
                            <b> ชื่อสินค้า : </b> <?=$rs['product_name']?><br>
                            <b> ราคา : </b> <?=$rs['product_price']?> บาท<br>
                            <br>
                            [ <a href=product_detail.php?id=<?=$rs['product_id']?>>แสดงรายละเอียด
                            </a>]
                            [ <a href=basket_add.php?id=<?=$rs['product_id']?>>หยิบใส่ตะกร้า</a> ]
                        </td>
                    </tr>
                    <?php 
} 
 ?>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>