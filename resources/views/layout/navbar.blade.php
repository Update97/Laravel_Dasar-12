  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom border-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
       <!-- Untuk button menu tampak hilang -->
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="/dashboard" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="/transaksi" class="nav-link">Transaction</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                        <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
                </div>
            </div>
      </ul>
  </nav>
  <!-- /.navbar -->
