<?php 
	Class Posts extends Controller {
		// Method to load index view
		public function index(){
			$data =[];
			
			$this->view('posts/index' , $data);
		}
	}