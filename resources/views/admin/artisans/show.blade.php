@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <img
                        src="{{ asset('storage/' . $artisan->profile_photo) }}"
                        class="img-fluid rounded mb-3"
                    >

                </div>

                <div class="col-md-8">

                    <h2>
                        {{ $artisan->fullname }}
                    </h2>

                    <p>
                        <strong>Téléphone :</strong>
                        {{ $artisan->phone }}
                    </p>

                    <p>
                        <strong>Secteur :</strong>
                        {{ $artisan->secteur }}
                    </p>

                    <p>
                        <strong>Commune :</strong>
                        {{ $artisan->commune }}
                    </p>

                    <p>
                        <strong>Quartier :</strong>
                        {{ $artisan->quartier }}
                    </p>

                    <p>
                        <strong>Description :</strong>
                        {{ $artisan->description }}
                    </p>

                </div>

            </div>

            <hr>

            <h4 class="mb-3">
                Pièces d'identité
            </h4>

            <div class="row">

                <div class="col-md-6">

                    <img
                        src="{{ asset('storage/' . $artisan->id_card_front) }}"
                        class="img-fluid rounded"
                    >

                </div>

                <div class="col-md-6">

                    <img
                        src="{{ asset('storage/' . $artisan->id_card_back) }}"
                        class="img-fluid rounded"
                    >

                </div>

            </div>

        </div>

    </div>

</div>

@endsection