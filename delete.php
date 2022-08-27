<?php
$id=$_POST['na'];
$t=0;
	$host="localhost";
	$username="root";
	$password="";
	$dbname="raj";
	echo"<body>";
	$conn= new mysqli($host,$username,$password,$dbname);
			if (mysqli_connect_error())
			{
				die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
			} 
			else
			{
				 
				$stmt=$conn->query("select * from website where id ='$id'");
				foreach($stmt as $i)
				{
					$t=1;
				}
				$stmt->close();
			 
			}
			if($t==0)
			{
				echo"<h1><center>THE ID:: $id IS NOT FOUND IN THE DATABASE. PLEASE ENTER THE CORRECT ID!!";
			}
			else
			{
				echo"<h2 style=background-color:blue;color:white;><center>RECORD IS FOUND N THE DATABASE</center></h2>";
				
				$delete="delete from website where id=?";
				$stmt=$conn->prepare($delete);
				$stmt->bind_Param("i",$id);
				$stmt->execute();
				$stmt->close();
				echo"<center>";
				echo"<h1>The ID::$id IS DELETED SUCCESSFULLY";
				echo"</h1>";
			}
			echo"</body>";
	$conn->close();
	
?>