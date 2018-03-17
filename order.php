<?PHP 
			session_start();
			include "connect.php";
			
			
			
?>
<?
	
		include "head.php";
	
?>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
A:link	{
text-decoration:none;
}
A:visited	{
text-decoration:none;
}
</style>
 <br/>
    <div id="wrap"> 
<div class="container">
 
	
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h2 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" onclick="loadJSON('THE BREAKFAST')" aria-expanded="true" aria-controls="collapseOne">
						<i class="short-full glyphicon glyphicon-plus"></i>
						THE BREAKFAST
					</a>
				</h2>
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
</div>
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
<?
    include "footer.php";
?>
</body>
 
</html>