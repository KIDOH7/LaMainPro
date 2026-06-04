@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <a
            href="/admin/reservations"
            class="btn btn-secondary"
        >
            Retour
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="row">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body">

                    <h3 class="mb-4">

                        Réservation #{{ $reservation->id }}

                    </h3>

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Client
                            </label>

                            <p>
                                {{ $reservation->client_name }}
                            </p>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Téléphone
                            </label>

                            <p>

                                <a
                                    href="tel:{{ $reservation->client_phone }}"
                                    class="text-decoration-none"
                                >

                                    {{ $reservation->client_phone }}

                                </a>

                            </p>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Secteur
                            </label>

                            <p>
                                {{ $reservation->secteur }}
                            </p>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Date réservation
                            </label>

                            <p>

                                {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}

                            </p>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Commune
                            </label>

                            <p>
                                {{ $reservation->commune }}
                            </p>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Quartier
                            </label>

                            <p>
                                {{ $reservation->quartier }}
                            </p>

                        </div>

                        <div class="col-12">

                            <label class="fw-bold">
                                Description
                            </label>

                            <div class="border rounded p-3 bg-light">

                                {{ $reservation->description }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            {{-- STATUS --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body">

                    <h5 class="mb-4">

                        Modifier statut

                    </h5>

                    <form
                        action="/admin/reservation/status/{{ $reservation->id }}"
                        method="POST"
                    >

                        @csrf

                        <div class="mb-3">

                            <select
                                name="status"
                                class="form-select"
                            >

                                <option
                                    value="en_attente"
                                    {{ $reservation->status == 'en_attente' ? 'selected' : '' }}
                                >
                                    En attente
                                </option>

                                <option
                                    value="validee"
                                    {{ $reservation->status == 'validee' ? 'selected' : '' }}
                                >
                                    Validée
                                </option>

                                <option
                                    value="affectee"
                                    {{ $reservation->status == 'affectee' ? 'selected' : '' }}
                                >
                                    Affectée
                                </option>

                                <option
                                    value="terminee"
                                    {{ $reservation->status == 'terminee' ? 'selected' : '' }}
                                >
                                    Terminée
                                </option>

                                <option
                                    value="annulee"
                                    {{ $reservation->status == 'annulee' ? 'selected' : '' }}
                                >
                                    Annulée
                                </option>

                            </select>

                        </div>

                        <button
                            class="btn btn-primary w-100"
                            type="submit"
                        >

                            Mettre à jour

                        </button>

                    </form>

                </div>

            </div>

            {{-- ASSIGNATION --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body">

                    <h5 class="mb-4">

                        Affecter artisan

                    </h5>

                    <form
                        action="/admin/reservation/assign/{{ $reservation->id }}"
                        method="POST"
                    >

                        @csrf

                        <div class="mb-3">

                            <select
                                name="artisan_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Choisir artisan --
                                </option>

                                @foreach($artisans as $artisan)

                                    <option
                                        value="{{ $artisan->id }}"
                                    >

                                        {{ $artisan->fullname }}

                                        -

                                        {{ $artisan->commune }}

                                        @if($artisan->is_premium)

                                            ⭐ Premium

                                        @endif

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <button
                            class="btn btn-success w-100"
                            type="submit"
                        >

                            Affecter artisan

                        </button>

                    </form>

                </div>

            </div>

            {{-- ARTISAN ACTUEL --}}

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="mb-4">

                        Artisan affecté

                    </h5>

                    @if($reservation->artisan)

                        <div>

                            <h6>

                                {{ $reservation->artisan->fullname }}

                            </h6>

                            <p class="mb-1">

                                {{ $reservation->artisan->phone }}

                            </p>

                            <p class="mb-0">

                                {{ $reservation->artisan->commune }}

                            </p>

                        </div>

                    @else

                        <p class="text-muted mb-0">

                            Aucun artisan affecté

                        </p>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection