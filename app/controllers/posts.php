<?php 
	Class Posts extends Controller {
		// Construct to redirect user to login
		// Redirecting on the construct forces users to login
		// Redirecting in specific views allows guests to access some content
		public function __construct(){
			if(!isLoggedIn()){
				redirect('users/login');
			}
			
			$this->postModel = $this->model('Post');
		}
		
		// Method to load index view
		public function index(){
			// Get posts 
			$posts = $this->postModel->getPosts();
			$data =[
				'posts' => $posts
			];
			
			$this->view('posts/index' , $data);
		}
		
		// Method to access from to add posts to the database
		public function add(){
			$data =[
				'title' => '',
				'body' => ''
			];
			
			$this->view('posts/add' , $data);
		}
	}