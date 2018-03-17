<?php
session_start(); 



$error = ''; // Variable To Store Error Message
$menuName = '';
$menuDetail = '';
$image = '';
$price = '';
$type = '';


if (isset($_POST['add_product'])) {
	$err = "";
	$type = trim($_POST['type']);
	$menu = $_POST["menu"];
	$menuDetail = $_POST["menuDetail"];
	$price = trim($_POST["price"]);
	$error = "";
	
	$target_dir = "images";
	$target_file = $target_dir . basename($_FILES["myFile"]["name"]);
	$uploadOk = 1;


	$ftp_server = "10.1.3.40";
	$ftp_conn = ftp_connect($ftp_server);
	$login = ftp_login($ftp_conn, '58102010822', '58102010822');

	$file = $_FILES["myFile"]["tmp_name"];

	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}

	 chmod ( $_FILES["myFile"]["tmp_name"] , 777 );
	 
	 ftp_pasv($ftp_conn, true);
	 
	 ftp_chdir($ftp_conn,'ontheba/images/');
	//if (ftp_put($ftp_conn, "serverfile.jpg", $file,FTP_BINARY  ))

	$remoteFname = preg_replace('"\.tmp$"', '.jpg',basename($_FILES["myFile"]["name"]));

	if (ftp_put($ftp_conn, $remoteFname,$file,FTP_BINARY  )) {
		$image .= $remoteFname;	
	}
	else
	  {
		$err .= '<li>Image upload failed.</li>';
	  }
	
	
	if (empty($_POST['menu']) || empty($_POST['menuDetail']) || empty($_POST['price'])) {
		$error = "<strong>Add product failed.</strong>";
		if (empty($_POST['menu'])){
		$error .= "<li>Please enter menu.</li>";
		}
		if (empty($_POST['menuDetail'])){
		$error .= "<li>Please enter detail.</li>";
		}
		if (empty($_POST['price'])){
		$error .= "<li>Please enter price.</li>";
		}
		echo "<META HTTP-EQUIV=refresh CONTENT=\"3; URL=admin_page.php\">";
	}
	else {
		$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
		$sql = "INSERT INTO products (name,menuDetail,image,price,type) VALUES ('$menu','$menuDetail','$image','$price','$type')";
		$result = $db->query($sql);
		if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
			$error = "You have successfully been added product.<li>MENU: $menu</li><li>DETAIL: $menuDetail</li><li>PRICE: ฿$price</li><li>TYPE: $type</li>";
			$err .= '<li>IMAGE:'.$remoteFname.' </li>';
			echo "<META HTTP-EQUIV=refresh CONTENT=\"3; URL=admin_page.php\">";
		}
			
		
	}
}
?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<div class="w3-row" id="maincontainer" >
			<div class="w3-col m2">&nbsp;</div>
			<div class="w3-col m8 w3-card-2 w3-container">
	        <?php if (isset($_POST['add_product'])) {
				if($result) {
				echo "<div class=\"alert alert-success\">$error $err</div>";
				}else{
				echo "<div class=\"alert alert-danger\">$error $err</div>";
				}
			}else{
				echo '<br/>';
			}			
			?>
			<form action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data"  method="POST">
			<div class="col-xs-12 "><label>TYPE</label>  <br/> <select name="type" class="form-control">
					<option value="THE BREAKFAST">THE BREAKFAST</option>
					<option value="THE LUNCH">THE LUNCH</option>
					<option value="THE SALADS">THE SALADS</option>
					<option value="THE SIDES">THE SIDES</option>
				</select><br/></div>
			<div class="col-xs-12 "><label>MENU</label> <br/> <input type="text" name="menu" placeholder="Name" class="form-control"/><br/></div>
			<div class="col-xs-12 "><label>DETAIL</label> <br/> <input type="text" name="menuDetail" placeholder="Detail" class="form-control"/><br/></div>
			<div class="col-xs-12 "><label>PRICE</label><br/> <input type="number" name="price" placeholder="Price" class="form-control" min="49" /><br/></div>
			<div class="col-xs-12 "><label>IMAGE</label>   
			 <div style="position:relative;">
              <div class="input-group">
               <label class="input-group-btn">
                <span class="btn btn-primary">
                   Browse&hellip; <input type="file" name="myFile" style="display: none;" multiple>
                </span>
               </label>
              <input type="text" class="form-control" readonly>
              </div>
             </div><br/>
			</div>
			<center><input type="submit" name="add_product" value="&nbsp;&nbsp;&nbsp;&nbsp;ADD&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-danger"/></center>
			</form>
			
			
			
		</div>
		<div class="w3-col m2">&nbsp;</div>
</div>

<script>
$(function() {
  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});	
</script>