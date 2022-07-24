<?php
class Database{
	
	private $host  = 'mysql';
    private $user  = 'sqluser';
    private $password   = 'sql123';
    private $database  = 'users';
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			
				return $conn;
		}
    }
}
?>