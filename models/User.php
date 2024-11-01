<?php  
class User {  
    private $conn;  
    private $table_name = "users";  

    public function __construct($db) {  
        $this->conn = $db;  
    }  
    
    public function create($username, $password ,$zone,$ma_hoa_id) {
        if ($this->conn === null) {
            echo "Kết nối cơ sở dữ liệu không hợp lệ.";
            return false;
        }
        
        $query = "INSERT INTO " . $this->table_name . " (username, password,zone,ma_hoa_id) VALUES (:username, :password,:zone,:ma_hoa_id)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':zone', $zone);
        $stmt->bindParam(':ma_hoa_id', $ma_hoa_id);
    
        return $stmt->execute();  
    }

    public function login($username, $password) {  
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";  
        $stmt = $this->conn->prepare($query);  
        $stmt->bindParam(':username', $username);  
        $stmt->execute();  

        if ($stmt->rowCount() == 1) {  
            $user = $stmt->fetch(PDO::FETCH_ASSOC);  
            if ($password === $user['password']) {  
                return true;
            }  
        }  
        return false;
    }  
    public function getAdminWithUsername($username) {  
        $query = "SELECT 'zone' FROM " . $this->table_name . " WHERE username = :username";  
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
    public function getIdMaHoa($username) {
        $query = "SELECT ma_hoa_id FROM ". $this->table_name. " WHERE username = :username";  
        $stmt = $this->conn->prepare($query);  
        $stmt->bindParam(':username', $username);  
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['ma_hoa_id'];
     }
}  
?>  