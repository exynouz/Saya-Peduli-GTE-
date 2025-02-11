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
                    <button
                        class="btn btn-warning mx-3">Logout</button>
                </form>
                </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
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

    </div >



</header><!-- End Header -->

<!-- <div style="height: 75px; background-color: rgb(58, 90, 64);"></div> -->
 
<section
    class="px-6 md:px-10 lg:px-24 2xl:px-48 pt-28 pb-16 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36 overflow-x-hidden bg-white">
   <h1 class="text-3xl font-bold text-center text-black md:text-4xl lg:text-5xl" data-aos="fade-down" data-aos-duration="1400">Ayo <span class="text-blues">Laporkan!!</span></h1>

     <h5 class="mt-5 text-black text-xs font-medium text-center md:text-sm lg:text-base md:mt-7 lg:mt-8 text-davys-grey" data-aos="fade-down" data-aos-duration="1400">
        Kirim aduan
        Anda kepada
        Kami
     </h5>
    <div class="lg:px-32 xl:px-40 ">
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-white">
    </div>

    <div class="mt-5 md:mt-7"data-aos="fade-in" data-aos-duration="1400">
        <h5 class="text-xs font-semibold leading-relaxed text-center md:text-sm text-davys-grey " >Pelajari cara
            mengajukan aduan
            dengan efektif - <span class="underline cursor-pointer open-modal-button text-blues" >lihat
                panduan kami
                sekarang!</span></h5>
    </div>
    <form action="{{ route('complainant.complaints.store') }}" method="POST"
        class="mt-5 md:mt-7 lg:mt-8 lg:px-32 xl:px-40" enctype="multipart/form-data"  data-aos="fade-up" data-aos-duration="1400">
        @csrf
        <div>
            <label for="title" class="font-bold text-black">Judul Aduan <span class="text-vermillion">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder=" Masukan Judul Aduan"
                autofocus maxlength="50"
                class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-blues focus:border-transparent">
            @error('title')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="category" class="font-bold text-black">Kategori Aduan <span class="text-vermillion">*</span></label>
            <select name="category" id="category"
                class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-blues focus:border-transparent">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="body" class="font-bold text-black">Isi Aduan <span class="text-vermillion">*</span></label>
            <textarea name="body" id="body" cols="30" rows="15"
                class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-blues focus:border-transparent"
                placeholder="Sampaikan aduan Anda disini...">{{ old('body') }}</textarea>
            @error('body')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="is_private" class="block font-bold text-black">Private</label>
            <input type="checkbox" id="is_private" name="is_private" value="1"
                class="mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-blues focus:border-transparent">
            @error('is_private')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror

            
        </div>
        <div class="mt-4">
            <label for="is_anonymous" class="block font-bold text-black">Anonim</label>
            <input type="checkbox" id="is_anonymous" name="is_anonymous" value="1"
                class="mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-blues focus:border-transparent">
            @error('is_anonymous')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4 flex flex-col">
            <label for="photo" class="font-bold text-black pb-2">Bukti Foto</label>
            <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class="mt-2 ">
            <span class="block text-xs text-vermillion">*File
                    bertipe
                    jpg/jpeg/png</span>
            @error('photo')
            <p class="mt-2 text-sm font-medium text-black -500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-center mt-10">
            <button 
            class="btn btn-primary btn-lg" style="width: 200px; bg-blues; height: 40px; border-width: 1px; font-size: 23px;display: flex; align-items: center; justify-content: center;">Laporkan</button>

        </div>
    </form>
    {{-- Modal section for complaint filling guidelines --}}
</section>
    

    
    @include('components.frontend.modal-guidelines')


<script>
   document.addEventListener("DOMContentLoaded", function() {
    const modalGuidelines = document.querySelector('.modal');
    const openModalButtons = document.querySelectorAll('.open-modal-button');
    const closeModalButtons = document.querySelectorAll('.modal-close');

    if (!modalGuidelines) {
        console.error("Modal tidak ditemukan!");
        return;
    }

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            modalGuidelines.classList.add('visible', 'opacity-100');
            modalGuidelines.classList.remove('invisible', 'opacity-0');
        });
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            modalGuidelines.classList.remove('visible', 'opacity-100');
            modalGuidelines.classList.add('invisible', 'opacity-0');
        });
    });
});

</script>



 <!-- ======= Footer ======= -->
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

