<?php 
session_start();

$USERID ="";
$USERNAME = "";
$PASSWORD = "";
$errors = array();

$db = mysqli_connect('localhost','root','Abcd#1234','mysql');

if (isset($_POST['login'])) {
	$USERID = $_POST['USERID'];
	$USERNAME = $_POST['USERNAME'];
	$PASSWORD = $_POST['PASSWORD'];
	if(empty($USERID)) {
		array_push($errors, "USERID MISSING");
	}
	
	if(empty($USERNAME)) {
		array_push($errors, "USERNAME MISSING");
	}
	if(empty($PASSWORD)) {
		array_push($errors, "PASSWORD IS MISSING");
	}
	
	if(count($errors) == 0) {
		$PASSWORD = md5($PASSWORD);
		$query = "SELECT * FROM USER13165 WHERE USERID = '$USERID', USERNAME = '$USERNAME', PASSWORD = '$PASSWORD'";
		$result = mysqli_query($db, $query);
		if(mysqli_num_rows($result)==0) {
			$_SESSION['USERID'] = $USERID;
			
			$_SESSION['success'] = "LOGGED IN";
			header('location: home.php');
		} else {
			array_push($errors, "INCORRECT ID OR PASSWORD");
		}
	}
}
if(isset($_GET['logout'])) {
	session_destroy();
}

?>
