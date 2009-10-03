<?php

   $nid = $_POST['node_id'];
   $op = $_POST['op'];
   $titel = $_POST['title'];
   $url = $_POST['url'];

   
function op_on_nodes($op,$nid){
	if ($op == 'Add'){
		$query_add="INSERT INTO post_node(uid,n_url,n_name) VALUES($uid,$url,$title)";
        
	}
    else if ($op =='Delete'){
	    $query_delete = "DELETE FROM post_node WHERE nid=$nid";
    }
	else{
		$query = "SELECT * FROM post_node WHERE nid='%d'";
	    $result = db_query($query,$nid);
		
		
	}
	    }
	
	
	
		
}


?>