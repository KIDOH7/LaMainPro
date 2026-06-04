@extends('layouts.default')

@section('content')

<div class="container py-5">

    <div class="row g-5">

        <!-- PHOTO -->
        <div class="col-lg-4">

            <div class="card border-0 shadow rounded-4 overflow-hidden">

                <img src="{{ asset('storage/' . $artisan->profile_photo) }}"
                     class="img-fluid"
                     style="height:450px; object-fit:cover;">

            </div>

        </div>

        <!-- INFOS -->
        <div class="col-lg-8">

            <h1 class="fw-bold mb-3">

                {{ $artisan->fullname }}

            </h1>

            <!-- Secteur -->
            <span class="badge bg-primary mb-3 p-2">

                {{ $artisan->secteur }}

            </span>

            <!-- Localisation -->
            <p class="fs-5 text-muted">

                <i class="fa fa-map-marker-alt text-primary me-2"></i>

                {{ $artisan->commune }}
                -
                {{ $artisan->quartier }}

            </p>

            <!-- Téléphone -->
            <p class="fs-5">

                <i class="fa fa-phone text-primary me-2"></i>

                {{ $artisan->phone }}

            </p>

            <!-- Experience -->
            <p class="fs-5">

                <i class="fa fa-briefcase text-primary me-2"></i>

                {{ $artisan->experience }}
                ans d'expérience

            </p>

            <!-- Description -->
            <div class="mt-4">

                <h4 class="mb-3">

                    À propos

                </h4>

                <p class="text-muted">

                    {{ $artisan->description }}

                </p>

            </div>

            <!-- BUTTONS -->
            <div class="mt-5 d-flex flex-wrap gap-3">

                <!-- WhatsApp -->
                <a href="https://wa.me/225{{ $artisan->phone }}"
                   target="_blank"
                   class="btn btn-success px-5 py-3 rounded-pill">

                    <i class="fab fa-whatsapp me-2"></i>

                    WhatsApp

                </a>

                <!-- Reservation -->
                <!-- <a href="#"
                   class="btn btn-primary px-5 py-3 rounded-pill">

                    Réserver plus tard

                </a> -->

            </div>

        </div>

    </div>

</div>

<!-- ARTICLES -->
<div class="container pb-5">

    <div class="text-center mb-5">

        <h6 class="text-secondary text-uppercase">

            Services & Articles

        </h6>

        <h1>

            Prestations disponibles

        </h1>

    </div>

    <div class="row g-4">

        @foreach($articles as $article)

            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow rounded-4 overflow-hidden h-100">

                    <!-- Image -->
                    <div id="articleCarousel{{ $article->id }}"
                class="carousel slide"
                data-bs-ride="carousel">

    <div class="carousel-inner">

        <!-- Image 1 -->
        <div class="carousel-item active">

            <img src="{{ asset('storage/' . $article->image1) }}"
                 class="d-block w-100"
                 style="height:250px; object-fit:cover;">

        </div>

        <!-- Image 2 -->
        @if($article->image2)

            <div class="carousel-item">

                <img src="{{ asset('storage/' . $article->image2) }}"
                     class="d-block w-100"
                     style="height:250px; object-fit:cover;">

            </div>

        @endif

        <!-- Image 3 -->
        @if($article->image3)

            <div class="carousel-item">

                <img src="{{ asset('storage/' . $article->image3) }}"
                     class="d-block w-100"
                     style="height:250px; object-fit:cover;">

            </div>

        @endif

        <!-- Image 4 -->
        @if($article->image4)

            <div class="carousel-item">

                <img src="{{ asset('storage/' . $article->image4) }}"
                     class="d-block w-100"
                     style="height:250px; object-fit:cover;">

            </div>

        @endif

    </div>

    <!-- Controls -->
    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#articleCarousel{{ $article->id }}"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#articleCarousel{{ $article->id }}"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

                    <div class="card-body p-4">

                        <!-- Titre -->
                        <h4 class="mb-3">

                            {{ $article->title }}

                        </h4>

                        <!-- Prix -->
                        <h5 class="text-primary">

                           {{ number_format($article->price, 0, ',', ' ') }} FCFA

                        </h5>

                        <!-- Button -->
                        <a href="#"
                           class="btn btn-primary mt-3 rounded-pill px-4">

                            Commander

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection