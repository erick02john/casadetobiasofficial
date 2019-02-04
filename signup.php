<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
</head>
<body>
<form method="POST" action="insertguest.php">
	<input type="email" name="email" required><br>
	<input type="password" name="password"><br>
	<input type="password" name="repassword"><br>
	<input type="text" name="fname"><br>
	<input type="text" name="mname"><br>
	<input type="text" name="lname"><br>
		Gender: <br>
	<input name = "gender" type = "radio" value="Male">
	Male<input name="gender" type="radio" value="Female">
	Female<br>
	<input type="address" name="address"><br>
	<input type="text" name="number"><br>
	<input type="submit" name="add" value="add">
</form>
</body>
</html>