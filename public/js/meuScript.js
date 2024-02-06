
        // Função para iniciar a webcam simulada no PC
        function startWebcam() {
            Webcam.set({
                width: 320,
                height: 240,
                dest_width: 320,
                dest_height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#cameraDiv');
        }

        // Função para escanear o código QR
        function scanQRCode() {
            const scanner = new Instascan.Scanner({ video: document.getElementById('videoFeed') });

            scanner.addListener('scan', function(content) {
                document.getElementById("qrCodeResult").value = content;
                scanner.stop(); // Parar a leitura após encontrar um código QR
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    // Exibir opção para o usuário escolher a câmera
                    if (window.confirm("Deseja usar a câmera real do dispositivo?")) {
                        scanner.start(cameras[0]); // Iniciar a leitura usando a primeira câmera disponível
                    } else {
                        // Inicie a webcam simulada no PC
                        startWebcam();
                    }
                } else {
                    // Se nenhuma câmera estiver disponível, inicie a webcam simulada no PC
                    startWebcam();
                }
            }).catch(function(e) {
                // Se houver erro ao acessar a câmera, inicie a webcam simulada no PC
                startWebcam();
            });
        }
