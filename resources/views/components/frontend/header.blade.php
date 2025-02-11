<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Buat Aduan | Saya Peduli</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/images/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <base href="{{ config('app.my_app_name') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<!-- ======= Header ======= -->
<header id="header" class="z-70 w-full d-flex align-items-center  header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/white-logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px; height: auto;">
                </a>
            </h1>
        </div>

        <nav id="navbar" class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between gap-3">
            <ul>
                @guest
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">Alur Pengaduan</a></li>
                <li><a class="nav-link scrollto" href="#testimonials">Testimoni</a></li>
                <li><a class="nav-link scrollto" href="{{ route('complaints.public') }}">Laporan Publik</a></li>
                <li><a class="nav-link scrollto" href="#contact">FAQ</a></li>
                <li><a class="btn-link scrollto" href="{{ route('register') }}">Daftar</a></li>
                <li><a class="btn-link scrollto" href="{{ route('login') }}">Login</a></li>
                @endguest


                @auth
                @if (auth()->user()->role->role === 'complainant')
                <li><a class="nav-link scrollto " href="{{ route('index') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('complainant.complaints.create') }}">Buat Pengaduan</a></li>
                <li><a class="nav-link scrollto" href="{{ route('complainant.complaints.index') }}">Riwayat</a></li>
                <li><a class="nav-link scrollto " href="{{ route('complaints.public') }}">Laporan Publik</a></li>
                <li><a class="nav-link scrollto  active" href="{{ route('profile.show') }}">Setting</a></li>

                @else
                <li>
                    <a href="{{ auth()->user()->role_id === 2 ? route('staff.dashboard.index') : route('admin.dashboard.index') }}"
                       class="{{ Route::current()->getName() == 'index' ? 'text-vermillion' : 'text-dark' }} active">Dashboard</a>
                </li>
                @endif

                <li class="mt-1">
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf 
                    <button
                        class="btn btn-warning mx-3">Logout</button>
                </form>
                </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div >

    <script>
         document.addEventListener("DOMContentLoaded", function() {
    AOS.init();
  });
    window.addEventListener('scroll', function() {
        const header = document.getElementById('header');
        if (window.scrollY > 0) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }
    });
</script>

</header><!-- End Header -->