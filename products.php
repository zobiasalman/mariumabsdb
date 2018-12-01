<?php include('pserver.php');

	if (isset($_GET['edit'])) {
		$CODE = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM PRODUCTS13165 WHERE CODE= '$CODE'");
		$record = mysqli_fetch_assoc($rec);
		$CODE = $record['CODE'];
		$BRAND = $record['BRAND'];
		$TYPE = $record['TYPE'];
		$SHADE = $record['SHADE'];
		$SIZE = $record['SIZE'];
		$PRICE = $record['PRICE'];
		
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
  <a  href='salesperson.php'><b>SalesPerson</b></a>
  <a href='users.php'><b>User</b></a>
  <a  class="active" href='products.php'><b>Product</b></a>
  <a href='table.php'><b>SalesOrder</b></a>
<a href='dashboardbar.php'><b>Dash Board</b></a>
 <a  href='login13165.php'><b>LOGOUT</b></a>


</div>

</style>


<!DOCTYPE html>
<html>
<head>
<title> PRODUCTS </title>
	<link rel= "stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1 style="font-size:30px;">Products Table</h1>
<table align="center">
<thead>
<tr>
	<th>Code</th>
	<th>Brand</th>
	<th>Type</th>
	<th>Shade</th>
	<th>Size</th>
	<th>Price</th>
	<th colspan="2">Action</th>
	</tr>
	</thead>
	<tbody>
		<?php while ($row = mysqli_fetch_assoc($results)) { ?>
		<tr>
			<td><?php echo $row['CODE']; ?></td>
			<td><?php echo $row['BRAND']; ?></td>
			<td><?php echo $row['TYPE']; ?></td>
			<td><?php echo $row['SHADE']; ?></td>
			<td><?php echo $row['SIZE']; ?></td>
			<td><?php echo $row['PRICE']; ?></td>
			
			<td>
		<a class="edit_btn" href="products.php?edit=<?php echo $row['CODE']; ?>">Edit</a>
		</td>
		<td>
		<a class="del_btn" href="products.php?del=<?php echo $row['CODE']; ?>">Delete</a>
		</td>
		</tr>
		<?php } ?>	
	
	</tbody>
	</table>
	
	<body background bgcolor="LavenderBlush">
	<h2 style="font-size:30px;">Insert Products</h2>
<form method='post' action='pserver.php'>

<input type = 'hidden' name= 'CODE' value= '<?php echo $CODE; ?>'>
<div class='input-group'>
<label>CODE</label>
<input type='text' name='CODE' value= '<?php echo $CODE; ?>'>
</div>
<div class='input-group'>
<label>BRAND</label>
<input type='text' name='BRAND' value= '<?php echo $BRAND; ?>'>
</div>
<div class='input-group'>
<label>TYPE</label>
<input type='text'  name='TYPE' value= '<?php echo $TYPE; ?>'>
</div>
<div class='input-group'>
<label>SHADE</label>
<input type='text' name='SHADE' value= '<?php echo $SHADE; ?>'>
</div>
<div class='input-group'>
<label>SIZE</label>
<input type='text' name='SIZE' value= '<?php echo $SIZE; ?>'>
</div>
<div class='input-group'>
<label>PRICE</label>
<input type='text' name='PRICE' value= '<?php echo $PRICE; ?>'>
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
