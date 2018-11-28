<?php
 $connect = mysqli_connect("localhost", "root", "Abcd#1234", "mysql"); 
$id=isset($_POST["id"])?$_POST["id"]:"";
$text=isset($_POST["text"])?$_POST["text"]:"";
$column_name=isset($_POST["column_name"])?$_POST["column_name"]:"";
$query = "UPDATE SALESORDER13165 SET ".$column_name."='".$text."' WHERE ORDERNO='".$id."'";
if($column_name=='CODE'){
	$res = mysqli_query($connect, "SELECT PRICE FROM PRODUCTS13165 WHERE CODE='".$text."'");
	$row = mysqli_fetch_array($res);
	mysqli_query($connect, "UPDATE SALESORDER13165 SET RATE='".$row['PRICE']."' WHERE ORDERNO='".$id."'");
}  
if(mysqli_query($connect, $query))
 {
      mysqli_query($connect, "UPDATE SALESORDER13165 SET AMOUNT=RATE*QUANTITY WHERE ORDERNO='".$id."'");
  echo 'Data Updated';
 }
