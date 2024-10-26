<?php
include_once './models/Product.php';
include_once './config/database.php';

class ProductController {  
    public function listProducts() {  
        $database = new Database();  
        $db = $database->connect();  

        $product = new Product($db);  
        $result = $product->read();  
        
        return $result->fetchAll(PDO::FETCH_ASSOC);  
    }  
}  
?>
