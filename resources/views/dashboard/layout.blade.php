<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    {{-- datatable --}}
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/summernote/summernote-bs4.css')}}">
    {{-- code ionic --}}
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- SwetetAlert2     --}}
    <link rel="stylesheet" href="{{asset('dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/toastr/toastr.min.css')}}">

    <title>DBOOK</title>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand  navbar-light "
            style="background: -webkit-linear-gradient(-45deg, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);"
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home')}}" class="nav-link">Inicio</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('cerrar sección') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li> <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cerrar Sección
                    </a>
                </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-3"
            style="background: -webkit-linear-gradient(-45deg, rgba(219,171,235,1) 0%, rgba(148,76,230,1) 0%, rgba(39,6,61,1) 100%);">
            <!-- Brand Logo -->
            <a href="{{route('home')}}" class="brand-link"
                style="background: -moz-linear-gradient(top, rgba(212,208,212,1) 0%, rgba(230,230,230,1) 0%, rgba(255,255,255,1) 81%, rgba(255,255,255,1) 100%); padding:6px; ">
                <img src="{{asset('dashboard/dist/img/solologo.png')}}" alt="AdminLTE Logo" class=" img-circle "
                    style=" height:50px; width:50px; margin-left:3px; margin-right:-12px; margin-top:-4px; ">
                <span class="brand-text font-weight-light"><img src="{{asset('dashboard/dist/img/solobook.png')}}"
                        style="width:90px; "></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>
                                    Inicio
                                </p>
                            </a>
                        </li>



                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-warehouse nav-icon"></i>
                                <p>
                                    Almacen
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('articulo')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Artículos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('categoria')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>Categorías</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-shopping-basket nav-icon"></i>
                                <p>
                                    Compras
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('ingreso')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-secondary"></i>
                                        <p>Ingresos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('proveedor/index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-info"></i>
                                        <p>Proveedores</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>
                                    Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('venta/index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Ventas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cliente/index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Clientes</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-folder-open nav-icon"></i>
                                <p>
                                    Acceso
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('user/index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configuracion')}}" class="nav-link">
                                <i class="fas fa-cogs nav-icon"></i>
                                <p>
                                    Configuraciones
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="container">
                @yield('content')
            </div>


        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer
            style="background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 19%, rgba(230,230,230,1) 100%); "
            class="main-footer">

            <div class="float-right">
                <i class="fas fa-seedling text-success"></i>
                Cuida el medio ambiente
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2018-2020 <a href="#">Drakin S.A.</a>.</strong>Todos los Derechos
            Reservados
        </footer>
    </div>
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/pages/dashboard3.js"></script>
    <script src="{{asset('dashboard/dist/js/adminlte.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- ChartJS -->
    <script src="{{asset('dashboard/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('dashboard/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboard/0/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dashboard/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dashboard/dist/js/demo.js')}}"></script>


    {{--SwetAlert --}}
    <script src="{{asset('dashboard/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/toastr/toastr.min.js')}}"></script>


    {{-- DATATABLE COMO CHINGAS --}}
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })

    </script>
    <script>
        $(document).ready(function () {
            $('#tabla').DataTable({
                "bInfo": false,
                "paging": false,
                "searching": false,
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                    className: 'dtr-control',
                    orderable: false,
                    targets: 0,

                }],
                order: [1, 'asc']
            });
        });

    </script>


</body>


</html>
