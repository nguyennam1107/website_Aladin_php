<?php  
include_once '../models/User.php';  
include_once '../config/database.php';   

class LoginController {  
    private $db;  
    private $user;  

    public function __construct() {  
        $database = new Database();  
        $this->db = $database->connect();  
        $this->user = new User($this->db);
    }  

    public function login($username, $password) {  
        return $this->user->login($username, $password);  
    }  

    public function signup($username, $password) {  
        return $this->user->create($username, $password);  
    }  
}  
?>