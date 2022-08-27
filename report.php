<body>
<center>
<table border="1">
<?php

$t=0;
$name=$_POST["na"];
$name="%".$name."%";

$host="localhost";
$uname="root";
$pass="";
$dbname="raj";
$conn=new mysqli($host,$uname,$pass,$dbname);
if(mysqli_connect_error())
{
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
	echo"<tr><th>ID</th><th>NAME</th><th>SEX</th><th>ADDRESS</th><th>MARTIALSTATUS</th><th>QUALFICATION</th><th>DISCIPLINE</th><th>PHONECODE</th><th>PHONENO</th><br>";
	$stmt=$conn->query("select * from website where name like '$name'");
	foreach($stmt as $i)
	{
		$t=1;
		echo"<tr><td>$i[id]</td><td>$i[name]</td><td>$i[sex]</td><td>$i[address]</td><td>$i[marital]</td><td>$i[educ]</td><td>$i[discipline]</td><td>$i[phonecode]</td><td>$i[phone]</td><br>";
	}
	$stmt->close();
}
if($t==0)
{
	echo"<h2> The name containing this alphabet is not found in the database!! </h2>";
}
$conn->close();
?>
</table>
</center>
</body>