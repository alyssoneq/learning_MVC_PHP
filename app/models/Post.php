<?php 
	class Post{
		private $db;
		
		public function __construct(){
			// create an instance with the class Database
			$this->db = new Database;
		}
	}