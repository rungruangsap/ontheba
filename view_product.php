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
			 <th>Type</th>
             <th>Menu</th>
             <th>Detail</th>
             <th>Price</th>
             <th>Image</th>
			 <th>Modify</th>
			 <th>Delete</th>
            </tr>
          </thead>
          <tbody>
		  <?php $sql = "SELECT * FROM products;";
             $result = mysql_query($sql);
             while($row = mysql_fetch_array($result)){
               $id = $row["id"]; 
			   $type = $row["type"];
               $menu = $row["name"]; 
			   $menuDetail = $row["menuDetail"];
               $price = $row["price"]; 	
			   $image = "images/".$row["image"];?>
 
            <tr>
			 <td><? echo "$id"?></td>
			 <td><? echo "$type"?></td>
             <td><? echo "$menu"?></td>
             <td><? echo "$menuDetail"?></td>
             <td>฿<? echo number_format($price, 2)?></td>
             <td><img src=<? echo "$image"?> class="img-rounded" width='80' height='80'></td>
			 <td><? echo"<a href=modify_product.php?Product_ID=$id><img src=\"images/edit.png\" width='30' height='30' ></a>"?></td>
			 <td><? echo"<a href=delete_product.php?Product_ID=$id onclick=\"return confirm('Do you want to delete this?') \"><img src=\"images/del.png\" width='30' height='30' ></a>"?></td>
			</tr>
			 <?}
			 ?>
          </tbody>
        </table>
</div>

