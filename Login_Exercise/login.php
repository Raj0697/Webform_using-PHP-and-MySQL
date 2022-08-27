<?php
$em = $_POST['txtemail'];
$pw = $_POST['txtpassword'];

$conn = new mysqli("localhost","root","","register");
if(mysqli_connect_error())
{
	die('connection error('.mysqli_connect_errno().')');
}
else
{
if(isset($_POST['txtemail']))
{
	$qry = "select email,password from login where email='$em' and password='$pw'";
	$rslogin = mysqli_query($qry);
	
	$numRowsLogin = mysqli_num_rows($rslogin);
	
	if($numRowsLogin)
	{
		header('location:loginsuccess.php');
	}
	else
	{
		header('location:loginfailed.php');
	}
}
}
	
?>