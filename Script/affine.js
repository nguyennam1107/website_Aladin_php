function affineEncrypt(text, a, b) {
    const m = 26;
    let result = '';

    for (let i = 0; i < text.length; i++) {
        let char = text.charCodeAt(i);
        if (char >= 65 && char <= 90) {
            result += String.fromCharCode(((a * (char - 65) + b) % m) + 65);
        } else if (char >= 97 && char <= 122) {
            result += String.fromCharCode(((a * (char - 97) + b) % m) + 97);
        } else {
            result += text[i];
        }
    }
    return result;
}
