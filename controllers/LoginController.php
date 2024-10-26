<?php  
include_once '../models/User.php';  

class LoginController {  
    private $db;  
    private $user;  

    public function __construct($db) {  
        $this->db = $db;  
        $this->user = new User($db);  
    }  

    public function login($username, $password) {  
        return $this->user->login($username, $password);  
    }  

    public function signup($username, $password) {  
        return $this->user->create($username, $password);  
    }  
}  
?>