<?php
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);     
require_once '/opt/lampp/htdocs/Aladin/controllers/ControlDanhMuc.php';

$controlDanhMuc = new ControlDanhMuc();  
if (!$controlDanhMuc) {  
    die("Không thể khởi tạo lớp ControlDanhMuc");  
}  
$categories = $controlDanhMuc->getAllCategories();
if (!$categories) {  
    die("Không lấy được danh mục.");  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Style/admin_dashboards.css" type="text/css" media="all" />
</head>
<style>  
    select {  
        width: 200px;  
        padding: 5px;  
    }  
    option {  
        padding: 5px;  
    }  
    option:hover {  
        background-color: #f0f0f0;  
    }  
</style>    
<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <form action="../../API/add_product.php" method="POST" enctype="multipart/form-data">  
            <div class="form-group">  
                <label for="name">Tên sản phẩm</label>  
                <input type="text" class="form-control" id="name" name="name" required>  
            </div>  
            <div class="form-group">  
                <label for="price">Giá</label>  
                <input type="number" class="form-control" id="price" name="price" required>  
            </div>  
            <div class="form-group">  
                <label for="image_url">URL hình ảnh</label>  
                <input type="text" class="form-control" id="image_url" name="image_url" required>  
            </div>  
            <div class="form-group">  
                <label for="description">Mô tả</label>  
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>  
            </div>  
            <div class="form-group">  
                <label for="category_id">Danh mục</label>  
                <select class="form-control" id="category_id" name="category_id" required>  
                    <option value="">Chọn danh mục</option>  
                    <?php foreach ($categories as $category): ?>  
                        <option value="<?php echo htmlspecialchars($category['id']); ?>">  
                            <strong><?php echo htmlspecialchars($category['category']); ?></strong> -   
                            <?php echo htmlspecialchars($category['item_name']); ?>   
                            (<?php echo htmlspecialchars($category['gender']); ?>)  
                        </option>  
                    <?php endforeach; ?>  
                </select>
            </div>  
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>  
        </form>  
    </main>
</body>
</html>