@extends('adminlte::page')

@section('title', 'Kandando')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content')
    <h1>Listagem de Compras</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID do Cliente</th>
                <th>Valor Total</th>
                <th>Data da Compra</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->cliente_id }}</td>
                    <td>{{ $compra->valor_total }}</td>
                    <td>{{ $compra->data_compra }}</td>
                    <td>
                        <a href="{{ route('compras.show', $compra->id) }}">Detalhes</a>
                        <a href="{{ route('compras.edit', $compra->id) }}">Editar</a>
                        <form action="{{ route('compras.destroy', $compra->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('compras.create') }}">Adicionar Compra</a>
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
