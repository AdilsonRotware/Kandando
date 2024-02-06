@extends('adminlte::page')

@section('title', 'Kandando')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content')
    <h1>Editar Compra</h1>

    <form action="{{ route('compras.update', $compra->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="cliente_id">ID do Cliente:</label>
        <input type="text" name="cliente_id" value="{{ $compra->cliente_id }}" required>

        <label for="valor_total">Valor Total:</label>
        <input type="text" name="valor_total" value="{{ $compra->valor_total }}" required>

        <label for="data_compra">Data da Compra:</label>
        <input type="date" name="data_compra" value="{{ $compra->data_compra }}" required>

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('compras.index') }}">Cancelar</a>
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

