<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIKAMEK - Pasaman</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/dist/assets/img/logo.png') }}" type="image/x-icon">
    <link href="nova/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="nova/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="nova/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="nova/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="nova/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="nova/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('nova/assets/css/main.css') }}" rel="stylesheet">

    <style>
        #div1 {
            width: 300px;
            height: 300px;
            background-color: blue;
            position: relative;
        }

        #div1 img {
            position: absolute;
            right: 0;
            top: 50%;
            margin-top: -25px;
            /* -(image_height/2) */
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="nova/assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Sikamek</h1>
            </a>

            <nav id="navmenu" class="navmenu">

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('nova/kpas.png') }}" alt="" data-aos="fade-in">

            <div class="container">
                <div class="row">
                    
                </div>
            </div>


        </section><!-- /Hero Section -->


    </main>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="nova/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="nova/assets/vendor/php-email-form/validate.js"></script>
    <script src="nova/assets/vendor/aos/aos.js"></script>
    <script src="nova/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="nova/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="nova/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="nova/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="nova/assets/js/main.js"></script>

</body>

</html>
