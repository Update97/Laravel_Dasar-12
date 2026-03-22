<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ asset('adminlte/index2.html') }}"><b>Register</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @if (session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                <p class="login-box-msg">Register for a new account</p>

                <form action="/register" method="POST">
                    @csrf
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                        <div class="input-group-append ">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append ">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-groub mb-3" style="position: relative;">
                        <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password">
                        <div class="show-password"
                            style="position: absolute; right: 10px; top: 10px; cursor: pointer;">
                            <i id="password-lock" class="fas fa-lock"></i>
                        </div>
                    </div>
                    @error('confirm_password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-groub mb-3" style="position: relative;">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control mb-3" placeholder="Confirm Password">
                        <div class="show-confirm-password"
                            style="position: absolute; right: 10px; top: 10px; cursor: pointer;">
                            <i id="confirm-password-lock" class="fas fa-lock"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign Up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-success">
                        <i class="fab fa-google-plus mr-2"></i> Sign Up using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="/login">Sudah punya akun? Login di sini</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        $('.show-password').on('click', function() {
            // Ambil elemen input password
            const passwordField = $('#password');
            const icon = $(this).find('i'); // Mengasumsikan icon ada di dalam button/span ini

            if (passwordField.attr('type') === 'password') {
                // Tampilkan Password
                passwordField.attr('type', 'text');
                // Untuk mengubah icon ke gembok terbuka
                $('#password-lock').attr('class', 'fas fa-unlock');
            } else {
                // Sembunyikan Password
                passwordField.attr('type', 'password');
                // Ubah icon ke gembok tertutup
                $('#password-lock').attr('class', 'fas fa-lock');
            }
        })
        $('.show-confirm-password').on('click', function() {
            // Ambil elemen input password
            const passwordField = $('#confirm_password');
            const icon = $(this).find('i'); // Mengasumsikan icon ada di dalam button/span ini

            if (passwordField.attr('type') === 'password') {
                // Tampilkan Password
                passwordField.attr('type', 'text');
                // Ubah icon ke gembok terbuka
                $('#password-lock').attr('class', 'fas fa-unlock');
            } else {
                // Sembunyikan Password
                passwordField.attr('type', 'password');
                // Ubah icon ke gembok tertutup
                $('#password-lock').attr('class', 'fas fa-lock');
            }
        });
    </script>
</body>

</html>
