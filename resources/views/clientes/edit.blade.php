@extends('adminlte::page')

@section('title', 'Kandando')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content_header')
    <h1>Editar Cliente</h1>
    @stop

@section('content')
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{ $cliente->nome }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $cliente->email }}" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="{{ $cliente->telefone }}" required>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" value="{{ $cliente->endereco }}" required>

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('clientes.index') }}">Cancelar</a>
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
