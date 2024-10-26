<?php  
class User {  
    private $conn;  
    private $table_name = "users";  

    public function __construct($db) {  
        $this->conn = $db;  
    }  

    public function create($username, $password) {  
        $query = "INSERT INTO " . $this->table_name . " (username, password) VALUES (:username, :password)";  
        $stmt = $this->conn->prepare($query);  
        $stmt->bindParam(':username', $username);  
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));

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
}  
?>  