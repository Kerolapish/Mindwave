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
    <!--blur card -->
    <link rel="stylesheet" href=" {{ asset('assets/css/blurCard.css') }}">
    <!-- toastr CDN -->
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
            @foreach (['text', 'title'] as $errorKey)
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Service</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Service</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if ($siteData->setupService == false)
                <!-- Main content -->
                <section class="content">
                    <!-- Container Fluid -->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-md-12">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Note:</h5>
                                    Please add more service card <b>({{ 6 - $serviceData->count() }} cards
                                        remaining)</b>
                                </div>
                            </div>
                            <!-- ./col -->
                            <!-- col -->
                            <div class="col-md-12">
                                <!-- card -->
                                <div class="card card-warning card-outline">
                                    <!-- card header -->
                                    <div class="card-header">
                                        <h3 class="card-title">Card #{{ $serviceData->count() + 1 }}</h3>
                                    </div>
                                    <!-- ./card header -->
                                    <!-- card body -->
                                    <div class="card-body">
                                        <p>Add service offered and its description</p>
                                        <form action="{{ route('addService', $serviceData->count()) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="siteName">Service Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    placeholder="Please enter service title">
                                            </div>
                                            <!-- ./form group -->
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="siteName">Service Paragraph</label>
                                                <textarea rows="3" type="text" class="form-control" name="paragraph"
                                                    placeholder="Please enter service description"></textarea>
                                            </div>
                                            <!-- form group -->
                                    </div>
                                    <!-- ./card body -->
                                    <!-- card footer -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning">Add Service</button>
                                        </form>
                                    </div>
                                    <!-- ./card footer -->
                                </div>
                                <!-- ./card -->
                            </div>
                            <!-- col -->
                        </div>
                        <!-- ./row -->
                    </div>
                    <!-- ./Container Fluid -->
                </section>
                <!-- ./Main content -->
            @else
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">
                            @for ($i = 0; $i < count($serviceData); $i++)
                            <div class="col-md-4">
                                <div class="card card-success card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Card #{{ $i + 1 }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('updateCardService', $serviceData[$i]->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="siteName">Card Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $serviceData[$i]->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="siteName">Card Paragraph</label>
                                                <textarea rows="3" type="text" class="form-control" name="paragraph">{{ $serviceData[$i]->desc }}</textarea>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        </div>
                        <!-- row -->
                    </div>
                </section>
            @endif
        </div><!-- /.container-fluid -->
        <!-- /.content -->
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
