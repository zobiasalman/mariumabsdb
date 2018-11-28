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

<!DOCTYPE html>
<html>
<head>
<title> PRODUCTS </title>
	<link rel= "stylesheet" type="text/css" href="style.css">;
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