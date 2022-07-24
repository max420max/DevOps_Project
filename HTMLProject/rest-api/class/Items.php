<?php
class Items{   
    
    private $itemsTable = "items";      
    public $id;
    public $fullName;
    public $telephoneNumber;
    public $Age;  
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function read(){	
		if($this->id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable." WHERE id = ?");
			$stmt->bind_param("i", $this->id);					
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable);		
		}		
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
	function create(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->itemsTable."(`fullName`, `telephoneNumber`, `Age`)
			VALUES(?,?,?)");
		
		$this->fullName = htmlspecialchars(strip_tags($this->fullName));
		$this->telephoneNumber = htmlspecialchars(strip_tags($this->telephoneNumber));
		$this->Age = htmlspecialchars(strip_tags($this->Age));
		
		$stmt->bind_param("ssi", $this->fullName, $this->telephoneNumber, $this->Age);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
		
	 
}
?>