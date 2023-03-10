<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <!--icon-->
    <link rel="icon" href="/assets/images/mindwave-ico.png">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('assets/images/login-ilustration.png')}}" alt="login"
                            class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/images/mindwave.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form action="{{ route('login.auth') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="sr-only">Username</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Username">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="***********">
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
                                    value="Login">
                            </form>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                        @if ($errors->any())
                            <div class="error-msg" id="error-msg">
                                @if ($errors->has('name'))
                                    <span>{{ $errors->first('name') }}</span>
                                @elseif ($errors->has('password'))
                                    <span>{{ $errors->first('password') }}</span>
                                @elseif(session()->has('errors'))
                                    <span>{{ $errors->first() }}</span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

<script>
    let div = document.getElementById("error-msg");
    div.addEventListener("click", function() {
        div.style.display = "none";
    });
</script>

</html>
