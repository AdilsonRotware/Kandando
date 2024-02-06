@extends('adminlte::page')

@section('title', 'Kandando - Criar Cliente')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content_header')
    <h1>Criar Cliente</h1>
@stop

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" required>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" required>
                </div>

                <div class="form-group">
                    <label for="qrcode">Código QR:</label>
                    <div id="qrcode" style="width: 150px; height: 150px;"></div>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var inputNome = document.querySelector('input[name="nome"]');
            var qrCodeDiv = document.getElementById('qrcode');

            var qrcode = new QRCode(qrCodeDiv, {
                width: 150,
                height: 150
            });

            inputNome.addEventListener('input', function () {
                var nome = inputNome.value;
                qrcode.makeCode(nome);
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            var email = document.querySelector('input[name="email"]').value;

            if (!emailIsValid(email)) {
                alert('Por favor, insira um endereço de e-mail válido.');
                event.preventDefault();
            }
        });

        function emailIsValid(email) {
            // Adicione lógica de validação de e-mail aqui
            // Retorna true se o e-mail for válido, caso contrário, retorna false
            return /\S+@\S+\.\S+/.test(email);
        }
    });
</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@stop
