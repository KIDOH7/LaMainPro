@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1 class="mb-5">

        Dashboard Admin

    </h1>

    <div class="row g-4">

        <!-- Artisans -->
        <div class="col-md-3">

            <div class="bg-primary text-white p-4 rounded shadow-sm">

                <h5>
                    Artisans
                </h5>

                <h2>

                    {{ $artisans }}

                </h2>

            </div>

        </div>

        <!-- Articles -->
        <div class="col-md-3">

            <div class="bg-success text-white p-4 rounded shadow-sm">

                <h5>
                    Services / Articles
                </h5>

                <h2>

                    {{ $articles }}

                </h2>

            </div>

        </div>

        <!-- Réservations -->
        <div class="col-md-3">

            <div class="bg-dark text-white p-4 rounded shadow-sm">

                <h5>
                    Réservations
                </h5>

                <h2>

                    {{ $reservations }}

                </h2>

            </div>

        </div>

        <!-- En attente -->
        <div class="col-md-3">

            <div class="bg-warning text-dark p-4 rounded shadow-sm">

                <h5>
                    En attente
                </h5>

                <h2>

                    {{ $pendingReservations }}

                </h2>

            </div>

        </div>

    </div>

</div>

@endsection