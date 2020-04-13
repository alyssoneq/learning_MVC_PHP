<?php
// This page is loaded on the index page
// This is the central code to load all the requires

// Load Config
require_once 'config/config.php';
// Load helpers
require_once 'helpers/url_helper.php'; 
require_once 'helpers/session_helper.php'; 

// Autoload Core libraries
spl_autoload_register(function($className){
	require_once 'libraries/' . $className . '.php';
});