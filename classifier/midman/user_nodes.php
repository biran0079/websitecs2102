<?php

function node_search(){
    $uid = g_get_login_uid();
    $query_search = "SELECT * FROM post_node WHERE uid=$uid ORDER BY date_update";
    $result = db_query($query_search);
   
 
    while($row=db_fetch_array($result)){
    }
    
    
    }