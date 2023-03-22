<?php  include('bootstrap.php'); 
include('connect.php');
?>

<!-- Button trigger modal -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="card">
        <div class="card-header">
            <h2>รายละเอียดสินค้า</h2>
        </div>
        <div class="card-body">
        <?php
                    $id = $_GET["id"];
                    $sql = "select * from product where product_id = $id";
                    $ex = mysqli_query($conn,$sql);
                    while ($rs = mysqli_fetch_array($ex)) {
                    ?>
                        <tr>
                            <td width="100" valign="top"><img src="images/<?= $rs['product_image'] ?>" width="200">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                $product_id = $rs['product_id'];
                                $code = sprintf("%05d", $product_id);
                                ?>
                                <br>
                                <b> รหัสสินค้า : </b> <?= $code ?> <br>
                                <b> ชื่อสินค้า : </b> <?= $rs['product_name'] ?><br>
                                <b> ราคา : </b> <?= $rs['product_price'] ?> บาท<br>
                                <b> รายละเอียด : </b> <br> <?= $rs['product_detail'] ?> <br>
                                <br>
                                <a href="index.php"class="btn btn-secondary">ย้อนกลับ</a>
                                <a href=basket_add.php?id=<?= $rs['product_id'] ?> class="btn btn-primary">หยิบใส่ตะกร้า</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
        </div>
    </div>
    </div>

</body>
</html>
                    
