$(document).ready(function() {
    $('#encryptionMethod').change(function() {
        $('#affineKeyInput, #caesarKeyInput, #cipherMapKeyInput, #vigenereKeyInput, #playfairKeyInput, #hillKeyInput2x2, #hillKeyInput3x3').hide();

        const method = $(this).val();
        if (method === 'affine') {
            $('#affineKeyInput').show();
        } else if (method === 'caesar') {
            $('#caesarKeyInput').show();
        } else if (method === 'cipherMap') {
            $('#cipherMapKeyInput').show();
        } else if (method === 'vigenere') {
            $('#vigenereKeyInput').show();
        } else if (method === 'playfair') {
            $('#playfairKeyInput').show();
        } else if (method === 'hill') {
            $('#hillKeyInput2x2').show(); // Mặc định là ma trận 2x2
            $('#switchTo3x3').show();
        }else if (method === 'hill_3x3') {
            $('#hillKeyInput3x3').show(); // Mặc định là ma trận 2x2
            $('#switchTo2x2').show();
        }
    });

    // Sự kiện chuyển đổi giữa ma trận 2x2 và 3x3 cho Hill Cipher
    $(document).on('click', '#switchTo3x3', function() {
        $('#hillKeyInput2x2').hide();
        $('#hillKeyInput3x3').show();
        $('#switchTo3x3').hide();
        $('#switchTo2x2').show();
    });
    $(document).on('click', '#switchTo2x2', function() {
        $('#switchTo2x2').hide();
        $('#switchTo3x3').show();
        $('#hillKeyInput3x3').hide();
        $('#hillKeyInput2x2').show();
    });
});
