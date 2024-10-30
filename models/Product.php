<?php
class Product {
    private $conn;
    private $table = 'product';

    public $id;
    public $name;
    public $price;
    public $image_url;
    public $description;
    public $category_id;
    public $is_new;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }
    public function create() {
        $query = "INSERT INTO ". $this->table. " SET name = :name, price = :price, image_url = :image_url, description = :description, category_id = :category_id, is_new = :is_new";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':image_url', $this->image_url);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':is_new', $this->is_new);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>
