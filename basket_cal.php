<?php 
 session_start(); 

 if(isset($_POST['id_del'])){
    $id_del = $_POST['id_del'];
 }else{
    $id_del = [];
 }

$id_add = $_POST['id_add'];
print_r($id_add);

 $sess_id = $_SESSION['sess_id'];
 $sess_name = $_SESSION['sess_name'];
 $sess_price = $_SESSION['sess_price'];
 $sess_num = $_SESSION['sess_num'];


//  if (count($id_del) == 0){ 
//  $id_del = array(); 
//  } 
 for ($i=0; $i<count($sess_id); $i++){ 
 if(!in_array($sess_id[$i],$id_del)){ 
 $temp_id[] = $sess_id[$i]; 
 $temp_name[] = $sess_name[$i]; 
 $temp_price[] = $sess_price[$i]; 
 $temp_num[] = $id_add[$i]; 
 } 
 } 
 $_SESSION['sess_id'] = $temp_id; 
 $_SESSION['sess_name'] = $temp_name; 
 $_SESSION['sess_price'] = $temp_price; 
 $_SESSION['sess_num'] = $temp_num;


// print($sess_num);

print_r($temp_num);

//  if($calculate) {  
//     header("location:basket.php") ; 
//     } else if ($complete){ 
//     header("location:product_order.php"); 
//     } 


    
 if(isset($_POST['calculate'])){
      //   header("Location:basket.php");
        echo "<meta http-equiv='refresh' content='0; url=basket.php'>";
    } else if(isset($_POST['complete'])){ 
      
      //   header("Location:product_order.php");
        echo "<meta http-equiv='refresh' content='0; url=product_order.php'>";
    }
