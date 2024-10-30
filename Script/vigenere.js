function vigenereEncrypt(text, key) {
    let result = '';
    let keyIndex = 0;

    for (let i = 0; i < text.length; i++) {
        let char = text.charCodeAt(i);
        if (char >= 65 && char <= 90) {
            let shift = key.charCodeAt(keyIndex % key.length) - 65;
            result += String.fromCharCode(((char - 65 + shift) % 26) + 65);
            keyIndex++;
        } else if (char >= 97 && char <= 122) {
            let shift = key.charCodeAt(keyIndex % key.length) - 97;
            result += String.fromCharCode(((char - 97 + shift) % 26) + 97);
            keyIndex++;
        } else {
            result += text[i]; 
        }
    }
    return result;
}
