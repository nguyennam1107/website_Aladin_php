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
        $keyString = json_encode($key);
        $this->maHoa->updateKey($method, $keyString, $keyAction);
    }
    public function getEncryptionMethods() {
        return $this->maHoa->getEncryptionMethods($this->db);
    }
    public function getKeysWithActionOne() {
        return $this->maHoa->getKeysWithActionOne($this->db);
    }
}
?>
