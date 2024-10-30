<?php
class Ma_hoa {
    private $conn; 


    public function __construct($db_connection) {
        $this->conn = $db_connection; 
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
    
    function getEncryptionMethods() {
        $sql = "SELECT method, `key` FROM Ma_hoa";
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
