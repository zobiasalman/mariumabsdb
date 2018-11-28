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

<!DOCTYPE html>
<html>
<head>
<title> SALESPERSON </title>
	<link rel= "stylesheet" type="text/css" href="style.css">;
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