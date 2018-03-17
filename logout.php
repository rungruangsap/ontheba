<?php

	session_start();
	session_destroy();
	header("location: index.php");
	/*echo "ออกจากระบบแล้ว";
	print "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=index_1.php'>";*/

	/*unset($_SESSION['login_u']);
	session_destroy();
	header("location: index_1.php");*/
?>