<?php
   require_once("../include/init.php");
   
   $nid = isset($_POST['node_id'])?$_POST['node_id']:$_GET['nid'];
   $op = isset($_POST['op'])?$_POST['op']:$_GET['op'];
   $title = $_POST['title'];
   $url = $_POST['url'];
   $uid = g_get_login_uid();
   $cid = $_POST['category'];

	if ($op == 'Add'){
		$query_add="INSERT INTO post_node(uid,n_url,n_name,visit_times,date_add,date_update) VALUES(%d,'%s','%s',%d,NOW(),NOW())";
        $result= db_query($query_add,$uid,$url,$title,0);
        
        if($result) {
        	$last_nid =db_last_insert_id(post_node,nid);
        	$t_names=$_POST["t_names"];
	        g_add_tag_by_node($t_names, $last_nid);
        	$query_add_nc="INSERT INTO node_category(nid,cid)VALUES(%d,%d)";
            $result_nc= db_query_debug($query_add_nc,$last_nid,$cid);
        	header( "Location: ".SITE_ROOT."/nodes.php?nid=$last_nid");
        	print "A new entry has been successfully added.";
        }
        else{
        	print "The URL already exists.";
        }
    }
    
    else if ($op =='Delete'){
	    $query_delete = "DELETE FROM post_node WHERE nid=$nid";
	    $result= db_query($query_delete);
	    $query_delete_nc = "DELETE FROM node_category WHERE nid=$nid";
	    $result_nc= db_query($query_delete_nc);
	    
	    if($result){
	        header( "Location: ".SITE_ROOT."/nodes.php?nid=$nid");
	        //print "An entry has been successfully deleted.";
	    }
	    else{
	    	print "delete action fails";
	    }
    }

	else{	
		
		$query_edit = "UPDATE post_node SET n_name='%s',n_url='%s',date_update='NOW()' WHERE nid=%d";		
        $result = db_query($query_edit,$title,$url,$nid);
	    $query_edit_nc = "UPDATE node_category SET cid=%d WHERE nid=%d";		
        $result_nc = db_query($query_edit_nc,$cid,$nid);
        
	    if($result){
	    	header( "Location: ".SITE_ROOT."/nodes.php?nid=$nid");
	    	print "An entry has been successfully edited.";
	    }
        else print "Edit action fails";			
        
	}
   
?>