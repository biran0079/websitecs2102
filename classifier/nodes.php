<?php
require_once("./include/init.php");
require_once('template/header.php');
$login = check_logged_in();   //where to go if login fail
$nid = 1;

if (!$login){
	echo "login in fail";
}
else
{
	echo '<div class="add_nodes">
	          <form name="add" action="midman/node_op.php" method="post">
			     <input type="hidden" name="node_id" value="0" >
				 <div>Title:</div>
		         <input type="text" name="title" />
		         <br/>
		         <div>URL:</div>
		         <input type="text" name="url" value="http://" />
		         <br/>
		         <div>Select a Category:</div>
                 <select name="category">'.
	             g_formatter_ui_list_all_category().
                 '</select>
                 </div>
		         <div>Tag:</div>
		         <input type="text" name="t_names" />
		         <br/>
				 <input type="submit" name="op" value="Add" />
			  </form>';

	echo  '<div class="nodes_display">
	       <ul>
               <li>
	           <h2>Links</h2>
	             <ul>'.
	g_formatter_list_user_nodes().
	             '</ul>
	           </li>
	       </ul>
	       </div>';
	 
}
require_once('template/footer.php');
?>