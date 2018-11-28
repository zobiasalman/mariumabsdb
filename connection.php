<?php
	session_start();
	$USERNAME = "";
	$PASSWORD_1 = "";
	$PASSWORD_2= "";
	$errors = array();
	
	$db = mysqli_connect('localhost', 'root', '', 'mysql');
	
	if (isset($_POST['register'])) {
		$USERNAME = $_POST['USERNAME'];
		$PASSWORD_1 = $_POST['PASSWORD_1'];
		$PASSWORD_2 = $_POST['PASSWORD_2'];
		$query = "INSERT INTO LOGIN13165(USERNAME, PASSWORD) VALUES('$USERNAME', '$PASSWORD')";
mysqli_query($db, $query);
		header('location: register.php');
	
	
		if (empty($USERNAME)) {
			array_push($errors, "Username missing");
		}
		if (empty($PASSWORD_1)) {
			array_push($errors, "Password missing");
		}
		if ($PASSWORD_1 != PASSWORD_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		
		if (count($errors) == 0) {
			
			$sql = "INSERT INTO login13165(USERNAME, PASSWORD) VALUES ('$USERNAME', '$PASSWORD')";
			mysqli_query($db, $sql);
			$_SESSION['USERNAME'] = $USERNAME;
			$_SESSION['SUCCESS'] = "YOU ARE NOW LOGGED IN";
			header('location: register.php');
		}
		
		
	}
?>