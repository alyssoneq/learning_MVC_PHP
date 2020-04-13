<?php 
	Class Posts extends Controller {
		// Construct to redirect user to login
		// Redirecting on the construct forces users to login
		// Redirecting in specific views allows guests to access some content
		public function __construct(){
			if(!isLoggedIn()){
				redirect('users/login');
			}
		}
		
		// Method to load index view
		public function index(){
			$data =[];
			
			$this->view('posts/index' , $data);
		}
	}