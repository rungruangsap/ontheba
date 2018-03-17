<?php 
session_start();
include 'connect.php';
?>

<style>
th{
	  
	background-color:#d81323;
	color:white;
}

  </style>

<br/>
<br/>

<div class="table-responsive responsive">
        <table class="table">
          <thead>
            <tr>
			 <th>Order_ID</th>
			 <th>Username</th>
             <th>Status</th>
			 <th>Update</th>
			 <th>Delete</th>
            </tr>
          </thead>
          <tbody>
		  <?php $sql = "SELECT * FROM orders;";
             $result = mysql_query($sql);
             while($row = mysql_fetch_array($result)){
               $id = $row["order_id"]; 
			   $username = $row["username"];
               $order_status = $row["order_status"];?>
 
            <tr>
			 <td><? echo "$id"?></td>
			 <td><? echo "$username"?></td>
             <td><? echo "$order_status"?></td>
			 <td><? echo "<a href=update_status.php?Order_ID=$id class=\"btn btn-danger\" role=\"button\">Update</a>"?></td>
			 <td><? echo"<a href=delete_status.php?Order_ID=$id onclick=\"return confirm('Do you want to delete this?') \"><img src=\"images/del.png\" width='30' height='30' ></a>"?></td>
			</tr>
			 <?}
			 ?>
          </tbody>
        </table>
</div>

