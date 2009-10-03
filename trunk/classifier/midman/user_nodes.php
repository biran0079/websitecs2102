<?php

function node_search(){
    $uid = g_get_login_uid();
    $query_search = "SELECT * FROM post_node WHERE uid=$uid ORDER BY date_update";
    $result = db_query($query_search);
   
 
    $html = '';
    while($row=db_fetch_array($result)){
    	$nid = $row['nid'];
    	$n_name = $row['n_name'];
    	$sub_html =  '<div>'.
    				$n_name.'<a href="node_edit.php?op=edit&nid='.$nid.'"> Edit</a>';
    	$sub_html .= '<a href="midman/node_op.php?op=delete&nid='.$nid.'"> Delete </a>';
    	$sub_html.= "</div>";
    	$html .= $sub_html;
    }
    
    return $html;
    
    }