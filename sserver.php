<?php 
session_start();

$ID = "";
$NAME= "";
$CONTACT = "";
$LIST = "";
$edit_state = false;
$db= mysqli_connect('localhost', 'root', 'marium95', 'mysql');

if(isset ($_POST['save'])){
$ID = $_POST['ID'];
$NAME =  $_POST['NAME'];  
$CONTACT =  $_POST['CONTACT'];
$LIST =  $_POST['LIST'];
$query = "INSERT INTO salesperson13165(ID, NAME, CONTACT, LIST) VALUES('$ID', '$NAME', '$CONTACT', '$LIST')";
mysqli_query($db, $query);
header('location: salesperson.php');
}

if (isset($_POST['update'])) {
	$ID = mysqli_real_escape_string($db,$_POST['ID']);
	$NAME = mysqli_real_escape_string($db,$_POST['NAME']);
	$CONTACT = mysqli_real_escape_string($db,$_POST['CONTACT']);
	$LIST = mysqli_real_escape_string($db,$_POST['LIST']);


	mysqli_query($db, "UPDATE salesperson13165 SET ID = '$ID', NAME= '$NAME', CONTACT = '$CONTACT', LIST = '$LIST' WHERE ID = '$ID'");
	$_SESSION ['msg']= "The address is updated";
	header('location: salesperson.php');
}

if (isset($_GET["del"])) {
	$ID = $_GET["del"];
	mysqli_query($db, "DELETE FROM salesperson13165 WHERE ID= '$ID'");
	$_SESSION ['msg']= "The address is deleted";
	header('location: salesperson.php');
}
$results = mysqli_query($db, "SELECT * FROM salesperson13165");
?>