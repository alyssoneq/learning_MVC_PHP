<?php 
	/*
	 * App core class
	 * Creates URL & loads core controller
	 * URL FORMAT - /controller/method/params
	 */
	 
	 class Core {
		 protected $currentController = 'Pages';
		 protected $currentmethod = 'index';
		 protected $params = [];
		 
		 public function __construct(){
			 $this->getUrl();
		 }
		 
		 //function to get the URL parameter from the browser
		 public function getUrl(){
			if(isset($_GET['url'])){
				$url = $_GET['url'];
				echo $url;
			}
		 }
	 }