<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Apps Elektronikku</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                <p class="login-box-msg">Buat Akun Baru</p>

                <form action="/register" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="input-group" style="position: relative;">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <div class="show-password" style="position: absolute; right: 45px; top: 12px; cursor: pointer;">
                                
                            </div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        @error('confirm_password') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="input-group" style="position: relative;">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password">
                            <div class="show-confirm-password" style="position: absolute; right: 45px; top: 12px; cursor: pointer;">
                                <i id="confirm-password-lock" ></i>
                            </div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-check-double"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0 text-muted"> Sudah punya akun? 
                        <a href="/login" class="login-link">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    
    <script>
        // Fungsi Toggle Password
        function togglePassword(fieldId, iconId) {
            const passwordField = $(fieldId);
            const icon = $(iconId);
            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        }

        $('.show-password').on('click', function() {
            togglePassword('#password', '#password-lock');
        });

        $('.show-confirm-password').on('click', function() {
            togglePassword('#confirm_password', '#confirm-password-lock');
        });
    </script>
</body>
</html>