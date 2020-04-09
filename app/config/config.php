<?php 
// Database params
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','123456');
define('DB_NAME','shareposts');

// App root
// Using dirname to get the parent folder of the file
// Using superglobal __FILE__ to get the path of the file 
define ('APPROOT',dirname(dirname(__FILE__)));

// URL root
define ('URLROOT', '_YOUR_URL_');

// Site name
define ('SITENAME' , 'http://localhost/mvc_class');