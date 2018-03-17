<?php
session_start();
include 'head_admin.php';
include 'connect.php';
?>

<br/><br/>
<div id="wrap">
 <div class="container">

  <ul class="nav nav-tabs responsive">
    <li class="active"><a data-toggle="tab" href="#add_product">ADD PRODUCT</a></li>
    <li><a data-toggle="tab" href="#view_product">VIEW PRODUCT</a></li>
    <li><a data-toggle="tab" href="#new_order">NEW ORDER</a></li>
    <li><a data-toggle="tab" href="#report">REPORTS</a></li>
	<li><a data-toggle="tab" href="#members">MEMBERS</a></li>
  </ul>

  <div class="tab-content responsive">
    <div id="add_product" class="tab-pane fade in active">
      <? include'add_product.php';?>
    </div>
    <div id="view_product" class="tab-pane fade">
      <? include'view_product.php';?>
    </div>
    <div id="new_order" class="tab-pane fade">
      <? include'new_order.php';?>
    </div>
    <div id="report" class="tab-pane fade">
	  <? include'report.php';?>
    </div>
	<div id="members" class="tab-pane fade">
	  <? include'member.php';?>
    </div>
</div>
</div>

</div>
<?
    include "footer.php";
?>

