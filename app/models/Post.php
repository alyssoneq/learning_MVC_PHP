<?php 
	class Post{
		private $db;
		
		public function __construct(){
			// create an instance with the class Database
			$this->db = new Database;
		}
		
		public function getPosts(){
			$this->db->query("SELECT * FROM posts");
			
			return $this->db->resultSet();
		}
	}