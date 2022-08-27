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
			echo"The id::$id is already available";
		}
		$stmt->close();
		
		if($t==0)
		{
			$insert = "insert into new(id,gender,educ,address,marital)values(?, ?, ?, ?, ?)";
			$stmt=$conn->prepare($insert);
			$stmt->bind_param("sssss",$id,$gen,$edu,$add,$mari);
			$stmt->execute();
			$stmt->close();
			echo"success";
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
	echo"$e->getMessage()";
}
?>