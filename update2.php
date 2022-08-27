<?php


$id=$_POST['ID'];
$name=$_POST['NAME'];
$sex=$_POST['SEX'];
$address=$_POST['address'];
$marital=$_POST['marry'];
$educ=$_POST['temp'];
$disc=$_POST['others'];
$phonecode=$_POST['mob'];
$phone=$_POST['phon'];

if(!empty($id) && !empty($name) && !empty($sex) && !empty($address) && !empty($marital) && !empty($educ) && !empty($disc) && !empty($phonecode) && !empty($phone))
{	
	$t = 0;
	try
	{
		$conn=new mysqli("localhost","root","","raj");
	if(mysqli_connect_error())
		{
			die('connection error('.mysqli_connect_errno().')');
		}
	else
	{
		$stmt=$conn->query("select * from website where id='$id'");
		foreach($stmt as $i)
		{
			$t=1;
		}
		if ($t==1)
		{
			$stmt=$conn->prepare("update website set name=?,sex=?,address=?,marital=?,educ=?,discipline=?,phonecode=?,phone=? where id=?");
			$stmt->bind_param("sssssssii",$name,$sex,$address,$marital,$educ,$disc,$phonecode,$phone,$id);
			$stmt->execute();
			$stmt->close();
			echo"<h1><center>The $name is successfully updated</center></h1>";
		}
		if($t==0)
		{
			echo"<h1>The id :$id is not found";
		}
	}
	$conn->close();
	}
	catch(Exception $e)
	{
		echo "$e->getMessage();";
	}
}
else
{
	echo"some of the fields are empty!";
}
?>