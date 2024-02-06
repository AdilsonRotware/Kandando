@extends('adminlte::page')

@section('title', 'Kandando')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content')
    <div class="container">
        <h1>Detalhes da Compra</h1>

        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $compra->id }}</p>
                <p><strong>ID do Cliente:</strong> {{ $compra->cliente_id }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Valor Total:</strong> {{ $compra->valor_total }}</p>
                <p><strong>Data da Compra:</strong> {{ $compra->data_compra }}</p>
            </div>
        </div>

        <a href="{{ route('compras.index') }}">Voltar para Listagem de Compras</a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@stop
