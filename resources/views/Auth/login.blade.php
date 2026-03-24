<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

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
            <a href="{{ asset('adminlte/index2.html') }}"><b>Sign</b>In</a>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="border-radius: 20px">
            <div class="card-body login-card-body" style="border-radius: 20px">
                @if (session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                <p class="login-box-msg">Silahkan Login sesi Anda</p>

                <form action="/login" method="POST">
                    @csrf
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
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
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->
                <div class="social-auth-links text-center mb-3">
                   <br>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-3"></i> Sign in dengan Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-success" style="">
                        <i class="fab fa-google mr-3"></i> Sign in dengan Google
                    </a>
                </div>

                <p class="mb-1">
                    <a href="/reset">Lupa Password?</a>
                </p>
                <p class="mb-0">
                    <a href="/register" class="text-center">Daftar untuk akun baru</a>
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
