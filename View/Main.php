<html lang="vi">  
<head>  
 <meta charset="UTF-8">  
 <meta name="viewport" content="width=device-width, initial-scale=1.0">  
 <title>Adidas Showcase</title>  
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
 <link rel="stylesheet" href="../Style/main.css">
</head>  
<body>  
 <div class="main-content">  
    <div class="image-container position-relative my-4">  
        <nav class="bg-light py-2 d-flex justify-content-between align-items-center position-absolute w-50" style="top:10px; z-index:10; opacity:0.8;">  
            <span>EXPLORE OUR KEY ICONS - <a href="#" class="text-primary">KHÁM PHÁ ORIGINALS</a></span>  
            <i class="fa-solid fa-xmark"></i>  
        </nav>  
    <div class="row g-4 align-items-center mt-3">  
        <div class="col-md-12 position-relative">  
            <img class="img-fluid w-100" src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto,fl_lossy/if_w_gt_1920,w_1920/adizero_HP_MH_d_7e49ff3f74.jpg" alt="ADIZERO BOSTON12">  
        </div>  
            <div class="col-md-6 mt-3">  
                <h3 class="hero-title">ADIZERO BOSTON12</h3>  
                <h1 class="section-title">TẬP LUYỆN LÀ TỐT NHẤT</h1>  
                <p>Cảm giác như trên đường đua khi tập luyện, tiếp sức từ công nghệ hiệu năng cao.</p>  
            <div>  
            <a href="#" class="btn btn-primary me-2">MUA ĐỒ NAM <i class="fa-solid fa-arrow-right"></i></a>  
            <a href="#" class="btn btn-secondary">MUA ĐỒ NỮ <i class="fa-solid fa-arrow-right"></i></a>  
            </div>  
        </div>  
    </div>  
 </div> 
    <?php  
    require_once '../controllers/ProductController.php';  

    $productController = new ProductController();  
    $products = $productController->listProducts();   
    ?>  
 <?php if (!empty($products)): ?>  
    <div class="exclusive-section">  
        <div class="wrap">  
            <?php foreach ($products as $product): ?>  
                <div class="product-card">  
                    <p>Members' Exclusive</p>  
                </div>  
                <a href="Infoproduct/Info.php?id=<?php echo $product['id']; ?>">  
                    <div class="image-item">  
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />  
                        <div class="image-overlay">  
                            <p><?php echo number_format($product['price'], 0, ',', '.'); ?><sup>đ</sup></p>  
                            <p><?php echo htmlspecialchars($product['name']); ?></p>  
                            <p><?php echo htmlspecialchars($product['category']); ?></p>  
                            <p><?php echo htmlspecialchars($product['status']); ?></p>  
                        </div>  
                    </div>  
                </a>  
            <?php endforeach; ?>  
        </div>  
    </div>  
<?php else: ?>  
    <p>Không có sản phẩm nào để hiển thị.</p>  
<?php endif; ?> 
    <div class="topic-section">  
        <div class="fill-picture">  
        <h1 class="section-title">Khám Phá Bộ Sưu Tập Mới Nhất</h1>  
            <div class="image-item">  
            <img src="https://images.unsplash.com/photo-1620799139834-6b8f844fbe61?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80" alt="Alladin Training" />  
                <div class="image-overlay">  
                <h1>Alladin Training. Be Supported.</h1>  
                <p>Tiếp thêm sức mạnh cho bạn. Bộ sưu tập bền bỉ giúp bạn thoải mái.</p>  
                <a href="#" class="btn btn-primary">MUA NGAY</a>  
                </div>  
            </div>  
            <div class="image-item">  
            <img src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto,fl_lossy/if_w_gt_400,w_400/fw23_terrex_adventure_wardrobe_hike_launch_hp_tc_d_e580d1ba20.jpg" alt="Alladin & Simpsons" />  
                <div class="image-overlay">  
                    <h1>Alladin & Simpsons</h1>  
                    <p>A new range of hardwood classic receives an update from Itchy, Scratchy & Poochie.</p>  
                    <a href="#" class="btn btn-primary">MUA NGAY</a>  
                </div>  
            </div>  
            <div class="image-item">  
                <img src="https://images.unsplash.com/photo-1628413993904-94ecb60f1239?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1888&q=80" alt="Alladin" />  
                <div class="image-overlay">  
                    <h1>Illegally fast</h1>  
                    <p>Quá nhiều công nghệ trong một đôi giày chạy bộ, nó không được cho phép trong các cuộc đua hệ tuyển.</p>  
                    <a href="#" class="btn btn-primary">MUA NGAY</a>  
                </div>  
            </div>  
        </div>  
    </div>  
 </div>  
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>  
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  
</html>