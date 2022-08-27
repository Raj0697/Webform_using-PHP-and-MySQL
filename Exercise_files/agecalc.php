
<form action="" method="post">
CHOOSE BIRTH DATE:
<input type="date" name="d"><br>
<input type="submit" value="calculate" name="s"><br>
</form>
<?php
if(isset($_POST['s']))
{
	$dateofbirth = $_POST['d'];
	$today = date('dd-mm-yyyy');
	$diff = date_diff(date_create($dateofbirth), date_create($today));
	echo'YOU ARE' .$diff->format('%yyyy')."YEARS OLD";
}
?>