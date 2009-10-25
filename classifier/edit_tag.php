<?php
require_once("template/header.php");
require_once("include/init.php");
?>
	<div>
		<?php
			$login = check_logged_in();   //where to go if login fail
			if (!$login){		
				ui_show_login_warning();
			} 
		?>
		<div class = "node_add">
			<form name = "admin_input" action = "midman/checkin_tag.php" method = "post">
					<input type="hidden" name="op" value="add"/>
					<input type = "text" name = "t_names"/>

					<div class = "submit">
						<input type = "submit" value = "Add New" <?php if (!$login) ui_disable_submit_btn();?>/>
					</div>
			</form>
		</div>
		<div class="show_category">
			<h2>Tags</h2>
				<?php echo g_formatter_list_all_tags();?>
		</div>
		
	</div>	
<div class="clearfix">&nbsp;</div>	
<?php 
require_once('template/footer.php');
?>