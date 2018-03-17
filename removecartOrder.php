<?php
	session_start();
	$_SESSION["IntLine"]=0;
	unset($_SESSION["strOrders_name"]);
	unset($_SESSION["strQty"]);
	unset($_SESSION["money"]);
	header("location: ./order.php");
?>