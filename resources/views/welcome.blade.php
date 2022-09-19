<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bienvenue sur Dev Académie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenue sur Dev Académie</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/dev_logo.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/welcome.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v4.8.1
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center" style="background-color: #0050e3;">
        
    <div class="container d-flex align-items-center" >

      <div class="logo me-auto ">
        <h1><a href="#" class="text-white">Dev Académie</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto text-white active" href="#hero">Accueil</a></li>
                <li><a class="nav-link scrollto text-white" href="#about">About</a></li>
                <li><a class="nav-link scrollto text-white" href="#services">Services</a></li>
                <li><a class="nav-link scrollto text-white" href="#portfolio">Modules</a></li>
                <li><a class="nav-link scrollto text-white" href="#contact">Contact</a></li>
                <li><a class="nav-link scrollto text-white" href="{{ route('login') }}">Connexion</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          
          <!-- Slide 4 -->
          <div class="carousel-item active" style="background-image: url('assets/img/slide/pexe.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Bienvenue à l'école <span>Dev Académie</span></h2>
                <!-- <p class="animate__animated animate__fadeInUp">Surveillez vos enfants dépuis chez vous !!!</p> -->
                <!-- <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lire plus</a> -->
              </div>
            </div>
          </div>
          
          <!-- Slide 1 -->
          <div class="carousel-item " style="background-image: url('assets/img/slide/students.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown"></h2>
                <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lire plus</a> -->
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/biblo.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Bibliothèque</h2>
                <p class="animate__animated animate__fadeInUp">
                  Une bibliothèque ouvert à tous les enfants de l'école Dév Académie
                </p>
                <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/ok.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Jeux dans la cour </h2>
                <p class="animate__animated animate__fadeInUp">La récréation était pour tous un moment de détente. Donc, il est temps de pratiquer les jeux de cour de récréation d’autrefois. Les jeux d’autrefois à l’école ont un rôle important. Ils rythment les journées des élèves.</p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="assets/img/ecole.jfif" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=au7_QdsI2Gw" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>A propos de nous</h2>
              <p>Dev Académie est un vrai logiciel de gestion du suivi des élèves pour les écoles notamment le niveaux primaire, secondaire
                et les lycées. Il permet de répondre à tous les besoins des établissements liés au suivi des élèves, des parents, des enseignants,
                de la gestion des classes et des notes des d’élèves.</p>
            </div>

            

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Lists Section ======= -->
    <section class="about-lists">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
            <span style="color: #0050e3;"> <strong>01</strong></span>
            <h4><strong>La gestion</strong></h4>
            <p style="color: #000;">Gérez facilement les élèves, les parents, les niveaux et classes</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span style="color: #0050e3;"><strong>02</strong></span>
            <h4> <strong>Statistique</strong></h4>
            <p style="color: #000;">Suivez les performances de votre école grâce au tableau de bord</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <span style="color: #0050e3;"> <strong>03</strong></span>
            <h4> <strong>Suivi</strong></h4>
            <p style="color: #000;">Suivez vos dossiers scolaires en détail</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <span style="color: #0050e3;"><strong>04</strong></span>
            <h4> <strong>Administration</strong></h4>
            <p style="color: #000;">Gagner du temps sur votre gestion quotidienne</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
            <span style="color: #0050e3;"><strong>05</strong></span>
            <h4> <strong>Enseignants</strong></h4>
            <p style="color: #000;">Automatisez et simplifier vos tâches</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
            <span style="color: #0050e3;"><strong>06</strong></span>
            <h4> <strong>Secrétaire</strong> </h4>
            <p style="color: #000;">Plus de perte ou de tri à faire : tous les documents sont centralisés</p>
          </div>

        </div>

      </div>
    </section><!-- End About Lists Section -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box" style="background-color: #0B6623 ;">
              <i class="bi bi-simple-smile" style="color: #20b38e;"></i>
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="text-white purecounter"></span>
              <p class="text-white">Nombre d'établissements</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box" style="background-color: #0B6623 ;">
              <i class="bi bi-document-folder" style="color: #c042ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class=" text-white purecounter"></span>
              <p class="text-white">Niveau Primaire</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box" style="background-color: #0B6623 ;">
              <i class="bi bi-live-support" style="color: #46d1ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="text-white purecounter"></span>
              <p class="text-white">Niveau Sécondaire</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box" style="background-color: #0B6623 ;">
              <i class="bi bi-users-alt-5" style="color: #ffb459;"></i>
              <span data-purecounter-start="0" data-purecounter-end="7" data-purecounter-duration="1" class="text-white purecounter"></span>
              <p class="text-white">Lycée</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Ils nous font confiance</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
            <h4 class="title"><a href="">Orange Mali</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-bounding-box"></i></div>
            <h4 class="title"><a href="">ESCAE</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-globe"></i></div>
            <h4 class="title"><a href="">Simplon</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-broadcast"></i></div>
            <h4 class="title"><a href="">IRD</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-brightness-high"></i></div>
            <h4 class="title"><a href="">CIRTIC</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
            <div class="icon"><i class="bi bi-calendar2-week"></i></div>
            <h4 class="title"><a href="">MakeSense</a></h4>
            <p class="description"></p>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Quelques Captures</h2>
          <p>Voir ci-dessous les images des interfaces de mon application</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Toutes</li>
              <li data-filter=".filter-app">Liste Elèves</li>
              <li data-filter=".filter-card">Ensignants</li>
              <li data-filter=".filter-web">Dashboard</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/1.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Liste des élèves</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/1.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="La vue du secrétaire"><i class="bi bi-plus"></i></a>
                  <a href="#" title="plus de details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/16.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Page de connexion</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/16.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="La vue des tous"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/4.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Dashboard Directeur</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/4.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="La vue du DG"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/12.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Elèves inscris</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/12.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="inscris"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/13.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Profile</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/13.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Profile"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/14.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Absences</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/14.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Ajout d'une absence"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/6.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Matière</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/6.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Ajout d'une matière"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/8.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Liste des enseignants</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/8.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Liste enseignants"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/10.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>Liste de pré-inwcriptions</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/10.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Pré-inscriptions"><i class="bi bi-plus"></i></a>
                  <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Notre équipe</h2>
          <p>Une équipe dynamique pour le développement éducatif</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/diagui.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info" style="background-color: #0B6623 ;">
                <h4>Diagui Tounkara</h4>
                <span>Président Directeur Général</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/sev.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info" style="background-color: #0B6623 ;">
                <h4>Moussa wagué</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/team/sev.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info" style="background-color: #0B6623 ;">
                <h4>Séverin Togo</h4>
                <span>English Teacher</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="assets/img/team/diagui.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info" style="background-color: #0B6623 ;">
                <h4>Diagui Tounkara</h4>
                <span>Econome</span>
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
    </section><!-- End Our Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2> <strong style="color: #0050e3;"  >Deux mots</strong> <strong style="color: #0B6623;" >sur le logo</strong> </h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up" >
            <h4 style="color: #000;">Pourquoi la couleur bleue ?</h4>
              <p style="color: #000;">
                Premièrement, la couleur bleue est ma passion. Je l'ai choisi pour mon logo car c'est
                la couleur de la confiance et il représente l'ombre de la mer et du ciel et est censé
                induire le calme et transmettre la tranquillité.
              </p>
          </div>

          

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4 style="color: #000;">Pourquoi la couleur Verte ?</h4>
              <p style="color: #000;">
                La couleur verte est une couleur de croissance et de santé.
                J'ai choisi le vert car je suis pour la verdure ou la protection
                de mon environnement. Le vert évoque également un sentiment d'abondance et
                un environnement abondant tout en procurant un sentiment de repos et de sécurité.
              </p>
          </div>

          

        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="color: #0050e3;" >Contactez l'école Dev Académie</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map" style="color: #0050e3;" ></i>
              <h3>Notre adresse</h3>
              <p>Faladié Socoro</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope" style="color: #0050e3;" ></i>
              <h3>Nous écrire par mail</h3>
              <p>contact@devacademie.com<br>devdiagui@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call" style="color: #0050e3;" ></i>
              <h3>Numéro</h3>
              <p>+223 76 29 22 70<br>+223 65 11 64 46</p>
            </div>
          </div>

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nom complet" required>
                </div>
                <div class="col-lg-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Merci de saisir votre message ici svp !" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Chargement</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a été envoyé. Merci et bonne journée !</div>
              </div>
              <div class="text-center" ><button type="submit" style="background-color: #0B6623 ;">Envoyer un message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color: #0050e3;" >
    <div class="footer-top" style="background-color: #0B6623 ;">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Dev Académie</h3>
            
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Nos services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Developement Web</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Création des sites web</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing digital</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphisme</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Newsletter</h4>
            <p>Restez informer de nos nouvelles en vous abonnants à nos newsletters</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" style="background-color: #0050e3;" value="Abonnez-vous">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Dev Académie</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Designed by <a href="#" class="text-white">Diagui TOUNKARA @Simplon.co</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
    </body>
</html>
