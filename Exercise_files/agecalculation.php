<form name="raj" method="post" action="agecalculation.php">

CHOOSE BIRTH DATE:
<input type="date" name="d"><br>
<input type="submit" value="calculate" name="s"><br>
</form>
<?php

if(isset($_POST['submit']))
{
	
	$date = $_POST['d'];
	$dob = new DateTime($date);
	$interval = $dob->diff(new DateTime);
	
	echo"<br>";
	echo"your age is ".$interval->y;
}




?>