<?php
   require_once("./include/init.php");
   require_once('template/header.php');
   $login = check_logged_in();   //where to go if login fail
   $nid = 1;

    if (!$login){
       if (login_fail()){};
    else
       {
	    echo '<div class="nodes_display"> 
		      <div class="op_on_nodes">
	            <form name="add" action="op_on_nodes.php" method="post">
				    <input type="hidden" name="node_id" value="0" >
				    <div>Title:</div>
		            <input type="text" name="title" />
		            <br/>
		            <div>URL:</div>
		            <input type="text" name="url" />
		            <br/>
				    <input type="submit" name="op" value="Add" />
				</form>'
        echo  '<form name="edit" action="op_on_nodes.php" method="post">
				    <input type="hidden" name="node_id" value="'.$nid.'" >
                    <input type="submit" name="op" value="Edit" /> 
				</form>
				<form name="delete" action="op_on_nodes.php" method="post">
		            <input type="hidden" name="node_id" value="'.$nid.'">
                    <input type="submit" name="op" value="Delete" /> 
                </form> 
	         </div>';
			 }
  
require_once('template/footer.php');
?>


