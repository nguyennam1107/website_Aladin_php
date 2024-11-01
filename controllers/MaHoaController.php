<?php
require_once '../models/Ma_hoa.php';
include_once '../config/database.php';   

class MaHoaController {
    private $maHoa;
    private $db;
    public function __construct() {
        $database = new Database();  
        $this->db = $database->connect();  
        $this->maHoa = new Ma_hoa($this->db);
    }
    public function saveKey($method, $key, $keyAction) {
        echo "<script>console.log('".$key."');</script>"; 
        $this->maHoa->updateKey($method, $key, $keyAction);
    }
    public function getEncryptionMethods() {
        return $this->maHoa->getEncryptionMethods($this->db);
    }
    public function getKeysWithActionOne() {
        return $this->maHoa->getKeysWithActionOne($this->db);
    }
    public function saveAction($method, $keyAction) {
        $this->maHoa->save_key_action($method, $keyAction);
    }
}
?>
