<?php 
session_start();

$USERID="";
$USERNAME="";
$PASSWORD="";
$ACTIVE="";
$SALESID="";
$errors= array();

$db = mysqli_connect('localhost','root','Abcd#1234','mysql');

if(isset($_POST['register'])) {
	$USERID = ($_POST['USERID']);
	$USERNAME = ($_POST['USERNAME']);
		$PASSWORD_1 = ($_POST['PASSWORD_1']);
	$PASSWORD_2 = ($_POST['PASSWORD_2']);
	
	$ACTIVE = ($_POST['ACTIVE']);
	$SALESID = ($_POST['SALESID']);
	

	if (empty($USERID)) {
		array_push($errors, "USERID IS REQUIRED");
	}
	if (empty($USERNAME)) {
		array_push($errors, "USERNAME IS REQUIRED");
	}
	if (empty($USERID)) {
		array_push($errors, "USERID IS REQUIRED");
	}
	if (empty($PASSWORD_1)) {
		array_push($errors, "PASSWORD IS REQUIRED");
	}
	if ($PASSWORD_1 != $PASSWORD_2) {
		array_push($errors, "PASSWORD DONOT MATCH, TRY AGAIN!");
	}
	
	if (count($errors) == 0) {
		$PASSWORD = md5($PASSWORD_1);
		$sql = "INSERT INTO USER13165(USERID, USERNAME, PASSWORD, ACTIVE, SALESID) VALUES ('$USERID', '$USERNAME', '$PASSWORD', '$ACTIVE', '$SALESID')";
		mysqli_query($db, $sql);
		$_SESSION['USERID'] = $USERID;
		$_SESSION['success'] = "LOGGED IN";
		header('location: home.php');
	}
}

if (isset($_POST['register'])) {
	$USERID = ($_POST['USERID']);
	$USERNAMW = ($_POST['USERNAME']);
	$PASSWORD = ($_POST['PASSWORD']);
	
	if(empty($USERID)) {
		array_push($errors, "USERID IS REQUIRED");
	}
	if(empty($USERNAME)) {
		array_push($errors, "USERNAME IS REQUIRED");
	}
	if(empty($PASSWORD)) {
		array_push($errors, "PASSWORD IS REQUIRED");
	}
	
	if(count($errors) == 0) {
		$PASSWORD = md5($PASSWORD_1);
		$query = "SELECT * FROM USER13165 WHERE  USERID='$USERID' AND PASSWORD='$PASSWORD'";
		$result = mysqli_query($db, $query);
		if(mysqli_num_rows($result) ==1) {
			$_SESSION['USERID'] = $USERID;
			$_SESSION['SUCCESS'] = "LOGGED IN";
			header('location: home.php');
		} else {
			array_push($errors, "WRONG ID AND PASSWORD");
		}
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['USERID']);
	header('location: home.php');
}
?>
	
