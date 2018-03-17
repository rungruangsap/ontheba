<?php
session_start();
include 'connect.php';
include 'head_admin.php';


	$sql = "DELETE FROM members WHERE mem_id = '".$_GET["Member_ID"]."' ";
	$result = mysql_query($sql);
	if($result) { // ถ้า query สำเร็จ $result จะให้ค่า true
		echo "<div class=\"alert alert-success\"><strong>Success!</strong> You have successfully been deleted member.</div>";
	} 
?>
<script>
function newDoc() {
    window.location.assign("admin_page.php")
}
</script>
<center><input type="button" value="Back to admin page" onclick="newDoc()"></center>
