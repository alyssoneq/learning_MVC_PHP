<?php 
// Database params
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','123456');
define('DB_NAME','tmvc');

// App root
// Using dirname to get the parent folder of the file
// Using superglobal __FILE__ to get the path of the file 
define ('APPROOT',dirname(dirname(__FILE__)));

// URL root
define ('URLROOT', 'http://localhost/mvc_class');

// Site name
define ('SITENAME' , 'mvc_class');