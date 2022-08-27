<?php
$id = $_POST['uid'];
if(!empty($id))
{
	echo"<h2 style=font-family:arial;><center>RECORD IS FOUND IN THE DATABASE</center></h2>";
		
	$t = 0;
	try
	{
		$conn = new mysqli("localhost","root","","raj");
		if(mysqli_connect_error())
		{
			die('connection error('.mysqli_connect_errno().')');
		}
		else
		{
			$stmt = $conn->query("select * from website where id='$id'");
			foreach($stmt as $i)
			{
				$fgen = $i["sex"];
				$fmar = $i["marital"];
				$fedu = $i["educ"];
				$fphn = $i["phonecode"];
				$t = 1;
				
		
				
				?>
<html>
<head>
</head>			
<script type="text/javascript">
function val()
{	
	var id=document.getElementById("userid").value;
	id=id.trim();
	var x = id.length;
	
	var name=document.getElementById("namea").value;
	name=name.trim();
	var correct=/^[ A-Za-z]+$/;
	
	var add=document.getElementById("area").value;
	add=add.trim();
	var a=add.length;
	
	// ID
	if(x==0)
	{
		document.getElementById("message").innerHTML=" *id should contain six values !!";
		document.getElementById("userid").focus();
		return false;
	}
	else{document.getElementById("message").innerHTML="";}
	
	//NAME
	if(name=="")
	{
		document.getElementById("message2").innerHTML=" *please enter the name";
		document.getElementById("namea").focus();
		return false;
	}
	else if(name.match(correct))
	{document.getElementById("message2").innerHTML="";}
	else
	{
		document.getElementById("message2").innerHTML=" *numbers and special characters are not allowed";
		document.getElementById("namea").focus();
		return false;
	}
		
	// SEX
	var m =document.getElementById("sex1").checked;
	var f=document.getElementById("sex2").checked;
	if(m==false && f==false)
	{
		alert("select the gender!!");
		return false;
	}
	else{}
	
	// ADDRESS
	if(a==0)
	{
		document.getElementById("message3").innerHTML=" *address field is empty";
		document.getElementById("area").focus();
		return false;
	}
	else{document.getElementById("message3").innerHTML="";}
	
	// MARITAL STATUS
	if(document.raj.marry.value=="select yours")
	{
		alert("select the marital status!!");
		return false;
	}
	else{}
	
	// EDUCATIONAL QUALIFICATION
	var u=document.getElementById('a').checked;
	var p=document.getElementById('b').checked;
	var d=document.getElementById('c').checked;
	var t=document.getElementById('d').checked;
	var l=document.getElementById('e').checked;

	if(u==false && p==false && d==false && t==false && l==false)
	{
		alert("select the educ qual!!");
		return false;
	}
	var text="";
	if(u==true || p==true || d==true || t==true || l==false)
	{
		if(u==true)
			text+=" "+document.getElementById("a").value;
		if(p==true)
			text+=" "+document.getElementById("b").value;
		if(d==true)
			text+=" "+document.getElementById("c").value;
		if(t==true)
			text+=" "+document.getElementById("d").value;
		if(l==true)
			text+=" "+document.getElementById("e").value;
		
		document.raj.temp.value=text;
	}
	//DISPLINE
	var dis=document.getElementById("disc").value;
	var crct=/^[ A-Za-z]+$/;
	dis=dis.trim();
	if(dis=="")
	{
		document.getElementById("mseg").innerHTML=" *please enter the discipline";
		document.getElementById("disc").focus();
		return false;
	}
	else if(dis.match(crct))
	{
		document.getElementById("mseg").innerHTML="";
	}
	else
	{
		document.getElementById("mseg").innerHTML=" *numbers and special characters are not allowed";
		document.getElementById("disc").focus();
		return false;
	}
	
	//NUMBER
	if(document.raj.mob.value=="choose yours")
	{
		alert("select the phone code!");
		return false;
	}
	else{}
	
	//PHONE NUMBER
	var p=document.getElementById("phn").value;
	var check=/^[ 0-9]+$/;
	if(p=="")
	{
		document.getElementById("msg8").innerHTML="* enter the phone number";
		document.getElementById("phn").focus();
		return false;
	}
	else if(p.match(check))
	{
		document.getElementById("msg8").innerHTML="";
	}
	else
	{
		document.getElementById("msg8").innerHTML=" *letters and special characters are not allowed";
		document.getElementById("phn").focus();
		return false;
	}
}
	function mobi()
	{
			var select=document.getElementById("number");
			var i=select.selectedIndex;
			
			var numb=document.getElementById("phn").value;
			numb=numb.trim();
			var len=numb.length;
			
			if(len==0)
			{
				document.getElementById("msg8").innerHTML="*enter the numbers";
				return false;
				document.getElementById("phn").value="";
			}
			else if(i==1 && len<10 && len>10)
			{
				document.getElementById("msg8").innerHTML="*enter 10 numbers";
				document.getElementById("phn").focus();
				return false;
			}
			else if(i==2 && len<8 && len>8)
			{
				document.getElementById("phn").value="";
				document.getElementById("msg8").innerHTML="*enter 8 numbers";
				return false;
			}
			else
			{
				document.getElementById("msg8").innerHTML="";
			}
				
	}
</script>	
<body>
<center>			
<form name="raj" method="post" action="update2.php">

<table border="2" cellpadding="10" cellspacing="5">
<tr>
<td>ID</td>
<td><input type="text" name="ID" id="userid" size="30" value="<?php echo"$i[id]";?>" readonly>
<span id="message" style="color:red;"></span>
</td>
</tr>

<tr>
<td>NAME</td>
<td><input type="text" name="NAME" id="namea" size="30" value="<?php echo"$i[name]";?>">
<span id="message2" style="color:red;"></span>
</td>
</tr>		

<tr>
<td>GENDER</td>
<td><input type="radio" name="SEX" id="sex1" value="MALE"<?php if(strstr($fgen,"MALE"))echo"checked";?>>MALE
<input type="radio" name="SEX" id="sex2" value="FEMALE"<?php if(strstr($fgen,"FEMALE"))echo"checked";?>>FEMALE
</tr>

<tr>
<td>ADDRESS</td>
<td><textarea rows="3" cols="30" name="address" id="area" ><?php echo"$i[address]";?></textarea>
<span id="message3" style="color:red;"></span>
</td>
</tr>

<tr>
<td>MARITALSTATUS</td>
<td>
<select name="marry" id="selection">
<option value="select yours">select yours</option>
<option value="SINGLE" <?php if(strstr($fmar,"SINGLE"))echo"selected";?> >SINGLE</option>
<option value="MARRIED" <?php if(strstr($fmar,"MARRIED"))echo"selected";?> >MARRIED</option>
<option value="DIVORSED" <?php if(strstr($fmar,"DIVORSED"))echo"selected";?>>DIVORSED</option>
<option value="WIDOW" <?php if(strstr($fmar,"WIDOW"))echo"selected";?>>WIDOW</option>
</td>
</tr>

<tr>
<td>EDUCATIONAL QUALIFICATION</TD>
<td>
<input type="checkbox" id="a" name="edu" value="10th"<?php if(strstr($fedu,"10th"))echo"checked";?>>10th
<input type="checkbox" id="b" name="edu" value="12th"<?php if(strstr($fedu,"12th"))echo"checked";?>>12th
<input type="checkbox" id="c" name="edu" value="UG"<?php if(strstr($fedu,"UG"))echo"checked";?>>UG
<input type="checkbox" id="d" name="edu" value="PG"<?php if(strstr($fedu,"PG"))echo"checked";?>>PG
<input type="checkbox" id="e" name="edu" value="DOCTRATE"<?php if(strstr($fedu,"DOCTRATE"))echo"checked";?>>DOCTRATE
&ensp; &ensp;
DISCIPLINE:
<input type="text" id="disc" name="others" autocomplete="off" value="<?php echo"$i[discipline]";?>">
<span id="mseg" style="color:red;"></span>
</td>
</tr>

<tr>
<td>PHONE NUMBER</td>
<td>
<select name="mob" id="number" >
<option value="choose yours">choose yours</option>
<option value="+91" <?php if(strstr($fphn,"91"))echo"selected";?>>+91</option>
<option value="+044" <?php if(strstr($fphn,"044"))echo"selected";?>>+044</option>
&ensp;&ensp;
<input type="text" id="phn" name="phon" placeholder="Enter the phn number!!" onblur="mobi();" autocomplete="off" value="<?php echo"$i[phone]";?>">
<span id="msg8" style="color:red;"></span/>
</td>
</tr>

</table><br>
<input type="submit" value="update" onclick="return val();">
&ensp;&ensp;
<input type="reset" value="startover">
<input type="hidden" name="temp" >
</form>
</center>
</body>
</html>
<?php
			}
			if($t==0)
		{
			echo"<h2><center>THE ID:: $id IS NOT FOUND IN THE DATABASE. PLEASE ENTER THE CORRECT ID!!</h2>";
		}
		
		}	
	}
	catch(Exception $e)
	{
		echo"$e.getMessage()";
	}
}
else
{
	echo"some of the fields are empty try again";
}
?>