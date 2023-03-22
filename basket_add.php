<?php

 session_start(); 
 include('bootstrap.php');
 $id = $_GET["id"]; 
//  session_register("sess_id"); 
//  session_register("sess_name"); 
//  session_register("sess_price"); 
//  session_register("sess_num"); 
// if(!isset($sess_id) and !isset($sess_name) and !isset($sess_price) and !isset($sess_num)){
//     $_SESSION['sess_id'] = [];
//     $_SESSION['sess_name'] = [];
//     $_SESSION['sess_price'] = [];
//     $_SESSION['sess_num'] = [];
//     echo "UNINSET";
// };

$sess_id = $_SESSION['sess_id'];
$sess_name = $_SESSION['sess_name'];
$sess_price = $_SESSION['sess_price'];
$sess_num = $_SESSION['sess_num'];
  




 if (count($sess_id) == "0") { 
 $check = 1;  
} else if (!in_array($id, $sess_id)) { 
 $check = 1; 
} 
if ($check == 1) { 
 include "connect.php"; 
 $sql = "SELECT * from product where product_id = '$id'";  $ex = mysqli_query($conn, $sql); 
 $rs = mysqli_fetch_array($ex); 
 array_push($_SESSION['sess_id'],$rs['product_id']);
 array_push($_SESSION['sess_name'],$rs['product_name']);
 array_push($_SESSION['sess_price'],$rs['product_price']);
 array_push($_SESSION['sess_num'], 1);
} 
 echo "<meta http-equiv='refresh' content='0; url=basket.php'>";

print_r($_SESSION['sess_name']);
