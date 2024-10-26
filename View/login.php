<?php  
include_once '../config/database.php';  
include_once '../controllers/LoginController.php';  

$database = new Database();  
$db = $database->getConnection();  
$controller = new LoginController($db);  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Style/style.css">
    <title>Wellcom Aladin</title>
</head>
<body>
    <div class="container" >
        <div class="login-box">
            <div class="login-form">
                <form id="signInForm" method="POST">
                    <h2>Sign In</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <p class="switch-link">Don't have an account? <a href="#" id="switchToSignup">Sign Up</a></p>
                </form>
                <form id="signUpForm" method="POST" style="display: none;">
                    <h2>Sign Up</h2>
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="newUsername" placeholder="Create a username">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="Create a password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                    </div>
                    <button type="submit" class="btn btn-success">Sign Up</button>
                    <p class="switch-link">Already have an account? <a href="#" id="switchToSignin">Sign In</a></p>
                </form>
            </div>
        </div>
    </div> 
    <script src="../Script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $username = $_POST['username'] ?? null;  
    $password = $_POST['password'] ?? null;  
    $newUsername = $_POST['newUsername'] ?? null;  
    $newPassword = $_POST['newPassword'] ?? null;  
    $comfirmPassword = $_POST['comfirmPassword'] ?? null;  
    if (!empty($newUsername) && !empty($newPassword) && !empty($comfirmPassword)) {  
        if ($newPassword !== $comfirmPassword) {  
            echo "Mật khẩu phải giống nhau!";  
            exit();  
        }  

        if ($controller->signup($newUsername, $newPassword)) {  
            echo "Đăng ký thành công!";  
            header("Location: trangchu.php");  
            exit();
        } else {  
            echo "Đăng ký thất bại!";  
        }  
    }  

    if (!empty($username) && !empty($password)) {  
        if ($controller->login($username, $password)) {  
            echo "Đăng nhập thành công!";  
            header("Location: trangchu.php");  
            exit();
        } else {  
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";  
        }  
    }  
} else {  
    include 'login.php';
}  
?>