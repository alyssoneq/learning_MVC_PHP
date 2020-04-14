<?php
/*
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */
 class Database {
	 private $host = DB_HOST;
	 private $user = DB_USER;
	 private $pass = DB_PASS;
	 private $dbname = DB_NAME;
	 
	 // Whenever a statement is prepared use the $dbh handler
	 private $dbh;
	 // property to store the sql statement 
	 private $stmt;
	 // property to handle errors
	 private $error;
	 
	 public function __construct (){
		 // Set DSN (database source name)
		 $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname ;
		 
		 // Setting options
		 $options = array(
			//this option sets a persistent connection
			PDO::ATTR_PERSISTENT => true,
			//this option sets the error mode to exception
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		 );
		 
		 // Create PDO instance
		 try{
			 $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		 } catch(PDOException $e){
			 $this->error = $e->getMessage();
			 echo $this->error;
		 }
	 }
	 
	 // Method to prepare statements
	 public function query($sql){
		 $this->stmt = $this->dbh->prepare($sql);
	 }
	 
	 // Method to bind values
	 public function bind($param, $value, $type = null){
		 if(is_null($type)){
			 switch(true){
				 case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				 case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				 case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				 default:
					$type = PDO::PARAM_STR;
			 }
		 }
		 
		 $this->stmt->bindValue($param, $value, $type);
	 }
	 
	 // Method to execute the prepared statement
	 public function execute(){
		 //inside this method is called the PDO function execute()
		 return $this->stmt->execute();
	 }
	 
	 // Method to get result set as array of object
	 // This method will get more than one row of content
	 public function resultSet(){
		 //calling the method execute()
		 $this->execute();
		 // the attribute PDO::FETCH_OBJ makes the fetch as an array of objects
		 return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	 }
	 
	 // Method to get a single row of content as an array of objects
	 // The PDO::FETCH_OBJ allows this to happen
	 // By using this, we can have a code like
	 // echo $x->password; - Access content as an object
	 public function single(){
		 //calling the method execute()
		 $this->execute();
		 // the PDO function fetch() call only a single row
		 return $this->stmt->fetch(PDO::FETCH_OBJ);
	 }
	 
	 // Method to count the number of rows
	 public function rowCount(){
		 // rowCount() is PDO function
		 return $this->stmt->rowCount();
	 }
 }