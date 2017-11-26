<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login</title>
        <!-- Bootstrap core CSS-->
        <link href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="assets/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="assets/dashboard/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <!-- El action llamara a una funcion de un controlador -->
                    <form method="POST" action="<?= site_url('dashboard/validate_usser') ?>">
                        <div class="form-group">
                            <label for="exapleUsername">Nombre de usuario</label>
                            <input class="form-control" id="exampleName" type="text" aria-describedby="nameHelp" name="username" placeholder="Introduce el nombre de usuario">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"> Recordar contraseña</label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Iniciar sesion">
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="register.html">Registrarte</a>
                        <a class="d-block small" href="forgot-password.html">¿Olvidaste la contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
        <script src="assets/dashboard/vendor/popper/popper.min.js"></script>
        <script src="assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>

</html>
