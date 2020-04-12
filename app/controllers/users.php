<?php 

	class Users extends Controller {
		public function __construct(){}
		
		// Method to load the register form 
		// This also handles the data submission 
		public function register(){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process the form
			} else{
				// Init data
				// This is a quality of life practice
				// Doing this, users dont have to retype everything again
				$data = [
					'name' => '',
					'email' => '',
					'password' => '',
					'confirm_password' => '',
					'name_err' => '',
					'email_err' => '',
					'password_err' => '',
					'confirm_password_err' => ''
				];
				// Load form view
				$this->view('users/register',$data);
			}
		}
		
		// Method to load the login form 
		public function login(){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process the form
			} else{
				// Init data
				// This is a quality of life practice
				// Doing this, users dont have to retype everything again
				$data = [
					'email' => '',
					'password' => '',
					'email_err' => '',
					'password_err' => ''
				];
				// Load form the login view
				$this->view('users/login',$data);
			}
		}
	}