<body>
<center>
<table border="1">
<?php
	try
	{
		echo"<h1>The details of entered id is successfully updated in the database</h1>";
		$conn=new mysqli("localhost","root","","raj");
		echo"<tr><th>ID</th><th>NAME</th><th>SEX</th><th>ADDRESS</th><th>MARTIALSTATUS</th><th>QUALFICATION</th><th>DISCIPLINE</th><th>PHONECODE</th><th>PHONENO</th>";
		$stmt=$conn->query("select * from website");
		foreach($stmt as $i)
		{
			echo"<tr><td>$i[id]</td><td>$i[name]</td><td>$i[sex]</td><td>$i[address]</td><td>$i[marital]</td><td>$i[educ]</td><td>$i[discipline]</td><td>$i[phonecode]</td><td>$i[phone]</td>";
		}
		$stmt->close();
	}
	catch(Exception $e)
	{
		echo "$e->getMessage()";
	}
	$conn->close();
?>
</body>
</center>
</table>		