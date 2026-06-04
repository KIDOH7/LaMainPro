@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="mb-1">
                Réservations clients
            </h2>

            <p class="text-muted mb-0">
                Gestion des demandes clients
            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            @if($reservations->count())

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Client</th>

                                <th>Téléphone</th>

                                <th>Secteur</th>

                                <th>Commune</th>

                                <th>Date</th>

                                <th>Statut</th>

                                <th>Artisan</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($reservations as $reservation)

                                <tr>

                                    <td>
                                        #{{ $reservation->id }}
                                    </td>

                                    <td>

                                        <strong>
                                            {{ $reservation->client_name }}
                                        </strong>

                                    </td>

                                    <td>

                                        <a
                                            href="tel:{{ $reservation->client_phone }}"
                                            class="text-decoration-none"
                                        >

                                            {{ $reservation->client_phone }}

                                        </a>

                                    </td>

                                    <td>

                                        <span class="badge bg-primary">

                                            {{ $reservation->secteur }}

                                        </span>

                                    </td>

                                    <td>

                                        {{ $reservation->commune }}

                                    </td>

                                    <td>

                                        {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}

                                    </td>

                                    <td>

                                        @if($reservation->status_admin  == 'en_attente')

                                            <span class="badge bg-warning text-dark">

                                                En attente

                                            </span>

                                        @elseif($reservation->status_admin  == 'validee')

                                            <span class="badge bg-info">

                                                Validée

                                            </span>

                                        @elseif($reservation->status_admin  == 'affectee')

                                            <span class="badge bg-primary">

                                                Affectée

                                            </span>

                                        @elseif($reservation->status_admin  == 'terminee')

                                            <span class="badge bg-success">

                                                Terminée

                                            </span>

                                        @elseif($reservation->status_admin  == 'annulee')

                                            <span class="badge bg-danger">

                                                Annulée

                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        @if($reservation->artisan)

                                            <span class="text-success">

                                                {{ $reservation->artisan->fullname }}

                                            </span>

                                        @else

                                            <span class="text-muted">

                                                Non affecté

                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a
                                            href="/admin/reservation/{{ $reservation->id }}"
                                            class="btn btn-sm btn-primary"
                                        >

                                            Voir

                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="mt-4">

                    {{ $reservations->links() }}

                </div>

            @else

                <div class="text-center py-5">

                    <h5>
                        Aucune réservation disponible
                    </h5>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection