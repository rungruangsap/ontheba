<?php
session_start();
?>
<?          $db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
			/* Prepared statement, stage 1: prepare */
			$name = $_GET["name"];
			$name_menu = "";
			switch($name){
				case "THE BREAKFAST" : $name_menu = "THE BREAKFAST"; break;
				case "THE LUNCH" : $name_menu = "THE LUNCH"; break;
				case "THE SALADS" : $name_menu = "THE SALADS"; break;
				case "THE SIDES" : $name_menu = "THE SIDES"; break;
				default : $name_menu = ""; break;
			}?>
			
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="/lib/jquery-1.12.2.min.js"></script>
  <script src="/lib/bootstrap.min.js"></script>
 
</head>
<body>

          <?php if ($stmt = $db->prepare("SELECT * FROM products WHERE type = '$name' ORDER BY id DESC")) {
				/*execute query*/
				if ($stmt->execute()) {
					$id = $name  = $menuDetail= $image = $price = $type = NULL;
					if(!$stmt->bind_result($id , $name  , $menuDetail , $image , $price , $type))
					{
						echo "<font color =\"red\">Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error ."</font>";
						if($stmt) $stmt->close();
						if($db) $db->close();
						die("<br/>ERROR<br/>");
					}
					while($stmt->fetch()) { ?>

                    <div class="col-sm-4">
                     <div class="panel panel-primary" style="border:1; border-color:#000;">
                      <div class="panel-heading" style="background-color:#000; text-align:center;"><? echo"$name"?></div><br/>
                     
                     <div><? echo"<center><a title=\"$menuDetail\" style=\text-align:center;\"><img src=\"./images/$image\" class=\"img-responsive\" style=\"border-radius:5px;\"></a></center>"?></div><br/>
					  

					  <div class="panel-body"><? echo"<center><strong><p>฿".number_format($price, 2)."</p></strong></center>"?></div>
                      <div class="panel-footer" style="background-color:#d81323;">
					  <? if(isset($_SESSION['Username'])){ 
							echo"<center><button type=\"button\" onclick=\"addCart('$name','$price')\" class=\"btn btn-success\">ORDER</button><center>";
                      }else{
							echo"<center><a href=\"login.php\"><button type=\"button\" class=\"btn btn-danger\">ORDER NOW</button></a></center>";
					  }
					  
					  ?>
                      </div>
                     </div>
					 <br/>
					</div>
					<?}?>
					
				<?}
				}?>
</body>
 </html>
	

		
					