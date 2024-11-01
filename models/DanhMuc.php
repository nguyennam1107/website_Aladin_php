<?php
class DanhMuc {
    private $conn;
    private $table = 'danh_muc';
    
    public $id;
    public $category;
    public $item_name;
    public $item_url;
    public $gender;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function readByGender($gender) {
        $query = "SELECT * FROM " . $this->table . " WHERE gender = :gender";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();
        return $stmt;
    }
    public function readByCategorybyID($category_id) {  
        $query = "SELECT * FROM " . $this->table . " WHERE id = :category_id LIMIT 1";  
        $stmt = $this->conn->prepare($query);  
        $stmt->bindParam(':category_id', $category_id);  
        $stmt->execute();  
        return $stmt;  
    }  
}
?>
