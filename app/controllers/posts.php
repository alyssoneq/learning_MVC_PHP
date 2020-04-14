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
			$this->userModel = $this->model('User');
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
			// Check if there is a POST request
			// If a POST exists then get the user input
			// This is a quality of life feature
			// Doing this users do not need to retype content 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Sanitize POST array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				// Getting the data
				$data =[
					'title' => trim($_POST['title']),
					'body' => trim($_POST['body']),
					'user_id' => $_SESSION['user_id'],
					'title_err' => '',
					'body_err' => ''
				];
				
				// Validate data
				if(empty($data['title'])){
					$data['title_err'] = 'Please enter a title';
				}
				if(empty($data['body'])){
					$data['body_err'] = 'Please enter text here';
				}
				
				// Make sure no errors
				if(empty($data['title_err']) && empty($data['body_err'])){
					// Data validated
					if($this->postModel->addPost($data)){
						// Generate flash message to indicate success
						flash('post_message', 'Post created');
						redirect('posts');						
					}else{
						die("Something bad happened");
					}
				}else{
					// Load view with errors 
					$this->view('posts/add',$data);
				}
			}else{
				$data =[
					'title' => '',
					'body' => ''
				];
			
				$this->view('posts/add' , $data);
			}
		}
		
		// Method to show details of a post 
		public function show($id){
			// Get post content from the database 
			$post = $this->postModel->getPostById($id);
			$user = $this->userModel->getUserById($post->user_id);
			
			$data = [
				'post' => $post,
				'user' => $user
			];
			
			$this->view('posts/show', $data);
		}
	}