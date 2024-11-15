<?php  
class User {  
    private $conn;  
    private $table_name = "users";  

    public function __construct($db) {  
        $this->conn = $db;  
    }  
    
    public function create($username, $password, $zone) {  
        if ($this->conn === null) {  
            echo "Kết nối cơ sở dữ liệu không hợp lệ.";  
            return false;  
        }  
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  
        
        $query = "INSERT INTO " . $this->table_name . " (username, password, zone) VALUES (:username, :password, :zone)";  
        $stmt = $this->conn->prepare($query);  
        
        $stmt->bindParam(':username', $username);  
        $stmt->bindParam(':password', $hashedPassword);  
        $stmt->bindParam(':zone', $zone);  
    
        return $stmt->execute();  
    }

    public function login($username, $password) {  
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";  
        $stmt = $this->conn->prepare($query);  
        $stmt->bindParam(':username', $username);  
        $stmt->execute();  
    
        if ($stmt->rowCount() == 1) {  
            $user = $stmt->fetch(PDO::FETCH_ASSOC);  
            if (password_verify($password, $user['password'])) {  
                return true;  
            }  
        }  
        return false;  
    }
    public function getAdminWithUsername($username) {  
        $query = "SELECT zone FROM " . $this->table_name . " WHERE username = :username";  
        $stmt = $this->conn->prepare($query);  
        $stmt->bindParam(':username', $username);  
        $stmt->execute();  
    
        if ($stmt->rowCount() == 1) {  
            $row = $stmt->fetch(PDO::FETCH_ASSOC);  
            if ($row['zone'] == 1) {  
                return true;   
            }  
        }  
        return false;   
    }
    public function getUserName(){
        
    }
}  
?>  