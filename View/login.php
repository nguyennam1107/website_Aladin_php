<?php  
include_once '../controllers/LoginController.php';  
$controller = new LoginController();  
?> 
<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $username = $_POST['username'] ?? '';  
    $password = $_POST['password'] ?? '';  
    $newUsername = $_POST['newUsername'] ?? '';  
    $newPassword = $_POST['newPassword'] ?? '';  
    $comfirmPassword = $_POST['comfirmPassword'] ?? '';  
    function passwordMatch($newPassword, $comfirmPassword) {  
        return $newPassword === $comfirmPassword;  
    }  
    if (!empty($newUsername) && !empty($newPassword) && !empty($comfirmPassword)) {  
        if (!passwordMatch($newPassword, $comfirmPassword)) {  
            echo "Mật khẩu phải giống nhau!";  
            exit();  
        }  
        
        $controller->handleSignup($newUsername, $newPassword);  
    }   
    if (!empty($username) && !empty($password)) {  
        $controller->handleLogin($username, $password);  
    }  
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
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
                        <input type="text" class="form-control" id="username" name="username" autocomplete="username" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <p class="switch-link">Don't have an account? <a href="#" id="switchToSignup">Sign Up</a></p>
                </form>
                <form id="signUpForm" method="POST" style="display: none;">
                    <h2>Sign Up</h2>
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername" placeholder="Create a username">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Create a password">
                    </div>
                    <div class="mb-3">
                        <label for="comfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="comfirmPassword" name="comfirmPassword" placeholder="Confirm your password">
                    </div>
                    <button type="submit" class="btn btn-success">Sign Up</button>
                    <p class="switch-link">Already have an account? <a href="#" id="switchToSignin">Sign In</a></p>
                </form>
            </div>
        </div>
    </div> 
    <script src="../Script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>