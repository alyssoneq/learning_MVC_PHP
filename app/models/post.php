<?php 

	class Post{
		// Property to receive the database instantiated
		private $db;
		
		public function __construct(){
			// Instantiating the Database class 
			$this->db = new Database;
		}
		
		public function getPosts(){
			// Query to get all posts
			// A join was made to mix users table and posts table
			// posts.id as postId = displays the id field as postId 
			// users.id as usersId = displays the id field as usersId 
			$stmt = 'SELECT *,
					posts.id as postId,
					users.id as userId,
					posts.created_at as postCreated,
					users.created_at as userCreated
					FROM posts
					INNER JOIN users
					ON posts.user_id = users.id
					ORDER BY posts.created_at DESC';
			$this->db->query($stmt);
			
			// Returning more than one row with resultSet method 
			$results = $this->db->resultSet();
			
			return $results;
		}
	}