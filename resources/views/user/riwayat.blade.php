<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.head')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Klinik</span>-Dangun</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/home">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/list_konsultasi">Konsultasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/riwayat">Riwayat</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Tentang Kami</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li> --}}
            

            @if(Route::has('login'))
            @auth
                {{-- <h1>user telah login ! </h1> --}}
            {{-- <x-app-layout>
            </x-app-layout> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="{{ route('profile.edit') }}">Manage Profile</a>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </div>
              </li>
            
            
            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>

            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
              </li>

            @endauth
            @endif

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  
  @if(session()->has('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session()->get('message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif
  
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Riwayat Konsultasi </h1>
    </div>
  </div>


  <div class="container-lg" style="margin: 0 auto;">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope = "col">ID Antrian</th>
                <th scope = "col">Jenis Konsultasi</th>
                <th scope = "col">Dokter</th>
                <th scope = "col">Tanggal</th>
                <th scope = "col">Waktu</th>
                <th scope = "col">Ruang</th>
                <th scope = "col">Status Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $riwayats)
                @if ($riwayats->id_pasien == Auth::user()->id)

                <tr>
                    <th scope="row"> {{ $riwayats->id_antrian }}</td>
                    <td>{{ $riwayats->nama_konsultasi }}</td>
                    <td>{{ $riwayats->nama_dokter }}</td>
                    <td>{{ $riwayats->tanggal }}</td>
                    <td>{{ $riwayats->waktu }}</td>
                    <td>{{ $riwayats->ruang }}</td>
                    <td>{{ $riwayats->status_booking }}</td>

                    {{-- @if ($konsultasi->status != 'Tersedia')
                        <td>Kosong</td>
                    @else --}}
                    
                    
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

  </div>

  <script src="../assets/js/jquery-3.5.1.min.js"></script>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  
  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
  
  <script src="../assets/vendor/wow/wow.min.js"></script>
  
  <script src="../assets/js/theme.js"></script>
    
  </body>
  </html>