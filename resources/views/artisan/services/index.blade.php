@extends('layouts.dashboard')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>

            Mes Services

        </h1>

        <a href="{{ url('/artisan/dashboard/services/create') }}"
           class="btn btn-primary">

            Ajouter un service

        </a>

    </div>

    <div class="row g-4">

        @foreach($articles as $article)

            <div class="col-lg-4">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <img src="{{ asset('storage/' . $article->image1) }}"
                         class="img-fluid"
                         style="height:250px; object-fit:cover;">

                    <div class="card-body">

                        <h4>

                            {{ $article->title }}

                        </h4>

                        <h5 class="text-primary">

                            {{ number_format($article->price, 0, ',', ' ') }}
                            FCFA

                        </h5>

                        <!-- Disponibilité -->
                        @if($article->is_available)

                            <span class="badge bg-success">

                                Disponible

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Indisponible

                            </span>

                        @endif

                        <div class="mt-4 d-flex gap-2">

                            <a href="{{ url('/artisan/dashboard/services/edit/' . $article->id) }}"
                               class="btn btn-warning">

                                Modifier

                            </a>

                            <form method="POST"
                                  action="{{ url('/artisan/dashboard/services/delete/' . $article->id) }}">

                                @csrf

                                <button class="btn btn-danger">

                                    Supprimer

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection