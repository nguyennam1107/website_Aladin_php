<?php  
include_once '../controllers/MaHoaController.php';  
$controller = new MaHoaController();  

$keys = $controller->getKeysWithActionOne();  
echo json_encode($keys[0]);
?>