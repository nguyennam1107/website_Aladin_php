<?php
class DanhGia {
    private $conn;
    private $table = 'danh_gia';

    public $id;
    public $product_id;
    public $rating;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read_by_product() {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->product_id);
        $stmt->execute();
        return $stmt;
    }
}
?>
