<?php
include_once '../models/Product.php';
include_once '../config/database.php';

class ProductController {  
    private $product;
    private $db;
    public function __construct() {  
        $database = new Database();  
        $this->db = $database->connect();  
        $this->product = new Product($this->db);
    }
    public function listProducts() {  
        $result = $this->product->read();  
        
        return $result->fetchAll(PDO::FETCH_ASSOC);  
    } 
    public function getProductById($id) {
      $this->product->id = $id;  
      $result = $this->product->read_single();  
      return $result->fetch(PDO::FETCH_ASSOC);  
    }
    public function updateProduct($id, $name, $price, $image_url, $description, $category_id, $is_new) {
        $this->product->id = $id;  
        $this->product->name = $name;  
        $this->product->price = $price;  
        $this->product->image_url = $image_url;  
        $this->product->description = $description;  
        $this->product->category_id = $category_id;  
        $this->product->is_new = $is_new;  

        if ($this->product->update()) {  
            return true;  
        }  
        return false;  
    }
        
}  
?>
