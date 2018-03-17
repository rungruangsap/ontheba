<?PHP 
			session_start();
			include "connect.php";
			
			
			
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ON THE BA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="bootstrap-social.css" rel="stylesheet" >
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="shortcut icon" href="./images/ontheba.png"/>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<script src="js/home.js"</script>
<!--end slider -->
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
 <?php 
	include "connect.php";
	if(isset($_SESSION['Username'])){
		$username = $_SESSION['Username'];
		$query = mysql_query("select * from members where username='$username' and role = 'admin'", $connection);
		$rows = mysql_num_rows($query); // นับจำนวนของแถวผลลัพธ์ที่เกิดจากการ query
	}
?>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.php"><img src="images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	
						    	<li><a href="order.php">Orders</a></li>
						    	<li><a href="howto.php">How to order</a></li>
						    	<li><a href="chef.php">Chefs</a></li>
								<li><a href="status.php">Status</a></li>
						    	<?php if(isset($username) && ($rows == 1)){ ?>
								<li><a href="admin_page.php"><b>ADMIN : </b><?php echo "$username ";?></font></a></li>
								<li><a  href="logout.php" >LOGOUT</font></a></li>
								<?php }else if(isset($username)) {?>
								<li><a href="./user.php"><b>Hi! </b><?php echo "$username ";?></font></a></li>
								<li><a href="logout.php" role="button">LOGOUT</font></a></li>
								<?php } else {?>
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>
								<?php } ?>								
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				    </div>							
	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
				
	    		 
						
		<?php if(isset($_SESSION['Username'])){
				    echo "<ul class=\"icon1 sub-icon1 profile_img\">";
					 echo "<li><a class=\"active-icon c1\" href=\"#\"> </a>";
						echo "<ul class=\"sub-icon1 list\">";
						  echo "<h3>Your order</h3><div class=\"check_button\"><a href=\"confirm_order.php\">Check out</a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"login_button\"><a href=\"#\" onclick=\"removeCart()\">Clear</a></div>";
						 echo "<ol><div id=\"list\">";
		 $sum_i = $sum = "";
		$_SESSION["IntLine"] = isset($_SESSION["IntLine"]) ? $_SESSION["IntLine"] : '';
		if($_SESSION["IntLine"] != ''){
		for($i=0;$i<=(int)$_SESSION["IntLine"];$i++){
		  if(isset($_SESSION["strOrders_name"][$i]) && $_SESSION["strOrders_name"][$i]  != ""){
				echo "<li>".$_SESSION["strOrders_name"][$i]."<br/><font color='green'>". $_SESSION["money"][$i]." </font><font color='red'> (".$_SESSION["strQty"][$i].")</font> "." <button class=\"btn btn-danger btn-xs\" onclick='delCart($i)'>Del</button></li>";
				$sum_i += $_SESSION["strQty"][$i];
				for($j=0;$j<(int)$_SESSION["strQty"][$i];$j++){
					$sum += $_SESSION["money"][$i];
				}
		  }
		}
		echo"<br/>";
		echo"<div>";
		echo "Quantity: $sum_i <br/>";
		echo "Total: ฿$sum <br/>";
		echo"</div>";
		}
		echo"</div></ol></ul></li></ul>";
		}else{
			echo "&nbsp;";
		}
						  
						  
						  echo " <div class=\"clear\"></div>";
						 echo "</ul>";
					  echo "</li>";
				    echo "</ul>";
		            echo "<div class=\"clear\"></div>";
					?>
	       </div>
	      </div>
		 </div>
	    </div>
	</div>
</head>
<body>

<br/>

 <div class="container">
  
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">First</a></li>
    
    <li><a data-toggle="tab" href="#menu2">Second</a></li>
    <li><a data-toggle="tab" href="#menu3">Third</a></li>
	<li><a data-toggle="tab" href="#menu4">Fourth</a></li>
	<li><a data-toggle="tab" href="#menu5">Fifth</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <br/>
      <p><strong> Login</strong><br/><br/>
      As it’s a new customer please create yourself a new account by clicking register top left hand side of webpage or register
      on the account Log in page click Create an Account at the button of the page</p><br/>
     <center><img src="images/howto1.jpg" alt="" /></center>
    </div>
    <div id="menu2" class="tab-pane fade">
     <br/>
      <p><strong>Let's order</strong><br/><br/>Click on the order button at menu you want.</p><br/>
	  <center><img src="images/howto2.jpg" alt="" /></center>
    </div>
    <div id="menu3" class="tab-pane fade">
      <br/>
      <p><strong>Check cart details.</strong><br/><br/>Choose close and continue to order or checkout.</p><br/>
	  <center><img src="images/howto3.jpg" alt="" /></center>
    </div>
    <div id="menu4" class="tab-pane fade">
      <br/>
      <p><strong>Confirm your orders.</strong><br/><br/>Confirm your order summary and delivery information.</p><br/>
	  <center><img src="images/howto4.jpg" alt="" /></center>
    </div>
	<div id="menu5" class="tab-pane fade">
      <br/>
      <p><strong>Check your order status.</strong><br/><br/>It have to update your order status such as cooking , on the way and paid.</p><br/>
	  <center><img src="images/howto5.jpg" alt="" /></center>
    </div>
  </div>
  <br/>
</div>



</body>
</html>