<?php

$sql = "SELECT * from product_type"; 
$ex = mysqli_query($conn, $sql); 
echo "<ul>"; 
while ($rs=mysqli_fetch_array($ex)){ 
 echo "<li><a href=product_list.php?id=$rs[type_id]>$rs[type_name]</li>"; } 
?>
