<?php
class Ma_hoa {
    private $conn; 


    public function __construct($db) {
        $this->conn = $db;
    }

    public function updateKey($method, $keyString, $keyAction) {
        $sql = "UPDATE Ma_hoa SET `key` = :key, key_action = :keyAction WHERE method = :method";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindValue(':key', $keyString, PDO::PARAM_STR);
        $stmt->bindValue(':method', $method, PDO::PARAM_STR);
        $stmt->bindValue(':keyAction', $keyAction, PDO::PARAM_INT);
        echo "<script>console.log('"."debug here"."');</script>";
        if ($stmt->execute()) {
            echo "<script>console.log('"."debug here run"."');</script>";
            return true;
        }
        echo "<script>console.log('"."debug here error"."');</script>";
        return false;
        
    }
    public function save_key_action($method, $keyAction) {  
        $sql = "UPDATE Ma_hoa SET key_action = :keyAction WHERE method = :method";  
        $stmt = $this->conn->prepare($sql);  

        $stmt->bindValue(':method', $method, PDO::PARAM_STR);  
        $stmt->bindValue(':keyAction', $keyAction, PDO::PARAM_INT);  
        
        if ($stmt->execute()) {  
            return true;  
        }  
        return false;  
    }  
    public function getKeysWithActionOne() {  
        $sql = "SELECT method, `key` FROM Ma_hoa WHERE key_action = 1";  
        $stmt = $this->conn->prepare($sql);  
        $stmt->execute();  
    
        $methods = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        if (empty($methods)) {  
            $methods[] = ["method" => "No keys found with keyAction = 1.", "key" => ""];  
        }  
        return $methods;  
    }  
    public function getKeysWithId($id) {  
        $sql = "SELECT method, `key` FROM Ma_hoa WHERE id = ".$_id."";  
        $stmt = $this->conn->prepare($sql);  
        $stmt->execute();  
    
        $methods = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        return $methods;  
    }  
    function getEncryptionMethods() {
        $sql = "SELECT * FROM Ma_hoa";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        $methods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($methods)) {
            $methods[] = ["method" => "No encryption methods saved.", "key" => ""];
        }
        
        return $methods;
    }
    
}
?>

