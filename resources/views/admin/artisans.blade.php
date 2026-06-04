@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1 class="mb-5">

        Gestion des Artisans

    </h1>

    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>

                    <th>Photo</th>

                    <th>Nom</th>

                    <th>Téléphone</th>

                    <th>Secteur</th>

                    <th>Commune</th>

                    <th>Recto</th>

                    <th>Verso</th>

                    <th>Statut</th>

                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach($artisans as $artisan)

                    <tr>

                        <!-- Photo -->
                        <td>

                            <img src="{{ asset('storage/' . $artisan->profile_photo) }}"
                                 width="70"
                                 height="70"
                                 style="object-fit: cover; border-radius: 10px;">

                        </td>

                        <!-- Nom -->
                        <td>

                            {{ $artisan->fullname }}

                        </td>

                        <!-- Téléphone -->
                        <td>

                            {{ $artisan->phone }}

                        </td>

                        <!-- Secteur -->
                        <td>

                            {{ $artisan->secteur }}

                        </td>

                        <!-- Commune -->
                        <td>

                            {{ $artisan->commune }}

                        </td>

                        <!-- Recto -->
                        <td>

                            <a href="{{ asset('storage/' . $artisan->id_card_front) }}"
                               target="_blank"
                               class="btn btn-sm btn-primary">

                                Voir

                            </a>

                        </td>

                        <!-- Verso -->
                        <td>

                            <a href="{{ asset('storage/' . $artisan->id_card_back) }}"
                               target="_blank"
                               class="btn btn-sm btn-primary">

                                Voir

                            </a>

                        </td>

                        <!-- Statut -->
                        <td>

                            @if($artisan->is_verified)

                                <span class="badge bg-success">

                                    Vérifié

                                </span>

                            @else

                                <span class="badge bg-warning">

                                    En attente

                                </span>

                            @endif

                            @if($artisan->is_premium)

                                <span class="badge bg-primary">

                                    Premium

                                </span>

                            @endif

                            @if($artisan->is_suspended)

                                <span class="badge bg-danger">

                                    Suspendu

                                </span>

                            @endif

                        </td>

                        <!-- Actions -->
                        <td>

                            <!-- Vérifier -->
                            <form method="POST"
                                  action="/admin/artisan/verify/{{ $artisan->id }}"
                                  class="mb-2">

                                @csrf

                                <button class="btn btn-success btn-sm w-100">

                                    Vérifier

                                </button>

                            </form>

                            <!-- Premium -->
                            <form method="POST"
                                  action="/admin/artisan/premium/{{ $artisan->id }}"
                                  class="mb-2">

                                @csrf

                                <button class="btn btn-primary btn-sm w-100">

                                    Premium

                                </button>

                            </form>

                            <!-- Suspendre -->
                            <form method="POST"
                                  action="/admin/artisan/suspend/{{ $artisan->id }}"
                                  class="mb-2">

                                @csrf

                                <button class="btn btn-warning btn-sm w-100">

                                    Suspendre

                                </button>

                            </form>

                            <!-- Supprimer -->
                            <form method="POST"
                                  action="/admin/artisan/delete/{{ $artisan->id }}">

                                @csrf

                                <button class="btn btn-danger btn-sm w-100">

                                    Supprimer

                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection