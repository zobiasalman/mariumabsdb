<?php 
session_start();

$CODE = "";
$BRAND= "";
$TYPE = "";
$SHADE = "";
$SIZE = "";
$PRICE = "";
$edit_state = false;
$db= mysqli_connect('localhost', 'root', 'marium95', 'mysql');

if(isset ($_POST['save'])){
$CODE = $_POST['CODE'];
$BRAND =  $_POST['BRAND'];
$TYPE =  $_POST['TYPE'];
$SHADE =  $_POST['SHADE'];
$SIZE =  $_POST['SIZE'];
$PRICE =  $_POST['PRICE'];

$query = "INSERT INTO PRODUCTS13165(CODE, BRAND, TYPE, SHADE, SIZE, PRICE) VALUES('$CODE', '$BRAND', '$TYPE', '$SHADE', '$SIZE', '$PRICE')";
mysqli_query($db, $query);
header('location: products.php');
}

if (isset($_POST['update'])) {
	$CODE = mysqli_real_escape_string($db,$_POST['CODE']);
	$BRAND = mysqli_real_escape_string($db,$_POST['BRAND']);
	$TYPE = mysqli_real_escape_string($db,$_POST['TYPE']);
	$SHADE = mysqli_real_escape_string($db,$_POST['SHADE']);
	$SIZE = mysqli_real_escape_string($db,$_POST['SIZE']);
	$PRICE = mysqli_real_escape_string($db,$_POST['PRICE']);

	mysqli_query($db, "UPDATE PRODUCTS13165 SET CODE = '$CODE', BRAND= '$BRAND', TYPE = '$TYPE', SHADE = '$SHADE', SIZE = '$SIZE', PRICE = '$PRICE' WHERE CODE = '$CODE'");
	$_SESSION ['msg']= "The address is updated";
	header('location: products.php');
}

if (isset($_GET["del"])) {
	$CODE = $_GET["del"];
	mysqli_query($db, "DELETE FROM PRODUCTS13165 WHERE CODE= '$CODE'");
	$_SESSION ['msg']= "The address is deleted";
	header('location: products.php');
}
$results = mysqli_query($db, "SELECT * FROM PRODUCTS13165");
?>