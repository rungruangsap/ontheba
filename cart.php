<?php
	session_start();
	if(isset($_SESSION['Username'])) {
	 //ถ้ามีข้อมูลข้อมูลเดิมเก็บอยู่ในเซสชั่นอยู่แล้ว ให้นำข้อมูลนั้นมาใช้อีก
	
	if(!isset($_SESSION["strOrders_name"])){
		$_SESSION["strOrders_name"][0] = "";
	}
	
	if(!isset($_SESSION["IntLine"])){

	 $_SESSION["IntLine"] = 0;
	 $_SESSION["strOrders_name"][0] =  $_GET["fname"];
	 $_SESSION["strQty"][0] = 1;
	 $_SESSION["money"][0] = $_GET["money"];
	}
	else
	{
	
	$key = array_search($_GET["fname"], $_SESSION["strOrders_name"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["IntLine"] = $_SESSION["IntLine"] + 1;
		 $intNewLine = $_SESSION["IntLine"];
		 $_SESSION["strOrders_name"][$intNewLine] = $_GET["fname"];
		 $_SESSION["money"][$intNewLine] = $_GET["money"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}

	}
	}
	$sum_i = $sum = "";
	$_SESSION["IntLine"] = isset($_SESSION["IntLine"]) ? $_SESSION["IntLine"] : '';
		if($_SESSION["IntLine"] != ''){
		for($i=0;$i<=(int)$_SESSION["IntLine"];$i++){
		  if(isset($_SESSION["strOrders_name"][$i]) && $_SESSION["strOrders_name"][$i]  != ""){
				echo "<li>".$_SESSION["strOrders_name"][$i]."<br/><font color='green'>". $_SESSION["money"][$i]." </font><font color='red'> (".$_SESSION["strQty"][$i].")</font> "." <button class=\"btn btn-danger btn-xs\" onclick='delCart($i)'>Del</button></li>";
				$sum_i += $_SESSION["strQty"][$i];
				for($j=0;$j<(int)$_SESSION["strQty"][$i];$j++){
					$sum += $_SESSION["money"][$i];
				}
		  }
		}
		
		echo "<br>Quantity: $sum_i <br/>";
		echo "Total: ฿".number_format($sum, 2)." <br/>";
		}
?>