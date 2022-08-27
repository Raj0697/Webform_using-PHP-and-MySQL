<?php

$id=$_POST['na'];
$gen=$_POST['sex'];
$edu=$_POST['temp'];
$add=$_POST['add'];
$mari=$_POST['mar'];
try
{
	
if(!empty($id) && !empty($gen) && !empty($edu) && !empty($add) && !empty($mari))
{
	$t=0;
	$conn = new mysqli("localhost","root","","raj");
	if(mysqli_connect_error())
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		$stmt=$conn->query("select * from new where id='$id'");
		foreach($stmt as $i)
		{
			$t=1;
		}
		if($t==1)
		{
			$update = "update new set gender=?,educ=?,address=?,marital=? where id=?";
			$stmt = $conn->prepare($update);
			$stmt->bind_param("sssss",$gen,$edu,$add,$mari,$id);
			$stmt->execute();
			$stmt->close();
			echo"update success";
		}
		if($t==0)
		{
			echo"the id:$id is not found";
		}
	}
	$conn->close();
}
else
{
	echo"empty";
}
}
catch(Exception $e)
{
	echo "$e->getMessage()";
}
?>