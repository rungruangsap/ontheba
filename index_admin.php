<?php
session_start(); 
include "head_admin.php";
?>
	<div class="banner">
	<!-- start slider -->
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
               <img src="images/slider01.jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h1 class="title">Bacon is<br>Everything</h1>
                        <!-- /Text title -->
                        <div class="button"><a href="order_admin.php">Let's order</a></div>
                    </div>
                </div>
               <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
               <img src="images/slider02.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Bacon is<br>Everything</h1>
                       	<div class="button"><a href="order_admin.php">Let's order</a></div>
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
       <!--/slider -->
      </div>
	 <div class="main" background="images/bg.jpg">
      <div class="shop_top">
		<div class="container">
			<div class="row ex_box">
				<h1 class="m_2">Hot Menu</h1>
				<hr/>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/breakfast07.jpg" data-fancybox-group="gallery" title="THE BACON SWISS CROISSANT"><img src="images/breakfast07.jpg" class="img-responsive"width="100%" alt=""><span> </span>
					<div class="img_section_txt">
						THE BACON SWISS CROISSANT
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/breakfast09.jpg" data-fancybox-group="gallery" title="SCONES, MUFFINS & CROISSANTS"><img src="images/breakfast09.jpg" class="img-responsive"width="100%" alt=""><span> </span>
					<div class="img_section_txt">
						SCONES, MUFFINS & CROISSANTS
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/breakfast04.jpg" data-fancybox-group="gallery" title="THE BREAKFAST TACO"><img src="images/breakfast04.jpg" class="img-responsive"width="100%" alt=""><span> </span>
					<div class="img_section_txt">
						THE BREAKFAST TACO
					</div>
				</a></div>
				</div>
		    </div>
		    <div class="row ex_box">
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/lunch09.jpg" data-fancybox-group="gallery" title="THE GRILLED CHICKEN SANDWICH"><img src="images/lunch09.jpg" class="img-responsive"width="100%" alt=""><span> </span>
					<div class="img_section_txt">
						THE GRILLED CHICKEN SANDWICH
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/lunch06.jpg" data-fancybox-group="gallery" title="THE CALIFORNIA BACON BBQ BURRITO"><img src="images/lunch06.jpg" class="img-responsive"width="100%" alt=""><span> </span>
					<div class="img_section_txt">
						THE CALIFORNIA BACON BBQ BURRITO
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/lunch03.jpg" data-fancybox-group="gallery" title="THE BACON GRILLED CHEESE"><img src="images/lunch03.jpg" class="img-responsive"width="100%" alt=""><span> </span>
					<div class="img_section_txt">
						THE BACON GRILLED CHEESE
					</div>
				</a></div>
				</div>
		    </div>
			<div class="login_button"><a href="order_admin.php" >Let's order</a></div>
	</div>
	</div>
	
</div>
<?
    include "footer.php";
?>

</body>	
</html>