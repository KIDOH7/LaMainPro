@extends('layouts.default')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="mb-3">

            Trouver un artisan

        </h1>

        <p>

            Recherchez rapidement un artisan
            selon votre besoin.

        </p>

    </div>

    <!-- FORMULAIRE -->
    <form method="GET"
          action="{{ route('search') }}"
          class="bg-light p-4 rounded shadow-sm mb-5">

        <div class="row g-3">

            <!-- Secteur -->
            <div class="col-md-3">

                <select name="secteur"
                        class="form-select">

                    <option value="">
                        Tous les secteurs
                    </option>

                    <option value="plomberie">
                        Plomberie
                    </option>

                    <option value="electricite">
                        Électricité
                    </option>

                    <option value="menuiserie">
                        Menuiserie
                    </option>

                    <option value="informatique">
                        Informatique
                    </option>

                    <option value="coiffure">
                        Coiffure
                    </option>

                    <option value="maconnerie">
                        Maçonnerie
                    </option>

                </select>

            </div>

            <!-- Commune -->
            <div class="col-md-3">

                <select name="commune"
                        class="form-select">

                    <option value="">
                        Toutes les communes
                    </option>

                    <option value="Cocody">
                        Cocody
                    </option>

                    <option value="Yopougon">
                        Yopougon
                    </option>

                    <option value="Marcory">
                        Marcory
                    </option>

                    <option value="Abobo">
                        Abobo
                    </option>

                </select>

            </div>

            <!-- Quartier -->
            <div class="col-md-3">

                <input type="text"
                       name="quartier"
                       class="form-control"
                       placeholder="Quartier">

            </div>

            <!-- Nom -->
            <div class="col-md-3">

                <input type="text"
                       name="nom"
                       class="form-control"
                       placeholder="Nom artisan">

            </div>

            <!-- Bouton -->
            <div class="col-12">

                <button class="btn btn-primary w-100 py-3">

                    Rechercher

                </button>

            </div>

        </div>

    </form>

    <!-- RESULTATS -->
    <div class="row">

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

    <div class="mt-4">

        {{ $artisans->links() }}

    </div>

</div>

@endsection