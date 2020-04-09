<?php 
// Database params
define('DB_HOST','localhost');
define('DB_USER','_YOUR_USER_');
define('DB_PASS','_YOUR_PASS_');
define('DB_NAME','_YOUR_DNAME_');

// App root
// Using dirname to get the parent folder of the file
// Using superglobal __FILE__ to get the path of the file 
define ('APPROOT',dirname(dirname(__FILE__)));

// URL root
define ('URLROOT', '_YOUR_URL_');

// Site name
define ('SITENAME' , '_YOUR_SITENAME_');