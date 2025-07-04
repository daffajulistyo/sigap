<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIGAP - Siaga Ambulan Gatis Pasaman</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/dist/assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('impact/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('impact/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('impact/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('impact/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('impact/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('impact/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <style>
        .blink-standby {
            animation: blink 1.5s infinite;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            box-shadow: 0 0 5px rgba(25, 135, 84, 0.5);
        }

        @keyframes blink {
            0% {
                opacity: 1;
                background-color: #198754;
                /* Warna solid */
                box-shadow: 0 0 10px rgba(25, 135, 84, 0.8);
            }

            50% {
                opacity: 0.7;
                background-color: #2aa76d;
                /* Warna lebih terang */
                box-shadow: 0 0 15px rgba(25, 135, 84, 1);
            }

            100% {
                opacity: 1;
                background-color: #198754;
                box-shadow: 0 0 10px rgba(25, 135, 84, 0.8);
            }
        }
    </style>
    <!-- Main CSS File -->
    <link href="{{ asset('impact/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header fixed-top">


        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="{{ asset('impact/assets/img/logo.png') }}" alt=""> -->
                    <h1 class="sitename">SIGAP</h1>
                    <span>.</span>
                </a>

                <nav id="navmenu" class="navmenu">

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section accent-background">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2><span>HALO </span><span class="accent">SIGAP</span></h2>
                        <p class="text-white">SIAGA AMBULAN GRATIS PASAMAN</p>
                        <div class="d-flex">
                            <a href="https://api.whatsapp.com/send/?phone=6282299600040&text&type=phone_number&app_absent=0"
                                class="btn-get-started">0822-99-6000-40</a>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="{{ asset('impact/assets/img/ambulance.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About Us<br></h2>
                <p>Siaga Ambulan Gratis Pasaman</p>
            </div><!-- End Section Title -->

        </section><!-- /About Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Daftar Puskesmas</h2>
                <p>Berikut adalah daftar Puskesmas di berbagai kecamatan beserta nomor kontaknya</p>
            </div><!-- End Section Title -->

            <div class="container align-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="row gx-lg-0 gy-4">
                    <div class="col-lg-12">
                        <div class="table-responsive c">
                            <table class="table table-bordered text-center w-75 mx-auto" style="font-size: 0.9rem;">
                                <thead>
                                    <tr>
                                        <th class="bg-success text-white" style="width: 10%;">No</th>
                                        <th class="bg-success text-white" style="width: 90%;">Puskesmas</th>
                                    </tr>
                                </thead>
                                @php
                                    $data = [
                                        [
                                            'Kecamatan Tigo Nagari',
                                            'UPT Puskesmas Ladang Panjang',
                                            '082170864175',
                                            'Jendriadi',
                                            '082298777645',
                                        ],
                                        [
                                            'Kecamatan Simpati',
                                            'UPT Puskesmas Simpati',
                                            '082384972454',
                                            'Nelfiandi',
                                            '082386405864',
                                        ],
                                        [
                                            'Kecamatan Bonjol',
                                            'UPT Puskesmas Kumpulan',
                                            '081374529115',
                                            'Yopi',
                                            '082391870100',
                                        ],
                                        [
                                            'Kecamatan Bonjol',
                                            'UPT Puskesmas Bonjol',
                                            '081267815684',
                                            'Eti Yendriani',
                                            '082283413674',
                                        ],
                                        [
                                            'Kecamatan Lubuk Sikaping',
                                            'UPT Puskesmas Lubuk Sikaping',
                                            '081227964977',
                                            'Nanda',
                                            '085184363552',
                                        ],
                                        [
                                            'Kecamatan Lubuk Sikaping',
                                            'UPT Puskesmas Sundatar',
                                            '081374151677',
                                            'Beni',
                                            '082170408424',
                                        ],
                                        [
                                            'Kecamatan Padang Gelugur',
                                            'UPT Puskesmas Pegang Baru',
                                            '082250970328',
                                            'Ari',
                                            '081374175357',
                                        ],
                                        [
                                            'Kecamatan Panti',
                                            'UPT Puskesmas Kuamang',
                                            '081383888673',
                                            'Ucok',
                                            '081363126445',
                                        ],
                                        [
                                            'Kecamatan Dua Koto',
                                            'UPT Puskesmas Cubadak',
                                            '085230928448',
                                            'Igd',
                                            '085365418991',
                                        ],
                                        [
                                            'Kecamatan Dua Koto',
                                            'UPT Puskesmas Simpang Tonang',
                                            '082283413532',
                                            'Roni',
                                            '081266088000',
                                        ],
                                        [
                                            'Kecamatan Padang Gelugur',
                                            'UPT Puskesmas Tapus',
                                            '081267503241',
                                            'Uyung',
                                            '082172880415',
                                        ],
                                        [
                                            'Kecamatan Rao Selatan',
                                            'UPT Puskesmas Lansad Kadap',
                                            '085375133318',
                                            'Ade',
                                            '081315154342',
                                        ],
                                        ['Kecamatan Rao', 'UPT Puskesmas Rao', '081295139499', 'Dogun', '081275870202'],
                                        [
                                            'Kecamatan Rao Utara',
                                            'UPT Puskesmas Koto Rajo',
                                            '081266205627',
                                            'Dedi Febrina',
                                            '082171038203',
                                        ],
                                        [
                                            'Kecamatan Mapat Tunggul',
                                            'UPT Puskesmas Pintu Padang',
                                            '082171085363',
                                            'Ebit G Ade',
                                            '082167529224',
                                        ],
                                        [
                                            'Kecamatan Mapat Tunggul Selatan',
                                            'UPT Puskesmas Silayang',
                                            '082371193205',
                                            'Febriansyah',
                                            '082170828309',
                                        ],
                                    ];
                                @endphp
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        <!-- Row 1 -->
                                        <tr>
                                            <td class="align-top bg-light" rowspan="5">{{ $index + 1 }}</td>
                                            <td class="fw-semibold bg-success bg-opacity-10">{{ $row[0] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-uppercase bg-success bg-opacity-10">
                                                {{ $row[1] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-success bg-opacity-10">
                                                <a href="https://wa.me/62{{ substr($row[2], 1) }}"
                                                    class="text-decoration-none text-dark d-block" target="_blank"
                                                    title="Klik untuk chat WhatsApp">
                                                    {{ $row[2] }}
                                                    <small class="ms-2 text-muted"></small>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bg-success bg-opacity-10">
                                                <a href="https://wa.me/62{{ substr($row[4], 1) }}"
                                                    class="text-decoration-none text-dark d-block" target="_blank"
                                                    title="Klik untuk chat WhatsApp">
                                                    {{ $row[4] }}
                                                    <small class="ms-2 text-muted"></small>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bg-white"></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Contact Section --><!-- /Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Status Kendaraan Ambulance</h2>
                <p>Berikut adalah Status Kendaraan Ambulan Gratis Pasaman</p>
            </div><!-- End Section Title -->

            <div class="container align-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="row gx-lg-0 gy-4">
                    <div class="col-lg-12">
                        <div class="table-responsive c">
                            <table class="table table-hover table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-4 text-uppercase small fw-semibold text-muted">NO</th>
                                        <th scope="col"
                                            class="py-3 px-4 text-uppercase small fw-semibold text-muted">NAMA
                                            PUSKESMAS</th>
                                        <th scope="col"
                                            class="py-3 px-4 text-uppercase small fw-semibold text-muted">NOPOL</th>
                                        <th scope="col"
                                            class="py-3 px-4 text-uppercase small fw-semibold text-muted">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ambulans as $item)
                                        <tr>
                                            <td class="py-3 px-4 align-middle">{{ $loop->iteration }}</td>
                                            <td class="py-3 px-4 align-middle">{{ $item->puskesmas->nama }}</td>
                                            <td class="py-3 px-4 align-middle text-nowrap">{{ $item->nomor_polisi }}
                                            </td>
                                            <td class="py-3 px-4 align-middle">
                                                @if (strtoupper($item->status) == 'STANDBY')
                                                    <span
                                                        class="badge blink-standby bg-success bg-opacity-10 text-success">Stanby</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Dinas</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No Data</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Contact Section --><!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer accent-background">



        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Sigap</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Made By Dinas Komunikasi dan Informatika Kabupaten Pasaman
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('impact/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('impact/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('impact/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('impact/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('impact/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('impact/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('impact/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('impact/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('impact/assets/js/main.js') }}"></script>

</body>

</html>
