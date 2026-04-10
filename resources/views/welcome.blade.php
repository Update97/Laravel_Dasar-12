<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apps Elektronikku</title>
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/style.css') }}">
</head>
<body>

    <header>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">Register</a>
                @endif
            @endauth
        @endif
    </header>

    <main>
        <div class="icon-box">
            <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                <line x1="2" y1="9" x2="22" y2="9"></line>
            </svg>
        </div>

        <h1>Selamat Datang di <span>Apps Elektronikku</span></h1>
        
        <p>
            Kelola inventaris, cek status perbaikan, dan pantau aset elektronik Anda 
            dengan lebih mudah, aman, dan efisien.
        </p>

        <div class="cta-group">
            <a href="{{ route('login') }}" class="btn-primary">Mulai Sekarang</a>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Apps Elektronikku - Sistem untuk belajar
    </footer>

</body>
</html>