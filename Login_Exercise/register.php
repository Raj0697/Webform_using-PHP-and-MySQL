<?php
$fn = $_POST['txtfname'];
$ln = $_POST['txtlname'];
$em = $_POST['txtemail'];
$pw = $_POST['txtpassword'];

$conn = mysqli_connect("localhost","root","")or die("could not connect to mysql");
$db = mysqli_select_db($conn,"register")or die("could not connect to the database");

if(isset($_POST['txtfname']))
{
	$qry = "select email,password from login where email='$em' and password='$pw'";
	$rslogin = mysqli_query($qry);
	$numrowslogin = mysqli_num_rows($rslogin);
	
	if($numrowslogin)
	{
		header('location:duplicateemail.php');
	}
	else
	{
		$ins = "insert into login(fname,lname,email,password)values('$fn','$ln','$em','$pw')";
		mysqli_query($ins);
		header('location:thankyou.php');
	}
}

?>