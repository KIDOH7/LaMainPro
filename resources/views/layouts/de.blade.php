<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>La Main Pro - La solution à portée de main</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
          rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}"
          rel="stylesheet">

    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}"
          rel="stylesheet">

    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}"
          rel="stylesheet" />

    <!-- Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}"
          rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}"
          rel="stylesheet">

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">

        <div class="spinner-border text-primary"
             style="width: 3rem; height: 3rem;"
             role="status">

            <span class="sr-only">Loading...</span>

        </div>

    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">

        <div class="row align-items-center top-bar">

            <div class="col-lg-3 col-md-12 text-center text-lg-start">

                <a href="" class="navbar-brand m-0 p-0">

                    <h1 class="text-primary m-0">
                        LaMainPro
                    </h1>

                </a>

            </div>

            <div class="col-lg-9 col-md-12 text-end">

                <div class="h-100 d-inline-flex align-items-center me-4">

                    <i class="fa fa-map-marker-alt text-primary me-2"></i>

                    <p class="m-0">
                        BP, Abidjan, Côte d'Ivoire
                    </p>

                </div>

                <div class="h-100 d-inline-flex align-items-center me-4">

                    <i class="far fa-envelope-open text-primary me-2"></i>

                    <p class="m-0">
                        info@example.com
                    </p>

                </div>

                <div class="h-100 d-inline-flex align-items-center">

                    <a class="btn btn-sm-square bg-white text-primary me-1"
                       href="">

                        <i class="fab fa-facebook-f"></i>

                    </a>

                    <a class="btn btn-sm-square bg-white text-primary me-1"
                       href="">

                        <i class="fab fa-twitter"></i>

                    </a>

                    <a class="btn btn-sm-square bg-white text-primary me-1"
                       href="">

                        <i class="fab fa-linkedin-in"></i>

                    </a>

                    <a class="btn btn-sm-square bg-white text-primary me-0"
                       href="">

                        <i class="fab fa-instagram"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">

        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">

            <a href=""
               class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">

                <h1 class="text-primary m-0">
                    LaMainPro
                </h1>

            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">

                <span class="fa fa-bars"></span>

            </button>

            <div class="collapse navbar-collapse"
                 id="navbarCollapse">

                <!-- <div class="navbar-nav me-auto">

                    <a href="/"
                       class="nav-item nav-link active">
                        Home
                    </a>

                    <a href="#"
                       class="nav-item nav-link">
                        About
                    </a>

                    <a href="#"
                       class="nav-item nav-link">
                        Services
                    </a>

                    <div class="nav-item dropdown">

                        <a href="#"
                           class="nav-link dropdown-toggle"
                           data-bs-toggle="dropdown">

                            Pages

                        </a>

                        <div class="dropdown-menu fade-up m-0">

                            <a href="#"
                               class="dropdown-item">
                                Booking
                            </a>

                            <a href="#"
                               class="dropdown-item">
                                Technicians
                            </a>

                            <a href="#"
                               class="dropdown-item">
                                Testimonial
                            </a>

                            <a href="#"
                               class="dropdown-item">
                                404 Page
                            </a>

                        </div>

                    </div>

                    <a href="{{ url('/artisan/register') }}"
                       class="nav-item nav-link">

                        Inscription

                    </a>

                </div> -->

                <div class="navbar-nav me-auto">

                    <!-- Accueil -->
                    <a href="{{ url('/') }}"
                    class="nav-item nav-link active">

                        Accueil

                    </a>

                    <!-- Secteurs -->
                    <div class="nav-item dropdown">

                        <a href="#"
                        class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">

                            Secteurs

                        </a>

                        <div class="dropdown-menu fade-up m-0">

                            <a href="{{ url('/secteur/plomberie') }}"
                            class="dropdown-item">

                                Plomberie

                            </a>

                            <a href="{{ url('/secteur/electricite') }}"
                            class="dropdown-item">

                                Électricité

                            </a>

                            <a href="{{ url('/secteur/menuiserie') }}"
                            class="dropdown-item">

                                Menuiserie

                            </a>

                            <a href="{{ url('/secteur/informatique') }}"
                            class="dropdown-item">

                                Informatique

                            </a>

                            <a href="{{ url('/secteur/coiffure') }}"
                            class="dropdown-item">

                                Coiffure

                            </a>

                            <a href="{{ url('/secteur/maconnerie') }}"
                            class="dropdown-item">

                                Maçonnerie

                            </a>

                        </div>

                    </div>

                    <!-- Trouver artisan -->
                    <a href="{{ url('/secteur/plomberie') }}"
                    class="nav-item nav-link">

                        Trouver un artisan

                    </a>

                    <!-- Devenir artisan -->
                    <a href="{{ url('/artisan/register') }}"
                    class="nav-item nav-link">

                        Devenir artisan

                    </a>

                </div>

                <!-- <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">

                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                         style="width: 45px; height: 45px;">

                        <i class="fa fa-phone-alt text-primary"></i>

                    </div>

                    <div class="ms-3">

                        <p class="mb-1 text-white">
                            se renseigner 24/7
                        </p>

                        <h5 class="m-0 text-secondary">
                            +0 345 6789
                        </h5>

                    </div>

                </div> -->


                <div class="d-flex align-items-center">

                    @auth('artisan')

                        <!-- Dashboard -->
                        <a href="{{ url('/artisan/dashboard') }}"
                        class="btn btn-primary me-2">

                            <i class="fa fa-user me-1"></i>

                            Dashboard

                        </a>

                        <!-- Dropdown -->
                        <div class="dropdown">

                            <button class="btn btn-light dropdown-toggle"
                                    data-bs-toggle="dropdown">

                                {{ auth('artisan')->user()->fullname }}

                            </button>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>

                                    <a class="dropdown-item"
                                    href="{{ url('/artisan/profile') }}">

                                        Mon profil

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item"
                                    href="{{ url('/artisan/services') }}">

                                        Mes services

                                    </a>

                                </li>

                                <li><hr class="dropdown-divider"></li>

                                <li>

                                    <form action="{{ url('/artisan/logout') }}"
                                        method="POST">

                                        @csrf

                                        <button class="dropdown-item text-danger">

                                            Déconnexion

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </div>

                    @else

                        <!-- Connexion -->
                        <a href="{{ url('/artisan/login') }}"
                        class="btn btn-outline-primary me-2">

                            Connexion

                        </a>

                        <!-- Inscription -->
                        <a href="{{ url('/artisan/register') }}"
                        class="btn btn-primary">

                            S'inscrire

                        </a>

                    @endauth

                </div>

            </div>

        </nav>

    </div>
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn"
         data-wow-delay="0.1s">

        <div class="container py-5">

            <div class="row g-5">

                <!-- contenu footer -->

            </div>

        </div>

    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#"
       class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top">

        <i class="bi bi-arrow-up"></i>

    </a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>

    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>

    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>

    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>

    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>

    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>

    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>