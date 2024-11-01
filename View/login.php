<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="../Style/style.css">  
    <title>Welcome Aladin</title>  
</head>  
<body>  
    <div class="container">  
        <div class="login-box">  
            <div class="login-form">
                <?php include './modulLogin.html'; ?>  
                <?php include './modulSignup.html'; ?>  
            </div>  
        </div>  
    </div>
    <script src="../Script/script.js"></script>
    <script src="../Script/hill.js"></script>
    <script> 
    $(document).ready(function() {  
        $('#signUpForm').submit(function(e) {  
            e.preventDefault();   

            const newPassword = $('#newPassword').val();  
            if (!isValidPassword(newPassword)) {  
                alert("Mật khẩu không hợp lệ. Vui lòng thử lại.");  
                return;  
            }  
            
            $.getJSON('../API/key.php', function(key) {  
            try {  
                if (!key || !key[0] || !key[0].key) {  
                    throw new Error("Dữ liệu khóa không hợp lệ.");  
                }  
                const key_exists = JSON.parse(key[0].key);

                if (key_exists.length !== 9) {  
                    throw new Error("Khóa không hợp lệ.");  
                }  
                console.log('debug here');
                const keyMatrix = [  
                    [key_exists[0], key_exists[1], key_exists[2]],  
                    [key_exists[3], key_exists[4], key_exists[5]],  
                    [key_exists[6], key_exists[7], key_exists[8]]  
                ];  
                const encryptedPassword = hillCipherEncrypt(newPassword, keyMatrix);   
                $('#newPassword').val(encryptedPassword);   
                $('#comfirmPassword').val(encryptedPassword);  

                $('#signUpForm')[0].submit();  
            } catch (error) {  
                alert("Có lỗi xảy ra trong quá trình xử lý khóa: " + error.message);  
            }  
        }).fail(function() {  
            alert("Có lỗi xảy ra khi lấy khóa. Vui lòng thử lại sau.");  
        });
        });  
        
        $('#signInForm').submit(function(e) {  
            e.preventDefault();  
            
            const password = $('#password').val();  
            if (!isValidPassword(password)) {  
                alert("Mật khẩu không hợp lệ. Vui lòng thử lại.");  
                return;  
            }  

            $.getJSON('../API/key.php', function(key) {  
            try {  
                
                if (!key || !key[0] || !key[0].key) {  
                    throw new Error("Dữ liệu khóa không hợp lệ.");  
                }  
                const key_exists = JSON.parse(key[0].key);

                if (key_exists.length !== 9) {  
                    throw new Error("Khóa không hợp lệ.");  
                }  
                console.log(key) ;
                const keyMatrix = [  
                    [key_exists[0], key_exists[1], key_exists[2]],  
                    [key_exists[3], key_exists[4], key_exists[5]],  
                    [key_exists[6], key_exists[7], key_exists[8]]  
                ];  

                const encryptedPassword = hillCipherEncrypt(password, keyMatrix);   
                $('#password').val(encryptedPassword);   
                $('#signInForm')[0].submit();  
            } catch (error) {  
                alert("Có lỗi xảy ra trong quá trình xử lý khóa: " + error.message);  
            }  
        }).fail(function() {  
            alert("Có lỗi xảy ra khi lấy khóa. Vui lòng thử lại sau.");  
        });

        });  

        function isValidPassword(password) {   
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;  
            return regex.test(password);  
        }  
    });  
</script>
</body>  
</html>