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
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!--blur card -->
    <link rel="stylesheet" href=" {{ asset('assets/css/blurCard.css') }}">
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
            @foreach (['name', 'position', 'url', 'image'] as $errorKey)
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
                            <h1 class="m-0">Team</h1>
                        </div>
                        <!-- /.col -->
                        <!--col-->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Service</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if ($siteData->setupTeam == false)
                <!-- Main content -->
                <section class="content">
                    <!--Container fliud-->
                    <div class="container-fluid">
                        <!--row-->
                        <div class="row">
                            <!-- col -->
                            <div class="col-12">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Note:</h5>
                                    Please add more team card <b>({{ 3 - $teamData->count() }} cards remaining)</b>
                                </div>
                            </div>
                            <!-- ./col -->
                            <!-- col -->
                            <div class="col-md-12">
                                <!-- card -->
                                <div class="card card-warning card-outline">
                                    <!-- card header -->
                                    <div class="card-header">
                                        <h3 class="card-title">Team Card #{{ $teamData->count() + 1 }}</h3>
                                    </div>
                                    <!-- ./card header -->
                                    <!-- card body -->
                                    <div class="card-body">
                                        <p>Add team member name, position, image and LinkedIn URL</p>
                                        <form action="{{ route('addTeam', $teamData->count()) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="siteName">Team's Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Please enter team's name">
                                            </div>
                                            <!-- ./form group -->
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="siteName">Team's Position</label>
                                                <input type="text" class="form-control" name="position"
                                                    placeholder="Please enter team's position">
                                            </div>
                                            <!-- ./form group -->
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="url">Team's LinkedIn URL</label>
                                                <input type="text" class="form-control" name="url"
                                                    placeholder="Please enter team's LinkedIn URL">
                                            </div>
                                            <!-- ./form group -->
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label for="exampleInputFile">Team's Image</label>
                                                <div class="input-group">
                                                    <input type="file" name="image"
                                                        id="inputFile{{ $teamData->count() + 1 }}"
                                                        class="custom-file-input @error('image') is-invalid @enderror">
                                                    <label class="custom-file-label"
                                                        for="inputFile{{ $teamData->count() + 1 }}"
                                                        id="inputFile{{ $teamData->count() + 1 }}Label">Choose
                                                        Image</label>
                                                </div>
                                            </div>
                                            <!-- ./form group -->
                                    </div>
                                    <!-- ./card body -->
                                    <!-- card footer -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning">Add Team</button>
                                        </form>
                                    </div>
                                    <!-- ./card footer -->
                                </div>
                                <!-- ./card -->
                            </div>
                            <!-- col -->
                        </div>
                        <!--./row-->
                    </div>
                    <!--./Container fliud-->
                </section>
                <!-- ./Main content -->
            @else
                <!-- Main content -->
                <section class="content">
                    <!--Container fliud-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Note:</h5>
                                    To maintain the consistency of design, please upload image with 1:1 ratio.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--for each data counted, new card will be generate-->
                            @for ($i = 0; $i < count($teamData); $i++)
                                <!--Column-->
                                <div class="col-md-4">
                                    <!--Card-->
                                    <div class="card card-success card-outline">
                                        <!--Card Header-->
                                        <div class="card-header">
                                            <h3 class="card-title">Team Member #{{ $i + 1 }}</h3>
                                        </div>
                                        <!--./Card Header-->
                                        <!--Card body-->
                                        <div class="card-body">
                                            <form action="{{ route('updateTeam', $teamData[$i]->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <!--img row-->
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/' . $teamData[$i]->path) }}"
                                                        alt="" width="100"
                                                        class="img-fluid rounded-circle mb-3  shadow-sm">
                                                </div>
                                                <!--./img row-->
                                                <!--form-group-->
                                                <div class="form-group">
                                                    <label for="name">Team's Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $teamData[$i]->name }}">
                                                </div>
                                                <!--./form-group-->
                                                <!--form-group-->
                                                <div class="form-group">
                                                    <label for="position">Team's Position</label>
                                                    <input type="text" class="form-control" name="position"
                                                        value="{{ $teamData[$i]->position }}">
                                                </div>
                                                <!--./form-group-->
                                                <!--form-group-->
                                                <div class="form-group">
                                                    <label for="position">Team's LinkedIn URL</label>
                                                    <input type="text" class="form-control" name="url"
                                                        value="{{ $teamData[$i]->url }}">
                                                </div>
                                                <!--./form-group-->
                                                <!--form-group-->
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Team's Image</label>
                                                    <div class="input-group">
                                                        <input type="file" name="image"
                                                            id="inputFile{{ $i }}"
                                                            class="custom-file-input @error('image') is-invalid @enderror">
                                                        <label class="custom-file-label"
                                                            for="inputFile{{ $i }}"
                                                            id="inputFile{{ $i }}Label">Choose
                                                            Image</label>
                                                    </div>
                                                </div>
                                                <!--./form-group-->
                                        </div>
                                        <!--./Card body-->
                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                        <!--./Card footer-->
                                    </div>
                                    <!--Card-->
                                </div>
                                <!--./Column-->
                            @endfor
                        </div>
                        <!--./row-->
                    </div>
                </section>
            @endif
        </div>
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
