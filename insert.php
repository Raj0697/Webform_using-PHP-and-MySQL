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
			echo"<h1><center>The ID : $id is already available in the database! Please enter different id to store the details into the database!!</center></h1>";
		}
		$stmt->close();
		if ($t==0)
		{
			echo"<h1><center>The documents are entered</center></h1>";
			echo"<br>";
			echo"<h3>1. ID : $id</h3>";
			echo"<h3>2. NAME : $name</h3>";
			echo"<h3>3. SEX : $sex</h3>";
			echo"<h3>4. ADDRESS : $address</h3>";
			echo"<h3>5. MARITAL STATUS : $marital</h3>"; 
			echo"<h3>6. EDUCATION : $educ</h3>";
			echo"<h3>7. DISCIPLINE : $disc</h3>";
			echo"<h3>8. PHONECODE : $phonecode</h3>";
			echo"<h3>9. PHONE : $phone</h3>";
			$insert="insert into website(id,name,sex,address,marital,educ,discipline,phonecode,phone)values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt=$conn->prepare($insert);
			$stmt->bind_param("isssssssi",$id,$name,$sex,$address,$marital,$educ,$disc,$phonecode,$phone);
			$stmt->execute();
			$stmt->close();
			echo"<h1><center>The $name is successfully inserted</center></h1>";
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