<?php include('loginserver.php'); ?>



<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
	<div class="header">
<h2>LOGIN</h2>
</div>
	
	<form method="post" action="login13165.php">
	<?php include('errorlogin.php'); ?>
	<div class="input-group">
		<label>USERID</label>
		<input type="text" name="USERID">
		</div>
		
		<div class="input-group">
		<label>USERNAME</label>
		<input type="text" name="USERNAME">
		</div>
		<div class="input-group">
		<label>PASSWORD</label>
		<input type="password" name="PASSWORD">
		</div>
		
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
			</div>
		<p>
		Not a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>