<?php
   require_once("./include/init.php");
   require_once('template/header.php');
   $login = check_logged_in(); 
   $nid = $_POST['node_id'];

   echo'<div class="edit_nodes">
		<form name="edit" action="midman/node_op.php" method="post">	     
        <input type="hidden" name="node_id" value="'.$nid.'" >
				 <div>New Title:</div>
		         <input type="text" name="title" />
		         <br/>
		         <div>New URL:</div>
		         <input type="text" name="url" />
		         <br/>
        <input type="submit" name="op" value="Edit" /> 
		</form>';

require_once('template/footer.php');
?>		         