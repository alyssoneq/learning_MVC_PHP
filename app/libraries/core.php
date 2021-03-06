<?php 
	/*
	 * App core class
	 * Creates URL & loads core controller
	 * URL FORMAT - /controller/method/params
	 */
	 
	 class Core {
		 protected $currentController = 'Pages';
		 protected $currentMethod = 'index';
		 protected $params = [];
		 
		 public function __construct(){
			//print_r($this->getUrl());
			
			$url = $this->getUrl();
			
			// Look in controllers for first value
			// Everything is routed from index.php
			// To access controllers, it needs to go back one folder
			if(file_exists('../app/controllers/' . $url[0] . '.php')){
				//if file exists, set as controller
				$this->currentController = $url[0];
				// Unset 0 index
				unset($url[0]);
				
			}
			
			// Require the controller
			require_once '../app/controllers/' . $this->currentController . '.php';
			
			// Instantiate controller class
			$this->currentController = new $this->currentController;
			
			// Check second part of URL
			if(isset($url[1])){
				// Check to see if method exists in controller
				if(method_exists($this->currentController, $url[1])){
					$this->currentMethod = $url[1];
					//unset 1 index
					unset($url[1]);
				}
			}
			
			// Get parameters from what is left of the URL
			// Using array_values function to get params 
			$this->params = $url ? array_values($url) : [];
			
			// Call a callback with array of params 
			call_user_func_array([$this->currentController, $this->currentMethod] , $this->params);
		 }
		 
		 //function to get the URL parameter from the browser
		 public function getUrl(){
			if(isset($_GET['url'])){
				//get rid of the last slash
				$url = rtrim($_GET['url'], '/');
				//sanitizing the URL
				$url = filter_var($url , FILTER_SANITIZE_URL);
				//breaking the URL in an array
				$url = explode('/',$url);
				
				return $url;
			}
		 }
	 }