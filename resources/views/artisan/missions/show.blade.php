@extends('layouts.dashboard')

@section('content')

<div class="container py-5">

    <a
        href="/artisan/missions"
        class="btn btn-secondary mb-4"
    >
        Retour
    </a>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h3 class="mb-4">

                Détail mission

            </h3>

            <div class="row g-4">

                <div class="col-md-6">

                    <label class="fw-bold">
                        Client
                    </label>

                    <p>
                        {{ $mission->client_name }}
                    </p>

                </div>

                <div class="col-md-6">

                    <label class="fw-bold">
                        Téléphone
                    </label>

                    <p>
                        {{ $mission->client_phone }}
                    </p>

                </div>

                <div class="col-md-6">

                    <label class="fw-bold">
                        Secteur
                    </label>

                    <p>
                        {{ $mission->secteur }}
                    </p>

                </div>

                <div class="col-md-6">

                    <label class="fw-bold">
                        Commune
                    </label>

                    <p>
                        {{ $mission->commune }}
                    </p>

                </div>

                <div class="col-md-6">

                    <label class="fw-bold">
                        Quartier
                    </label>

                    <p>
                        {{ $mission->quartier }}
                    </p>

                </div>

                <div class="col-md-6">

                    <label class="fw-bold">
                        Date
                    </label>

                    <p>
                        {{ $mission->reservation_date }}
                    </p>

                </div>

                <div class="col-12">

                    <label class="fw-bold">
                        Description
                    </label>

                    <div class="border rounded p-3 bg-light">

                        {{ $mission->description }}

                    </div>

                </div>

            </div>

            <hr class="my-4">

            <form
                action="/artisan/missions/status/{{ $mission->id }}"
                method="POST"
            >

                @csrf

                <div class="row">

                    <div class="col-md-8">

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option value="acceptee">
                                Acceptée
                            </option>

                            <option value="en_cours">
                                En cours
                            </option>

                            <option value="terminee">
                                Terminée
                            </option>

                            <option value="refusee">
                                Refusée
                            </option>

                        </select>

                    </div>

                    <div class="col-md-4">

                        <button
                            class="btn btn-primary w-100"
                            type="submit"
                        >

                            Mettre à jour

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection