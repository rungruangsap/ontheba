<?php
session_start();
include 'head_admin.php';
include 'connect.php';
?>
<?php if (isset($_POST['update_status'])) {

			$id = $_POST["order_id"];
	        $username = $_POST["username"]; 
			$order_status = trim($_POST["status"]);
			
			$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
			$sql = "UPDATE orders SET order_status = '$order_status' WHERE order_id = '$id'";
			$result = $db->query($sql);
			if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
				echo "<div class=\"alert alert-success\"><strong>Success!</strong> You have successfully been updated order status.</div>";
				echo "<META HTTP-EQUIV=refresh CONTENT=\"3; URL=admin_page.php\">";
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

	  <h2>Update Status</h2>
<br/>
<div class="container">
<div class="table-responsive responsive">
                <?php $sql = "SELECT * FROM orders WHERE order_id = '".$_GET["Order_ID"]."' ";
                      $result = mysql_query($sql);
                      while($row = mysql_fetch_array($result)){
					  $id = $row["order_id"]; 
			          $username = $row["username"];
                      $order_status = $row["order_status"]; }?>

              <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
              <table class="table" align="center">
			    <thead>
				<tr>
				<th>Order_ID</th>
				<th>Username</th>
				<th>Status</th>
				</tr>
				</thead> 
				<tbody>
				
				<tr>
			    <td><input type="text" class="form-control" name="order_id" style="width:70px;" value="<?php echo "$id" ?>" readonly></td>
				<td><input type="text" class="form-control" name="username" style="width:200px;" value="<?php echo "$username" ?>" readonly></td>
				<td>
				 <select name="status" class="form-control" style="width:160px;">
				   <option value="Cooking" <?php if($order_status=="Cooking")      echo 'selected="selected"'; ?> >Cooking</option>
				   <option value="On the way" <?php if($order_status=="On the way")      echo 'selected="selected"'; ?> >On the way</option>
				   <option value="Paid" <?php if($order_status=="Paid")      echo 'selected="selected"'; ?> >Paid</option>
				 </select>
				</td>
				</tr>
				</tbody>
			</table>
        </div><br/>
		<div class="form-group col-xs-12">
		<center><input type="submit" name="update_status" value="&nbsp; &nbsp;Update &nbsp;&nbsp;" class="btn btn-success "></center>
				</form>
		</div>
	</div>