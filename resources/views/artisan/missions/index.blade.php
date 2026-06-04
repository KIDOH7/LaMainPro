@extends('layouts.dashboard')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        Mes missions
    </h2>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            @if($missions->count())

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                            <tr>

                                <th>Client</th>

                                <th>Téléphone</th>

                                <th>Secteur</th>

                                <th>Commune</th>

                                <th>Date</th>

                                <th>Statut</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($missions as $mission)

                                <tr>

                                    <td>

                                        {{ $mission->client_name }}

                                    </td>

                                    <td>

                                        {{ $mission->client_phone }}

                                    </td>

                                    <td>

                                        {{ $mission->secteur }}

                                    </td>

                                    <td>

                                        {{ $mission->commune }}

                                    </td>

                                    <td>

                                        {{ $mission->reservation_date }}

                                    </td>

                                    <td>

                                        <span class="badge bg-primary">

                                            {{ $mission->status }}

                                        </span>

                                    </td>

                                    <td>

                                        <a
                                            href="/artisan/missions/{{ $mission->id }}"
                                            class="btn btn-primary btn-sm"
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

                    {{ $missions->links() }}

                </div>

            @else

                <div class="text-center py-5">

                    <h5>
                        Aucune mission disponible
                    </h5>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection