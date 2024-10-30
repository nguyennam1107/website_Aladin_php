// Hàm để nhân ma trận  
function multiplyMatrices(a, b) {  
    const result = [];  
    for (let i = 0; i < a.length; i++) {  
        result[i] = [];  
        for (let j = 0; j < b[0].length; j++) {  
            result[i][j] = 0;  
            for (let k = 0; k < b.length; k++) {  
                result[i][j] += a[i][k] * b[k][j];  
            }  
        }  
    }  
    return result;  
}  

// Hàm để chuyển đổi một chuỗi thành ma trận  
function stringToMatrix(str, n) {  
    const matrix = [];  
    for (let i = 0; i < str.length; i += n) {  
        const row = [];  
        for (let j = 0; j < n; j++) {  
            if (i + j < str.length) {  
                row.push(str.charCodeAt(i + j) - 'A'.charCodeAt(0)); // Chuyển đổi sang số (A=0, B=1, ...)  
            } else {  
                row.push(0); // Padding bằng 0 nếu thiếu ký tự (có thể thay thế bằng ký tự khác)  
            }  
        }  
        matrix.push(row);  
    }  
    return matrix;  
}  
function hillCipherEncrypt(plaintext, key) {  
    const n = key.length; 
    const keyMatrix = key.map(row => row.slice()); 

    const filteredChars = [];
    const caseInfo = [];

    for (const char of plaintext) {
        if (/[A-Za-z]/.test(char)) { 
            filteredChars.push(char.toUpperCase()); 
            caseInfo.push(char);
        }
    }

    const plaintextMatrix = stringToMatrix(filteredChars.join(''), n);  

    const encryptedMatrix = plaintextMatrix.map(plaintextRow =>   
        multiplyMatrices([plaintextRow], keyMatrix)[0] 
    );  

    const encryptedText = encryptedMatrix.flat().map((num, index) => {
        const encryptedChar = String.fromCharCode((num % 26 + 26) % 26 + 'A'.charCodeAt(0));
        return caseInfo[index] && caseInfo[index] === caseInfo[index].toLowerCase() 
            ? encryptedChar.toLowerCase()
            : encryptedChar;
    }).join('');

    return encryptedText;  
}

// Ví dụ sử dụng  
const keyJson =  $.getJSON('http://localhost/Aladin/API/key.php');   
const parsedKey = JSON.parse(keyJson);  
const key = parsedKey[0].key.replace(/[^\d,]/g, '').split(',').map(Number);  

// Chuyển đổi mảng thành ma trận 3x3  
const keyMatrix = [  
    [key[0], key[1], key[2]],  
    [key[3], key[4], key[5]],  
    [key[6], key[7], key[8]]  
];  

const password = "HELLO"; // Mật khẩu cần mã hóa  
const encryptedPassword = hillCipherEncrypt(password, keyMatrix);  

console.log("Encrypted Password: ", encryptedPassword);