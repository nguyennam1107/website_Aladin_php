<?php  
    echo "<scipt>console.log('da vao trong add ')</scipt>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  

        include_once '../controllers/ProductController.php'; 

        $controller = new ProductController();  

        $name = $_POST['name'];  
        $price = $_POST['price'];  
        $image_url = $_POST['image_url'];  
        $description = $_POST['description'];  
        $category_id = $_POST['category_id'];  

        if ($controller->addProduct($name, $price, $image_url, $description, $category_id, 0)) {  
            echo '<div class="alert alert-success" role="alert">Sản phẩm mới đã được thêm thành công!</div>';  
        } else {  
            echo '<div class="alert alert-danger" role="alert">Có lỗi xảy ra khi thêm sản phẩm.</div>';  
        }  
    }  
?>