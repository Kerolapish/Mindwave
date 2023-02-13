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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin/layout/topnav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin/layout/sidebar')
        <!-- /.Main Sidebar Container -->

        <!--check if the site has been setup-->
        @if ($siteData->hasSetup == false)
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <!-- container-fluid -->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row mb-2">
                            <!-- col -->
                            <div class="col-sm-6">
                                <h1 class="m-0">Getting Started</h1>
                            </div>
                            <!-- /.col -->
                            <!-- col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Getting Started</li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <!-- container-fluid -->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">
                            @if (Auth::user()->hasUpdate == true && $siteData->hasCompleteReg == false)
                                <!--col-->
                                <div class="col-12">
                                    <!--callout-->
                                    <div class="callout callout-danger">
                                        <h5><i class="fas fa-warning"></i> Note:</h5>
                                        Site currently vulnerable. Please remind another account holder to update their account details
                                    </div>
                                    <!--./callout-->
                                </div>
                                <!--./col-->
                            @endif
                            <!--col-->
                            <div class="col-12">
                                <!--callout-->
                                <div class="callout callout-warning">
                                    <h5><i class="fas fa-warning"></i> Note:</h5>
                                    Site is currently down, please complete site start up process
                                </div>
                                <!--./callout-->
                            </div>
                            <!--./col-->
                        </div>
                        <!-- /.row -->
                        <!-- row -->
                        <div class="row">
                            @if (auth::user()->hasUpdate == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-danger card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Profile</h3>
                                            <p class="text-muted text-center">Change your default username and password
                                            </p>
                                            <a href="{{ route('profile') }}" class="btn btn-danger btn-block"><b>Change
                                                    Profile</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif
                            @if ($siteData->setupBrand == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-warning card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Branding</h3>
                                            <p class="text-muted text-center">Setup logo, favicon, page title</p>
                                            <a href="{{ route('createBranding') }}"
                                                class="btn btn-warning btn-block"><b>Setup
                                                    Branding</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif

                            @if ($siteData->setupBackground == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-warning card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Background</h3>
                                            <p class="text-muted text-center">Setup site background</p>
                                            <a href="{{ route('createBackground') }}"
                                                class="btn btn-warning btn-block"><b>Setup
                                                    Background</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif

                            @if ($siteData->setupTitle == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-warning card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Content</h3>
                                            <p class="text-muted text-center">Setup site top title and its content</p>
                                            <a href="{{ route('createContent') }}"
                                                class="btn btn-warning btn-block"><b>Setup
                                                    Content</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif

                            @if ($siteData->setupInfo == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-warning card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Information</h3>
                                            <p class="text-muted text-center">Setup company info</p>
                                            <a href="{{ route('createInfo') }}"
                                                class="btn btn-warning btn-block"><b>Setup
                                                    Information</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif

                            @if ($siteData->setupService == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-warning card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Service</h3>
                                            <p class="text-muted text-center">Setup site background</p>
                                            <a href="{{ route('createService') }}"
                                                class="btn btn-warning btn-block"><b>Setup
                                                    Service Content</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif

                            @if ($siteData->setupTeam == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-warning card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Teams</h3>
                                            <p class="text-muted text-center">Setup content on Teams section</p>
                                            <a href="{{ route('createTeam') }}"
                                                class="btn btn-warning btn-block"><b>Setup
                                                    Teams Content</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif

                            @if ($siteData->setupFooter == false)
                                <!--col-->
                                <div class="col-lg-4 col-6">
                                    <!--card-->
                                    <div class="card card-warning card-outline">
                                        <!--card body-->
                                        <div class="card-body">
                                            <h3 class="profile-username text-center">Footer</h3>
                                            <p class="text-muted text-center">Setup footer description</p>
                                            <a href="{{ route('createFooter') }}"
                                                class="btn btn-warning btn-block"><b>Setup
                                                    Footer</b></a>
                                        </div>
                                        <!--./card body-->
                                    </div>
                                    <!--./card-->
                                </div>
                                <!--./col-->
                            @endif
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        @else
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <!-- container-fluid -->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row mb-2">
                            <!-- col -->
                            <div class="col-sm-6">
                                <h1 class="m-0">Appearance</h1>
                            </div>
                            <!-- /.col -->
                            <!-- col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Quick Access</li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <!-- container-fluid -->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-lg-4 col-6">
                                <!--card-->
                                <div class="card card-primary card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Branding</h3>
                                        <p class="text-muted text-center">Change logo, site name</p>
                                        <a href="{{ route('branding') }}" class="btn btn-primary btn-block"><b>Update
                                                Brand</b></a>
                                    </div>
                                    <!--./card body-->
                                </div>
                                <!--./card-->
                            </div>
                            <!-- ./col -->
                            <!-- col -->
                            <div class="col-lg-4 col-6">
                                <!--card-->
                                <div class="card card-primary card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Background</h3>
                                        <p class="text-muted text-center">Change site background</p>
                                        <a href="{{ route('background') }}"
                                            class="btn btn-primary btn-block"><b>Update
                                                Background</b></a>
                                    </div>
                                    <!--./card body-->
                                </div>
                            </div>
                            <!-- ./col -->
                            <!--col -->
                            <div class="col-lg-4 col-6">
                                <!--card-->
                                <div class="card card-primary card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Content</h3>
                                        <p class="text-muted text-center">Change site top title and description</p>
                                        <a href="{{ route('content') }}" class="btn btn-primary btn-block"><b>Update
                                                Content</b></a>
                                    </div>
                                    <!--./card body-->
                                </div>
                                <!--card body-->
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                        <!-- Content Header (Second Header) -->
                        <div class="content-header">
                            <!-- container-fluid -->
                            <div class="container-fluid">
                                <!-- row -->
                                <div class="row mb-2">
                                    <!-- col -->
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Page Content</h1>
                                    </div>
                                    <!-- col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-lg-4 col-6">
                                <!--card-->
                                <div class="card card-success card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Information</h3>
                                        <p class="text-muted text-center">Change company info</p>
                                        <a href="{{ route('information') }}"
                                            class="btn btn-success btn-block"><b>Update
                                                Info</b></a>
                                    </div>
                                    <!--card body-->
                                </div>
                                <!--./card-->
                            </div>
                            <!-- ./col -->
                            <!-- col -->
                            <div class="col-lg-4 col-6">
                                <!--card-->
                                <div class="card card-success card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Service</h3>
                                        <p class="text-muted text-center">Change content on service section</p>
                                        <a href="{{ route('service') }}" class="btn btn-success btn-block"><b>Update
                                                Service Content</b></a>
                                    </div>
                                    <!--./card body-->
                                </div>
                                <!--./card-->
                            </div>
                            <!-- ./col -->
                            <!-- col -->
                            <div class="col-lg-4 col-6">
                                <!--card-->
                                <div class="card card-success card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Footer</h3>
                                        <p class="text-muted text-center">Change footer description</p>
                                        <a href="{{ route('footer') }}" class="btn btn-success btn-block"><b>Update
                                                Footer</b></a>
                                    </div>
                                    <!--card body-->
                                </div>
                                <!--card-->
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- row -->

                        <!--Row-->
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!--card-->
                                <div class="card card-success card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Teams</h3>
                                        <p class="text-muted text-center">Change team member information</p>
                                        <a href="{{ route('team') }}" class="btn btn-success btn-block"><b>Update
                                                Team</b></a>
                                    </div>
                                    <!--card body-->
                                </div>
                                <!--./card-->
                            </div>
                        </div>
                        <!--./Row-->

                        <!-- Third Header -->
                        <div class="content-header">
                            <!--Content Fluid-->
                            <div class="content-fluid">
                                <!--row-->
                                <div class="row mb-2">
                                    <!-- col -->
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Danger Zone</h1>
                                    </div>
                                    <!-- col -->
                                </div>
                                <!--./row-->
                            </div>
                            <!--./Content Fluid-->
                        </div>
                        <!-- ./Third Header -->
                        <!--row-->
                        <div class="row">
                            <!--col-->
                            <div class="col-md-4">
                                <!--card-->
                                <div class="card card-danger card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Site Status</h3>
                                        <p class="text-muted text-center">Change site status</p>
                                        <a href="{{ route('siteStatus') }}" class="btn btn-danger btn-block"><b>View
                                                More</b></a>
                                    </div>
                                    <!--card body-->
                                </div>
                                <!--./card-->
                            </div>
                            <!--./col-->
                            <!--col-->
                            <div class="col-md-4">
                                <!--card-->
                                <div class="card card-danger card-outline">
                                    <!--card body-->
                                    <div class="card-body">
                                        <h3 class="profile-username text-center">Profile</h3>
                                        <p class="text-muted text-center">Update profile details</p>
                                        <a href="{{ route('siteStatus') }}" class="btn btn-danger btn-block"><b>Update
                                            Profile</b></a>
                                    </div>
                                    <!--card body-->
                                </div>
                                <!--./card-->
                            </div>
                            <!--./col-->
                        </div>
                        <!--./row-->

                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        @endif


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
