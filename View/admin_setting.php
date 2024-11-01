<?php  
require_once '../controllers/MaHoaController.php';
$mahoaController = new MaHoaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST['encryptionMethod'];
    $keyAction = 0;
    
    switch ($method) {
        case 'affine':
            $keys = [
                'a' => $_POST['affineKeyA'],
                'b' => $_POST['affineKeyB']
            ];
            break;

        case 'caesar':
            $keys = [
                'shift' => $_POST['caesarKey']
            ];
            break;

        case 'cipherMap':
            $keys = [
                'mapKey' => $_POST['cipherMapKey']
            ];
            break;

        case 'playfair':
            $keys = [
                'playfairKey' => $_POST['playfairKey']
            ];
            break;

        case 'hill':
            if (!empty($_POST['hillKey2x2'])) {
                $keys = $_POST['hillKey2x2'];
            } else if (!empty($_POST['hillKey3x3'])) {
                $keys = $_POST['hillKey3x3']; 
            }
            break;

        default:
            $keys = [];
    }

    if (empty($keys)) {
        echo "Please fill out all required fields.";
        return;
    }
    echo "<script>console.log('".json_encode($keys)."');</script>"; 
    $mahoaController->saveKey($method, json_encode($keys), $keyAction);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings - Account Security</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Admin Settings - Account Security</h2>
    
    <div class="card">
        <div class="card-header">
            <h5>Password Encryption Settings</h5>
        </div>
        <div class="card-body">
            <form id="encryptionSettingsForm" method="POST" action="">
                <div class="form-group">
                    <label for="encryptionMethod">Select Encryption Method</label>
                    <select class="form-control" id="encryptionMethod" name="encryptionMethod">
                        <option value="">Select Method</option>
                        <option value="affine">Affine</option>
                        <option value="caesar">Caesar</option>
                        <option value="cipherMap">CipherMap</option>
                        <option value="vigenere">Vigenère</option>
                        <option value="playfair">PlayFairCipher</option>
                        <option value="hill">Hill</option>
                        <option value="hill_3x3">Hill</option>
                    </select>
                </div>

                <div id="affineKeyInput" style="display: none;">
                    <label>Affine Key (a, b)</label>
                    <input type="number" class="form-control" placeholder="Enter a" name="affineKeyA">
                    <input type="number" class="form-control" placeholder="Enter b" name="affineKeyB">
                </div>

                <div id="caesarKeyInput" style="display: none;">
                    <label>Caesar Cipher Key (Shift)</label>
                    <input type="number" class="form-control" placeholder="Enter shift key" name="caesarKey">
                </div>
                <div id="cipherMapKeyInput" style="display: none;">
                    <label>Cipher Map Key</label>
                    <input type="text" class="form-control" placeholder="Enter 26-character key" name="cipherMapKey">
                </div>
                <div id="playfairKeyInput" style="display: none;">
                    <label>Playfair Key</label>
                    <input type="text" class="form-control" placeholder="Enter Playfair key" name="playfairKey">
                </div>

                <div id="hillKeyInput2x2" style="display: none;">
                    <label>Hill Cipher Key (2x2 Matrix)</label>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hill2x2">
                            <tbody>
                                <tr>
                                    <td><input type="number" class="form-control" placeholder="Row 1, Col 1" name="hillKey2x2[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 1, Col 2" name="hillKey2x2[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="number" class="form-control" placeholder="Row 2, Col 1" name="hillKey2x2[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 2, Col 2" name="hillKey2x2[]"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="hillKeyInput3x3" style="display: none;">
                    <label>Hill Cipher Key (3x3 Matrix)</label>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hill3x3">
                            <tbody>
                                <tr>
                                    <td><input type="number" class="form-control" placeholder="Row 1, Col 1" name="hillKey3x3[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 1, Col 2" name="hillKey3x3[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 1, Col 3" name="hillKey3x3[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="number" class="form-control" placeholder="Row 2, Col 1" name="hillKey3x3[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 2, Col 2" name="hillKey3x3[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 2, Col 3" name="hillKey3x3[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="number" class="form-control" placeholder="Row 3, Col 1" name="hillKey3x3[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 3, Col 2" name="hillKey3x3[]"></td>
                                    <td><input type="number" class="form-control" placeholder="Row 3, Col 3" name="hillKey3x3[]"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Settings</button>
            </form>
            <button type="button3x3" style="display: none;" class="btn btn-primary" id="switchTo3x3">Switch to 3x3</button>
            <button type="button2x2" style="display: none;" class="btn btn-primary" id="switchTo2x2">Switch to 2x2</button>
        </div>
        <div class="card mt-4">
        <div class="card-header">
            <h5>Saved Encryption Methods</h5>
        </div>
        <div class="card-body">  
        <form method="post" action="../API/save.php">  
            <ul class="list-group">  
                <?php  
                $methods = $mahoaController->getEncryptionMethods();  
                foreach ($methods as $method) {  
                    $checked = (int)$method["key_action"] === 1 ? "checked" : "";
                    echo "<script>console.log('".$checked."');</script>"; 
                    echo "<li class='list-group-item'>".  
                        "<label>".  
                        "<input type='radio' name='selected_method' value='" . htmlspecialchars($method["method"]) . "'".$checked."> " .   
                        htmlspecialchars($method["method"]) . ": " . htmlspecialchars($method["key"]) . 
                        "</label>  
                    </li>";  
                }  
                ?>  
            </ul>  
            <button id="save-button" type="submit">Lưu lựa chọn</button>  
        </form>  
        </div>  
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../Script/Method.js"></script>
</body>
</html>
