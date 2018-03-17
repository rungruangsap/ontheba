<?php
session_start(); // Starting Session
include "head.php";
$error = ""; // Variable To Store Error Message
$username = $_SESSION['Username'];
$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
	if ($stmt = $db->prepare("SELECT address,password,firstname,lastname,email FROM members WHERE username = '$username'")) {
		if ($stmt->execute()) {
			$add = NULL; //ที่อยู่
			$address = NULL;
			$pass = NULL;
			$password = NULL;
			$first = NULL;
			$firstname = NULL;
			$last = NULL;
			$lastname = NULL;
			$email = NULL;
			$email_2 = NULL;
					if(!$stmt->bind_result($add,$pass,$first,$last,$email))
					{
						if($stmt) $stmt->close();
						if($db) $db->close();
						die("<br/>ERROR<br/>");
					}
					while($stmt->fetch()) {
						$address = $add;
						$password = $pass;
						$firstname = $first;
						$lastname = $last;
						$email_2 = $email;
					}
		}
	}
	
	
	if (isset($_POST['edit_user_sub'])) {
	$error = NULL;
	$oldpassword = "";
	$newpassword = "";	
	$repassword = "";	
	
	if (isset($_POST["newpassword"]) && isset($_POST["oldpassword"]) && isset($_POST["repassword"])) {
		$oldpassword = trim($_POST['oldpassword']);
		$newpassword = trim($_POST["newpassword"]);
		$repassword = trim($_POST["repassword"]);
	}
	
	
	if (empty($_POST['firstname'])|| empty($_POST['lastname'])|| empty($_POST['email'])|| empty($_POST['address'])) {
	$error = "<li>Please enter the information in required form.</li>";
	
	}
	else {
			$first_name = trim($_POST['firstname']);
			$last_name = trim($_POST['lastname']);
			$email_1 = trim($_POST['email']);
			$address_new = $_POST['address'];
			
		if (isset($_POST["newpassword"])) {
			$oldpassword = stripslashes($oldpassword);	//คือการตัด \ blackslash ออกจาก string
			$newpassword = stripslashes($newpassword);	//คือการตัด \ blackslash ออกจาก string
			$repassword = stripslashes($repassword);	//คือการตัด \ blackslash ออกจาก string
			// ทำการ escape string เพื่อความปลอดภัยของฐานข้อมูล (ไม่ต้องมีก็ได้)
			//ถ้ามีการใช้อักขระพิเศษเช่น ' single quote เวลาเก็บลงในฐานข้อมูลมันจะเก็บเป็น \' เพื่อความปลอดภัยกันโดนแฮค
			$oldpassword = mysql_real_escape_string($oldpassword);
			$newpassword = mysql_real_escape_string($newpassword);
			$repassword = mysql_real_escape_string($repassword);	
			}
		}
	
		//เช็คว่ามี email ซ้ำไหม
		if(($email_1 != $email_2)||($password == $oldpassword)){
			if($email_1 != $email_2){
				$sql2 = "SELECT * FROM members WHERE email = '$email_1'";
				$result2 = $db->query($sql2);
				$row2 = mysqli_num_rows($result2); // นับจำนวนของแถวผลลัพธ์ที่เกิดจากการ query
				if($row2 > 0){
					$error .= "<li>Invalid E-mail </li>";
				}else{
					$email = $email_1;
				}
			}
			if($newpassword != $repassword){
				$error .= "<li>Invalid password </li>";
			}else{
				$password = $newpassword;
				
			}
		}
		
			// Insert ข้อมูลเข้าสู่ฐานข้อมูล
		if($error == NULL){
		$sql = "UPDATE members SET password = '$password' ,firstname = '$first_name',lastname = '$last_name',email = '$email',address = '$address_new' WHERE username = '$username'";
		$result = $db->query($sql);
		if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
			$error .= "<strong>Success!</strong> You have successfully been Edited.";
			echo "<META HTTP-EQUIV=refresh CONTENT=\"3; URL=user.php\">";
		} else {
			$error .= "<li><strong>Sorry!</strong> Edit Failed.</li>";
		}
	}else{
		$error .= "<li><strong>Sorry!</strong> Edit Failed.</li>";
	}
	}	
	
?>
<div class="main">
      <div class="shop_top">
	     <div class="container">
			 <form method="POST">
			 <?php if (isset($_POST['edit_user_sub'])) {
				echo '<div class="panel panel-warning"><div class="panel-heading">'.$error.'</div></div>';
				}else{
				echo '<br/>';
				} ?>
			<div class="register-top-grid">
				<h2>Edit your profile.</h2>
				<hr/>
				
				<fieldset>
						<legend><h4>Address-Email</h4></legend>
				<div>
					<span for="firstname">Address<label>*</label></span>
					<textarea class="form-control" rows="3" name="address"><?php echo $address; ?></textarea> 
				</div>
				<div>
					<span for="email">E-mail<label>*</label></span>
					<input type="email" name="email" value="<?php echo $email; ?>">
				</div>
				</fieldset><br>
				<fieldset>
						<legend><h4>Firstname-Lastname</h4></legend>
				<div>
					<span for="firstname">Firstname<label>*</label></span>
					<input type="text" name="firstname" value="<?php echo $firstname; ?>"> 
				</div>
				<div>
					<span for="firstname">Lastname<label>*</label></span>
					<input type="text" name="lastname" value="<?php echo $lastname; ?>"> 
				</div>
				</fieldset><br>
				<fieldset>
						<legend><h4>Change Password</h4></legend>
				<div>
					<span>Password<label>*</label></span>
					<input type="password" name="oldpassword"> 
				</div>
				<div>
					<span>New Password<label>*</label></span>
					<input type="password" name="newpassword"> 
				</div>
				<div>
					<span>Confirm Password<label>*</label></span>
					<input type="password" name="repassword"> 
				</div>
				<fieldset>
				<div class="clear"> </div>
				</div>
			<div class="clear"> </div>
			<center><input type="submit" name="edit_user_sub" class="btn btn-info" value=" Save "></center>
			</form>
					</div>
		   </div>
	  </div>
<?
	
		include "footer.php";
	
?>
</body>	
</html>