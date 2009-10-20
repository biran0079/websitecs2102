<?php
//  THIS FILE USED TO DEFINE CONFIGURATION RELATED VARIABLE

// copy out this file to localhost folder, don't commit your changes into SVN

// database host
define('D_HOST','localhost');

//database username
define('D_USER','cs2102');

//database password
define('D_PASS','cs2102');

//database name
define('D_DB_NAME','cs2102');

// define regular expression
define('DB_QUERY_REGEXP', '/(%d|%s|%%|%f|%b|%n)/');

// define root directory
define('SITE_ROOT', 'http://localhost/CS2102_Website/classifier');

// define debug sql
define('PRINT_QUERY',FALSE);

//show search result limit
define('SEARCH_UPPER_LIMIT',30);
//-----------------------------------Key Word-----------------------
// define default key word
define('DEFAULT_KEY_WORD','list_add_recently');
// search
define('SHOW_SEARCH_RESULT','show_search_result');

define('SHOW_NODES_BY_CATEGORY','show_category');

define('SHOW_TAG','show_tag');

?>
