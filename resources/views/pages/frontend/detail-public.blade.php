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
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
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
                <li><a class="nav-link scrollto active" href="{{ route('complainant.complaints.create') }}">Buat Pengaduan</a></li>
                <li><a class="nav-link scrollto" href="{{ route('complainant.complaints.index') }}">Riwayat</a></li>
                <li><a class="nav-link scrollto " href="{{ route('complaints.public') }}">Laporan Publik</a></li>
                <li><a class="nav-link scrollto" href="{{ route('profile.show') }}">Setting</a></li>

                @else
                <li>
                    <a href="{{ auth()->user()->role_id === 2 ? route('staff.dashboard.index') : route('admin.dashboard.index') }}"
                       class="{{ Route::current()->getName() == 'index' ? 'text-vermillion' : 'text-dark' }} active">Dashboard</a>
                </li>
                @endif

                <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf 
                    <button type="submit"
                         class="btn btn-warning mx-3">Logout</button>
                </form>
                </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div >

    <script>
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

<section
    class="relative flex flex-col items-center justify-center h-screen px-6 overflow-x-hidden gap-7 lg:gap-8 md:px-10 lg:px-24 2xl:px-48">

    {{-- Show Status Complaint --}}
    @include('components.frontend.conditional-statement.show-status-detail')

    <h1 class="text-3xl font-bold leading-10 text-center detail-title md:text-5xl xl:text-6xl md:leading-normal">
        {{ $complaint->title }}</h1>
    <h6
        class="px-3 py-1 text-xs font-medium border rounded-sm text-davys-grey border-davys-grey md:text-base lg:text-lg">
        {{ $complaint->category->category }}
    </h6>
    <p class="text-xs font-bold md:text-base lg:text-lg text-davys-grey">{{ $complaint->created_at->format('H:i, d-m-Y')
        }}</p>
    <img class="absolute w-2/3 md:w-96 xl:w-[32rem] left-[-30%] md:-left-32 xl:-left-72 top-[3%] md:top-14 xl:top-2 -z-10"
        src="{{ asset('assets/icons/vector-1.png') }}" alt="Icon">
    <img class="absolute w-1/4 md:w-44 xl:w-[10rem] right-[-8%] md:-right-12 bottom-[7%] -z-10"
        src="{{ asset('assets/icons/stars.png') }}" alt="">
</section>

{{-- Photo Evidence --}}
<section class="bg-white lg:px-24 2xl:px-48">
    <img class="object-cover object-center w-full aspect-video"
        src="{{ $complaint->photo_url ? Storage::url($complaint->photo_url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
        alt="Bukti Foto">
</section>

{{-- Information Detail Section --}}
<section class="px-6 pt-16 pb-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:pt-28 md:pb-16 lg:pt-36 lg:pb-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Detail Informasi</h2>
    <div
        class="xl:flex xl:gap-5 py-8 md:py-12 xl:py-20 px-5 md:px-10 xl:px-14 mt-5 md:mt-11 xl:mt-20 rounded-md border border-davys-grey xl:shadow-[10px_10px_0px_#cd4631]">
        <div class="xl:w-80">
            <div class="mb-5 text-sm md:text-lg">
                <label xl:mb-4 class="block mb-2 font-bold">Nama</label>
                @if ($complaint->is_anonymous === 1)
                <p class="font-medium text-davys-grey">Anonim</p>
                @else
                <p class="font-medium text-davys-grey">{{ $complaint->user->name }}</p>
                @endif
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Judul Aduan</label>
                <p class="font-medium text-davys-grey">{{ $complaint->title }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Status Aduan</label>
                <p class="font-medium capitalize text-davys-grey">{{ $complaint->status }}</p>
            </div>
        </div>
        <div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Kategori</label>
                <p class="font-medium text-davys-grey">{{ $complaint->category->category }}</p>
            </div>
            <div class="text-sm md:text-lg">
                <label class="block mb-2 font-bold">Dikirim Pada</label>
                <p class="font-medium text-davys-grey">{{ $complaint->created_at->format('H:i, d-m-Y')
                    }}</p>
            </div>
        </div>
    </div>
</section>

<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

{{-- Complaint Section --}}
<section class="px-6 py-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:py-16 lg:py-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Isi Pengaduan</h2>
    <div class="mt-5 md:mt-11 xl:mt-20">
        <p class="text-sm font-medium leading-normal md:text-base text-davys-grey">{{ $complaint->body }}</p>
    </div>
</section>

<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

{{-- Feddback Message Section --}}
<section class="px-6 py-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:py-16 lg:py-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Pesan Tanggapan</h2>
    <div
        class="flex flex-col items-center gap-2 px-3 mt-5 rounded-md md:gap-3 lg:gap-5 md:px-4 lg:px-6 xl:px-14 py-7 md:py-10 lg:py-16 xl:py-20 md:mt-11 xl:mt-20 bg-champagne">
        <i class="text-3xl font-bold ti ti-quote md:text-4xl text-vermillion"></i>
        <p class="text-sm font-medium leading-normal text-center text-davys-grey md:text-base">{{ $complaint->response ?
            $complaint->response : 'Mohon maaf, belum ada tanggapan'
            }}</p>
    </div>
</section>

<footer id="footer">
    <div class="footer-top" id="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Saya Peduli</h3>
              <p class="pb-3"><em>Dengan Saya Peduli, setiap individu diajak untuk berperan aktif dalam menciptakan perbaikan yang berkelanjutan, menunjukkan rasa tanggung jawab, keterbukaan, dan kolaborasi dalam mencapai tujuan bersama.</em></p>
              <p class="pb-3"><b><em>Bersama, Membangun Masa Depan Lebih Baik</em></b></p>
             
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Products</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sealing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Insulation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Expansion Joint</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Fabrication</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Contact</h4>
            <p>
                <strong>Line 1:</strong> +62 21 8241 5897<br>
                <strong>Line 2:</strong> +62 21 8241 5898<br>
                <strong>Line 3:</strong> +62 21 8243 7920<br>
                <strong>Email:</strong> peduli@aqpa-indonesia.com<br>
              </p>

          </div>
          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Address</h4>
            <p>JL. Raya Kedaung NO.20 RT.001 RW.004 <br>Cimuning, Mustikajaya, Kota Bekasi <br>Jawa Barat Kode Pos 17155
               
              </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Aqpa Indonesia</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->