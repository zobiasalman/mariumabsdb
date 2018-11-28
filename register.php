<?php include('rserver.php');

	
?>

<!DOCTYPE html>
<html>
<head>
<title> REGISTRATION </title>
	<link rel= "stylesheet" type="text/css" href="loginstyle.css">;
</head>

<body>

<div class="header">
<h2>Register</h2>
</div>

<form method="post" action="register.php">
<?php include('errorlogin.php'); ?>
<div class="input-group">
<label>UserID</label>
<input type="text" name="USERID" value="<?php echo $USERID; ?>">
</div>
<div class="input-group">
<label>User Name</label>
<input type="text" name="USERNAME" value="<?php echo $USERNAME; ?>">
</div>
<div class="input-group">
<label>Password</label>
<input type="password" name="PASSWORD_1">
</div>
<div class="input-group">
<label>Confirm Password</label>
<input type="password" name="PASSWORD_2">
</div>
<div class="input-group">
<label>Active</label>
<input type="text" name="ACTIVE" value="<?php echo $ACTIVE; ?>">
</div>
<div class="input-group">
<label>SalesID</label>
<input type="text" name="SALESID" value="<?php echo $SALESID; ?>">
</div>


<div class="input-group">
<button type="submit" name="register" class="btn">Register</button>
</div>

<p>
Already a member? <a href="login13165.php">Sign in</a>
</p>

</form>
</body>
</html>
	