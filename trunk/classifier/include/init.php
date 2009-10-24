<?php
	require_once("config.php");
	require_once("db_base.php");
	require_once("core_driver.php");
	require_once("search_lib.php");
	require_once("g_driver.php");
	require_once("ui_driver.php");
	require_once("formatter.php");
	global $active_db;
	build_connection($active_db);
	// debugger
	global $query_pool;
	$query_pool = array();	
?>