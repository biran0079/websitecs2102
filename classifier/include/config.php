<?php
//  THIS FILE USED TO DEFINE CONFIGURATION RELATED VARIABLE

// copy out this file to localhost folder, don't commit your changes into SVN

// database host
define('D_HOST','localhost');

//database username
define('D_USER','wangsha');

//database password
define('D_PASS','wangsha');

//database name
define('D_DB_NAME','cs2102_zc');

// define regular expression
define('DB_QUERY_REGEXP', '/(%d|%s|%%|%f|%b|%n)/');

// define root directory
define('SITE_ROOT', 'http://localhost/CS2102_Website/classifier');

// define debug sql
define('PRINT_QUERY',TRUE);

//show search result limit
define('SEARCH_UPPER_LIMIT',30);
//-----------------------------------Key Word-----------------------
// define default key word
define('DEFAULT_KEY_WORD','list_add_recently');
// search
define('SHOW_SEARCH_RESULT','show_search_result');

define('SHOW_NODES_BY_CATEGORY','show_category');

define('SHOW_TAG','show_tag');

define('SHOW_ALL_NODES','show_to_admin');

define('SHOW_AD_SEARCH_RESULT','adsearch');

//-----------------------------------constant ------------------------
define('SMALL_TEXT_SIZE',20);
define('MEDIUM_TEXT_SIZE',27);
define('LARGE_TEXT_SIZE',35);


?>
