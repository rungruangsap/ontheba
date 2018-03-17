<?
session_start(); 
if(isset($_POST['send'])) {		
	$err = "Not found!";
	$name_user = $_POST['forgot1'];
	$name_email = $_POST['forgot2'];
	$name_user = stripslashes($name_user);
	$name_email = stripslashes($name_email);
	// ทำการ escape string เพื่อความปลอดภัยของฐานข้อมูล (ไม่ต้องมีก็ได้)
	$name_user = mysql_real_escape_string($name_user);
	$name_email = mysql_real_escape_string($name_email);
	$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
	if ($stmt = $db->prepare("SELECT password FROM members WHERE email = '$name_email' AND username ='$name_user'")) {
		if ($stmt->execute()) { //อ่านข้อมูลที่ได้จากการรัน
			$pass_for = NULL;
					if(!$stmt->bind_result($pass_for))
					{
						
						if($stmt) $stmt->close();
						if($db) $db->close();
						die("<br/>ERROR<br/>");
						
						
					}
					while($stmt->fetch()) {
						echo "<script> alert ('Your Password :$pass_for'); location='login.php';</script>";
						
					}
	}
	}
		echo "<script> alert( '$err');location='login.php';</script>";
	}

mysql_close();
?>
<!-- Modal -->
										<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog">
    
										<!-- Modal content-->
										<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Forgot Password</h4>
										</div>
										<div class="modal-body">
											<p><form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
								<br/>
								<div class="form-group">
								<label for="username">Enter your username :</label>
								<input type="text" name="forgot1" value="" placeholder="username"  class="form-control">
								</div> 
								<div class="form-group">
								<label for="username">Enter your E-mail :</label>
								<input type="email" name="forgot2" value="" placeholder="(example@hotmail.com)"  class="form-control">
								</div>
								<br/><br/><br/>
								
										</div>
										<div class="modal-footer">
											<input type="submit" name="send" value="Send" class="btn btn-primary ">
										</div>
										</form></p>
									</div>
      
								</div>
							</div>