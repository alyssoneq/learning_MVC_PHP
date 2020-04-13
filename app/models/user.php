<?php 
	class User{
		private $db;
		
		public function __construct(){
			// Instantiating the Database class
			$this->db = new Database;
		}
		
		// Register user 
		public function register($data){
			$stmt = 'INSERT INTO users(name, email, password) VALUES(:name, :email, :password)';
			$this->db->query($stmt);
			// Bind values
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			
			// Execute the query 
			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
			
		}
		
		// Login user 
		public function login($email , $password){
			// Making the query 
			$stmt = 'SELECT * FROM users WHERE email = :email';
			$this->db->query($stmt);
			
			// Bind value for the named param
			$this->db->bind(':email' , $email );
			
			// Getting the user row on the database
			$row = $this->db->single();
			
			// Getting the hashed password from the database 
			$hashed_password = $row->password;
			if(password_verify($password, $hashed_password)){
				return $row;
			}else{
				return false;
			}
		}
		
		// Find user by email
		public function findUserByEmail($email){
			$stmt = 'SELECT * FROM users WHERE email = :email';
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