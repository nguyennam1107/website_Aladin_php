<?php  
error_reporting(E_ALL);  
ini_set('display_errors', 1);  

include_once '../controllers/MaHoaController.php';  
$controller = new MaHoaController();  
$keys = $controller->getKeysWithActionOne();  

header('Content-Type: application/json');  
echo json_encode($keys); 
?> 