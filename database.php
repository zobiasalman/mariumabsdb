<?php include('marium.php');

	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM customers WHERE CID= '$cid'");
		$record = mysqli_fetch_assoc($rec);
		$cid = $record['CID'];
		$sname = $record['SName'];
		$cname = $record['CName'];
		$cno = $record['CNo'];
		$address = $record['Address'];
		$area = $record['Area'];
		$gc = $record['GC'];
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
  <a class="active" href='database.php'><b>Customer</b></a>
  <a  href='salesperson.php'><b>SalesPerson</b></a>
  <a href='users.php'><b>User</b></a>
  <a href='products.php'><b>Product</b></a>
  <a href='table.php'><b>Sales Order</b></a>
 <a href='dashboardbar.php'><b>Dash Board</b></a>
 <a  href='login13165.php'><b>LOGOUT</b></a>

</div>

</style>
<!DOCTYPE html>
<html>
<head>
<title> Customers </title>
	<link rel= "stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1 style="font-size:30px;">Customer Table</h1>
<table align="center">
<thead>
<tr>
	<th>CID</th>
	<th>SName</th>
	<th>CName</th>
	<th>CNo</th>
	<th>Address</th>
	<th>Area</th>
	<th>GC</th>
	<th colspan="2">Action</th>
	</tr>
	</thead>
	<tbody>
		<?php while ($row = mysqli_fetch_assoc($results)) { ?>
		<tr>
			<td><?php echo $row['CID']; ?></td>
			<td><?php echo $row['SName']; ?></td>
			<td><?php echo $row['CName']; ?></td>
			<td><?php echo $row['CNo']; ?></td>
			<td><?php echo $row['Address']; ?></td>
			<td><?php echo $row['Area']; ?></td>
			<td><?php echo $row['GC']; ?></td>
			<td>
		<a class="edit_btn" href="database.php?edit=<?php echo $row['CID']; ?>">Edit</a>
		</td>
		<td>
		<a class="del_btn" href="database.php?del=<?php echo $row['CID']; ?>">Delete</a>
		</td>
		</tr>
		<?php } ?>	
	
	</tbody>
	</table>
	
	<body background bgcolor="LavenderBlush">
	<h2 style="font-size:30px;">Insert Customers</h2>
<form method='post' action='marium.php'>

<input type = 'hidden' name= 'CID' value= '<?php echo $cid; ?>'>
<div class='input-group'>
<label>CID</label>
<input type='text' name='CID' value= '<?php echo $cid; ?>'>
</div>
<div class='input-group'>
<label>SName</label>
<input type='text' name='SName' value= '<?php echo $sname; ?>'>
</div>
<div class='input-group'>
<label>Customer Name</label>
<input type='text'  name='CName' value= '<?php echo $cname; ?>'>
</div>
<div class='input-group'>
<label>Customer Number</label>
<input type='text' name='CNo' value= '<?php echo $cno; ?>'>
</div>
<div class='input-group'>
<label>Address</label>
<input type='text' name='Address' value= '<?php echo $address; ?>'>
</div>
<div class='input-group'>
<label>Area</label>
<input type='text' name='Area' value= '<?php echo $area; ?>'>
</div>
<div class='input-group'>
<label>Geometrical Coordinates</label>
<input type='text' name='GC' value= '<?php echo $gc; ?>'>
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
