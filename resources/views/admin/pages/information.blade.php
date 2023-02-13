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
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

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
                <script type="text/javascript">
                    $(document).ready(function() {
                        toastr.options.timeOut = 1500; // 1.5s
                        toastr.success("{{ session('success') }}");
                        $('#linkButton').click(function() {
                            toastr.success('Click Button');
                        });
                    });
                </script>
            @else
                @foreach (['phone', 'address', 'email', 'url'] as $errorKey)
                    @if ($errors->has($errorKey))
                        <script type="text/javascript">
                            let error = {!! json_encode($errors->messages()) !!};
                            $(document).ready(function() {
                                toastr.options.timeOut = 1500; // 1.5s
                                toastr.error(error[`{{ $errorKey }}`]);
                                $('#linkButton').click(function() {
                                    toastr.success('Click Button');
                                });
                            });
                        </script>
                    @endif
                @endforeach
            @endif

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Company information</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Company information</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if ($siteData->setupInfo == false)
                <!-- content -->
                <section class="content">
                    <!-- container fluid -->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-md-12">
                                <!-- card -->
                                <div class="card card-warning card-outline">
                                    <!-- card header -->
                                    <div class="card-header">
                                        <h3 class="card-title">Information</h3>
                                    </div>
                                    <!-- ./card header -->
                                    <form action="{{ route('addInfo') }}" method="POST">
                                        @csrf
                                        <!-- card body -->
                                        <div class="card-body">
                                            <p>Add information content to the site</p>
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="siteName">Current phone number</label>
                                                <input type="text" class="form-control" name="phone"
                                                    placeholder="Enter company's phone number">
                                            </div>
                                            <!-- ./form group -->
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="siteName">Current email address</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Enter company's email address">
                                            </div>
                                            <!-- ./form group -->
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="siteName">Current street address</label>
                                                <textarea rows="3" type="text" class="form-control" name="address"
                                                    placeholder="Enter company's street address"></textarea>
                                            </div>
                                            <!-- ./form group -->
                                        </div>
                                        <!-- card body -->
                                        <!-- card footer -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-warning">Add Info</button>
                                        </div>
                                        <!-- card footer -->
                                    </form>
                                </div>
                                <!-- ./card -->
                            </div>
                            <!-- col -->
                        </div>
                        <!-- ./row -->
                    </div>
                    <!-- ./container fluid -->
                </section>
                <!-- /.content -->
            @else
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-success card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Phone Number</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Change company's phone number</p>
                                        <form action=" {{ route('updatePhoneNumber') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="siteName">Current phone number</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ $infoData->phoneNum }}">
                                            </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-md-6">
                                <div class="card card-success card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Email Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Change company's email address</p>
                                        <form action=" {{ route('updateEmail') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="siteName">Current email address</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $infoData->email }}">
                                            </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-md-6">
                                <div class="card card-success card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Street Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Change company's street address</p>
                                        <form action=" {{ route('updateAddress') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="siteName">Current street address</label>
                                                <textarea rows="3" type="text" class="form-control" name="address">{{ $infoData->address }}</textarea>
                                            </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
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
</body>

</html>
