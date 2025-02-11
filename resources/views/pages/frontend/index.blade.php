<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Saya Peduli</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/images/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <div class="flex">
        <h1><a href="{{ url('/') }}"><img src="assets/images/white-logo.png" alt="" class="img-fluid"></a></h1>
        </div>
        <!-- Uncomment below if you prefer to use an image logo -->
        
      </div>

      <nav id="navbar" class="navbar">
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
          <li><a class="nav-link scrollto active" href="{{ route('index') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('complainant.complaints.create') }}">Buat Pengaduan</a></li>
                <li><a class="nav-link scrollto" href="{{ route('complainant.complaints.index') }}">Riwayat</a></li>
                <li><a class="nav-link scrollto" href="{{ route('complaints.public') }}">Laporan Publik</a></li>
                <li><a class="nav-link scrollto" href="{{ route('profile.show') }}">Setting</a></li>
          <!-- <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li> -->
         

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
                        class="mx-3 btn btn-warning">Logout</button>
                </form>
            </li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero-mobile">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center text-mobile">
          <div data-aos="zoom-out">
            <img style="margin-left: -40px" class=""src="assets/img/peduli-logo.gif" alt="">
            <!-- <h1><span>Saya Peduli</span></h1> -->
            <p style="color: aliceblue">Selamat datang diportal <strong>SAYA PEDULI</strong> dari <strong>AQPA INDONESIA</strong>. Kami percaya bahwa setiap suara, baik dari karyawan maupun masyarakat, memiliki nilai penting dalam menciptakan lingkungan kerja dan layanan yang lebih baik.</p>
            <h4 style="color: aliceblue" class="my-3">"Suara Anda, Perubahan Kami"</h4>
            <div class="d-flex">
                @guest
                <a href="#lacak"
                    class="btn-get-started2 scrollto me-3">Lacak
                    Aduan</a>
                @endguest

                <div class="text-center text-lg-start">
                    @auth
                    @if (auth()->user()->role->role === 'complainant')
                    <a href="{{ route('complainant.complaints.index') }}" class="btn-get-started scrollto">Riwayat</a>
                    @endif
                    @endauth
                    <a href="{{ auth()->user() ? route('complainant.complaints.create') : route('login') }}" class="btn-get-started scrollto">Laporkan</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img border rounded" data-aos="zoom-out" data-aos-duration="1000" >
          <img src="assets/img/PEDULI.gif" class="img-fluid animated rounded hidden-mobile m-4" alt="">
        </div>
      </div>
    </div>

    <div class="waves-mobile">
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
              <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
              <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
              <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
              <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
          </svg>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1000">

          <div class="col-lg-3 col-xs-4">
            <div class="count-box">
              <i class="bi bi-people-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="102" data-purecounter-duration="1" class="purecounter">102</span>
              <p>Pengguna</p>
            </div>
          </div>

          <div class="col-lg-3 col-xs-4 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-megaphone"></i>
              <span data-purecounter-start="0" data-purecounter-end="245" data-purecounter-duration="1" class="purecounter">245</span>
              <p>Pengaduan</p>
            </div>
          </div>

          <div class="col-lg-3 col-xs-4 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-check-circle-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="233" data-purecounter-duration="1" class="purecounter">233</span>
              <p>Selesai</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Counts Section -->
    @guest
    {{-- Input Unic Code --}}
    <section id="lacak" class="bg-white  m-5 rounded-3 d-flex justify-content-center">
        <div class="container text-center border border-primary border-3 p-5 m-5 rounded-3 box-shadow " data-aos="zoom-out" data-aos-duration="1000">
            <h1 class="text-primary" >Lacak aduan Anda!</h1>
            <p class="mt-5 text-small text-center">
                Gunakan kode unik untuk cek kemajuan tindak lanjut aduan Anda. Kode ini diperoleh saat mengirim
                aduan, cek kembali detail aduan yang dikirim.
            </p>
            <form class="d-flex justify-content-center align-items-center mt-5" action="{{ route('complaints.track') }}" method="get">
                <div id="otp" class="row  d-flex justify-content-center ">
                    <div class="col-6 ">
                        <div class="row">
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-4">
                                        <input class="form-control" required type="text" id="first" name="first" maxlength=" 1" />
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" required type="text" id="second" name="second" maxlength="1" />
                                    </div>
                                    <div class="col-4">
                                      <input class="form-control" required type="text" id="third" name="third" maxlength=" 1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 ">
                              <span class="gap-0 m-0 p-0">-</span>
                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-4">
                                        <input class="form-control" required type="text" id="fourth" name="fourth" maxlength=" 1" />
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" required type="text" id="fifth" name="fifth" maxlength="1" />
                                    </div>
                                    <div class="col-4">
                                      <input class="form-control" required type="text" id="sixth" name="sixth" maxlength=" 1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-dark" type="submit">Lacak</button>
                            </div>
                        </div> 
                    </div>
                    <!-- <div class="col-2">
                        <button
                        class="btn btn-dark"
                        type="submit">Lacak</button>
                    </div> -->
                    <!-- <div class="col-2">
                        <span class="">-</span>
                    </div>
                    
                    <div class="col-5">
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" required type="text" id="fourth"
                            name="fourth" maxlength=" 1" />
                            </div>
                            <div class="col-4">
                                <input class="form-control" required type="text" id="fifth"
                            name="fifth" maxlength="1" />
                            </div>
                            <div class="col-4">
                            <input class="form-control" required type="text" id="sixth"
                            name="sixth" maxlength=" 1" />
                            </div>
                        </div>
                    </div> -->
                </div>
                
            </form>
            <!-- <img class="absolute top-0 left-0 w-[5%] md:w-24 lg:w-32 md:-top-7 lg:-top-10 md:-left-6 lg:-left-10"
                src="{{ asset('assets/icons/star.png') }}" alt="Icon Star"> -->
        </div>
    </section>
    @endguest
     <!-- ======= About Section ======= -->
     <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right" data-aos-duration="1000">
            <a href="https://www.youtube.com/watch?v=StpBR2W8G5A" class=""></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left" data-aos-duration="1000">
            <h3>Alur Pengaduan Anda</h3>
            <p>Kami berkomitmen untuk mendengarkan dan menanggapi setiap laporan dengan serius, untuk memastikan perbaikan yang berkelanjutan dan transparansi dalam setiap langkah. Mari bersama-sama mewujudkan perubahan positif.</p>

            <div class="icon-box" data-aos="zoom-in" data-aos-duration="500">
              <div class="icon"><i class="bx bxs-log-in"></i></div>
              <h4 class="title"><a href="">Log in</a></h4>
              <p class="description">Masuk menggunakan akun anda.</p>
            </div>
            
            <div class="icon-box" data-aos="zoom-in" data-aos-duration="500">
              <div class="icon"><i class="bx bxs-edit-alt"></i></div>
              <h4 class="title"><a href="">Buat & Kirim Pengaduan</a></h4>
              <p class="description">Tulis Pengaduan keluhan Anda dengan jelas.</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-duration="600">
              <div class="icon"><i class="bx bx-shuffle"></i></div>
              <h4 class="title"><a href="">Proses Verifikasi</a></h4>
              <p class="description">Tunggu sampai Pengaduan Anda di verifikasi oleh admin/petugas terkait.</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-duration="700">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Tindak Lanjut</a></h4>
              <p class="description">Pengaduan Anda sedang dalam diproses dan ditindak lanjut.</p>
            </div>
            <div class="icon-box" data-aos="zoom-in" data-aos-duration="700">
              <div class="icon"><i class="bi bi-check-circle-fill"></i></div>
              <h4 class="title"><a href="">Selesai</a></h4>
              <p class="description">Selesai.</p>
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Abdul Karim</h3>
                <h4>Karyawan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Saya sangat mengapresiasi platform ini. Aspirasi saya langsung direspons dengan cepat, dan solusinya sangat memuaskan.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Fatimah</h3>
                <h4>Pelanggan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Layanan ini benar-benar menunjukkan bahwa perusahaan peduli pada masukan kami. Terima kasih atas tindak lanjut yang cepat!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.png" class="testimonial-img" alt="">
                <h3>Azhar</h3>
                <h4>Mitra</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Melalui Saya Peduli, ide saya untuk peningkatan pelayanan diterima dan bahkan diimplementasikan. Salut untuk transparansi perusahaan!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.png" class="testimonial-img" alt="">
                <h3>Adelia</h3>
                <h4>Karyawan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Mengajukan pengaduan menjadi mudah dan responsnya sangat profesional. Terima kasih telah mendengarkan kami!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>Abdullah</h3>
                <h4>Pelanggan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Saya merasa didengar dan dihargai. Komunikasi melalui Saya Peduli sangat efektif dan solutif.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>FKAP Great Team</p>
        </div>

        <div class="row" data-aos="fade-left">

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets/img/avatar/7.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>M. Irfan Dadi</h4>
                <span>Ketua FKAP</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="assets/img/avatar/5.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Adinda Y.S.</h4>
                <span>Internal Audit</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="assets/img/testimonials/testimonials-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amalia Anggraeni</h4>
                <span>Internal Audit</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/avatar/2.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>M. Azhar F.</h4>
                <span>Fungsi FKAP</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/avatar/8.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Dhoyo Aris S.</h4>
                <span>Fungsi FKAP</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/avatar/1.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Fauzy A.I.</h4>
                <span>Fungsi FKAP</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/avatar/9.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Fadhillah F.R.</h4>
                <span>Fungsi FKAP</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/avatar/3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sofi Sofiani</h4>
                <span>Fungsi FKAP</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/avatar/4.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Putri Utami</h4>
                <span>Fungsi FKAP</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apa itu Sistem Manajemen Anti Penyuapan (SMAP)? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                Sistem Manajemen Anti Penyuapan (SMAP) adalah sistem manajemen yang dirancang untuk membantu organisasi mencegah, mendeteksi, dan menanggapi penyuapan serta mematuhi undang-undang anti-penyuapan.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Seberapa pentingkah Sistem Manajemen Anti Penyuapan (SMAP)?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                Sistem Manajemen Anti Penyuapan (SMAP) membantu organisasi untuk meningkatkan kinerja dengan mengorientasikan budaya organisasi menuju transparansi dan pemberantasan suap
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Jenis penyuapan apa saja yang dicakup oleh SMAP ISO 37001? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                Standar ini lebih lanjut mencakup penyuapan oleh organisasi (penyuapan aktif) atau kepada organisasi (penyuapan pasif). Kemudian meluas ke penyuapan oleh personelnya atau mitra yang bertindak atas nama organisasi atau untuk keuntungan organisasi serta penyuapan terhadap personel atau mitra organisasi sehubungan dengan kegiatan organisasi. Standar ini tidak mencakup tentang penipuan, kartel, persaingan usaha tidak sehat, pencucian uang atau kegiatan lain yang berkaitan dengan praktik korupsi seperti yang tercakup dalam United Nation Convention Against Corruption (UNCAC) meskipun suatu organisasi dapat memilih untuk memperluas lingkup sistem manajemennya untu kegiatan semacam itu.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Apa perbedaan antara suap dan korupsi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                Korupsi adalah konsep yang lebih luas daripada penyuapan. Menurut UNCAC, Selain penyuapan di sektor publik dan swasta, korupsi juga mencakup pelanggaran lain seperti penggelapan, penyalahgunaan atau pengalihan harta benda lainnya oleh pejabat publik, perdagangan pengaruh, penyalahgunaan fungsi, pengayaan ilegal, penggelapan properti di sektor swasta, pencucian hasil kejahatan, penyembunyian dan menghalangi penegakkan keadilan. Sedangkan menurut Association of Certified Fraud Examinder (ACFE), korupsi mencakup konflik kepentingan, penyuapan, gratifikasi ilegal dan pemerasan.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Siapa saja yang terlibat dalam perencanaan, penerapan, dan pemeliharaan ISO 37001 dalam organisasi?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                Setiap elemen dan personel dalam organisasi memiliki peran dan tanggung jawab terkait dengan desain, perencanaan, penerapan dan pemeliharaan ISO 37001 Sistem Manajemen Anti Penyuapan secara berkelanjutan. Misalnya, Manajemen Senior bertanggung jawab untuk mendukung program dengan melarang penyuapan dan memastikan sumber daya yang memadai dialokasikan untuk penerapan program. Setiap unit/divisi bertanggung jawab untuk menerapkan dan mengelola program. Terakhir, semua personel bertanggung jawab untuk mematuhi kebijakan anti penyuapan, mengikuti pelatihan, dan melaporkan dugaan ketidakpatuhan terhadap ketentuan anti-penyuapan yang mereka ketahui kepada saluran yang tersedia
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section>
  </main><!-- End #main -->

  <!-- End F.A.Q Section -->
  <br><br>
            @if (Route::has('login'))
            <div class="text-center">
                @auth
                <a href="{{ url('/home') }}" class="btn btn-outline-success btn-lg scrollto">Kirim Pengaduan</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-success btn-lg scrollto">Kirim Pengaduan</a>
            @endauth
            </div>
            @endif
  <br><br>

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
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {  
        const swiper = new Swiper('.swiper-container', {  
            // Opsi Swiper Anda  
            loop: true,  
            pagination: {  
                el: '.swiper-pagination',  
                clickable: true,  
            },  
            navigation: {  
                nextEl: '.swiper-button-next',  
                prevEl: '.swiper-button-prev',  
            },  
        });  
    });
  </script> -->
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- <script>  
    document.addEventListener('DOMContentLoaded', function() {  
        AOS.init();  
    });  
    
  </script>  -->

</body>

</html>
