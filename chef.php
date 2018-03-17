<?PHP 
			session_start();
			include "connect.php";
			
			
			
?>
<html>
<head>
<title>ON THE BA</title>
<link href="bootstrap/css/googlemap.css" rel="stylesheet" media="screen">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
<link href="bootstrap-social.css" rel="stylesheet" >
<link href="./bootstrap/css/bootstrap-social.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
</script>
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
<a href="javascript:void(0);" id="scroll" title="To Top" style="display: none;">Top<span></span></a>

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
<body >
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
		
		echo "<br>Quantity: $sum_i <br/>";
		echo "Total: ฿$sum <br/>";
		
		}
		echo"<br/></div></ol></div>";
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

<div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row ex_box">
				<h3>Our Chefs</h3>
			<br/>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a href="#demo" data-toggle="collapse">
				  <img src="images/bow.jpg" class="img-responsive" alt=""><span> </span></a>
					<div class="img_section_txt">
						Bow
					</div>
				</div>
				<br/>
				<div id="demo" class="collapse"><br/>
					<p><a href="mailto:natthapoorn.som@g.swu.ac.th" class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span>&nbsp;natthaporn.som@g.swu.ac.th</a></p>
					<p><a href="http://www.facebook.com/natthaporn.somhirun" target="_blank" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span>&nbsp;Natthaporn Somhirun</a></p>
				</div>
			</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				<a href="#demo2" data-toggle="collapse">
				  <img src="images/yuan.jpg" class="img-responsive" alt=""><span> </span></a>
					<div class="img_section_txt">
						Yuan
					</div>
				</div>
				<br/>
				<div id="demo2" class="collapse"><br/>
					<p><a href="mailto:kanjana.donpraitee@g.swu.ac.th" class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span>&nbsp;kanjana.donpraitee@g.swu.ac.th</a></p>
					<p><a href="https://www.facebook.com/yuan.kan.na" target="_blank" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span>&nbsp;Kanjana Donpraitee</a></p>
				</div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				<a href="#demo3" data-toggle="collapse">
				  <img src="images/aoi.jpg" class="img-responsive" alt=""><span> </span></a>
					<div class="img_section_txt">
						Aoi
				</div>
				</div>
				<br/>
				<div id="demo3" class="collapse"><br/>
					<p><a href="mailto:rungruangsap.aoi@g.swu.ac.th" class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span>&nbsp;rungruangsap.aoi@g.swu.ac.th</a></p>
					<p><a href="https://www.facebook.com/aoihp" target="_blank" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span>&nbsp;Rungruangsap Sukprung</a></p>
				</div>
		    </div>

</div>
</div>
<br>
<!-- Add Google Maps -->
<div class="container">
<h3> <span class="glyphicon glyphicon-map-marker"></span> We Are Here...</h3>
<br/>
<center>
<div class="col-md-12">
					<!-- Embedded Google Map  -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d968.8893650490024!2d100.56546150484479!3d13.745221650994042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xfd15aa1c632d9677!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Lio4Lij4Li14LiZ4LiE4Lij4Li04LiZ4LiX4Lij4Lin4Li04LmC4Lij4LiS!5e0!3m2!1sen!2sth!4v1448803310285" width="100%" height="80%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</center>
</div>
</div>
</div>
<?
    include "footer.php";
?>

