<?php
session_start();

		$_SESSION["IntLine"] = isset($_SESSION["IntLine"]) ? $_SESSION["IntLine"] : '';
		

	include "head.php";
	
	
		$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
		$error = ""; // Variable To Store Error Message
		$sum_post = $_SESSION['sum_post'];
		$order = $_SESSION['order'];
		date_default_timezone_set('Asia/Bangkok');
		$date = date("Y-m-d H:i:s"); 
		$comment=$_POST['comment'];
		if ($stmt = $db->prepare("SELECT address FROM members WHERE username ='$username'")) {
			if ($stmt->execute()) {
					$address = NULL;
					if(!$stmt->bind_result($address))
					{
						
						if($stmt) $stmt->close();
						if($db) $db->close();
						die("<br/>ERROR<br/>");
					}
					while($stmt->fetch()) {
						$address_new = $_POST['address'];
						}
			}
		}
		if((isset($_POST['buy_submit']))){
		$sql = "INSERT into orders (username,order_menu,order_price,order_date,order_address,comment) VALUES ('$username','$order','$sum_post','$date','$address_new','$comment')";
		$result = $db->query($sql);
		if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
			$error = "<li>GREAT! </li><li>Please wait 35 minutes..</li>";
			$_SESSION["IntLine"]=0;
			unset($_SESSION["strOrders_name"]);
			unset($_SESSION["strQty"]);
			unset($_SESSION["money"]);
		} else {
			$error .= "<li>Sorry, Please try to order again..</li>";
		}
	}

?>
<div class="container">
	<div class="w3-col m2">&nbsp;</div>
		<div class="w3-col m8 w3-card-2 w3-container">
		<br/>
		<h1><span></span> Your orders..</h1>
		<hr/>
		<?php if (isset($_POST['buy_submit'])) {
			echo '<div class="panel panel-success"><div class="panel-heading"><ul>'.$error.'</ul></div></div>';
			}?>
			
		<ol>
			<?php $sum = "";
			$sum_i="";
			$order="";
			$post = 50;
				if($_SESSION["IntLine"] != ''){
					for($i=0;$i<=(int)$_SESSION["IntLine"];$i++){
					  if(isset($_SESSION["strOrders_name"][$i]) && $_SESSION["strOrders_name"][$i]  != ""){
							echo "<li>".$_SESSION["strOrders_name"][$i]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='green'>".$_SESSION["strQty"][$i]."&nbsp;x&nbsp;฿". number_format($_SESSION["money"][$i], 2)."  </li></font>";
							$sum_i += $_SESSION["strQty"][$i];
							
							for($j=0;$j<(int)$_SESSION["strQty"][$i];$j++){
								$sum += $_SESSION["money"][$i];
							}
							$order .= $_SESSION["strOrders_name"][$i]."(". $_SESSION["strQty"][$i] .") ";
					  }
					}
				}else if((!isset($_POST['buy_submit']))){
						echo "You didn't ordered!";
					}
				 ?>
		</ol>
		
			<?php 
			if($_SESSION["IntLine"] != ''){
				$_SESSION['order'] = $order;
				$sum_post = $sum + $post;
				$_SESSION['sum_post'] = $sum_post;
				echo "<br/>&nbsp;&nbsp;<font color=\"green\">Subtotal&nbsp;&nbsp;&nbsp;฿".number_format($sum, 2)."</font>";
				echo "<br/>&nbsp;&nbsp;<font color=\"red\">*Delivery fee ฿".number_format($post, 2)."</font><br/><font color=\"green\">&nbsp;&nbsp;Total&nbsp;= ฿".number_format($sum_post, 2)."</font><br/>&nbsp;&nbsp;";
			echo"<form method=\"POST\">";
			echo"<div>";
					echo"<span for=\"address\">Address<label>*</label></span>";
					echo"<textarea class=\"form-control\" rows=\"3\" name=\"address\"> $address</textarea><br/>" ;
					echo"<span for=\"address\">Comment</span>";
					echo"<textarea class=\"form-control\" rows=\"3\" name=\"comment\"></textarea><br/>" ;
					echo "<form method=\"POST\">&nbsp;&nbsp;<input name=\"buy_submit\" class=\"btn btn-success\" type=\"submit\" value=\"Comfirm\">&nbsp;&nbsp;&nbsp;<a href=\"removecartOrder.php\"><button class=\"btn btn-danger\" type=\"button\">&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;</button></a></form>";
             echo"</div>";
			 echo"</form >";
				
			}
			?>
			<br/>
		</div>

</div>
</body>
</html>