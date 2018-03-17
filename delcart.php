<?php
	session_start();
	$Line2 = $_GET["Line"];
	if($_SESSION["strQty"][$Line2]){
		if($_SESSION["strQty"][$Line2] == "1"){
			$_SESSION["strOrders_name"][$Line2] = "";
			$_SESSION["strQty"][$Line2] = "";
		}else{
			$_SESSION["strQty"][$Line2] = $_SESSION["strQty"][$Line2] - 1;
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
		if($sum_i < 1){
			$_SESSION["IntLine"]=0;
			unset($_SESSION["order"]);
			unset($_SESSION["sum_post"]);
			unset($_SESSION["strOrders_name"]);
			unset($_SESSION["strQty"]);
			unset($_SESSION["money"]);
		}else{
		echo "<br>Quantity: $sum_i <br/>";
		echo "Total: ฿".number_format($sum, 2)." <br/>";
		}
		}

?>