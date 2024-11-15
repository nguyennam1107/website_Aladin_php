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
        return $this->user->create($username, $password,0,9);  
    }  
    public function handleSignup($newUsername, $newPassword) {  
        if ($this->signup($newUsername, $newPassword)) {    
            header("Location: ../View/trangchu.php");  
            exit();  
        } else {  
            echo "<script>alert('Đăng ký không thành công. Vui lòng kiểm tra lại thông tin.');</script>";
            header("Location:../View/login.php");
        }  
    }  
    public function handleLogin($username, $password) {  
        if ($this->loginController($username, $password)) {  
            if ($this->user->getAdminWithUsername($username)) {
                header("Location:../View/admin_dashboard.php");  
                exit();
            }
            header("Location: ../View/trangchu.php");  
            exit();  
        } else {  
            echo "<script>alert('Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin.');</script>";  
            header("Location: ../View/login.php");  
            exit();  
        }  
    }  

}  
?>