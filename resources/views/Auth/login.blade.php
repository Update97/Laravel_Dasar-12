<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Apps Elektronikku</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/style.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Elektronik</b>ku</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body" style="border-radius: 25px;">
                @if (session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"
                        style="border-radius: 10px;">
                        {{ session('failed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <p class="login-box-msg">Selamat Datang Kembali!</p>

                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        @error('email')
                            <small class="text-danger ml-1">{{ $message }}</small>
                        @enderror
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        @error('password')
                            <small class="text-danger ml-1">{{ $message }}</small>
                        @enderror
                        <div class="input-group" style="position: relative;">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                            <div class="show-password"
                                style="position: absolute; right: 45px; top: 10px; z-index: 10; cursor: pointer;">
                                <i id="password-lock"></i>
                            </div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0 text-muted"> Belum punya akun?
                        <a href="/register" class="register-link">Daftar Sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <script>
        $('.show-password').on('click', function() {
            const passwordField = $('#password');
            const icon = $('#password-lock');

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    </script>
</body>

</html>
