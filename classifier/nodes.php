<?php
require_once("./include/init.php");
require_once('template/header.php');
$login = check_logged_in();   //where to go if login fail
$nid = 1;


?>
<div id="page" class="node">
	<?php if (!$login){
			ui_show_login_warning();
		}
	?>
		<div class="node_add" >
			<h2> Add New </h2>
	    	      <form name="add" action="midman/node_op.php" method="post">
					     	<input type="hidden" name="node_id" value="0" >
				 			<div>Company Name:</div>
		         			<input type="text" name="title" />
		         			<br/>
		         			<div>Location:</div>
		         			<input type="text" name="location" value="" />
		         			<br/>
		         			<div>Website:</div>
		         			<input type="text" name="url" value="http://" />
		         			<br/>
		         			<div>Phone:</div>
		         			<input type="text" name="phone" value="" />
		         			<br/>
		         			<div>Email:</div>
		         			<input type="text" name="email" value="" />
		         			<br/>
		         			<div>Description:</div>
		         			<textarea name="description" cols="35" rows="4"></textarea>
		         			<div>Select a Category:</div>
                 			<select name="category">'.
	             				<?php echo g_formatter_ui_list_all_category(); ?>
                 '			</select>
		        		 	<div>Tag:</div>
		        			<input type="text" name="t_names" />
		         			<br/>
				 			<input type="submit" name="op" value="Add" <?php if (!$login) ui_disable_submit_btn();?>/>
			  	</form>
		</div>
		<div class="node_display">
	    	   <h2>What I have:</h2>
	             		<ul>
								<?php echo g_formatter_list_user_nodes(); ?>
	             		</ul>
	           		
	       	  
	 	</div>
</div>
<div class="clearfix">&nbsp;</div>
<?php 
require_once('template/footer.php');
?>