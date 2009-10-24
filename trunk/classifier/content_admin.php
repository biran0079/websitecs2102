<?php
require_once("template/header.php");
require_once("include/init.php");//where to go if login fail
?>

<div class="left-side">
	<div id="nodes">
		<div class="admin">
			<h2>Nodes</h2>
			<?php echo g_formatter_list_admin_nodes('col_1');?>
		</div>
	</div>
</div>
<div class="right-side">
	<div id="nodes">
		<div class="admin">
			<h2>&nbsp;</h2>
			<?php echo g_formatter_list_admin_nodes('col_2');?>
		</div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>


<?php 
require_once("template/footer.php");
?>