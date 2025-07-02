<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIGAP | Login</title>
    <!--begin::success Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="SIGAP | Login Page" />
    <meta name="author" content="Your Company" />
    <meta name="description" content="SIGAP - Sistem Informasi Terpadu" />
    <meta name="keywords" content="sigap, sistem informasi, login" />
    <!--end::success Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
    <style>
        .letter-spacing {
            letter-spacing: 3px;
        }

        /* Loading overlay styles */
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            display: none;
        }

        .spinner {
            width: 70px;
            height: 70px;
            position: relative;
        }

        .spinner .dot {
            position: absolute;
            width: 12px;
            height: 12px;
            background-color: #28a745;
            border-radius: 50%;
            animation: bounce 1.5s infinite ease-in-out;
        }

        .spinner .dot:nth-child(1) {
            top: 0;
            left: 29px;
            animation-delay: 0s;
        }

        .spinner .dot:nth-child(2) {
            top: 10px;
            left: 10px;
            animation-delay: 0.2s;
        }

        .spinner .dot:nth-child(3) {
            top: 29px;
            left: 0;
            animation-delay: 0.4s;
        }

        .spinner .dot:nth-child(4) {
            top: 58px;
            left: 10px;
            animation-delay: 0.6s;
        }

        .spinner .dot:nth-child(5) {
            top: 58px;
            left: 29px;
            animation-delay: 0.8s;
        }

        .spinner .dot:nth-child(6) {
            top: 58px;
            left: 58px;
            animation-delay: 1s;
        }

        .spinner .dot:nth-child(7) {
            top: 29px;
            left: 58px;
            animation-delay: 1.2s;
        }

        .spinner .dot:nth-child(8) {
            top: 10px;
            left: 58px;
            animation-delay: 1.4s;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: scale(0.3);
            }

            50% {
                transform: scale(1);
            }
        }

        /* Form animation */
        .card {
            transition: all 0.3s ease;
        }

        .card.loading {
            filter: blur(2px);
            opacity: 0.7;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <!-- Loading Overlay -->
    <div id="loading-overlay">
        <div class="spinner">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header bg-success text-white py-3">
                <div class="text-center">
                    <h1 class="m-0 fw-bold letter-spacing">SIGAP</h1>
                    <div class="d-flex justify-content-center mt-2">
                        <div class="bg-white" style="height: 2px; width: 50px;"></div>
                    </div>
                </div>
            </div>

            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="loginForm" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input id="loginUsername" name="username" type="text"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" placeholder="Username" required autofocus />
                            <label for="loginUsername">Username</label>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input id="loginPassword" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required />
                            <label for="loginPassword">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-block" id="submitBtn">
                                <span id="submitText">Sign In</span>
                                <span id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            // Show loading overlay
            document.getElementById('loading-overlay').style.display = 'flex';
            document.querySelector('.card').classList.add('loading');

            // Change button state
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('btn-loading');
            submitBtn.disabled = true;
        });

        // For demo purposes - remove in production
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loading-overlay').style.display = 'none';
            }, 2000);
        });
    </script>
</body>
<!--end::Body-->

</html>
