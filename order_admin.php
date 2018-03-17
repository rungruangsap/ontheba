<?PHP 
			session_start();
			include "connect.php";
			
			
			
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<html>
<head>
<title>ON THE BA</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

  
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
<style>
A:link	{
text-decoration:none;
}
A:visited	{
text-decoration:none;
}
</style>
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
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index_admin.php"><img src="images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	
						    	<li><a href="order_admin.php">Orders</a></li>
						    	<li><a href="admin_page.php"><b>ADMIN : </b><?php echo "$username ";?></font></a></li>
								<li><a  href="logout.php" >LOGOUT</font></a></li>
																
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				    </div>							
	    		    <div class="clear"></div>
	    	    </div>
	            
	      </div>
		 </div>
	    </div>
	</div>
	<br/>
<div class="container" id="stdInfo">
 
	
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" onclick="loadJSON('THE BREAKFAST')" aria-expanded="true" aria-controls="collapseOne">
						<i class="short-full glyphicon glyphicon-plus"></i>
						THE BREAKFAST
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					  <div class="shop_top">
		
			<div class="row shop_box-top" id="myDiv">      
		</div>
	
</div>
				</div>
			</div>
		</div>
<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingTwo">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" onclick="loadJSON2('THE LUNCH')" aria-expanded="true" aria-controls="collapseTwo">
						<i class="short-full glyphicon glyphicon-plus"></i>
						THE LUNCH
					</a>
				</h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
					  <div class="shop_top">
		
			<div class="row shop_box-top" id="myDiv2">      
		</div>
	
</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingthree">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethree" onclick="loadJSON3('THE SALADS')" aria-expanded="true" aria-controls="collapsethree">
						<i class="short-full glyphicon glyphicon-plus"></i>
						THE SALADS
					</a>
				</h4>
			</div>
			<div id="collapsethree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingthree">
				<div class="panel-body">
					  <div class="shop_top">
		
			<div class="row shop_box-top" id="myDiv3">      
		</div>
	
</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingfour">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" onclick="loadJSON4('THE SIDES')" aria-expanded="true" aria-controls="collapsefour">
						<i class="short-full glyphicon glyphicon-plus"></i>
						THE SIDES
					</a>
				</h4>
			</div>
			<div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
				<div class="panel-body">
					  <div class="shop_top">
		
			<div class="row shop_box-top" id="myDiv4">      
		
	</div>
</div>
				</div>
			</div>
		</div>
		

	</div><!-- panel-group -->
	
	
</div><!-- container -->

 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script>

	function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".short-full")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
</body>
 
</html>