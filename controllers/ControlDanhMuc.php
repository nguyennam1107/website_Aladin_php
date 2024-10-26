<?php
require_once '../models/DanhMuc.php';
require_once '../config/database.php';

class ControlDanhMuc {

    private $danhMucModel;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->danhMucModel = new DanhMuc($db);
    }
    public function getCategoriesByGender($gender) {
        $result = $this->danhMucModel->readByGender($gender);
        $categories = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row;
        }
        include '../Views/Navbar.php';
        return $categories;
        echo "Categories";
    }
    public function getAllCategories() {
        $result = $this->danhMucModel->read();
        $categories = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row;
        }
        include '../Views/Navbar.php';
        return $categories;
        
    }
}
?>