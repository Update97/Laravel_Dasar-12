<aside class="main-sidebar elevation-4" style="background-color: #000000 !important; color: white !important;">
    <a href="/dashboard" class="brand-link" style="border-bottom: 1px solid rgba(255,255,255,.2);">
        <i class="nav-icon fa-solid fa-shop"></i>
        <span class="brand-text font-weight-bold text-white">ELEKTRONIKU</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header text-white-50 small font-weight-bold" style="padding: 1.5rem 1rem .5rem;">
                    DAFTAR DATA
                </li>

                <li class="nav-item">
                    <a href="/product" class="nav-link text-white {{ request()->is('produk') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Produk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/product" class="nav-link text-white {{ request()->is('produk') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-building-columns"></i>
                        <p>Gudang</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/kategori" class="nav-link text-white {{ request()->is('kategori') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/product" class="nav-link text-white {{ request()->is('produk') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-building-user"></i>
                        <p>Suplayer</p>
                    </a>
                </li>

                <hr style="border-top: 1px solid rgba(255,255,255,.2); margin: 10px 0;">

                @if (auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="/UserIndex" class="nav-link text-white">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="/logout" class="nav-link text-white">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
