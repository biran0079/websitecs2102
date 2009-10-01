<?php

function g_get_username(){
	session_start();
	return $_SESSION['user']['username'];
}
?>