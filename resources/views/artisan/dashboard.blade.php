@extends('layouts.dashboard')

@section('content')

<div class="row">

    <div class="col-lg-12 mb-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body p-4">

                <div class="d-flex align-items-center">

                    <!-- Photo -->
                    <img src="{{ asset('storage/' . Auth::guard('artisan')->user()->profile_photo) }}"
                         class="rounded-circle me-4"
                         width="100"
                         height="100"
                         style="object-fit:cover;">

                    <!-- Infos -->
                    <div>

                        <h2 class="mb-1">

                            {{ Auth::guard('artisan')->user()->fullname }}

                        </h2>

                        <p class="mb-1 text-muted">

                            {{ Auth::guard('artisan')->user()->secteur }}

                        </p>

                        <p class="mb-0">

                            <i class="fa fa-map-marker-alt"></i>

                            {{ Auth::guard('artisan')->user()->commune }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Stats -->
<div class="row">

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body text-center p-4">

                <h1 class="text-primary">
                    0
                </h1>

                <p class="mb-0">
                    Réservations
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body text-center p-4">

                <h1 class="text-success">
                    Actif
                </h1>

                <p class="mb-0">
                    Statut
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body text-center p-4">

                <h1 class="text-warning">

                    @if(Auth::guard('artisan')->user()->is_verified)

                        Vérifié

                    @else

                        En attente

                    @endif

                </h1>

                <p class="mb-0">
                    Validation compte
                </p>

            </div>

        </div>

    </div>

</div>

@endsection