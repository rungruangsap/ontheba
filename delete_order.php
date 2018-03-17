<?php
session_start();
include 'connect.php';
include 'head_admin.php';


	$sql = "DELETE FROM orders WHERE order_id = '".$_GET["Order_ID"]."' ";
	$result = mysql_query($sql);
	if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
		echo "<div class=\"alert alert-success\"><strong>Success!</strong> You have successfully been deleted order.</div>";
		echo "<META HTTP-EQUIV=refresh CONTENT=\"3; URL=admin_page.php\">";
	} 
?>