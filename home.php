<?php include('loginserver.php'); ?>

<!DOCTYPE html>
<style>
body{
	margin: 0;
	padding: 0;
	background: url(pic2.jpg);
	background-size: cover;
	background-position: center;
	font-family: sans-serif;
}
.header{
	width: 30%;
	margin: 50px auto 0px;
    color: white;
	background: CORAL;
	text-align: center;
	border: 1px solid CORAL;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
    padding: 20px;	
}
form {
	width: 30%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid CORAL;
	background: white;
	border-radius: 0px 0px 10px 10px;
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
	border: 1px solid CORAL;
}
.input-group input{
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px CORAL;
	}
.btn{
	padding: 10px;
	font-size: 15px;
	color: white;
	background: CORAL;
	border: none;
	border-radius: 5px;
	
}
.success{
	color: #3c763d;
	background: #dff0d8;
	border: 1px solid #3c763d;
	margin-bottom: 20px;
	
}
	

</style>
<head>
<title>Home Page</title>
</head>
<body>

<div class="header">
<h2>Home Page</h2>
</div>

<div class='input-group'>

<form action="salesperson.php">
<input type="submit" value= "Saleperson" />
</form>
<form action="products.php">
<input type="submit" value= "Products" />
</form>
<form action="database.php">
<input type="submit" value= "Customers" />
</form>
<form action="users.php">
<input type="submit" value= "Users" />
</form>
<form action="table.php">
<input type="submit" value= "Sales Order" />
</form>
<form action="register.php">
<input type="submit" value= "If not a user, Register" />
</form>
<form action="login13165.php">
<input type="submit" value= "Logout" />
</form>
</div>

</div>




</body>
</html>