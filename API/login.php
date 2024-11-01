<?php  
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
include_once '../controllers/LoginController.php';  
$controller = new LoginController();  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    var_dump($_POST);

    $username = $_POST['username'] ?? '';  
    $password = $_POST['password'] ?? '';  
    $newUsername = $_POST['newUsername'] ?? '';  
    $newPassword = $_POST['newPassword'] ?? '';  
    $comfirmPassword = $_POST['comfirmPassword'] ?? '';  
    
    function passwordMatch($newPassword, $comfirmPassword) {  
        return $newPassword === $comfirmPassword;  
    }  
    if (!empty($newUsername) && !empty($newPassword) && !empty($comfirmPassword)) {  
        if (!passwordMatch($newPassword, $comfirmPassword)) {  
            echo "Mật khẩu phải giống nhau!";  
            exit();  
        }  
        
        $controller->handleSignup($newUsername, $newPassword);  
    }   
    
    if (!empty($username) && !empty($password)) {  
        $controller->handleLogin($username, $password);  
    }  
}   
?>  