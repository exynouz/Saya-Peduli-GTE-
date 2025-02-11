<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Riwayat Laporan | Saya Peduli</title>
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
                <li><a class="nav-link scrollto " href="{{ route('complainant.complaints.create') }}">Buat Pengaduan</a></li>
                <li><a class="nav-link scrollto active" href="{{ route('complainant.complaints.index') }}">Riwayat</a></li>
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

<section
    class="px-6 md:px-10 lg:px-24 2xl:px-48 pt-28 pb-16 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36 overflow-x-hidden bg-white">
    <h1 class="text-center text-3xl md:text-4xl lg:text-5xl font-bold" data-aos="fade-down" data-aos-duration="1400">Riwayat <span
            class="text-[#1C64F2]">Laporan</span>
    </h1>
    <h5 class="font-medium text-center text-xs md:text-sm lg:text-base mt-5 md:mt-7 lg:mt-8 text-davys-grey leading-6">
        Lihat riwayat aduan Anda dan status penyelesaiannya di sini
    </h5>
    <div>
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-davys-grey">
    </div>

    <form class="mt-5 md:flex md:justify-center md:flex-col md:items-center"
        action="{{ route('complainant.complaints.index') }}" method="GET">
        <input
            class="block mt-2 w-full md:w-1/2 rounded transition duration-500 ease-in-out ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-blues focus:border-transparent"data-aos="fade-up" data-aos-duration="1400"
            type="text" name="keyword" placeholder="Masukkan keyword/kode unik">
        <div class="mt-5 lg:mt-9 flex justify-center">
            <button class="btn btn-primary btn-lg " data-aos="fade-up" data-aos-duration="1400"
    style="width: 200px; height: 40px; border-width: 1px; font-size: 23px;display: flex; align-items: center; justify-content: center;"
            >Cari Aduan</button>
        </div>
    </form>

    <div
        class="flex flex-col md:flex-row md:flex-wrap gap-7 md:gap-0 lg:gap-5 md:justify-around lg:justify-center mt-7 md:mt-8 lg:mt-10">

        {{-- Cards History of Reported --}}
        @forelse ($complaints as $complaint)
        <article
            class="group border-2 border-blues rounded-lg transition-all duration-500 hover:shadow-[7px_7px_0px_#008bf8] lg:hover:shadow-[10px_10px_0px_#008bf8] md:mt-7 lg:mt-0 cursor-pointer md:basis-80 lg:basis-[48%] lg:p-4"data-aos="fade-up" data-aos-duration="1400">
            <a href="{{ route('complainant.complaints.show', $complaint->id) }}">
                <div class="flex flex-col lg:flex-row lg:items-center gap-2 md:gap-5 lg:gap-4">
                    <img class="w-full lg:w-40 h-40 lg:h-auto object-cover object-center lg:rounded-lg lg:aspect-square"
                        src="{{ $complaint->photo_url ? Storage::url($complaint->photo_url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                        alt="Bukti Foto">
                    <div class="px-4 lg:px-0 flex flex-col gap-2">
                        <h6 class="font-bold text-blues text-sm lg:text-[1rem] mt-2 md:mt-0">{{
                            $complaint->created_at->format('H:i, d-m-Y')
                            }}</h6>
                        <h2
                            class="report-title capitalize text-xl lg:text-2xl text-black group-active:text-vermillion group-hover:text-vermillion group-hover:transition-all group-hover:duration-500  font-bold">
                            {{ $complaint->title }}
                        </h2>
                        <hr class="border-1 border-davys-grey">
                        <p class="report-body text-xs lg:text-sm text-davys-grey leading-5 font-medium">{{
                            $complaint->body }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 mb-4 md:my-5 lg:mb-0 px-4 lg:px-0 flex justify-between items-center ">
                    <h6 class="px-3 py-1 text-davys-grey border border-davys-grey rounded-sm text-xs font-medium">
                        {{ $complaint->category->category }}
                    </h6>
                    {{-- Show Status Complaint --}}
                    @include('components.frontend.conditional-statement.show-status-card')
                </div>
            </a>
        </article>  
        @empty
        <h3 class="mt-4 text-sm lg:text-base text-center leading-normal text-medium text-davys-grey">Sayang sekali anda
            belum
            mempunyai
            aduan, <a href="{{ route('complainant.complaints.create') }}"><strong>Ayo
                    Kirim Aduan!</strong></a></h3>
        @endforelse

    </div>
    <div class="mt-5 md:mt-10">
        {{ $complaints->links() }}
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
