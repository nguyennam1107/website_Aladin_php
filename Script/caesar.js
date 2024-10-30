function caesarEncrypt(text, shift) {
    return text.split('').map(char => {
        const code = char.charCodeAt(0);
        if (char >= 'A' && char <= 'Z') {
            return String.fromCharCode(((code - 65 + shift) % 26) + 65);
        } else if (char >= 'a' && char <= 'z') {
            return String.fromCharCode(((code - 97 + shift) % 26) + 97);
        }
        return char;
    }).join('');
}
