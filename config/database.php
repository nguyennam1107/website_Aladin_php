<?php  
class Database {  
    private $host = 'localhost';  
    private $db_name = 'aladin';  
    private $username = 'root';  
    private $password = '';  
    public $conn;  

    public function connect() {  
        $this->conn = null;  

        try {  
            if ($this->conn === null) { 
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);  
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            }  
        } catch (PDOException $e) {  
            error_log("Connection error: " . $e->getMessage()); 
        }  

        return $this->conn;  
    }  
}  
?>