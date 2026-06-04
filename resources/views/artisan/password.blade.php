@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    <h2 class="mb-4">

                        Modifier le mot de passe

                    </h2>

                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ url('/artisan/password/update') }}"
                          method="POST">

                        @csrf

                        <!-- Ancien -->
                        <div class="mb-4">

                            <label class="form-label">

                                Ancien mot de passe

                            </label>

                            <input type="password"
                                   name="current_password"
                                   class="form-control"
                                   required>

                        </div>

                        <!-- Nouveau -->
                        <div class="mb-4">

                            <label class="form-label">

                                Nouveau mot de passe

                            </label>

                            <input type="password"
                                   name="new_password"
                                   class="form-control"
                                   required>

                        </div>

                        <!-- Confirmation -->
                        <div class="mb-4">

                            <label class="form-label">

                                Confirmer le mot de passe

                            </label>

                            <input type="password"
                                   name="new_password_confirmation"
                                   class="form-control"
                                   required>

                        </div>

                        <!-- Bouton -->
                        <button class="btn btn-primary py-3 px-5">

                            Modifier le mot de passe

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection