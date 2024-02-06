<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="NtjKuDXf4EatZjpz8ZkrNPcdUp5xyT0NOvnsgQ3H">
    <title>Kandando</title>

    <!-- Stylesheets -->
    <link rel="icon" type="image/x-icon" href="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.ico">
    <link rel="stylesheet" href="http://localhost/Kandando/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/Kandando/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="http://localhost/Kandando/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<style>
    .login-page {
        background: url('http://localhost/Kandando/vendor/adminlte/dist/img/fundo.webp') no-repeat center center fixed;
        background-size: cover;
        /* Outras propriedades de estilo para a classe .login-page podem ser adicionadas aqui */
        width: 100%;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<body class="login-page" style="min-height: 248.6px;">

    <body class="login-page" style="min-height: 374.56px;">
        <div class="login-box">
            <div class="login-logo">
                <a href="http://localhost/Kandando/home">
                    <img src="http://localhost/Kandando/vendor/adminlte/dist/img/AdminLTELogo.png" alt="Admin Logo" height="50">
                    <b>Ka</b>Ndando
                </a>
            </div>

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title float-none text-center">Recuperar senha</h3>
            </div>

            <div class="card-body login-card-body">
                <form action="http://localhost/Kandando/password/email" method="post">
                    <input type="hidden" name="_token" value="NtjKuDXf4EatZjpz8ZkrNPcdUp5xyT0NOvnsgQ3H" autocomplete="off">

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" value="" placeholder="Email" autofocus="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-flat btn-primary">
                        <span class="fas fa-share-square"></span>
                        Enviar link de recuperação de senha
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="http://localhost/Kandando/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/Kandando/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/Kandando/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="http://localhost/Kandando/vendor/adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
