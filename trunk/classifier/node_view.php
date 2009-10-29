<?php
   require_once("./include/init.php");
   require_once('template/header.php');
   $login = check_logged_in(); 
   $nid = isset($_POST['node_id'])?$_POST['node_id']:$_GET['nid'];
    $query_get = "SELECT * from post_node WHERE nid = $nid";
   $result = db_query($query_get);
   $row = db_fetch_array($result);
   
?><!-- 
 -->   
 
<div class="node-view">
	<?php   
			echo '<span style="padding-buttom:30px;font-size:30px;"> '.$row['n_name'].' </span>
					
						<table border="1"><tr><td><span>Company Name:</span></td>
		        		<td>'.$row['n_name'].'</td></tr>
		         		 <tr><td><span>Location:</span></td>
		         		 <td>'.$row['location'].'</td></tr>
		         		 <tr><td><span>Website:</span></td>
		         		 <td><a href="'.$row['n_url'].'" target="_blank">'.$row["n_url"].'</a></td></tr>
		         		 <tr><td><span>Phone:</span></td>
		         		 <td>'.$row['phone'].'</td></tr>
		          		 <tr><td><span>Email:</span></td>
		         		 <td>'.$row['email'].'</td></tr>
		         		 <tr><td><span>Category</span></td>
        		         <td>'.$row['category'].'</td></tr>
		        		 <tr><td><span>Tag:</span></td>
		         		 <td>'.$row['tags'].'</td></tr>
		         		 <tr style="height:50px"><td><span>Description</span></td>
        		         <td>'.$row['description'].'</td></tr></table>';	
	?>

	</div>
<?php 
require_once('template/footer.php');
?>		         