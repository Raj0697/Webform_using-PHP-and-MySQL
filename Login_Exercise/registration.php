<?php
$fn = $_POST['txtfname'];
$ln = $_POST['txtlname'];
$em = $_POST['txtemail'];
$pw = $_POST['txtpassword'];

$conn = new mysqli("localhost","root","","register");
if(mysqli_connect_error())
{
	die('connection error('.mysqli_connect_errno().')');
}
else
{
if(isset($_POST['txtfname']))
{
	$qry = "select email,password from login where email='$em' and password='$pw'";
	$rslogin = mysqli_query($qry);
	
	$numRowsLogin = mysqli_num_rows($rslogin);
	
	if($numRowsLogin)
	{
		header('location:duplicateemail.php');
	}
	else
	{
		$insert = "insert into login(fname,lname,email,password)values(?, ?, ?, ?)";
		$stmt= $conn->prepare($insert);
		$stmt->bind_param("ssss",$fn,$ln,$em,$pw);
		$stmt->execute();
		$stmt->close();
		header('location:thankyou.php');
	}
}
}
?>