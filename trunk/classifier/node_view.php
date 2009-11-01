<?php
require_once("./include/init.php");
require_once('template/header.php');
$login = check_logged_in();
$nid = isset($_POST['node_id'])?$_POST['node_id']:$_GET['nid'];


$result=db_query("SELECT c_name FROM post_node AS p,node_category AS nc,category AS c WHERE 
				p.nid=nc.nid AND nc.cid=c.cid AND p.nid=".$nid);
$row=db_fetch_array($result);
$catagory=$row["c_name"];
$result=db_query("SELECT t_name FROM post_node AS p,node_tag AS nt,tag AS t WHERE 
				p.nid=nt.nid AND nt.tid=t.tid AND p.nid=".$nid);
$tags="";
while($row=db_fetch_array($result)){
	$tags=$tags.$row['t_name']." ";
}

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
        		         <td>'.$catagory.'</td></tr>
		        		 <tr><td><span>Tag:</span></td>
		         		 <td>'.$tags.'</td></tr>
		         		 <tr style="height:50px"><td><span>Description</span></td>
        		         <td>'.$row['description'].'</td></tr></table>';	
	?>

	</div>
<?php 
require_once('template/footer.php');
?>		         