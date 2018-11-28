<?php  
 $connect = mysqli_connect("localhost", "root", "Abcd#1234", "mysql");  
 $id="";
 /*if (isset($_POST["UPDATE"]))*/
 $id = mysqli_real_escape_string($connect,$_POST["$id"]);
 $id = $_POST['$id'];  
 $text = $_POST['$text'];  
 $column_name = $_POST['$column_name'];
 
 $sql = "UPDATE SALESORDER13165 SET column_name='$text' WHERE ORDERNO='$id'"; 
 if($column_name=='CODE'){
	$res = mysqli_query($connect, "SELECT PRICE FROM PRODUCTS13165 WHERE CODE='$text'");
	$row = mysqli_fetch_array($res);
	mysqli_query($connect, "UPDATE SALESORDER13165 SET RATE='$PRICE' WHERE ORDERNO='$id'");
 } 
 if(mysqli_query($connect, $sql))  
 {  
      mysqli_query($connect, "UPDATE SALESORDER13165 SET AMOUNT=RATE*QUANTITY WHERE ORDERNO='$id'");
      echo 'Data Successfully Updated';  
 }  
 ?>
 
