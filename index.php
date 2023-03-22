<?php
session_start();
include('connect.php');
if(!isset($_COOKIE['username'])){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">ONLINE SHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo $_SERVER['PHP_SELF']; ?>">หน้าแรก</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ประเภทสินค้า</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?list=0">สินค้าทั้งหมด</a></li>
                                <li><hr class="dropdown-divider" /></li>

                                <?php 
                                    $sqlproductlist = "select * from product_type;";  $sqlproductlistex = mysqli_query($conn, $sqlproductlist); 
                                    while ($rslist=mysqli_fetch_array($sqlproductlistex)) { 
                                ?>
                                <li><a class="dropdown-item" href="index.php?list=<?=$rslist['type_id'] ?>"><?=$rslist['type_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                            <li class="nav-item"><a class="nav-link" aria-current="page" href="logout.php">ออกจากระบบ</a></li>
                        </li>
                    </ul>
                    <form class="d-flex">
                        
                        <a href="basket.php" class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            สินค้าในรถเข็น
                            <?php
                                if(isset($_SESSION['sess_id'])){
                                    $sess_id = $_SESSION['sess_id'];
                                }
                                
                            ?>
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php
                                if(isset($sess_id)){
                                    echo count($sess_id); 
                                }else{
                                    echo "0"; 
                                }
                                ?>
                            </span>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">ยินดีต้อนรับ</h1>
                    <p class="lead fw-normal text-white-50 mb-0"><?php echo $_COOKIE['username'] ?></p>
                </div>
            </div>
        </header>
        <!-- Section-->
        
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php 
                $sql = "select * from product;";  $ex = mysqli_query($conn, $sql); 
                if(isset($_GET['list'])){
                    if($_GET['list'] == 0){
                        $sql = "select * from product;";  $ex = mysqli_query($conn, $sql); 
                    }else{
                        $listnumber = $_GET['list'];
                        $sql = "SELECT * FROM product WHERE type_id = $listnumber;";  $ex = mysqli_query($conn, $sql); 
                    }
                }
                
                
                while ($rs=mysqli_fetch_array($ex)) { 
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="images/<?=$rs['product_image']?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?=$rs['product_name']?></h5>
                                    <!-- Product price-->
                                    <?=$rs['product_price']?> บาท
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="row">
                                    <div class="col">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="product_detail2.php?id=<?=$rs['product_id']?>">ดูรายละเอียด</a></div>
                                    
                                    </div>
                                    <div class="col">
                                    <div class="text-center"><a class="btn btn-dark mt-auto" href="basket_add.php?id=<?=$rs['product_id']?>">สั่งซื้อสินค้า</a></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; ONLINE SHOP 2022 <br><a href="admin.htm" class="m-0 text-center text-white">ผู้ดูแลระบบ</a></p> 
                
            </div>
        </footer>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
