<?php 

	class Pages extends Controller{
		public function __construct(){
			
		}
		
		public function about(){
			$data = [
				'title' => 'About Us',
				'description' => 'App to share feelings with other users'
				];
			$this->view('pages/about' , $data);
		}
		
		public function index(){
			
			
			$data = [
				'title' => 'SharePosts',
				'description' => 'Simple social network built on the app framework'
			];
			$this->view('pages/index' , $data);
		}
	}