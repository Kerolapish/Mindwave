<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <script src="https://kit.fontawesome.com/48b4d892a8.js" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!--icon-->
    <link rel="icon" href="/assets/images/mindwave-ico.png">
    <!--floating message-->
    <link rel="stylesheet" href=" {{ asset('assets/css/floatMessage.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin/layout/topnav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin/layout/sidebar')
        <!-- /.Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if (session('success'))
                <div id="message-float">
                    {{ session('success') }}
                </div>
            @else
                @foreach (['content'] as $errorKey)
                    @if ($errors->has($errorKey))
                        <div id="message-float-error">
                            {{ $errors->first($errorKey) }}
                        </div>
                    @endif
                @endforeach
            @endif

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Footer</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Footer</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if ($siteData->setupFooter == false)
                <!-- Main content -->
                <section class="content">
                    <!-- container-fluid -->
                    <div class="container-fluid">
                        <!--row-->
                        <div class="row">
                            <!--col-->
                            <div class="col-md-12">
                                <!--card-->
                                <div class="card card-warning card-outline">
                                    <!--card header-->
                                    <div class="card-header">
                                        <h3 class="card-title">Setup Footer Content</h3>
                                    </div>
                                    <!--card header-->
                                    <!--card body-->
                                    <div class="card-body">
                                        <p>Add footer description to the site</p>
                                        <form action=" {{ route('addFooter') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!--form group-->
                                            <div class="form-group">
                                                <label for="siteName">Footer Description</label>
                                                <textarea type="text" class="form-control" name="content" placeholder="Please enter footer description"></textarea>
                                            </div>
                                            <!--./form group-->
                                    </div>
                                    <!--./card body-->
                                    <!--card footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning">Add Footer</button>
                                    </div>
                                    </form>
                                    <!--./card footer-->
                                </div>
                                <!--./card-->
                            </div>
                            <!--./row-->
                        </div>
                        <!--./row-->
                    </div>
                    <!-- /.container-fluid -->
                </section> 
                <!-- ./Main content -->
            @else
                <!-- Main content -->
                <section class="content">
                    <!-- /.container-fluid -->
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Footer Content</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Change footer description</p>
                                        <form action=" {{ route('updateFooter') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="siteName">Current footer description</label>
                                                <textarea type="text" class="form-control" name="content">{{ $footerData -> desc}}</textarea>
                                            </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            @endif

        </div>
        <!-- /.content-wrapper -->

        <!--footer-->
        @include('admin/layout/footer')
        <!--/.footer-->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script>
        let divError = document.getElementById("message-float-error");
        let divSuccess = document.getElementById("message-float");

        if (divError) {
            divError.addEventListener("click", function() {
                divSuccess.style.display = "none";
            });

            setTimeout(() => {
                divError.classList.add('hide');
            }, 2000);
        }

        if (divSuccess) {
            divSuccess.addEventListener("click", function() {
                divSuccess.style.display = "none";
            });

            setTimeout(() => {
                divSuccess.classList.add('hide');
            }, 2000);
        }
    </script>
</body>

</html>
