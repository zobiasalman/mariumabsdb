<?php  

 $ORDERNO='';
 $CID='';
 $DATE='';
 $ID='';
 $CODE='';
 $QUANTITY='';
 $RATE='';
 $AMOUNT='';
 $connect = mysqli_connect("localhost", "root", "Abcd#1234", "mysql");  
 $res = mysqli_query($connect, "SELECT PRICE FROM PRODUCTS13165 WHERE CODE='$CODE'");
 $row = mysqli_fetch_array($res);
 $sql= "INSERT INTO SALESORDER13165(ORDERNO,CID,DATE,ID,CODE,QUANTITY,RATE,AMOUNT) VALUES ('$ORDERNO','$CID','$DATE','$ID','$CODE','$QUANTITY','$RATE','$AMOUNT')";
 /*$sql = "INSERT INTO SALESORDER13165 VALUES('".$_POST["ORDERNO"]."', '".$_POST["CID"]."', '".$_POST["DATE"]."', '".$_POST["ID"]."', '".$_POST["CODE"]."', '".$_POST["QUANTITY"]."', '".$row["RATE"]."', '".$_POST["AMOUNT"]."')"; */ 
 if(mysqli_query($connect, $sql))  
 {  
      mysqli_query($connect, "UPDATE SALESORDER13165 SET AMOUNT=RATE*QUANTITY WHERE ORDERNO='".$_POST["ORDERNO"]."'");
      echo 'Data Inserted';  
 }  
 ?> 
