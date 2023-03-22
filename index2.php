<?php
 include('bootstrap.php');
if(!isset($_COOKIE['username'])){
    header('location: login.php');
}
    
?>

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
                    </a> ] <a href="logout.php">[ logout ]</a></p>
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
            <td width="550" align="center" valign="middle">
                <h2>ยินดีต้อนรับคุณ <?php echo $_COOKIE['username'] ?> เข้าสู่เว็บร้านค้า ออนไลน์</h2>
            </td>
        </tr>
    </table>
</body>

</html>