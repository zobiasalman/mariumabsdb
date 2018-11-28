<?php  
 $connect = mysqli_connect("localhost", "root", "Abcd#1234", "mysql"); 
 if (isset($_POST["del"]))
	 $id = $_POST['$id'];
 

   $sql = "DELETE FROM SALESORDER13165 WHERE ORDERNO =id"; 
  if(mysqli_query($connect, $sql))

 {  
      echo 'Data Successfully Deleted';  
 }  
 
 ?>
