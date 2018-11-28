<?php 
session_start();

$cid = "";
$sname= "";
$cname = "";
$cno = "";
$address = "";
$area = "";
$gc = "";
$edit_state = false;
$db= mysqli_connect('localhost', 'root', 'Abcd#1234', 'mysql');

if(isset ($_POST['save'])){
$cid = $_POST['CID'];
$sname =  $_POST['SName'];
$cname =  $_POST['CName'];
$cno =  $_POST['CNo'];
$address =  $_POST['Address'];
$area =  $_POST['Area'];
$gc =  $_POST['GC'];

$query = "INSERT INTO customers(CID, SName, CName, CNO, Address, Area, GC) VALUES('$cid', '$sname', '$cname', '$cno', '$address', '$area', '$gc')";
mysqli_query($db, $query);
header('location: database.php');
}

if (isset($_POST['update'])) {
	$cid = mysqli_real_escape_string($db,$_POST['CID']);
	$sname = mysqli_real_escape_string($db,$_POST['SName']);
	$cname = mysqli_real_escape_string($db,$_POST['CName']);
	$cno = mysqli_real_escape_string($db,$_POST['CNo']);
	$address = mysqli_real_escape_string($db,$_POST['Address']);
	$area = mysqli_real_escape_string($db,$_POST['Area']);
	$gc = mysqli_real_escape_string($db,$_POST['GC']);

	mysqli_query($db, "UPDATE customers SET CID = '$cid', SName= '$sname', CName = '$cname', CNo = '$cno', Address = '$address', Area = '$area', GC = '$gc' WHERE CID = '$cid'");
	$_SESSION ['msg']= "The address is updated";
	header('location: database.php');
}

if (isset($_GET["del"])) {
	$cid = $_GET["del"];
	mysqli_query($db, "DELETE FROM customers WHERE CID= '$cid'");
	$_SESSION ['msg']= "The address is deleted";
	header('location: database.php');
}
$results = mysqli_query($db, "SELECT * FROM customers");
?>
