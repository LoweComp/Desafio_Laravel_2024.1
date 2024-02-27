<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset("/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("/css/adminlte.css")}}">
</head>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <p class="h1"><b>School</b>Bus</p>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Registre-se</p>

            <form action="{{route('register.store')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input required name="name" type="text" class="form-control" placeholder="Nome completo" value="@isset($name) {{$name}} : '' @endisset">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input required name="email" type="email" class="form-control" placeholder="Email" value="@isset($email) {{$email}} : '' @endisset">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha">

                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input required name="password_confirmation" type="password" class="form-control" placeholder="Confirme sua senha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                    <!-- /.col -->
                    <div class="col mb-2">
                        <button type="submit" class="btn btn-primary btn-block">Registrar-se</button>
                    </div>
                    <!-- /.col -->
            </form>
            <a href="{{route('login')}}" class="text-center">Já possuo conta</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@include('sweetalert::alert')

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
