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
			 <th>ID</th>
			 <th>Username</th>
             <th>Menu</th>
             <th>Price</th>
			 <th>Delete</th>
            </tr>
          </thead>
          <tbody>
		  <?php $sql = "SELECT * FROM orders;";
             $result = mysql_query($sql);
             while($row = mysql_fetch_array($result)){
               $id = $row["order_id"]; 
			   $username = $row["username"];
               $order_menu = $row["order_menu"]; 
               $order_price = $row["order_price"]; 	
		  ?>
 
            <tr>
			 <td><? echo "$id"?></td>
			 <td><? echo "$username"?></td>
             <td><? echo "$order_menu"?></td>
             <td>฿<? echo number_format($order_price, 2)?></td>
			 <td><? echo"<a href=delete_order.php?Order_ID=$id onclick=\"return confirm('Do you want to delete this?') \"><img src=\"images/del.png\" width='30' height='30' ></a>"?></td>
			</tr>
			 <?}
			 ?>
          </tbody>
        </table>
</div>