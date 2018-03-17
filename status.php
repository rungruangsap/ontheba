<?PHP 
			session_start();
			include "connect.php";
			
			
			
?>
<?
	
		include "head.php";
	
?>
<style>
th{
	  
	background-color:#d81323;
	color:white;
}

 </style>
<script type='text/javascript'>
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>
<a href="javascript:void(0);" id="scroll" title="กลับไปบนสุด" style="display: none;">Top<span></span></a>

<script>
var amountScrolled = 300;

$(window).scroll(function() {
 if ( $(window).scrollTop() > amountScrolled ) {
  $('a.back-to-top').fadeIn('slow');
 } else {
  $('a.back-to-top').fadeOut('slow');
 }
});
</script> 
 <div id="wrap"> 
 <div class="container">
<?php


echo"<br/>";
	$db = new mysqli("10.1.3.40", "58102010822", "58102010822", "58102010822");
	if(isset($_SESSION['Username'])){
		echo"<div class=\"table-responsive responsive\">";
						echo"<table class=\"table\">";
							echo"<thead>";
								echo"<tr>";
								echo"<th>Your Orders</th>";
								echo"<th>Comment</th>";
								echo"<th>Price</th>";
								echo"<th>Status</th>";
								echo"</tr>";
							echo"</thead>";
						echo"<tbody>";
		if ($stmt = $db->prepare("SELECT * FROM orders WHERE username = '$username'")) {
				/*execute query*/
				if ($stmt->execute()) {
					$order_id = $username = $order_menu = $order_price = $order_date  = $order_address = $comment = $order_status= NULL;
					if(!$stmt->bind_result($order_id , $username , $order_menu , $order_price , $order_date  , $order_address , $comment,$order_status))
					{
						if($stmt) $stmt->close();
						if($db) $db->close();
						die("<br/><br/>");
					}	
					while($stmt->fetch()) {
					echo"<tr>";
						echo"<td>$order_menu</td>";
						echo"<td>$comment</td>";
						echo"<td>$order_price</td>";
						echo"<td>$order_status</td>";
				   echo"</tr>";
					}
				}	
		}
	}else{
		echo "<br/><h2><span></span>Please login to let's order!</h2>";
		echo"<div class=\"button2\">";
		echo"<div class=\"check_button\"><a href=\"login.php\">Login</a></div>";
	   
		echo"</div>";
	}
	echo"</div>";
				
	
?>	
</div>
</div>

				
				   
				   
						
						
					
	
								
				
	