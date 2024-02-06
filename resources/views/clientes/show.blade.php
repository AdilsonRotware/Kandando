@extends('adminlte::page')

@section('title', 'Kandando')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content_header')
    <h1>Detalhes do Cliente</h1>
    @stop

    @section('content')

    <p><strong>ID:</strong> {{ $cliente->id }}</p>
    <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
    <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>

    <a href="{{ route('clientes.index') }}">Voltar para Listagem de Clientes</a>
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
