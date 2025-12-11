<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Layanan Konseling Sebelas</title>

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Montserrat:wght@300;400;500;600;700;800&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    /* Smooth scrolling untuk seluruh halaman */
    html {
      scroll-behavior: smooth;
    }

    /* Offset untuk fixed header */
    section {
      scroll-margin-top: 100px;
    }

    /* Header Styling */
    #header .topbar {
      background-color: #5A9FB5 !important;
    }

    #header .branding {
      background-color: #5A9FB5 !important;
    }

    #header .sitename {
      color: #ffffff !important;
    }

    #header .navmenu a {
      color: #ffffff !important;
      position: relative;
    }

    #header .navmenu a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background-color: #ffffff;
      transition: width 0.3s ease;
    }

    #header .navmenu a:hover::after,
    #header .navmenu a.active::after {
      width: 100%;
    }

    #header .navmenu a:hover,
    #header .navmenu a.active {
      color: #ffffff !important;
    }

    /* Button Styling */
    .btn-primary {
      background-color: #5A9FB5 !important;
      border-color: #5A9FB5 !important;
      color: #ffffff !important;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #4A8FA5 !important;
      border-color: #4A8FA5 !important;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(90, 159, 181, 0.3);
    }

    /* Scroll Top Button */
    #scroll-top {
      background-color: #5A9FB5 !important;
      color: #ffffff !important;
    }

    #scroll-top:hover {
      background-color: #4A8FA5 !important;
    }
    #guru {
      background-color: #CDE8E5;
      padding: 80px 0;
    }

    #guru .section-title h2 {
      font-size: 36px;
      font-weight: 700;
      color: #5A9FB5;
      margin-bottom: 15px;
    }

    #guru .section-title p {
      font-size: 16px;
      color: #5A9FB5;
    }

    /* Doctor/Guru Card Styling */
    .doctor-card {
      background: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 5px 25px rgba(90, 159, 181, 0.15);
      transition: all 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .doctor-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 40px rgba(90, 159, 181, 0.25);
    }

    .doctor-image {
      position: relative;
      width: 100%;
      padding-top: 100%; /* Aspect ratio 1:1 untuk foto bulat sempurna */
      overflow: hidden;
      background: #EEF7FF;
    }

    .doctor-image img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 85%;
      height: 85%;
      object-fit: cover;
      border-radius: 50%;
      border: 8px solid #ffffff;
      transition: all 0.3s ease;
    }

    .doctor-card:hover .doctor-image img {
      transform: translate(-50%, -50%) scale(1.05);
      border-color: #CDE8E5;
    }

    .doctor-content {
      padding: 30px 25px;
      text-align: center;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .doctor-content h4 {
      font-size: 20px;
      font-weight: 700;
      color: #5A9FB5;
      margin-bottom: 8px;
      line-height: 1.3;
    }

    .doctor-content .specialty {
      display: inline-block;
      color: #ffffff;
      font-size: 14px;
      font-weight: 600;
      background: #5A9FB5;
      padding: 6px 20px;
      border-radius: 20px;
      margin-top: 5px;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
      .doctor-card {
        margin-bottom: 30px;
      }
    }

    @media (max-width: 767px) {
      #guru {
        padding: 60px 0;
      }

      #guru .section-title h2 {
        font-size: 28px;
      }

      .doctor-content h4 {
        font-size: 18px;
      }
    }

    /* Contact Section Styling */
    #contact {
      padding: 80px 0;
      background-color: #ffffff;
    }

    #contact .section-title h2 {
      font-size: 36px;
      font-weight: 700;
      color: #5A9FB5;
      margin-bottom: 15px;
    }

    #contact .section-title p {
      font-size: 16px;
      color: #7AB2B2;
    }

    .info-item {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(90, 159, 181, 0.1);
      height: 100%;
      transition: all 0.3s ease;
      border: 2px solid #CDE8E5;
    }

    .info-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(90, 159, 181, 0.2);
      background: #EEF7FF;
      border-color: #7AB2B2;
    }

    .info-item i {
      font-size: 40px;
      color: #5A9FB5;
      margin-bottom: 20px;
    }

    .info-item h3 {
      font-size: 20px;
      font-weight: 700;
      color: #5A9FB5;
      margin-bottom: 15px;
    }

    .info-item p {
      font-size: 15px;
      color: #5A9FB5;
      margin: 0;
      line-height: 1.6;
    }

    /* Hero Section Custom */
    #hero {
      background: linear-gradient(135deg, #CDE8E5 0%, #EEF7FF 100%);
    }

    #hero .highlight {
      color: #5A9FB5 !important;
    }

    /* Tentang Kami Section */
    #tentang-kami {
      background-color: #ffffff;
    }

    #tentang-kami .section-heading {
      color: #5A9FB5;
    }

    #tentang-kami p {
      color: #7AB2B2;
      line-height: 1.8;
    }
  </style>
</head>

<body class="index-page">

  <!-- HEADER -->
  <header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center dark-background"></div>

    <div class="branding d-flex align-items-center">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="#hero" class="logo d-flex align-items-center">
          <h1 class="sitename">Layanan Konseling Sebelas</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home</a></li>
            <li><a href="#tentang-kami">Tentang Kami</a></li>
            <li><a href="#guru">Guru</a></li>
            <li><a href="#contact">Kontak</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>
    </div>
  </header>

  <main class="main">

    <!-- HERO SECTION -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">

          <div class="col-lg-6">
            <div class="hero-content">
              <h1 data-aos="fade-right" data-aos-delay="300">
                Layanan Bimbingan <span class="highlight">Konseling</span> Digital Untuk Siswa
              </h1>

              <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                Sistem konseling online yang mempermudah siswa membuat janji, berkonsultasi, dan memantau perkembangan.
              </p>

              <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
                <a href="login.php" class="btn btn-primary">Login</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
              <div class="main-image">
                <img src="assets/img/homepict3.jpg" alt="Hero Image" class="img-fluid">
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- HOME ABOUT / TENTANG KAMI -->
    <section id="tentang-kami" class="home-about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">

          <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
            <div class="about-content">

              <h2 class="section-heading">Tentang Kami</h2>

              <p>
                Bimbingan Konseling SMKN 11 Bandung kini hadir dalam bentuk layanan digital untuk meningkatkan efektivitas dan keterjangkauan pelayanan. 
                Sistem ini mempermudah proses konsultasi, pencatatan kasus, penjadwalan, serta komunikasi antara siswa dan guru BK.
                Kami berupaya memberikan layanan terbaik demi mendukung proses pembinaan, pengembangan karakter, serta penyelesaian permasalahan siswa secara profesional.
              </p>

            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-visual">
              <img src="assets/img/homepict2.jpeg" alt="About Image" class="img-fluid">
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- GURU SECTION -->
    <section id="guru" class="section">
      <div class="container" data-aos="fade-up">

        <div class="section-title text-center mb-5">
          <h2>Guru Bimbingan Konseling</h2>
          <p>Tim profesional yang siap membantu Anda</p>
        </div>

        <div class="row gy-4 justify-content-center">

          <!-- CARD 1 -->
          <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
            <div class="doctor-card">
              <div class="doctor-image">
                <img src="assets/img/bu_suci.jpg" class="img-fluid" alt="Suci Nur Fitriyanti">
              </div>
              <div class="doctor-content">
                <h4>Suci Nur Fitriyanti, S.Pd</h4>
                <span class="specialty">Guru BK</span>
              </div>
            </div>
          </div>

          <!-- CARD 2 -->
          <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
            <div class="doctor-card">
              <div class="doctor-image">
                <img src="assets/img/bu_evi.png" class="img-fluid" alt="Evi Febry Damayanti">
              </div>
              <div class="doctor-content">
                <h4>Evi Febry Damayanti, S.Pd</h4>
                <span class="specialty">Guru BK</span>
              </div>
            </div>
          </div>

          <!-- CARD 4 -->
          <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
            <div class="doctor-card">
              <div class="doctor-image">
                <img src="assets/img/bu_wening.jpg" class="img-fluid" alt="Wening Wigati">
              </div>
              <div class="doctor-content">
                <h4>Dra. Wening Wigati, SE, M.Si</h4>
                <span class="specialty">Guru BK</span>
              </div>
            </div>
          </div>

          <!-- CARD 5 -->
          <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="500">
            <div class="doctor-card">
              <div class="doctor-image">
                <img src="assets/img/bu_amelia.png" class="img-fluid" alt="Ameliya Purnama Putri">
              </div>
              <div class="doctor-content">
                <h4>Rr. Ameliya Purnama Putri, S.Pd</h4>
                <span class="specialty">Guru BK</span>
              </div>
            </div>
          </div>

        </div>
        
      </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="section">
      <div class="container" data-aos="fade-up">
        
        <div class="section-title text-center mb-5">
          <h2>Hubungi Kami</h2>
          <p>Kami siap membantu Anda</p>
        </div>

        <div class="row gy-4">
          
          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Jl. Raya Cilember, RT.01/RW.04, Sukaraja, Cicendo, Bandung, Jawa Barat 40153</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone"></i>
              <h3>Telepon</h3>
              <p>(022) 6652442</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>info@smkn11bdg.sch.id</p>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer id="footer" class="footer-16 footer position-relative">
    <div class="container">

      <div class="footer-main" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-start">

          <div class="col-lg-5">
            <div class="brand-section">
              <a href="#hero" class="logo d-flex align-items-center mb-4">
                <span class="sitename">Layanan Konseling Sebelas</span>
              </a>

              <p class="brand-description">
                Layanan Bimbingan Konseling digital yang membantu siswa mendapatkan pendampingan secara mudah dan profesional.
              </p>

              <div class="contact-info mt-5">
                <div class="contact-item">
                  <i class="bi bi-geo-alt"></i>
                  <span>Alamat: Jl. Raya Cilember, RT.01/RW.04, Sukaraja, Cicendo, Bandung, Jawa Barat 40153</span>
                </div>

                <div class="contact-item">
                  <i class="bi bi-telephone"></i>
                  <span>(022) 6652442</span>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-7">
            <div class="footer-nav-wrapper">
              <div class="row">

                <div class="col-6 col-lg-3">
                  <div class="nav-column">
                    <h6>Informasi</h6>
                    <nav class="footer-nav">
                      <a href="#tentang-kami">Tentang BK</a>
                      <a href="#">Layanan</a>
                      <a href="#">Konsultasi</a>
                      <a href="#">Panduan</a>
                    </nav>
                  </div>
                </div>

                <div class="col-6 col-lg-3">
                  <div class="nav-column">
                    <h6>Fitur</h6>
                    <nav class="footer-nav">
                      <a href="#">Buat Janji</a>
                      <a href="#">Riwayat Konseling</a>
                      <a href="#guru">Guru BK</a>
                    </nav>
                  </div>
                </div>

                <div class="col-6 col-lg-3">
                  <div class="nav-column">
                    <h6>Bantuan</h6>
                    <nav class="footer-nav">
                      <a href="#">FAQ</a>
                      <a href="#contact">Hubungi Kami</a>
                      <a href="#">Kebijakan Privasi</a>
                    </nav>
                  </div>
                </div>

                <div class="col-6 col-lg-3">
                  <div class="nav-column">
                    <h6>Lainnya</h6>
                    <nav class="footer-nav">
                      <a href="#">Syarat & Ketentuan</a>
                      <a href="#">Feedback</a>
                    </nav>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="bottom-content d-flex justify-content-between align-items-center">
          <p>© 2025 Layanan Konseling Sebelas</p>
          <div class="legal-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
          </div>
        </div>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <script>
    // Smooth scroll untuk navigasi
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });

          // Update active class
          document.querySelectorAll('.navmenu a').forEach(link => {
            link.classList.remove('active');
          });
          this.classList.add('active');

          // Close mobile menu if open
          const navmenu = document.querySelector('.navmenu');
          if (navmenu && navmenu.classList.contains('mobile-nav-active')) {
            navmenu.classList.remove('mobile-nav-active');
          }
        }
      });
    });

    // Update active menu saat scroll
    window.addEventListener('scroll', () => {
      let current = '';
      const sections = document.querySelectorAll('section[id]');
      
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - 150) {
          current = section.getAttribute('id');
        }
      });

      document.querySelectorAll('.navmenu a').forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
          link.classList.add('active');
        }
      });
    });
  </script>

</body>
</html>