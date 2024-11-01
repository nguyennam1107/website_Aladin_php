<?php  
include_once '../controllers/MaHoaController.php';  
$controller = new MaHoaController();  

if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $key = $controller->getKeyById($id);  
    
    header('Content-Type: application/json');  
    echo json_encode($key);  
} else {  
    $keys = $controller->getKeysWithActionOne();  
    header('Content-Type: application/json');  
    echo json_encode($keys);   
}  
?>  