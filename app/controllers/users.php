<?php 

	class Users extends Controller {
		public function __construct(){
			// Checks model folder for file called user.php 
			$this->userModel = $this->model('user');
		}
		
		// Method to load the register form 
		// This also handles the data submission 
		public function register(){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process the form
				// Sanitize data 
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				// Init data
				// This is a quality of life practice
				// Doing this, users dont have to retype everything again
				$data = [
					'name' => trim($_POST['name']),
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'confirm_password' => trim($_POST['confirm_password']),
					'name_err' => '',
					'email_err' => '',
					'password_err' => '',
					'confirm_password_err' => ''
				];
				
				// Validation of data
				// Validate email 
				if(empty($data['email'])){
					$data['email_err'] = 'Please enter email';
				}else{
					// Check if email exists on database
					if ($this->userModel->findUserByEmail($data['email'])){
						$data['email_err'] = 'Email already taken';
					}
				}
				//Validate name
				if(empty($data['name'])){
					$data['name_err'] = 'Please enter name';
				}
				// Validate password
				if(empty($data['password'])){
					$data['password_err'] = 'Please enter password';
				}elseif(strlen($data['password']) < 6){
					$data['password_err'] = 'Password must be at least 6 characters';
				}
				// Validate confirm password
				if(empty($data['confirm_password'])){
					$data['confirm_password_err'] = 'Please confirm your password';
				} else{
					if($data['password'] != $data['confirm_password'] ){
						$data['confirm_password_err'] = 'Passwords must match';
					}
				}
				
				// Make sure errors are empty
				if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
					// Data validated
					
					// Hash password 
					// Never store password in plaintext on the database 
					$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
					
					// Register user 
					if($this->userModel->register($data)){
						flash('register_success','You are now registered');
						redirect('/users/login');
					}else{
						die('Something went wrong');
					}
					
				} else{
					// Load the view with errors when found
					$this->view('users/register', $data);
				}
				
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
				// Sanitize data 
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				// Init data
				// This is a quality of life practice
				// Doing this, users dont have to retype everything again
				$data = [
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'email_err' => '',
					'password_err' => ''
				];
				
				// Validation of data
				// Validate email 
				if(empty($data['email'])){
					$data['email_err'] = 'Please enter email';
				}

				// Validate password
				if(empty($data['password'])){
					$data['password_err'] = 'Please enter password';
				}
				
				// Make sure errors are empty
				if(empty($data['email_err']) && empty($data['password_err'])){
					// Data validated
					
				} else{
					// Load the view with errors when found
					$this->view('users/login', $data);
				}
				
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