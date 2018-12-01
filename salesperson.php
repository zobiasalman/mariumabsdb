<?php include('sserver.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM SALESPERSON13165 WHERE ID= '$ID'");
		$record = mysqli_fetch_assoc($rec);
		$ID = $record['ID'];
		$NAME = $record['NAME'];
		$CONTACT = $record['CONTACT'];
		$LIST = $record['LIST'];
	
	}
?>
<style>

/* Add a black background color to the top navigation */
.nav {
    background-color: #333;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.nav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.nav a:hover {
    background-color: #ddd;
    color: black;
}

/* Add a color to the active/current link */
.nav a.active {
    background-color: #4CAF50;
    color: white;
}

</style>




     
<div class="nav">
  <a href='home.php'><b>HOME</b></a>
  <a href='database.php'><b>Customer</b></a>
  <a  class="active" href='salesperson.php'><b>SalesPerson</b></a>
  <a href='users.php'><b>User</b></a>
  <a href='products.php'><b>Product</b></a>
  <a href='table.php'><b>SalesOrder</b></a>

  <a  href='login13165.php'><b>LOGOUT</b></a>


</div>

</style>

<!DOCTYPE html>
<html>
<head>
<title> SALESPERSON </title>
	<link rel= "stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1 style="font-size:30px;">Salesperson Table</h1>
<table align="center">
<thead>
<tr>
	<th>ID</th>
	<th>NAME</th>
	<th>CONTACT</th>
	<th>LIST</th>
	<th colspan="2">Action</th>
	</tr>
	</thead>
	<tbody>
		<?php while ($row = mysqli_fetch_assoc($results)) { ?>
		<tr>
			<td><?php echo $row['ID']; ?></td>
			<td><?php echo $row['NAME']; ?></td>
			<td><?php echo $row['CONTACT']; ?></td>
			<td><?php echo $row['LIST']; ?></td>

			<td>
		<a class="edit_btn" href="salesperson.php?edit=<?php echo $row['ID']; ?>">Edit</a>
		</td>
		<td>
		<a class="del_btn" href="salesperson.php?del=<?php echo $row['ID']; ?>">Delete</a>
		</td>
		</tr>
		<?php } ?>	
	
	</tbody>
	</table>
	
	<body background bgcolor="LavenderBlush">
	<h2 style="font-size:30px;">Insert Salesperson</h2>
<form method='post' action='sserver.php'>

<input type = 'hidden' name= 'ID' value= '<?php echo $ID; ?>'>
<div class='input-group'>
<label>ID</label>
<input type='text' name='ID' value= '<?php echo $ID; ?>'>
</div>
<div class='input-group'>
<label>NAME</label>
<input type='text' name='NAME' value= '<?php echo $NAME; ?>'>
</div>
<div class='input-group'>
<label>CONTACT</label>
<input type='text'  name='CONTACT' value= '<?php echo $CONTACT; ?>'>
</div>
<div class='input-group'>
<label>LIST</label>
<input type='text' name='LIST' value= '<?php echo $LIST; ?>'>
</div>

<div class='input-group'>
<?php if($edit_state == false): ?>
<button type='submit' name='save' class='btn'>Save</button>
<?php else: ?>
<button type='submit' name='update' class='btn'>Update</button>
<?php endif ?>
</div>

	
</form>
</body>
</html>
