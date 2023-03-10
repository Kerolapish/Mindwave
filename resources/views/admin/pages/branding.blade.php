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
                @foreach (['logo', 'siteName', 'image'] as $errorKey)
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
                            <h1 class="m-0">Branding</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Branding</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if ($siteData->setupBrand == false)
                <!-- Main content -->
                <section class="content">
                    <!--Container fluid-->
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12">
                                <!-- card -->
                                <div class="card card-warning card-outline">
                                    <!-- card header -->
                                    <div class="card-header">
                                        <h3 class="card-title">Branding</h3>
                                    </div>
                                    <!-- ./card header -->
                                    <form action="{{ route('addBrand') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            {{-- Updload Favicon --}}
                                            <p>Upload Picture, size must be 32x32 and in .png or .ico format</p>

                                            <div class="form-group">
                                                <label for="exampleInputFile">New Favicon</label>
                                                <div class="input-group">
                                                    <input type="file" name="path" id="InputFile0"
                                                        class="custom-file-input">
                                                    <label class="custom-file-label" for="InputFile0"
                                                        id="InputFile0Label">Upload Image</label>
                                                </div>
                                            </div>

                                            {{-- Upload SiteName --}}
                                            <div class="form-group">
                                                <label for="siteName">New site name</label>
                                                <input type="text" class="form-control" name="siteName"
                                                    placeholder="Enter new site name (site title)">
                                            </div>

                                            {{-- Upload Logo --}}
                                            <label for="exampleInputFile">New Logo</label>
                                            <div class="input-group">
                                                <input type="file" name="logoPath" id="InputFile1"
                                                    class="custom-file-input">
                                                <label class="custom-file-label" for="InputFile1"
                                                    id="InputFile1Label">Choose Logo</label>
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- ./card body -->
                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-warning">Add Brand</button>
                                        </div>
                                        <!--./Card footer-->
                                    </form>
                                </div>
                                <!-- ./card -->
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- ./row -->
                    </div>
                </section>
                <!-- ./section -->
            @else
                <!--section -->
                <section class="content">
                    <!--Container fluid-->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">
                            {{-- Update Favicon --}}
                            <!-- col -->
                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Update Favicon</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Update Picture, size must be 32x32 and in .png or .ico format</p>
                                        <form action="{{ route('updateImage') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputFile">Favicon</label>
                                                <div class="input-group">
                                                    <input type="file" name="image" id="InputFile0"
                                                        class="custom-file-input @error('image') is-invalid @enderror">
                                                    <label class="custom-file-label" for="InputFile0"
                                                        id="InputFile0Label">Choose
                                                        Image</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ./col -->

                            {{-- Update Site Name --}}
                            <!-- col -->
                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Site Name</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Change site name appears as page title</p>
                                        <form action=" {{ route('updateSiteName') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="siteName">Current site name</label>
                                                <input type="text" class="form-control" name="siteName"
                                                    value="{{ $brandData->siteName }}">
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ./col -->

                            {{-- Update Logo --}}
                            <!-- col -->
                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Update Logo</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Update Logo, size must be 3:1 ration and in .png or .jpg format</p>
                                        <form action="{{ route('updateLogo') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputFile">Company Logo</label>
                                                <div class="input-group">
                                                    <input type="file" name="logo" id="InputFile1"
                                                        class="custom-file-input @error('logo') is-invalid @enderror">
                                                    <label class="custom-file-label" for="InputFile1"
                                                        id="InputFile1Label">Choose
                                                        Logo</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                    <!-- ./card footer -->
                                </div>
                                <!-- ./card -->
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- row -->
                    </div>
                    <!--./Container fluid-->
                </section>
                <!--./section -->
        </div>
        <!-- ./row -->
    </div>
    <!-- content fluid -->
    </section>
    <!-- /.content end -->
    </div>
    <!-- content -->
    @endif
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    </div><!-- /.container-fluid -->
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
        // Get all the file input elements
        let fileInputs = document.querySelectorAll("input[type='file']");

        // Loop through each file input element
        fileInputs.forEach(function(input) {

            // Get the corresponding file name label element
            let fileName = document.getElementById(input.id + "Label");

            // Listen for change event on the file input element
            input.addEventListener("change", function() {

                // Get the file name from the file input element
                let name = input.files[0].name;

                // Set the value of the file name label element to the file name
                fileName.innerHTML = name;
            });
        });
    </script>

</body>

</html>
