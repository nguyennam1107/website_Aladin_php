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

    public function loginController($username, $password) {  
        return $this->user->login($username, $password);
    }  

    public function signup($username, $password) {  
        return $this->user->create($username, $password);  
    }  
    public function handleSignup($newUsername, $newPassword, $controller) {  
        if ($controller->signup($newUsername, $newPassword)) {  
            echo "Đăng ký thành công!";  
            header("Location: ../View/trangchu.php");  
            exit();  
        } else {  
            echo "Đăng ký thất bại!";   
        }  
    }  
    public function handleLogin($username, $password, $controller) {  
        if ($controller->loginController($username, $password)) {  
            echo "Đăng nhập thành công!";  
            header("Location: ../View/trangchu.php");  
            exit();  
        } else {  
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";  
        }  
    }  

}  
?>