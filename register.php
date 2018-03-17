<?php
session_start(); // Starting Session
include "head.php";
$error = ''; // Variable To Store Error Message
$username = '';
$firstname = '';
$lastname = '';
$email = '';
$address = '';
// เช็คว่ามีการกดปุ่ม Login หรือไม่
if (isset($_POST['submit_re'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST["pw"]);
	$repassword = trim($_POST["con_pw"]);
	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	$email = trim($_POST['email']);
	$address = $_POST['address'];
	if (empty($_POST['username']) || empty($_POST['pw']) || empty($_POST['con_pw'])|| empty($_POST['firstname'])|| empty($_POST['lastname'])|| empty($_POST['email'])|| empty($_POST['address'])) {
	$error = "<li>Please enter the information in required form.</li>";
	}
	else {
	$username = stripslashes($username);	//คือการตัด \ blackslash ออกจาก string
	$password = stripslashes($password);	//คือการตัด \ blackslash ออกจาก string
	$repassword = stripslashes($repassword);	//คือการตัด \ blackslash ออกจาก string
	// ทำการ escape string เพื่อความปลอดภัยของฐานข้อมูล (ไม่ต้องมีก็ได้)
	//ถ้ามีการใช้อักขระพิเศษเช่น ' single quote เวลาเก็บลงในฐานข้อมูลมันจะเก็บเป็น \' เพื่อความปลอดภัยกันโดนแฮค
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$repassword = mysql_real_escape_string($repassword);
	

	// เช็คว่ามี username ซ้ำหรือไม่
	$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
	$sql = "SELECT * FROM members WHERE username = '$username'";
	$result = $db->query($sql);
	$row = mysqli_num_rows($result); // นับจำนวนของแถวผลลัพธ์ที่เกิดจากการ query
	//เช็คว่ามี email ซ้ำไหม
	$sql2 = "SELECT * FROM members WHERE email = '$email'";
	$result2 = $db->query($sql2);
	$row2 = mysqli_num_rows($result2); // นับจำนวนของแถวผลลัพธ์ที่เกิดจากการ query
	if($row > 0 || $row2 > 0 || ($password!=$repassword)) { //ถ้าจำนวนแถวมากกว่า 0 แสดงว่า username ที่กรอกเข้ามาซ้ำ
		if($row > 0){
			$error .= "<li>Invalid username</li>";
		}
		if($row2 > 0){
			$error .= "<li>Invalid E-mail</li>";
		}
		if($password!=$repassword){
			$error .= "<li>Invalid password</li>";
		}
	} else {
	// Insert ข้อมูลเข้าสู่ฐานข้อมูล
		$sql = "INSERT into members (username,password,firstname,lastname,email,address) VALUES ('$username','$password','$firstname','$lastname','$email','$address')";
		$result = $db->query($sql);
		if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
			$error = "<strong>Success!</strong> You have successfully been register.";
			$_SESSION['login_u']=$username;
			print "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
		} else {
		$error .= "<li><strong>Sorry!</strong> Register unsuccessful.</li>";
		}
	}	
	}
}
	if(isset($_SESSION['login_u'])){
		header("location : index.php");
	}

?>
<script>
function checker(that) {
	if (that.checked) {
		toggle.style.visibility = "visible";
	} else {
		toggle.style.visibility = "hidden";
	}
}
</script>
    <div id="wrap"> 
<div class="main">
      <div class="shop_top">
	     <div class="container">
		 <?php if (isset($_POST['submit_re'])) {
			echo '<div class="panel panel-warning"><div class="panel-heading"><ul>'.$error.'</ul></div></div>';
			}else{
				echo '<br/>';
			} ?>
						<form action="<?= $_SERVER['PHP_SELF']?>" method="POST"> 
								<div class="register-top-grid">
										<h2>Register</h2>
										<div>
											<span for="firstname">Firstname<label>*</label></span>
											<input type="text" name="firstname" value="<?php echo $firstname; ?>"> 
										</div>
										<div>
											<span for="firstname">Lastname<label>*</label></span>
											<input type="text" name="lastname" value="<?php echo $lastname; ?>"> 
										</div>
										<div>
											<span for="email">E-mail<label>*</label></span>
											<input type="email" name="email" value="<?php echo $email; ?>">
										</div>
										<div>
											<span for="username">Username<label>*</label></span>
											<input type="text" name="username" value="<?php echo $username; ?>">
										</div>
										<div>
											<span for="pw">Password<label>*</label></span>
											<input type="password" name="pw" value="">
										</div>
										<div>
											<span for="pw">Confirm Password<label>*</label></span>
											<input type="password" name="con_pw" value="">
										</div>
										<div>
											<span for="address">Address<label>*</label></span>
											<textarea class="form-control" rows="3" name="address"></textarea>
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<input type="submit" name="submit_re" class="button" value="Register" >
								</form>
					</div>
		   </div>
	  </div>
	  </div>
	  <?
    include "footer.php";
?>

</body>	
</html>
										
										
										
										
