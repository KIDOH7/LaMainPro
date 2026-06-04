@extends('layouts.default')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    <h2 class="mb-4 text-center">

                        Connexion Artisan

                    </h2>

                    <form method="POST"
                          action="{{ url('/artisan/login') }}">

                        @csrf

                        <!-- Téléphone -->
                        <div class="mb-3">

                            <label class="form-label">

                                Numéro de téléphone

                            </label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   required>

                        </div>

                        <!-- Password -->
                        <div class="mb-4">

                            <label class="form-label">

                                Mot de passe

                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <!-- Bouton -->
                        <button class="btn btn-primary w-100 py-3">

                            Se connecter

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection