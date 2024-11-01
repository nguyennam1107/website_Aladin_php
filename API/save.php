<?php  
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);   
require_once '../controllers/MaHoaController.php';  
$mahoaController = new MaHoaController();  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  

    if (isset($_POST['selected_method'])) {  
        $selectedMethod = htmlspecialchars($_POST['selected_method']);  
        

        $mahoaController->saveAction($selectedMethod, 1);  

        $methods = $mahoaController->getEncryptionMethods();  
        foreach ($methods as $method) {  
            if ($method['method'] !== $selectedMethod) {  
                $mahoaController->saveAction($method['method'], 0);  
            }  
        }  

        echo "Lưu lựa chọn phương thức '$selectedMethod' thành công!";  
        header("Location: ../View/admin_setting.php");
        exit();
    } else {  
        header("Location: ../View/admin_setting.php");
        exit();
    }  
}  
?> 