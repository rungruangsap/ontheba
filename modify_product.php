<?php
session_start();
include 'head_admin.php';
include 'connect.php';
?>
<?php if (isset($_POST['modify'])) {
			
			$id = $_POST["id"];
			$type = trim($_POST["type"]);
	        $menu = $_POST["menu"];
	        $menuDetail = $_POST["menuDetail"];
	        $price = trim($_POST["price"]);
			$image = $_POST["image"];
			$error = "";
			$err = "";

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
		$image = $remoteFname;	
	}
	else
	  {
		$err .= '<li>Image upload failed.</li>';
	  }
	      
		
		if (empty($_POST['menu']) || empty($_POST['menuDetail']) || empty($_POST['price'])) {
		    if (empty($_POST['menu'])){
		    $error = "<li>Please enter menu.</li>";
		    }
		    if (empty($_POST['menuDetail'])){
		    $error = "<li>Please enter detail.</li>";
		    }
		    if (empty($_POST['price'])){
		    $error = "<li>Please enter price.</li>";
		    }
	    }
		else {
			$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
			$sql = "UPDATE products SET name = '$menu' , menuDetail = '$menuDetail' , price = '$price', image = '$image' , type = '$type' WHERE id = '$id'";
			$result = $db->query($sql);
			if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
				echo "<div class=\"alert alert-success\"><strong>Success!</strong> You have successfully been modified product.</div>";
			} else {
				echo "<div class=\"alert alert-danger\"><strong>Failed!</strong><ul>'.$error.'</ul></div>";
			}
		}
	}?>
      
	<style>
th{
	  
	background-color:#d81323;
	color:white;
}
h2{
	color:#d81323;
	text-align:center;
}

  </style>
  
  

<br/>
<h2>Modify Product</h2>
<br/>
<div class= "container">
<div class="table-responsive responsive">
                <?php $sql = "SELECT * FROM products WHERE id = '".$_GET["Product_ID"]."' ";
                      $result = mysql_query($sql);
                      while($row = mysql_fetch_array($result)){
					  $id = $row["id"]; 
			          $type = $row["type"];
                      $menu = $row["name"]; 
			          $menuDetail = $row["menuDetail"];
                      $price = $row["price"]; 	
			          $image = $row["image"]; }?>

              <form action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="POST">
              <table class="table" align="center">
			    <thead>
				<tr>
				<th>ID</th>
				<th>Type</th>
				<th>Menu</th>
				<th>Detail</th>
				<th>Price</th>
				<th>Image</th>
				</tr>
				</thead> 
				<tbody>
				
				<tr>
			    <td><input type="text" class="form-control" name="id" style="width:50px;" value="<?php echo "$id" ?>" readonly></td>
				<td>
				 <select name="type" class="form-control" style="width:160px;">
				   <option value="THE BREAKFAST" <?php if($type=="THE BREAKFAST")      echo 'selected="selected"'; ?> >THE BREAKFAST</option>
				   <option value="THE LUNCH" <?php if($type=="THE LUNCH")      echo 'selected="selected"'; ?> >THE LUNCH</option>
				   <option value="THE SALADS" <?php if($type=="THE SALADS")      echo 'selected="selected"'; ?> >THE SALADS</option>
				   <option value="THE SIDES" <?php if($type=="THE SIDES")      echo 'selected="selected"'; ?> >THE SIDES</option>
				 </select>
				</td>
				<td><input type="text" class="form-control" name="menu" value="<?php echo "$menu" ?>"></td>
				<td><textarea rows="4" cols="50" class="form-control" name="menuDetail"><?php echo "$menuDetail" ?></textarea></td>
				<td><input type="number" class="form-control" name="price" style="width:80px;" value="<?php echo "$price"?>" min="49"></td>
				<td>
				 <div style="position:relative;">
              <div class="input-group">
               <label class="input-group-btn">
                <span class="btn btn-primary">
                   Browse&hellip; <input type="file" name = "myFile" style="display: none;" multiple>
                </span>
               </label>
              <input type="text"  name = "image" class="form-control" value="<?php echo "$image" ?>">
              </div>
             </div>
			 </td>
				</tr>
				</tbody>
				

			</table>
        </div>
		<div class="form-group col-xs-12">
		<center><input type="submit" name="modify" value="&nbsp; &nbsp;Modify &nbsp;&nbsp;" class="btn btn-success "></center>
				</form>
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