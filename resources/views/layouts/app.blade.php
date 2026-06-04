<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin - LaMainPro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="d-flex">

    <!-- SIDEBAR -->

    <div class="bg-dark text-white p-3"
         style="width: 280px; min-height: 100vh;">

        <h3 class="mb-4 text-center">

            LaMainPro

        </h3>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">

                <a href="/admin/dashboard"
                   class="nav-link text-white">

                    <i class="fa fa-home me-2"></i>

                    Dashboard

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/admin/artisans"
                   class="nav-link text-white">

                    <i class="fa fa-users me-2"></i>

                    Artisans

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/admin/reservations"
                   class="nav-link text-white">

                    <i class="fa fa-calendar-check me-2"></i>

                    Réservations

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/admin/articles"
                   class="nav-link text-white">

                    <i class="fa fa-box me-2"></i>

                    Articles

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/admin/clients"
                   class="nav-link text-white">

                    <i class="fa fa-user me-2"></i>

                    Clients

                </a>

            </li>

            <hr>

            <li class="nav-item mb-2">

                <a href="/"
                   class="nav-link text-warning">

                    <i class="fa fa-globe me-2"></i>

                    Voir le site

                </a>

            </li>

        </ul>

    </div>

    <!-- CONTENT -->

    <div class="flex-grow-1">

        <!-- TOPBAR -->

        <div class="bg-white shadow-sm p-3 d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                Dashboard Admin

            </h4>

            <div>

                <span class="fw-bold">

                    Administrateur

                </span>

            </div>

        </div>

        <!-- PAGE -->

        <div class="p-4">

            @yield('content')

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>