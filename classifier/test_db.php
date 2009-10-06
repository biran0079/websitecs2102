<?php
// for every single file, include this file
require_once("./include/init.php");
//echo str_replace("#t_1#","Peter","Hello #t_1#!");
echo str_replace('#t_1#','http://google.com','<a href="#t_1#">Google</a>');
echo g_formatter_list_add_recently();
	
?>
