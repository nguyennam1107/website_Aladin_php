<?php  
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);     
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

    public function loginController($username, $password) {  

        return $this->user->login($username, $password);
    }  

    public function signup($username, $password) {  
        echo "<script>console.log('Debug here login');</script>";  
        echo "<script>console.log('".$username."');</script>";
        echo "<script>console.log('".$password."');</script>";  
        return $this->user->create($username, $password);  
    }  
    public function handleSignup($newUsername, $newPassword) {  
        if ($this->signup($newUsername, $newPassword)) {    
            echo "<script>console.log('Debug here login');</script>";  
            header("Location: ../View/trangchu.php");  
            exit();  
        } else {  
            echo "<script>console.log('Debug here login 1');</script>";  
        }  
    }  
    public function handleLogin($username, $password) {  
        if ($this->loginController($username, $password)) {  
            echo "<script>console.log('Debug here sign up');</script>";  
            header("Location: ../View/trangchu.php");  
            exit();  
        } else {  
            echo "<script>console.log('Debug here sign up 1');</script>";  
        }  
    }  

}  
?>