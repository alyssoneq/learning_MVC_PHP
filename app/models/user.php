<?php 
	class User{
		private $db;
		
		public function __construct(){
			// Instantiating the Database class
			$this->db = new Database;
		}
		
		// Find user by email
		public function findUserByEmail($email){
			$stmt = 'SELECT *FROM users WHERE email = :email';
			// Calling the query method from the Database class  
			$this->db->query($stmt);
			
			// Binding the email value to the input
			$this->db->bind(':email',$email);
			
			// Getting the value from the database 
			// Method single from Database class was used for this
			$row = $this->db->single();
			
			// Checking values
			if($this->db->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
	}