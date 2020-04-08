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
 }