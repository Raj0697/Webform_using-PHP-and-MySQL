<html>
<head>
<title>mcc</title>
</head>
<body bgcolor="plum">
<form method="post">
Enter the no<br>
<input type="text" name="na" id="no" autocomplete="off">
<input type="submit" value="go">
</form>

<?php
if($_POST)
{
	$fact =1;
	$number = $_POST['na'];
	echo"factorial of $number is:<br><br>";
	
	for($i=1;$i<=$number;$i++)
	{
		$fact=$fact*$i;
	}
	echo $fact."<br>";
}
?>
</body>
</html>