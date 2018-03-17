<?php
	session_start();
	mysql_connect("10.1.3.40","58102010822","58102010822");
	mysql_select_db("58102010822");
	
	$strSQL = "SELECT * FROM members WHERE username = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
		
	echo "<script> alert ('Username and Password Incorrect!'); location='login.php';</script>";
	}
	
	else{
		$_SESSION["UserID"] = $objResult["id"];
			$_SESSION["Username"] = $objResult["username"];
			
			$_SESSION["Status"] = $objResult["role"];

			session_write_close();
			
			if($objResult["role"] == "admin")
			{
				header("location:index_admin.php");
			}
			else
			{
				header("location:index.php");
			}
			
	}
	
	
	mysql_close();
?>
