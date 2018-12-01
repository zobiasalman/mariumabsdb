<!DOCTYPE html>
<html>
<head>
<title> Survery Form </title>
	<link rel= "stylesheet" type="text/css" href="loginstyle.css">;
</head>

<body>

<div class="header">
<h2>Survey</h2>
</div>

<form method="post" action="survey.php">

<div class="input-group">
<label>Timestamp</label>
<input type="text">
</div>
<div class="input-group">
<label>Customer Name</label>
<input type="text">
</div>
<div class="input-group">
<label>Products Available?</label>
<input type="text">
</div>
<div class="input-group">
<label>Products Positioned infront?</label>
<input type="text">
</div>
<div class="input-group">
<label>Competitor products prominent?</label>
<input type="text">
</div>
<div class="input-group">
<button type="submit" name="submit" class="btn">Upload Picture</button>
</div>

<div class="input-group">
<button type="submit" name="submit" class="btn">Submit</button>
</div>


</form>
</body>
</html>