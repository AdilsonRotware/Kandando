<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kandando";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as total_clientes FROM clientes";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAlunos = $row['total_clientes'];
$conn->close();
?>
@extends('adminlte::page')

@section('title', 'Kandando')
<link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">

@section('content')

@if(session('error'))
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content custom-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Restrição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="font-size: 1.2em;">
                <strong>{{ session('error') }}</strong>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#errorModal').modal('show');
    });
</script>
@endif

<div class="row">

<div class="col-lg-3 col-12">
<div class="small-box bg-cyan">
    <div class="inner">
        <h3>Total</h3>
        <p>Clientes Registrados</p>
    </div>
    <div class="icon">
        <i class="ion ion-bag"></i>
    </div>
    <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-12">
<div class="small-box bg-cyan">
    <div class="inner">
    <h3>Total</h3>
        <p>Produtos Registrados</p>
    </div>
    <div class="icon">
        <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-12">
<div class="small-box bg-cyan">
<div class="inner">
    <h3>Total</h3>
    <p>Vendas Registradas</p>
</div>
<div class="icon">
    <i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-12">
<div class="small-box bg-cyan">
<div class="inner">
    <h3>Total</h3>
    <p>Funcionarios</p>
</div>
<div class="icon">
    <i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>

<div class="row">
<div class="small-box bg-cyan text-center">
<div class="card-body">
    <p>Data atual: <span id="current-date" class="font-weight-bold"></span></p>
</div>
</div>
<div class="col-lg-12">
<div class="card bg-gradient-cyan">
<div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="far fa-calendar-alt"></i>
        Calendário
      </h3>
<div class="card-tools">

<div class="btn-group">
<button type="button" class="btn btn-cyan btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
<i class="fas fa-bars"></i>
</button>
<div class="dropdown-menu" role="menu">
    <a href="#" class="dropdown-item">Adicione novo evento</a>
    <a href="#" class="dropdown-item">Limpar eventos</a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">Ver Calendário</a>
  </div>
</div>
<button type="button" class="btn btn-cyan btn-sm" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-cyan btn-sm" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>

</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
