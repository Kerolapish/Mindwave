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
            @foreach (['background2', 'background1', 'video', 'background-1', 'background-2'] as $errorKey)
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
                <!--Container Fluid-->
                <div class="container-fluid">
                    <!--Row-->
                    <div class="row mb-2">
                        <!--col-->
                        <div class="col-sm-6">
                            <h1 class="m-0">Background</h1>
                        </div>
                        <!-- /.col -->
                        <!--col-->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Background</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if ($siteData->setupBackground == false)
                <!-- Main content -->
                <section class="content">
                    <!--Container fluid-->
                    <div class="container-fluid">
                        <!--Row-->
                        <div class="row">
                            <!--Column-->
                            <div class="col-md-12">
                                <!--Card-->
                                <div class="card card-warning card-outline">
                                    <!--Card Header-->
                                    <div class="card-header">
                                        <h3 class="card-title">Background</h3>
                                    </div>
                                    <!--./Card Header-->
                                    <form action=" {{ route('addBg') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!--Card body-->
                                        <div class="card-body">
                                            <p>Add video, primary and secondary background to the page </p>
                                            {{--  Upload Video Background --}}
                                            <label for="exampleInputFile">Video Background (Dark background
                                                preferred)</label>
                                            <div class="input-group mb-3">
                                                <input type="file" name="video" id="inputFile0"
                                                    class="custom-file-input">
                                                <label class="custom-file-label" for="inputFile0"
                                                    id="inputFile0Label">Choose Video</label>
                                            </div>
                                            {{-- Upload Primary Background --}}
                                            <label for="exampleInputFile">Primary Background (Dark background
                                                preferred)</label>
                                            <div class="input-group mb-3">
                                                <input type="file" name="background1" id="inputFile1"
                                                    class="custom-file-input">
                                                <label class="custom-file-label" for="inputFile1"
                                                    id="inputFile1Label">Choose Image</label>
                                            </div>
                                            {{-- Upload Secondary Background --}}
                                            <label for="exampleInputFile">Secondary Background (Light background
                                                preferred)</label>
                                            <div class="input-group mb-3">
                                                <input type="file" name="background2" id="inputFile2"
                                                    class="custom-file-input">
                                                <label class="custom-file-label" for="inputFile2"
                                                    id="inputFile2Label">Choose Image</label>
                                            </div>
                                        </div>
                                        <!--./Card body-->
                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-warning">Create</button>
                                        </div>
                                        <!--./Card footer-->
                                    </form>
                                </div>
                                <!--Card-->
                            </div>
                        </div>
                        <!--./row-->
                    </div>
                </section>
            @else
                <!-- content -->
                <div class="content">
                    <!-- content fluid -->
                    <div class="container-fluid">
                        <!--Row-->
                        <div class="row">
                            {{-- Update Video Background --}}
                            <!--Column-->
                            <div class="col-md-6">
                                <!--Card-->
                                <div class="card card-primary card-outline">
                                    <!--Card Header-->
                                    <div class="card-header">
                                        <h3 class="card-title">Background</h3>
                                    </div>
                                    <!--./Card Header-->
                                    <!--Card body-->
                                    <div class="card-body">
                                        <p class="mb-3">Add video as background (dark background preferred)</p>
                                        <div class="text-center mb-5">
                                            <video width="60%" autoplay muted loop id="bg-video">
                                                <source src=" {{ asset('storage/' . $bgData->vidPath) }}"
                                                    type="video/mp4" />
                                            </video>
                                        </div>
                                        <form action=" {{ route('updateVidBg') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="exampleInputFile">Video Background</label>
                                            <div class="input-group">
                                                <input type="file" name="video" id="inputFile0"
                                                    class="custom-file-input @error('video') is-invalid @enderror">
                                                <label class="custom-file-label" for="inputFile0"
                                                    id="inputFile0Label">Choose Video</label>
                                            </div>
                                    </div>
                                    <!--./Card body-->
                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                    <!--./Card footer-->
                                </div>
                                <!--Card-->
                            </div>
                            <!--./Column-->

                            {{-- Update Primary Background --}}
                            <!--Column-->
                            <div class="col-md-6">
                                <!--Card-->
                                <div class="card card-primary card-outline">
                                    <!--Card Header-->
                                    <div class="card-header">
                                        <h3 class="card-title">Primary Background</h3>
                                    </div>
                                    <!--./Card Header-->
                                    <!--Card body-->
                                    <div class="card-body">
                                        <p class="mb-3">Add image as primary background (dark background preferred)</p>
                                        <div class="text-center mb-5">
                                            <img width="400" height="200"
                                                src="{{ asset('storage/' . $bgData->bg1Path) }}" alt="">

                                        </div>
                                        <form action="{{ route('updateBg1') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="exampleInputFile">Primary Background</label>
                                            <div class="input-group">
                                                <input type="file" name="background-1" id="inputFile1"
                                                    class="custom-file-input @error('background-1') is-invalid @enderror">
                                                <label class="custom-file-label" for="inputFile1"
                                                    id="inputFile1Label">Choose Image</label>
                                            </div>
                                    </div>
                                    <!--./Card body-->
                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                    <!--./Card footer-->
                                </div>
                                <!--Card-->
                            </div>
                            <!--./Column-->

                            {{-- Update secondary background --}}
                            <!--Column-->
                            <div class="col-md-6">
                                <!--Card-->
                                <div class="card card-primary card-outline">
                                    <!--Card Header-->
                                    <div class="card-header">
                                        <h3 class="card-title">Secondary Background</h3>
                                    </div>
                                    <!--Card Header-->
                                    <!--Card Body-->
                                    <div class="card-body">
                                        <p class="mb-3">Add image as secondary background (light background preferred)</p>
                                        <div class="text-center mb-5">
                                            <img width="400" height="200"
                                                src="{{ asset('storage/' . $bgData->bg2Path) }}" alt="">
                                        </div>
                                        <form action="{{ route('updateBg2') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="exampleInputFile">Secondary Background</label>
                                            <div class="input-group">
                                                <input type="file" name="background-2" id="inputFile2"
                                                    class="custom-file-input @error('background-2') is-invalid @enderror">
                                                <label class="custom-file-label" for="inputFile2"
                                                    id="inputFile2Label">Choose Image</label>
                                            </div>
                                    </div>
                                    <!--Card Body-->
                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                    <!--Card footer-->
                                </div>
                                <!--Card-->
                            </div>
                            <!--./Column-->
                        </div>
                        <!--./Row-->
                    </div>
                    <!-- ./content fluid -->
                </div>
                <!-- ./content -->
            @endif
        </div>
        <!--./row-->
    </div>
    <!--./Container fluid-->
    </section>
    <!--Content End-->

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
