<?php  
function multiplyMatrices($a, $b) {  
    $result = [];  
    for ($i = 0; $i < count($a); $i++) {  
        $result[$i] = [];  
        for ($j = 0; $j < count($b[0]); $j++) {  
            $result[$i][$j] = 0;  
            for ($k = 0; $k < count($b); $k++) {  
                $result[$i][$j] += $a[$i][$k] * $b[$k][$j];  
            }  
        }  
    }  
    return $result;  
}  

function stringToMatrix($str, $n) {  
    $matrix = [];  
    for ($i = 0; $i < strlen($str); $i += $n) {  
        $row = [];  
        for ($j = 0; $j < $n; $j++) {  
            if ($i + $j < strlen($str)) {  
                $row[] = ord($str[$i + $j]) - ord('A');  
            } else {  
                $row[] = 0;  
            }  
        }  
        $matrix[] = $row;  
    }  
    return $matrix;  
}  

function hillCipherEncrypt($plaintext, $key) {  
    $n = count($key);  
    $keyMatrix = array_map(fn($row) => $row, $key);  
    $filteredChars = [];  
    $caseInfo = [];  
    $originalStructure = [];  // Mảng để lưu cấu trúc gốc của plaintext  

    // Lặp qua từng ký tự trong plaintext  
    foreach (str_split($plaintext) as $char) {  
        if (preg_match('/[A-Za-z]/', $char)) {  
            $filteredChars[] = strtoupper($char);  // Lưu ký tự viết hoa  
            $caseInfo[] = $char;  // Lưu thông tin về ký tự gốc  
            $originalStructure[] = null;  // Đánh dấu vị trí  
        } else {  
            $originalStructure[] = $char;  // Giữ nguyên ký tự không phải chữ cái  
        }  
    }  

    // Tạo ma trận từ các ký tự đã lọc  
    $plaintextMatrix = stringToMatrix(implode('', $filteredChars), $n);  
    // Mã hóa ma trận bằng ma trận khóa  
    $encryptedMatrix = array_map(fn($plaintextRow) => multiplyMatrices([$plaintextRow], $keyMatrix)[0], $plaintextMatrix);  

    $encryptedText = '';  
    foreach (array_merge(...$encryptedMatrix) as $index => $num) {  
        $encryptedChar = chr(($num % 26 + 26) % 26 + ord('A'));  // Chuyển số thành ký tự  
        if (isset($caseInfo[$index]) && ctype_lower($caseInfo[$index])) {  
            $encryptedChar = strtolower($encryptedChar);  // Giữ nguyên kiểu chữ nếu cần  
        }  
        $encryptedText .= $encryptedChar;  
    }  

    // Phục hồi cấu trúc gốc của plaintext  
    $result = '';  
    $textIndex = 0;  // Chỉ số để theo dõi vị trí của ký tự đã mã hóa  

    foreach ($originalStructure as $item) {  
        if ($item !== null) {  
            $result .= $encryptedText[$textIndex++];  
        } else {  
            $result .= $item;  // Giữ nguyên ký tự không phải chữ cái  
        }  
    }  

    return $result;  
}  