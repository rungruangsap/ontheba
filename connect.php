<?php
$connection = mysql_connect("10.1.3.40", "58102010822", "58102010822") or die("ERROR: Failed to connect to the database."); 
$db = mysql_select_db("58102010822", $connection) or die("ERROR: Database not found.") ;

mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>