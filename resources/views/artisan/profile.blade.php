@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    <h2 class="mb-5">

                        Mon Profil

                    </h2>

                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    <form action="{{ url('/artisan/profile/update') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">

                            <!-- Photo -->
                            <div class="col-12 text-center">

                                <img src="{{ asset('storage/' . $artisan->profile_photo) }}"
                                     class="rounded-circle mb-3"
                                     width="120"
                                     height="120"
                                     style="object-fit:cover;">

                                <input type="file"
                                       name="profile_photo"
                                       class="form-control">

                            </div>

                            <!-- Nom -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Nom complet

                                </label>

                                <input type="text"
                                       name="fullname"
                                       class="form-control"
                                       value="{{ $artisan->fullname }}">

                            </div>

                            <!-- Téléphone -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Téléphone

                                </label>

                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="{{ $artisan->phone }}">

                            </div>

                            <!-- Commune -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Commune

                                </label>

                                <input type="text"
                                       name="commune"
                                       class="form-control"
                                       value="{{ $artisan->commune }}">

                            </div>

                            <!-- Quartier -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Quartier

                                </label>

                                <input type="text"
                                       name="quartier"
                                       class="form-control"
                                       value="{{ $artisan->quartier }}">

                            </div>

                            <!-- Secteur -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Secteur

                                </label>

                                <input type="text"
                                       name="secteur"
                                       class="form-control"
                                       value="{{ $artisan->secteur }}">

                            </div>

                            <!-- Expérience -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Expérience

                                </label>

                                <input type="number"
                                       name="experience"
                                       class="form-control"
                                       value="{{ $artisan->experience }}">

                            </div>

                            <!-- Description -->
                            <div class="col-12">

                                <label class="form-label">

                                    Description

                                </label>

                                <textarea name="description"
                                          class="form-control"
                                          rows="5">{{ $artisan->description }}</textarea>

                            </div>

                            <!-- Bouton -->
                            <div class="col-12">

                                <button class="btn btn-primary px-5 py-3">

                                    Mettre à jour

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection