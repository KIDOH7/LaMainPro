<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Artisan - LaMainPro</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}"
          rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('css/style.css') }}"
          rel="stylesheet">

</head>

<body style="background:#f5f7fa;">

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->
        <div class="col-lg-2 p-0">

            <div class="bg-dark text-white vh-100 p-4">

                <h3 class="mb-5 text-center">

                    <span class="text-white">
                        LaMain
                    </span>

                    <span style="color:#F05A0F;">
                        Pro
                    </span>

                </h3>

                <ul class="nav flex-column">

                    <li class="nav-item mb-3">

                        <a href="/artisan/dashboard"
                           class="nav-link text-white">

                            <i class="fa fa-home me-2"></i>

                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-3">

                        <a href="{{ url('/artisan/profile') }}"
                           class="nav-link text-white">

                            <i class="fa fa-user me-2"></i>

                            Mon profil

                        </a>

                    </li>

                    <li class="nav-item mb-3">

                        <a href="{{ url('/artisan/dashboard/services') }}"
                           class="nav-link text-white">

                            <i class="fa fa-tools me-2"></i>

                            Mes services

                        </a>

                    </li>

                    <li class="nav-item mb-3">

                        <a href="#"
                           class="nav-link text-white">

                            <i class="fa fa-clock me-2"></i>

                            Disponibilité

                        </a>

                    </li>

                    <li class="nav-item mb-3">

                        <a href="{{ url('/artisan/missions') }}"
                           class="nav-link text-white">

                            <i class="fa fa-calendar me-2"></i>

                            Mes Missions

                        </a>

                    </li>

                    <li class="nav-item mb-3">

                        <a href="{{ url('/artisan/password') }}"
                        class="nav-link text-white">

                            <i class="fa fa-lock me-2"></i>

                            Mot de passe

                        </a>

                    </li>

                    <li class="nav-item mt-5">

                        <form action="{{ url('/artisan/logout') }}"
                              method="POST">

                            @csrf

                            <button class="btn btn-danger w-100">

                                Déconnexion

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

        <!-- Main Content -->
        <div class="col-lg-10 p-4">

            @yield('content')

        </div>

    </div>

</div>

<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>