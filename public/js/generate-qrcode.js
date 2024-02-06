// Importe o módulo AES da biblioteca crypto-js
const AES = CryptoJS.AES;

document.addEventListener('DOMContentLoaded', function () {
    const inputNomeCompleto = document.getElementById('NomeCompleto');
    const qrcodeContainer = document.getElementById('qrcode');
    const qrcodeBase64Field = document.getElementById('qrcode_base64');

    let qrCodeGenerated = false;

    inputNomeCompleto.addEventListener('blur', function () {
        if (!qrCodeGenerated && inputNomeCompleto.value.trim() !== '') { // Verifique se o nome não está vazio
            generateQRCode(inputNomeCompleto.value);
            qrCodeGenerated = true;
        }
    });

    function generateUserAccessKey() {
        // Gere uma chave aleatória usando a biblioteca crypto-js
        const key = CryptoJS.lib.WordArray.random(128 / 8); // 128 bits

        // Converta a chave para uma string hexadecimal
        const hexKey = key.toString(CryptoJS.enc.Hex);

        return hexKey;
    }

    function generateQRCode(text) {
        const userAccessKey = generateUserAccessKey();
        const combinedText = text + userAccessKey;
        const encryptedText = AES.encrypt(combinedText, userAccessKey).toString();

        const qrcode = new QRCode(qrcodeContainer, {
            text: encryptedText,
            width: 150,
            height: 150,
        });

        const qrcodeBase64 = qrcodeContainer.querySelector('img').getAttribute('src');
        qrcodeBase64Field.value = qrcodeBase64; // Certifique-se de que qrcodeBase64 contém a base64 correta aqui
    }

});
