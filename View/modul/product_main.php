<?php  
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);   
require_once '../controllers/ProductController.php'; 
require_once '../controllers/ControlDanhMuc.php'; 
    $productController = new ProductController();
    $controlDanhMuc = new ControlDanhMuc();
    $products = $productController->listProducts();     
    if (isset($_GET['id'])) {  
        $product_id = intval($_GET['id']); 
        echo "<script>console.log('".$product_id."');</script>";  
    } else {  
        echo "<script>console.log('khong co san pham nao duoc cung cap');</script>";  
    }   
    $product_data=$productController->getProductById($product_id);
    $categoryData= $controlDanhMuc->getCategoriesByID($product_data['category_id']);  
if ($product_data) {  
?> 
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Trang sản phẩm</title>  
    <link rel="stylesheet" href="../Style/product.css">  
</head>  
<body>  
<nav class="navbar navbar-light bg-light" >  
    <span>EXPLORE OUR KEY ICONS - <a href="#">KHÁM PHÁ ORIGINALS</a></span>  
    <i class="fa-solid fa-xmark"></i>  
</nav>  

<div class="container mt-4">  
    <div class="row">  
        <div class="col-xl-8">  
            <div class="mb-3">  
                <ul class="breadcrumb">  
                    <li class="breadcrumb-item"><a href="./trangchu.php"><i class="fa-solid fa-arrow-left"></i> Trở lại</a></li>  
                    <li class="breadcrumb-item"><a href="./trangchu.php">Trang chủ</a></li>  
                    <li class="breadcrumb-item"><a href="./trangchu.php">Original</a></li>  
                    <li class="breadcrumb-item"><a href="./trangchu.php">Giày</a></li>  
                </ul>  
            </div>  
            <div class="card">  
                <div class="card-body">  
                    <h1>ĐÔI GIÀY PHONG CÁCH GOLF HỢP TÁC THIẾT KẾ CÙNG BAPE, CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.</h1>  
                    <div class="row">  
                        <div class="col-md-6">  
                            <img src="<?php $product_data["image_url"]?>" alt="Sản phẩm" class="product-image">  
                        </div>  
                        <div class="col-md-6">  
                            <img src="<?php $product_data["image_url"]?>" alt="Sản phẩm" class="product-image">  
                        </div>  
                    </div>  
                    <div class="row">  
                        <div class="col-md-6">  
                            <img src="<?php $product_data["image_url"]?>" alt="Sản phẩm" class="thumbnail">  
                        </div>  
                        <div class="col-md-6">  
                            <img src="<?php $product_data["image_url"]?>" alt="Sản phẩm" class="thumbnail">  
                        </div>  
                    </div>  
                </div>  
            </div>  

            <div class="card mt-3">  
                <div class="card-header" data-toggle="collapse" data-target="#info" aria-expanded="false" aria-controls="info">  
                    <h5 class="mb-0">  
                        Thông tin chi tiết <i class="fa-solid fa-chevron-down float-right"></i>  
                    </h5>  
                </div>  
                <div id="info" class="collapse">  
                    <div class="card-body">  
                        <p>ĐÔI GIÀY PHONG CÁCH GOLF HỢP TÁC THIẾT KẾ CÙNG BAPE, CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.</p>  
                    </div>  
                </div>  
            </div>  

            <div class="xl-4">  
                <h1>COMPLETE THE LOOK</h1>  
                <div class="image-slider">  
                    <div class="image-item">  
                        <img src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7477b277ec6647919fa241a78609964a_9366/Giay_Alphaboost_V1_mau_xanh_la_IG3129_01_standard.jpg" alt="" class="img-fluid" />  
                        <p>3.600.000<sup>đ</sup></p>  
                        <p>Nam Chạy Giày Adizero Adios 8</p>  
                    </div>  
                    <div class="image-item">  
                        <img src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/2e86d2d18f224468bf21a5ae627d144c_9366/Giay_Golf_BAPE_x_adidas_Stan_Smith_trang_IG5916_01_standard.jpg" alt="" class="img-fluid" />  
                        <p>3.200.000<sup>đ</sup></p>  
                        <p>Giày BAPE x adidas Stan Smith</p>  
                    </div> 
                </div>  
            </div>  
        </div>  
        <div class="col-xl-4 sidebar">  
        <h4><?php echo $categoryData['gender']."•".$categoryData['category']; ?></h4> 
        <h1><?php echo $product_data['name']; ?></h1>  
        <p><?php echo number_format($product_data['price'], 0, ',', '.') . '₫'; ?></p>  
        <p><?php echo $product_data['description']; ?></p>  
        <h5>MỞ TRUY CẬP SỚM</h5>  
        <p>Hiện chỉ mở bán cho hội viên adiClub. Tham gia miễn phí và khám phá tính hoa của adidas.</p>  
        <h5>Kích cỡ</h5>  
        <div class="btn-group" role="group" aria-label="Basic example">  
            <button type="button" class="btn btn-outline-secondary">A/XS</button>  
            <button type="button" class="btn btn-outline-secondary">A/S</button>  
            <button type="button" class="btn btn-outline-secondary">A/M</button>  
            <button type="button" class="btn btn-outline-secondary">A/L</button>  
            <button type="button" class="btn btn-outline-secondary">A/XL</button>  
        </div>  
        <div class="mt-3">  
            <a href="#" class="btn btn-primary">ĐĂNG KÝ MIỄN PHÍ</a>  
        </div>  
        <div class="mt-3">  
            <p>Bạn đã là hội viên adiClub? <a href="#">ĐĂNG NHẬP</a></p>  
        </div>   
    </div>  
    <?php  
    }else {  
        echo "Sản phẩm không tồn tại.";  
    }  
    ?>  
    </div>  
</div>  

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  
</html>