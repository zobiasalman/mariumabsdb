<?php 
 $conn = mysqli_connect("localhost", "root", "", "mysql"); 
$id=isset($_POST["id"])?$_POST["id"]:"";
 $sql = "DELETE FROM SALESORDER13165 WHERE ORDERNO = $id"; 
 if(mysqli_query($conn, $sql)) 
 { 
 echo 'Data Deleted Successfully!'; 
 } 
 ?>