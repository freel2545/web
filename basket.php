<?php
session_start();
include('connect.php');
include('bootstrap.php');
if(empty($_SESSION['sess_id']) and empty($_SESSION['sess_name']) and empty($_SESSION['sess_price']) and empty($_SESSION['sess_num'])){
    $_SESSION['sess_id'] = [];
    $_SESSION['sess_name'] = [];
    $_SESSION['sess_price'] = [];
    $_SESSION['sess_num'] = [];
}


$sess_id = $_SESSION['sess_id'];
// $sess_name = $_SESSION['sess_name'];
$sess_name = $_SESSION['sess_name'];
$sess_price = $_SESSION['sess_price'];
$sess_num = $_SESSION['sess_num'];
$total = 0;
// array_push($sess_name,"ddadad");
// print_r($sess_name);
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
            <h2>ตะกร้าสินค้า</h2>
        </div>
        <div class="card-body">
            <?php
            if (count($sess_id) == 0) {
                print "ยังไม่มีสินค้าอยู่ในตะกร้า <br>";
            } else {
            ?>
            <form action="basket_cal.php" method="post">
                <table border="1" class="table table-striped">
                    <thead>
                    <tr>
                        <th bgcolor="#CCCCCC" scope="col">ลบ</th>
                        <th bgcolor="#CCCCCC" scope="col">ชื่อสินค้า</th>
                        <th bgcolor="#CCCCCC" scope="col">จำนวน</th>
                        <th bgcolor="#CCCCCC" scope="col">ราคา</th>
                        <th bgcolor="#CCCCCC" scope="col">รวม</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        for ($i = 0; $i < count($sess_id); $i++) {
                            $total_unit = $sess_num[$i] * $sess_price[$i];
                            $total = $total + $total_unit;
                    ?>
                    <tr>
                        <td><input type=checkbox name="id_del[]"  value=<?=$sess_id[$i]?>></td> 
                        <td><?=$sess_name[$i]?></td> 
                        <td><input type=number name="id_add[]"  value=<?=$sess_num[$i]?> size=4></td> 
                        <td><?=$sess_price[$i]?></td> 
                        <td><?=$total_unit?></td> 
                    </tr>
<!-- "; -->
                    <?php
                        }
                        ?>
                    </tbody>
                </table>
                <p align="right">
                    <?php
                        echo "จำนวนเงินทั้งหมด $total บาท";
                        ?>
                    <br><br>
                    <a href="index.php" class="btn btn-secondary">กลับ</a>
                    <input type="submit" name="calculate" value="คำนวณใหม่" class="btn btn-dark"> <input type="submit" name="complete" value="สั่งซื้อสินค้า" class="btn btn-primary">
                </p>
            </form>
            <?php
            }
            ?>
        </td>
    </tr>
        </div>
    </div>
</div>
    
</body>

</html>