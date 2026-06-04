@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        Gestion des artisans
    </h2>

    <div class="table-responsive">

        <table class="table table-bordered align-middle">

            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Secteur</th>
                    <th>Commune</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($artisans as $artisan)

                    <tr>

                        <td width="100">

                            <img
                                src="{{ asset('storage/' . $artisan->profile_photo) }}"
                                width="70"
                                class="rounded"
                            >

                        </td>

                        <td>
                            {{ $artisan->fullname }}
                        </td>

                        <td>
                            {{ $artisan->phone }}
                        </td>

                        <td>
                            {{ $artisan->secteur }}
                        </td>

                        <td>
                            {{ $artisan->commune }}
                        </td>

                        <td>

                            @if($artisan->is_suspended)

                                <span class="badge bg-danger">
                                    Suspendu
                                </span>

                            @elseif($artisan->is_verified)

                                <span class="badge bg-success">
                                    Vérifié
                                </span>

                            @else

                                <span class="badge bg-warning">
                                    En attente
                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="/admin/artisan/{{ $artisan->id }}"
                                class="btn btn-primary btn-sm"
                            >
                                Voir
                            </a>

                            <form
                                action="/admin/artisan/verify/{{ $artisan->id }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf

                                <button class="btn btn-success btn-sm">
                                    Vérifier
                                </button>
                            </form>

                            <form
                                action="/admin/artisan/premium/{{ $artisan->id }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf

                                <button class="btn btn-warning btn-sm">
                                    Premium
                                </button>
                            </form>

                            <form
                                action="/admin/artisan/suspend/{{ $artisan->id }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf

                                <button class="btn btn-secondary btn-sm">
                                    Suspendre
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