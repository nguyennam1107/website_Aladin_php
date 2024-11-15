<?php
require_once '../controllers/ControlDanhMuc.php';

$controlDanhMuc = new ControlDanhMuc();
$categoriesMale = $controlDanhMuc->getCategoriesByGender('Nam');  
$categoriesFemale = $controlDanhMuc->getCategoriesByGender('Nữ');   
echo "<script>console.log(".json_encode($categoriesFemale).")</script>";  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="../Style/notification.css">
    <link rel="stylesheet" href="../Style/Narbar.css">
    <link rel="stylesheet" href="../Style/Panel.css">
</head>
<body>
    <div class="notification-bar position-relative" id="notification-bar">
        <div class="notification-item" id="notification-1">
            <span>GIAO HÀNG MIỄN PHÍ CHO THÀNH VIÊN CỦA ADICLUB</span>
            <a href="#">THAM GIA NGAY</a>
        </div>
        <div class="notification-item" id="notification-2" style="display: none;">
            <span>TRẢ HÀNG DỄ DÀNG</span>
            <a href="#">TRẢ HÀNG DỄ DÀNG</a>
        </div>
        <span class="close-btn" id="close-btn">&times;</span>
    </div>

    <header class="main-header ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">
                <img src="../images/ALADIN.png" alt="ALADIN Logo" class="img-fluid" style="width: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"  id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMale" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NAM
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMale">
                            <div class="row p-3" style="width: 1670px;">
                                <?php foreach ($categoriesMale as $category): ?>
                                    <div class="col-6 col-md-3">
                                        <h6 class="dropdown-header"><?php echo $category['category']; ?></h6>
                                        <a class="dropdown-item" href="<?php echo $category['item_url']; ?>"><?php echo $category['item_name']; ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Tất cả sản phẩm dành cho nam</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFemale" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NỮ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownFemale">
                            <div class="row p-3" style="width: 1670px;">
                                <?php foreach ($categoriesFemale as $category): ?>
                                    <div class="col-6 col-md-3">
                                        <h6 class="dropdown-header"><?php echo $category['category']; ?></h6>
                                        <a class="dropdown-item" href="<?php echo $category['item_url']; ?>"><?php echo $category['item_name']; ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Tất cả sản phẩm dành cho nữ</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFemale" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Spost
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownFemale">
                            <div class="row p-3" style="width: 1670px;">
                                <?php foreach ($categoriesFemale as $category): ?>
                                    <div class="col-6 col-md-3">
                                        <h6 class="dropdown-header"><?php echo $category['category']; ?></h6>
                                        <a class="dropdown-item" href="<?php echo $category['item_url']; ?>"><?php echo $category['item_name']; ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Tất cả sản phẩm dành cho nữ</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFemale" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            T1
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownFemale">
                            <div class="row p-3" style="width: 1670px;">
                                <?php foreach ($categoriesFemale as $category): ?>
                                    <div class="col-6 col-md-3">
                                        <h6 class="dropdown-header"><?php echo $category['category']; ?></h6>
                                        <a class="dropdown-item" href="<?php echo $category['item_url']; ?>"><?php echo $category['item_name']; ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Tất cả sản phẩm dành cho nữ</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="container collapse navbar-collapse">
                <div class="col py-2" >
                    <div class="col-md-8 ">
                            <form action="search.php" method="get" class="d-flex">
                                <input type="text" name="search" id="search" class="form-control" placeholder="tìm kiếm">
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col py-2" >
                    <div class="row-md-8 d-flex" >
                        <div class="nav justify-content-start">
                                <a class="nav-link text-white" href="#">trợ giúp</a>
                                <a class="nav-link text-white" href="#">trình theo dõi đơn hàng</a>
                                <a class="nav-link text-white" href="#">đăng ký hội viên</a>
                        </div>   
                        <div class="language-selector d-flex align-items-center justify-content-end">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/320px-Flag_of_Vietnam.svg.png" alt="Vietnam Flag" width="24" height="16">
                        </div>                     
                    </div>
                    <div class="row-md-4 d-flex justify-content-center align-items-center" id="togglePanel">
                        <div class="icon-group">
                            <a href="#" class="position-relative me-3">
                                <i class="fa-regular fa-user"></i>
                                <span class="badge bg-warning text-dark position-absolute top-0 start-100 translate-middle">1</span>
                            </a>
                            <a href="#" class="me-3"><i class="fa-regular fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </div>                        
        </nav>
    </header>

    <div class="container " style="position: absolute;">  
        <div class="panel" id="myPanel">  
            <div class="panel-header">Chào Nam</div>  
            <div class="panel-level">  
                <img src="https://via.placeholder.com/40" alt="adiClub Level 1"> LEVEL 1  
            </div>  
            <div class="points">50 Points</div>  
            <a href="#" class="btn btn-link">Truy Cập Tài Khoản Của Bạn</a>  
            <a href="#" class="btn btn-link">Tải Xuống Ứng Dụng Adidas</a>  
            <a href="#" class="btn btn-link">Chạy Bộ và Tích Điểm</a>  
            <a href="#" class="btn btn-link">Chỉ Có Tại adiClub</a>  
            <div class="benefits">  
                <div class="benefits-header">Các Lợi Ích Tức Thì Của Bạn</div>  
                <ul class="list-unstyled">  
                    <li>Miễn Phí Vận Chuyển</li>  
                    <li>Điểm adiClub Theo Đơn Hàng Của Bạn</li>  
                </ul>  
                <a href="#" class="btn btn-link">Tìm Hiểu Thêm Về Chương Trình adiClub</a>  
            </div>  
        </div>  
    </div>  

    <script>
        document.getElementById('togglePanel').addEventListener('click', function(event) {  
        event.preventDefault(); 
        var panel = document.getElementById('myPanel');  
        panel.classList.toggle('show');
    });  
    </script>
</body>
</html>
