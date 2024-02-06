@extends('adminlte::page')

@section('title', 'Kandando')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content')
<div id="sidebar" class="sidebar">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 py-4">
            <div class="register-logo text-center">
                <b>Realizar</b> Vendas
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="text-end mb-3 float-right">
                <a href="{{ route('compras.index') }}" class="btn btn-warning"><strong> Ver Lista de Vendas</strong></a>
            </div>

            <label for="qrcode">Exiba o QR Code do Cliente:</label>
            <div class="embed-responsive embed-responsive-16by9">
                <video id="scanner" class="embed-responsive-item" playsinline></video>
            </div>
            <br>

            <div id="error-message" class="alert alert-danger d-none" role="alert"></div>

            <form action="{{ route('compras.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="cliente_id">ID do Cliente (QR Code):</label>
                    <input type="text" name="cliente_id" id="cliente_id" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="nome">Nome do Cliente:</label>
                    <input type="text" name="nome" id="nome" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="valor_total">Valor Total (Kz):</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kz</span>
                        </div>
                        <input type="number" name="valor_total" id="valor_total" class="form-control" step="0.01" inputmode="decimal" required oninput="validarValorTotal(this)">
                    </div>
                    <span id="mensagem-erro-valor-total" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="litros_adquiridos">Quantidade de Litros Adquiridos:</label>
                    <input type="number" name="litros_adquiridos" class="form-control" required oninput="validarQuantidadeLitros(this)">
                    <span id="mensagem-erro-quantidade-litros" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="modo_pagamento">Modo de Pagamento:</label>
                    <select name="modo_pagamento" class="form-control" required>
                        <option value="" disabled selected>Selecione o modo de pagamento</option>
                        <option value="dinheiro">TPA</option>
                        <option value="cartao">CASH</option>
                        <!-- Adicione mais opções conforme necessário -->
                    </select>
                </div>

                <!-- Adicionado campo para exibir a data e hora atual -->
                <div class="form-group">
                    <label for="data_compra">Data da Compra:</label>
                    <input type="datetime-local" name="data_compra" id="data_compra" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
            </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });

    let audioPlayed = false;

function playBeep() {
    if (!audioPlayed) {
        const audio = new Audio('/audio.mp3');
        audio.play();
        audioPlayed = true;
    }
}

document.body.addEventListener('click', () => {
        playBeep();
    });

    function vibrateDevice() {
        if (navigator.vibrate) {
            navigator.vibrate(200);
        }
    }

    Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {

            const rearCamera = cameras.length > 1 ? cameras[1] : cameras[0];
            scanner.start(rearCamera);
        } else {
            console.error('Nenhuma câmera encontrada.');
            vibrateDevice();
        }
    });

    scanner.addListener('scan', function(content) {
        document.getElementById('nome').value = content;
        document.getElementById('qrcode').value = content;
        playBeep();
        vibrateDevice();
    });

    const entradaInput = document.getElementById('entrada');

    const angolaTimezone = 'Africa/Luanda';
    const now = new Date();
    const angolaOffset = now.getTimezoneOffset() / 60;
    const angolaTime = new Date(now.getTime() - angolaOffset * 3600 * 1000).toISOString().slice(0, -8);

    entradaInput.value = angolaTime;
});

    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 500);
        }
    }, 5000);

    // Preenche automaticamente o campo de data e hora
    const dataCompraInput = document.getElementById('data_compra');
    const agora = new Date();
    const dataHoraAtual = agora.toISOString().slice(0, -8); // Converte para o formato YYYY-MM-DDTHH:mm
    dataCompraInput.value = dataHoraAtual;
</script>

<script>
    function validarValorTotal(input) {
        const valor = input.value;

        // Verifica se o valor contém letras ou caracteres especiais
        if (/[^0-9.]/.test(valor)) {
            document.getElementById('mensagem-erro-valor-total').innerText = 'Por favor, insira apenas valores numéricos.';
            input.setCustomValidity('Por favor, insira apenas valores numéricos.');
        } else {
            document.getElementById('mensagem-erro-valor-total').innerText = '';
            input.setCustomValidity('');
        }
    }

    function validarQuantidadeLitros(input) {
        const valor = input.value;

        // Verifica se o valor contém letras ou caracteres especiais
        if (/[^0-9.]/.test(valor)) {
            document.getElementById('mensagem-erro-quantidade-litros').innerText = 'Por favor, insira apenas valores numéricos.';
            input.setCustomValidity('Por favor, insira apenas valores numéricos.');
        } else {
            document.getElementById('mensagem-erro-quantidade-litros').innerText = '';
            input.setCustomValidity('');
        }
    }
</script>
@stop
