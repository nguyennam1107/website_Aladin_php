<?php  
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);     
include_once '../models/User.php';  
include_once '../config/database.php';   
require_once '../API/hill.php'; 
require_once '../API/convertKey.php'; 
include_once '../controllers/MaHoaController.php';  
class LoginController {  
    private $db;  
    private $user;  
    private $controller;
    public function __construct() {  
        $database = new Database();  
        $this->db = $database->connect();  
        $this->user = new User($this->db); 
        $this->controller = new MaHoaController();  
    }  

    public function loginController($username, $password) {  
        $Id_MaHoa=$this->user->getIdMaHoa($username);
        $key = $this->controller->getKeyByID($Id_MaHoa);
        $keyConnvert=convertKey(json_encode($key));
        if($Id_MaHoa==9){
            $password_MaHoa=hillCipherEncrypt($password,json_encode($keyConnvert[0]),3);
        }
        return $this->user->login($username, $password_MaHoa);
    }  

    public function signup($username, $password) {
        $key = $this->controller->getKeysWithActionOne();
        $keyConnvert=convertKey(json_encode($key[0]));
        $password_MaHoa=hillCipherEncrypt($password,$keyConnvert,3);

        echo "<script>console.log('".$password_MaHoa."');</script>";  
        $Id_MaHoa=$this->getIdMaHoa($key[0]['method']);
        return $this->user->create($username, $password_MaHoa,0,$Id_MaHoa);  
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
    public function logout() {  
        session_destroy();  
        header("Location:../View/login.php");  
        exit();  
    }
    public function getIdMaHoa($method) {
        if ($method === 'hill_3x3') {
            return 9;
        } elseif ($method === 'hill') {
            return 8;
        } elseif ($method === 'caesar') {
            return 11;
        } elseif ($method === 'cipher_map') {
            return 12;
        } elseif ($method === 'playfair') {
            return 14;
        }elseif ($method === 'affine') {
            return 10;
        } elseif ($method === 'vigenere') {
            return 13;
        }
    }

}  
?>