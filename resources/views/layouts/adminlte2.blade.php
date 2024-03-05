<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    @stack('scripts')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset("/plugins/fontawesome-free/css/all.min.css")}}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset("/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">

    <link rel="stylesheet" href="{{asset("/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">

    <link rel="stylesheet" href="{{asset("/css/adminlte.css")}}">

    <link rel="stylesheet" href="{{asset("/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">

    <link rel="stylesheet" href="{{asset('/plugins/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{asset('/plugins/summernote/summernote-bs4.min.css')}}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset("/img/AdminLTELogo.png")}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                    <a href="{{route('profile.edit')}}" class="dropdown-item">
                        <div class="row">
                            <i class="fa fa-solid fa-user"></i>
                            <div class="media-body ml-3">
                                <h3 class="dropdown-item-title">
                                    Perfil
                                    <span class="float-right text-sm text-danger"></span>
                                </h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>

                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="dropdown-item btn-danger">
                            <div class="row">
                                <i class="fa fa-arrow-left"></i>
                                <div class="media-body ml-3">
                                    <h3 class="dropdown-item-title">
                                        Sair
                                        <span class="float-right text-sm text-danger"></span>
                                    </h3>
                                </div>
                            </div>
                        </button>
                    </form>
                </div>
            </li>

        </ul>
        <a class="nav-link" data-toggle="dropdown" href="#">
            {{explode(" ", Auth::guard('doctor')->user()->name)[0]}}
        </a>


    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{route('doctor.dashboard')}}" class="brand-link">
            <img src="{{asset("/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset("/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::guard('doctor')->user()->name }}</a>

                </div>
            </div>


            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{route('doctor.dashboard')}}" class="nav-link {{Request::is('doctor.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <!--<span class="right badge badge-danger">New</span>-->
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('pdf.index')}}" class="nav-link {{Request::is('doctor.dashboard') ? '' : '' }}">
                            <i class="nav-icon fas fa-route"></i>
                            <p>
                                Relatório
                                <!--<span class="right badge badge-danger">New</span>-->
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link {{Request::is('doctor.dashboard') ? '' : '' }}">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                Consultas
                                <!--<span class="right badge badge-danger">New</span>-->
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link {{Request::is('doctor.dashboard') ? '' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Cadastro
                                <!--<span class="right badge badge-danger">New</span>-->
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>

    </aside>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-9">
                        <h1 class="m-0">{{$header}}</h1>
                    </div>
                    @isset($addButton)
                        <div class="col-sm-3">
                            <a class="btn btn-primary" href="{{$addButton['href']}}">
                                {{$addButton['title']}}
                            </a>
                        </div>
                    @endisset
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">
                @yield('slot')
            </div>
        </section>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        Todos direitos reservados.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>

<script src="{{asset("/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset("/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("/plugins/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("/plugins/sparklines/sparkline.js")}}"></script>
<script src="{{asset("/plugins/jquery-knob/jquery.knob.min.js")}}"></script>
<script src="{{asset("/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("/plugins/daterangepicker/daterangepicker.js")}}"></script>
<script src="{{asset("/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<script src="{{asset("/plugins/summernote/summernote-bs4.min.js")}}"></script>
<script src="{{asset("/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("/js/adminlte.js")}}"></script>
<script src="{{asset("/js/pages/dashboard.js")}}"></script>

</body>
</html>
