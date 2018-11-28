
<?php 
session_start();

$USERID = "";
$USERNAME= "";
$PASSWORD = "";
$ACTIVE = "";
$SALESID = "";
$edit_state = false;
$db= mysqli_connect('localhost', 'root', 'marium95', 'mysql');

if(isset ($_POST['save'])){
$USERID = $_POST['USERID'];
$USERNAME =  $_POST['USERNAME'];
$PASSWORD =  $_POST['PASSWORD'];
$ACTIVE =  $_POST['ACTIVE'];
$SALESID =  $_POST['SALESID'];

$query = "INSERT INTO USER13165(USERID, USERNAME, PASSWORD, ACTIVE, SALESID) VALUES('$USERID', '$USERNAME', '$PASSWORD', '$ACTIVE', '$SALESID')";
mysqli_query($db, $query);
header('location: users.php');
}

if (isset($_POST['update'])) {
	$USERID = mysqli_real_escape_string($db,$_POST['USERID']);
	$USERNAME = mysqli_real_escape_string($db,$_POST['USERNAME']);
	$PASSWORD = mysqli_real_escape_string($db,$_POST['PASSWORD']);
	$ACTIVE = mysqli_real_escape_string($db,$_POST['ACTIVE']);
	$SALESID = mysqli_real_escape_string($db,$_POST['SALESID']);

	mysqli_query($db, "UPDATE USER13165 SET USERID = '$USERID', USERNAME= '$USERNAME', PASSWORD = '$PASSWORD', ACTIVE = '$ACTIVE', SALESID = '$SALESID' WHERE USERID= '$USERID'");
	$_SESSION ['msg']= "The address is updated";
	header('location: users.php');
}

if (isset($_GET["del"])) {
	$USERID = $_GET["del"];
	mysqli_query($db, "DELETE FROM USER13165 WHERE USERID= '$USERID'");
	$_SESSION ['msg']= "The address is deleted";
	header('location: users.php');
}
$results = mysqli_query($db, "SELECT * FROM USER13165");
?>