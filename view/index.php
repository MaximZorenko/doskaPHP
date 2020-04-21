<?php 
$getBody = $init->getBody(); 
?>
<?php include 'header.tpl.php';?>
<?php include "menu.tpl.php"; ?>
<div id="center">
	<?php include "side_bar.tpl.php"; ?>
	<div id="content">
		<?=$getBody?>
	</div>	
</div>
<div style="clear:both"></div>
<?php include "footer.tpl.php"; ?>
