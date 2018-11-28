<?php  
 $connect = mysqli_connect("localhost", "root", "", "mysql"); 
$ORDERNO=isset($_POST["ORDERNO"])?$_POST["ORDERNO"]:"";
$CID=isset($_POST["CID"])?$_POST["CID"]:"";
$DATE=isset($_POST["DATE"])?$_POST["DATE"]:"";
$ID=isset($_POST["ID"])?$_POST["ID"]:"";
$CODE=isset($_POST["CODE"])?$_POST["CODE"]:"";
$QUANTITY=isset($_POST["QUANTITY"])?$_POST["QUANTITY"]:"";
$RATE=isset($_POST["RATE"])?$_POST["RATE"]:"";
$AMOUNT=isset($_POST["AMOUNT"])?$_POST["AMOUNT"]:"";

 $res = mysqli_query($connect, "SELECT PRICE FROM PRODUCTS13165 WHERE CODE='$CODE'");
 $row = mysqli_fetch_array($res);     
$RATE=$row["PRICE"];
 $sql = "INSERT INTO SALESORDER13165 VALUES('$ORDERNO','$CID','$DATE','$ID','$CODE','$QUANTITY','$RATE','$AMOUNT')";  
 if(mysqli_query($connect, $sql))  
 {  
      mysqli_query($connect, "UPDATE SALESORDER13165 SET AMOUNT=($RATE*$QUANTITY) WHERE ORDERNO='".$_POST["ORDERNO"]."'");
      echo 'Data Inserted';  
 }  
 ?>