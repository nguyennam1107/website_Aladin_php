<?php
function convertKey($jsonInput) {  
    $data = json_decode($jsonInput, true);  
    if ($data['method'] === 'hill_3x3') {  

        $keyArray = json_decode($data['key']);  
        
        $key = [];  
        for ($i = 0; $i < 3; $i++) {  
            $key[$i] = array_slice($keyArray, $i * 3, 3);  
        }  
    } elseif ($data['method'] === 'hill') {  

        $keyArray = json_decode($data['key']);  
        
        $key = [];  
        for ($i = 0; $i < 2; $i++) {  
            $key[$i] = array_slice($keyArray, $i * 2, 2);  
        }  
    }
    else if ($data['method'] === 'caesar') {  
        $key = json_decode($data['key']);  
    }
    else if ($data['method'] === 'affine') {  
        $key = json_decode($data['key']);  
    }
    else if ($data['method'] === 'cipherMap') {  
        $key = json_decode($data['key']);  
    }
    else if ($data['method'] === 'playfair') {  
        $key = json_decode($data['key']);  
    }
    else {  
        throw new Exception("Không hỗ trợ phương thức này.");  
    } 
    return $key;  
} 
?>  