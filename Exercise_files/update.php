<?php

$id=$_POST['upd'];
if(!empty($id))
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
			$fgen = $i["gender"];
			$fedu = $i["educ"];
			$fmar = $i["marital"];
			
			?>
			
<html>
<head>
<title>mcc</title>
</head>
<script type="text/javascript">
function val()
{
	var text = "";
	if(document.getElementById("nam").value=="")
	{
		alert("Enter the id!!");
		return false;
	}
	else if(document.getElementById("s1").checked==false && document.getElementById("s2").checked==false)
	{
		alert("select the gender");
		return false;
	}
	else if(document.getElementById("e1").checked==false && document.getElementById("e2").checked==false)
	{
		alert("select the education");
		return false;
	}
	else if(document.getElementById("a1").value=="")
	{
		alert("enter the address");
		return false;
	}
	else if(document.getElementById("e1").checked==true || document.getElementById("e2").checked==true)
	{
		if(document.getElementById("e1").checked==true)
			text+=" "+document.getElementById("e1").value;
		if(document.getElementById("e2").checked==true)
			text+=" "+document.getElementById("e2").value;
		document.raj.temp.value=text;
		alert(text);
		}
			
			
	else if(document.getElementById("m1").selectedIndex==0)
	{
		alert("select the marital");
		return false;
	}	
	else
	{
		return true;
	}
}	
		


</script>
<body>
<center>
<h1>insert</h1>
<form name="raj" action="update2.php" method="post" onsubmit="return val();">
<table border="1" cellpadding="10" cellspacing="5">
<tr>
<td>id:</td>
<td><input type="text" name="na" id="nam" value="<?php echo"$i[id]";?>"/></td>
</tr>
<tr>
<td>gender:</td>
<td><input type="radio" name="sex" id="s1" value="male"<?php if(strstr($fgen,"male")) echo"checked";?>>male
<input type="radio" name="sex" id="s2" value="female" <?php if(strstr($fgen,"female")) echo"checked";?>>female</td>
</tr>
<tr>
<td>edu</td>
<td><input type="checkbox" name="educ" id="e1" value="ug" <?php if(strstr($fedu,"ug")) echo"checked";?>>ug
<input type="checkbox" name="educ" id="e2" value="pg" <?php if(strstr($fedu,"pg")) echo"checked";?>>pg
</td></tr>
<tr>
<td>address</td>
<td><textarea rows="3" cols="30" name="add" id="a1"><?php echo"$i[address]";?></textarea></td></tr>
<tr>
<td>marital</td>
<td><select name="mar" id="m1">
<option value="select">select</option>
<option value="single" <?php if(strstr($fmar,"single")) echo"selected";?>>single</option>
<option value="married" <?php if(strstr($fmar,"married")) echo"selected";?>>married</option>
</select>
</td></tr>
</table>
<br>
<input type="submit" value="update">&ensp;&ensp;
<input type="reset" value="clear">
<input type="hidden" name="temp">
</form>
</center>
</body>
</html>

<?php

		}
		if($t==0)
		{
			echo"the id:$id is not found";
		}
	}
}
else
{
	echo"empty";
}
?>
		