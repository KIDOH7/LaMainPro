@extends('layouts.default')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="bg-light p-5 rounded shadow-sm">

                <h2 class="mb-4 text-center">
                    Réserver un service
                </h2>

                @if(session('success'))

                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>

                @endif

               <form method="POST"
      action="{{ route('reservation.store') }}">

    @csrf

    <div class="row g-3">

        <!-- Secteur -->
        <div class="col-md-6">

            <label class="form-label">
                Secteur
            </label>

            <select name="secteur"
                    class="form-select"
                    required>

                <option value="">
                    Choisir un secteur
                </option>

                @foreach($secteurs as $secteur)

                    <option value="{{ $secteur }}">

                        {{ $secteur }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Nom -->
        <div class="col-md-6">

            <label class="form-label">
                Nom complet
            </label>

            <input type="text"
                   name="client_name"
                   class="form-control"
                   required>

        </div>

        <!-- Téléphone -->
        <div class="col-md-6">

            <label class="form-label">
                Numéro de téléphone
            </label>

            <input type="text"
                   name="client_phone"
                   class="form-control"
                   required>

        </div>

        <!-- Commune -->
        <div class="col-md-6">

            <label class="form-label">
                Commune
            </label>

            <select name="commune"
                    class="form-select"
                    required>

                <option value="">
                    Choisir une commune
                </option>

                <option value="Abobo">Abobo</option>
                <option value="Adjamé">Adjamé</option>
                <option value="Attécoubé">Attécoubé</option>
                <option value="Cocody">Cocody</option>
                <option value="Koumassi">Koumassi</option>
                <option value="Marcory">Marcory</option>
                <option value="Plateau">Plateau</option>
                <option value="Port-Bouët">Port-Bouët</option>
                <option value="Treichville">Treichville</option>
                <option value="Yopougon">Yopougon</option>
                <option value="Bingerville">Bingerville</option>
                <option value="Songon">Songon</option>

            </select>

        </div>

        <!-- Quartier -->
        <div class="col-md-6">

            <label class="form-label">
                Quartier
            </label>

            <input type="text"
                   name="quartier"
                   class="form-control"
                   required>

        </div>

        <!-- Date -->
        <div class="col-md-6">

            <label class="form-label">
                Date souhaitée
            </label>

            <input type="date"
                   name="reservation_date"
                   class="form-control"
                   required>

        </div>

        <!-- Description -->
        <div class="col-12">

            <label class="form-label">
                Décrivez votre besoin
            </label>

            <textarea name="description"
                      rows="5"
                      class="form-control"
                      required></textarea>

        </div>

        <!-- Bouton -->
        <div class="col-12">

            <button class="btn btn-primary w-100 py-3">

                Envoyer la demande

            </button>

        </div>

    </div>

</form>

            </div>

        </div>

    </div>

</div>

@endsection