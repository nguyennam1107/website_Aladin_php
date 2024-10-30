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
            }
        }
        matrix.push(row);
    }
    return matrix;
}

// Hàm để mã hóa chuỗi bằng Hill Cipher
function hillCipherEncrypt(plaintext, key) {
    const n = key.length; // Kích thước của ma trận khóa
    const keyMatrix = key.map(row => row.slice()); // Tạo bản sao của ma trận khóa
    const plaintextMatrix = stringToMatrix(plaintext.toUpperCase(), n);

    const encryptedMatrix = plaintextMatrix.map(plaintextRow => 
        multiplyMatrices([plaintextRow], keyMatrix)[0] // Nhân ma trận
    );

    // Chuyển đổi lại ma trận đã mã hóa thành chuỗi
    return encryptedMatrix.flat().map(num => String.fromCharCode(num % 26 + 'A'.charCodeAt(0))).join('');
}

// Ví dụ sử dụng
const key = [
    [6, 24, 1],
    [13, 16, 10],
    [20, 17, 15]
];

const plaintext = "HELLO";
const encrypted = hillCipherEncrypt(plaintext, key);
console.log("Encrypted:", encrypted);
