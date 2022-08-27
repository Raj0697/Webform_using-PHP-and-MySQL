<?php

$id = $_POST['na'];

if(!empty($id))
{
	try
	{
		$t=0;
		$conn = new mysqli("localhost","root","","water_supply");
		
		if(mysqli_connect_error())
		{
			die('Connect_Error(.'mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else
		{
			$query = "select * from water where id="$id"";
			