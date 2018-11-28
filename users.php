<?php include('userver.php');

	if (isset($_GET['edit'])) {
		$USERID = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM USER13165 WHERE USERID= '$USERID'");
		$record = mysqli_fetch_assoc($rec);
		$USERID = $record['USERID'];
		$USERNAME = $record['USERNAME'];
		$PASSWORD = $record['PASSWORD'];
		$ACTIVE = $record['ACTIVE'];
		$SALESID = $record['SALESID'];
	
	}
?>

<!DOCTYPE html>
<html>
<head>
<title> USERS </title>
	<link rel= "stylesheet" type="text/css" href="style.css">;
</head>

<body>
<h1 style="font-size:30px;">USER Table</h1>
<table align="center">
<thead>
<tr>
	<th>USERID</th>
	<th>USERNAME</th>
	<th>PASSWORD</th>
	<th>ACTIVE</th>
	<th>SALESID</th>
	<th colspan="2">Action</th>
	</tr>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['USERID']; ?></td>
			<td><?php echo $row['USERNAME']; ?></td>
			<td><?php echo $row['PASSWORD']; ?></td>
			<td><?php echo $row['ACTIVE']; ?></td>
			<td><?php echo $row['SALESID']; ?></td>
			<td>
		<a class="edit_btn" href="users.php?edit=<?php echo $row['USERID']; ?>">Edit</a>
		</td>
		<td>
		<a class="del_btn" href="users.php?del=<?php echo $row['USERID']; ?>">Delete</a>
		</td>
		</tr>
		<?php } ?>	
	
	</tbody>
	</table>
	
	<body background bgcolor="LavenderBlush">
	<h2 style="font-size:30px;">Edit User</h2>
<form method='post' action='userver.php'>

<input type = 'hidden' name= 'USERID' value= '<?php echo $USERID; ?>'>
<div class='input-group'>
<label>USERID</label>
<input type='text' name='USERID' value= '<?php echo $USERID; ?>'>
</div>
<div class='input-group'>
<label>USERNAME</label>
<input type='text' name='USERNAME' value= '<?php echo $USERNAME; ?>'>
</div>
<div class='input-group'>
<label>PASSWORD</label>
<input type='password'  name='PASSWORD' value= '<?php echo $PASSWORD; ?>'>
</div>
<div class='input-group'>
<label>ACTIVE</label>
<input type='text' name='ACTIVE' value= '<?php echo $ACTIVE; ?>'>
</div>
<div class='input-group'>
<label>SALESID</label>
<input type='text' name='SALESID' value= '<?php echo $SALESID; ?>'>
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