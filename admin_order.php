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

<body>
    <br><br>
    <center> ข้อมูลใบสั่งซื้อสินค้า</center><br>
    <?php
    include "connect.php";
    $sql = "select * from orders";
    $ex = mysqli_query($conn, $sql);
    //  $result = mysql_db_query($dbname, $sql); 
    // $result = mysqli_result($conn)
    $num = mysqli_num_rows($ex);

    if ($num > 0) {
        $show = "<table width=600 cellpadding=4 align=center border class='talble table-hover'>";
        $show .= "<tr bgcolor=#00CCCC align=center><td>เลขที่ใบสั่ง</td><td>ชื่อ - สกุล </td><td> เบอร์โทรศัพท์</td><td>ราคารวม</td><td> ลบ</td></tr>";
        while ($rs = mysqli_fetch_array($ex)) {
            $code = sprintf("%05d", $rs['order_id']);
            $show .= "<td align=center><a  
href=admin_order_detail.php?id=$rs[order_id]>$code</a></td>";
            $show .= "<td> $rs[order_name] </td>";
            $show .= "<td> $rs[order_phone] </td>";
            $show .= "<td> $rs[order_total] </td>";
            $show .= "<td align=center><a
 href=admin_order_delete.php?id=$rs[order_id] onclick=\"return confirm('ยืนยัน การลบข้อมูลใบสั่งซื้อเลขที่ $code หรือไม่?')\" class='btn btn-danger'>ลบ</a></td>";
            $show .= "</tr>";
        }
        $show .= "</table>";
        echo $show;
    }
    mysqli_close($conn);
    ?>
</body>

</html>