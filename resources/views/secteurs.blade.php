@extends('layouts.default')

@section('content')

<div class="container py-5">

    <!-- Title -->
    <div class="text-center mb-5">

        <h1 class="fw-bold">

            Nos secteurs d'activité

        </h1>

        <p class="text-muted">

            Trouvez rapidement un artisan qualifié
            selon votre besoin.

        </p>

    </div>

    <!-- Secteurs -->
    <div class="row g-4">

        @foreach($secteurs as $secteur)

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow rounded-4 h-100 secteur-card">

                    <div class="card-body text-center p-5">

                        <!-- Icon -->
                        <div class="mb-4">

                            @switch($secteur)

                                @case('Plomberie')
                                    <i class="fa fa-faucet fa-3x text-primary"></i>
                                @break

                                @case('Électricité')
                                    <i class="fa fa-bolt fa-3x text-warning"></i>
                                @break

                                @case('Menuiserie')
                                    <i class="fa fa-hammer fa-3x text-danger"></i>
                                @break

                                @case('Informatique')
                                    <i class="fa fa-laptop fa-3x text-info"></i>
                                @break

                                @case('Ménage')
                                    <i class="fa fa-broom fa-3x text-success"></i>
                                @break

                                @default
                                    <i class="fa fa-tools fa-3x text-dark"></i>

                            @endswitch

                        </div>

                        <!-- Nom -->
                        <h4 class="mb-4">

                            {{ $secteur }}

                        </h4>

                        <!-- Button -->
                        <a href="{{ url('/secteur/' . $secteur) }}"
                           class="btn btn-primary rounded-pill px-4">

                            Voir les artisans

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>



 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">

            @foreach($secteurs as $secteur)
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="img/service-1.jpg" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        
                        <h5 class="text-truncate me-3 mb-0">Residential Plumbing</h5>
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

@endsection