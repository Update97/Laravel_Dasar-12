@extends('layout.master')

@section('content')
    <div class="card bg-dark text-white">
        <div class="welcome-banner">
            <h1 style="font-size: 1.8rem;">Selamat Datang Kembali {{ Auth()->user()->name }} ! 🖐</h1>
            <p style="opacity: 0.8;">Hari ini {{ date('l, d F Y H:i') }}.</p>
        </div>

        <div class="stats-grid">
            <p class="stat-card">Semangat kerjanya </p>
        </div>

    </div>
@endsection
