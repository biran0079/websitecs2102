<?php
   require_once("./include/init.php");
   require_once('template/header.php');
   $login = check_logged_in(); 
   $nid = isset($_POST['node_id'])?$_POST['node_id']:$_GET['nid'];
   $query_get = "SELECT * from post_node WHERE nid = $nid";
   $result = db_query_debug($query_get);
   $row = db_fetch_array($result);
?><!-- 
 -->   
 
<?php 
   echo'<div id="page" style="padding-left:100px">
   
			<span style="padding-buttom:30px;font-size:30px;"> Edit </span>
			<form name="edit" action="midman/node_op.php" method="post">	     
      			  <input type="hidden" name="node_id" value="'.$nid.'" >
						 <div>Company Name:</div>
		        		 <input type="text" name="title" value = "'.$row['n_name'].'" >
		         		 <br/>
		         
		         		<div>Location:</div>
		         		<input type="text" name="location" value = "'.$row['location'].'" >
		         		<br/>
		         		
		         		<div>Website:</div>
		         		<input type="text" name="url" value = "'.$row['n_url'].'" >
		         		<br/>
		         		
		         		<div>Phone:</div>
		         		<input type="text" name="phone" value = "'.$row['phone'].'" >
		         		<br/>
		          
		          		<div>Email:</div>
		         		<input type="text" name="email" value = "'.$row['email'].'" >
		         		<br/>

				         <div>Select a Category:</div>
        		         <select name="category">'.
                		 	g_formatter_ui_list_all_category($nid).
                 		'</select>
                
		        		 <div>New Tag:</div>
		         			<input type="text" name="t_names" />
		         		<br/>
        		
        				<input type="submit" name="op" value="Edit" /> 
			</form></div>';

require_once('template/footer.php');
?>		         