<?php

$conn = new mysqli("localhost","root","","raj");

if(isset($_POST['username']))
{
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	
	$sql = "select * from login_form where user='".$uname."' and pword='".$pword."' limit 1";
	
	$result = mysqli_query($sql);
	
	if(mysqli_num_rows($rows($result)==1))
	{
		echo" you have successfully logged in";
		exit();
	}
	else
	{
		echo"enter valid username or password";
		exit();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<form action="" method="post">
username:
<input type="text" name="username">
<br>
password:
<input type="password" name="password"><br>
<input type="submit" name="submit" value="login">
</form>
</body>
</html>