<?php
	session_start();
	$_SESSION["IntLine"]=0;
	unset($_SESSION["order"]);
	unset($_SESSION["sum_post"]);
	unset($_SESSION["strOrders_name"]);
	unset($_SESSION["strQty"]);
	unset($_SESSION["money"]);
	//เก็บข้อมูลในเซสชั่น เผื่อมีการหยิบสินค้าครั้งต่อไปก็นำข้อมูลนี้มาใช้อีก
?>