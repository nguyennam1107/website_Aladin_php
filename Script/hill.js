 
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
function stringToMatrix(str, n) {  
    const matrix = [];  
    for (let i = 0; i < str.length; i += n) {  
        const row = [];  
        for (let j = 0; j < n; j++) {  
            if (i + j < str.length) {  
                row.push(str.charCodeAt(i + j) - 'A'.charCodeAt(0));
            } else {  
                row.push(0); 
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
            ? encryptedChar.toLowerCase(): encryptedChar;
    }).join('');

    return encryptedText;  
}

// Example usage: