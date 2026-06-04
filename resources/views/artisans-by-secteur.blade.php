@extends('layouts.default')

@section('content')

<div class="container py-5">

    <!-- Header -->
    <div class="mb-5">

        <h1 class="fw-bold">

            {{ $secteur }}

        </h1>

        <p class="text-muted">

            Découvrez les artisans disponibles
            dans ce secteur.

        </p>

    </div>

    <!-- FILTRES -->
    <div class="card border-0 shadow rounded-4 mb-5">

        <div class="card-body p-4">

            <form method="GET">

                <div class="row g-3">

                    <!-- Commune -->
                    <div class="col-md-5">

                        <select name="commune"
                                class="form-select">

                            <option value="">
                                Toutes les communes
                            </option>

                            <option value="Abobo">
                                Abobo
                            </option>

                            <option value="Adjamé">
                                Adjamé
                            </option>

                            <option value="Anyama">
                                Anyama
                            </option>

                            <option value="Attécoubé">
                                Attécoubé
                            </option>

                            <option value="Bingerville">
                                Bingerville
                            </option>

                            <option value="Cocody">
                                Cocody
                            </option>

                            <option value="Koumassi">
                                Koumassi
                            </option>

                            <option value="Marcory">
                                Marcory
                            </option>

                            <option value="Plateau">
                                Plateau
                            </option>

                            <option value="Port-Bouët">
                                Port-Bouët
                            </option>

                            <option value="Songon">
                                Songon
                            </option>

                            <option value="Treichville">
                                Treichville
                            </option>

                            <option value="Yopougon">
                                Yopougon
                            </option>

                        </select>

                    </div>

                    <!-- Quartier -->
                    <div class="col-md-5">

                        <input type="text"
                               name="quartier"
                               class="form-control"
                               placeholder="Quartier (optionnel)">

                    </div>

                    <!-- Btn -->
                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            Filtrer

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- LISTE ARTISANS -->
    <div class="row g-4">

        @forelse($artisans as $artisan)

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

    <div class="card border-0 shadow-sm h-100"
         style="transition:0.3s;">

        <!-- IMAGE -->

        <div class="position-relative overflow-hidden">

            <img src="{{ asset('storage/' . $artisan->profile_photo) }}"
                 class="card-img-top"
                 style="height:190px; object-fit:cover;">

            <!-- BADGE EXPERT -->

            @if($artisan->is_verified && $artisan->is_premium)

                <span class="position-absolute top-0 end-0 badge bg-warning text-dark m-2 px-3 py-2">

                    <i class="fa fa-crown"></i>

                    Expert

                </span>

            @endif

        </div>

        <div class="card-body p-3">

            <!-- NOM + SECTEUR -->

            <div class="d-flex justify-content-between align-items-start mb-2">

                <h6 class="fw-bold mb-0 text-truncate">

                    {{ $artisan->fullname }}

                </h6>

                <small class="text-primary fw-bold ms-2">

                    {{ $artisan->secteur }}

                </small>

            </div>

            <!-- LOCALISATION -->

            <p class="small text-muted mb-2">

                <i class="fa fa-map-marker-alt text-primary"></i>

                {{ $artisan->commune }}

                @if($artisan->quartier)

                    - {{ $artisan->quartier }}

                @endif

            </p>

            <!-- BADGES -->

           

            <!-- DESCRIPTION -->

            <p class="small text-muted mb-3">

                {{ Str::limit($artisan->description, 55) }}

            </p>

            <!-- BOUTON -->

            <a href="{{ url('/artisan/profil/' . $artisan->id) }}"
               class="btn btn-primary btn-sm w-100 rounded-pill">

                Voir profil

            </a>

        </div>

    </div>

</div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning">

                    Aucun artisan trouvé.

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection