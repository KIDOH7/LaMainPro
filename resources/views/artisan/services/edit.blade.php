@extends('layouts.default')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    <h1 class="mb-4">

                        Modifier le service

                    </h1>

                    <form method="POST"
                          action="{{ url('/artisan/dashboard/services/update/' . $article->id) }}"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">

                            <!-- Titre -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Titre

                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       value="{{ $article->title }}">

                            </div>

                            <!-- Prix -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Prix

                                </label>

                                <input type="number"
                                       name="price"
                                       class="form-control"
                                       value="{{ $article->price }}">

                            </div>

                            <!-- Description -->
                            <div class="col-12">

                                <label class="form-label">

                                    Description

                                </label>

                                <textarea name="description"
                                          class="form-control"
                                          rows="5">{{ $article->description }}</textarea>

                            </div>

                            <!-- Disponibilité -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Disponibilité

                                </label>

                                <select name="is_available"
                                        class="form-select">

                                    <option value="1"
                                        {{ $article->is_available ? 'selected' : '' }}>

                                        Disponible

                                    </option>

                                    <option value="0"
                                        {{ !$article->is_available ? 'selected' : '' }}>

                                        Indisponible

                                    </option>

                                </select>

                            </div>

                            <!-- IMAGE 1 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image principale

                                </label>

                                <input type="file"
                                       name="image1"
                                       class="form-control">

                                <img src="{{ asset('storage/' . $article->image1) }}"
                                     class="img-fluid rounded mt-3"
                                     style="height:150px; object-fit:cover;">

                            </div>

                            <!-- IMAGE 2 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image secondaire 1

                                </label>

                                <input type="file"
                                       name="image2"
                                       class="form-control">

                                @if($article->image2)

                                    <img src="{{ asset('storage/' . $article->image2) }}"
                                         class="img-fluid rounded mt-3"
                                         style="height:150px; object-fit:cover;">

                                @endif

                            </div>

                            <!-- IMAGE 3 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image secondaire 2

                                </label>

                                <input type="file"
                                       name="image3"
                                       class="form-control">

                                @if($article->image3)

                                    <img src="{{ asset('storage/' . $article->image3) }}"
                                         class="img-fluid rounded mt-3"
                                         style="height:150px; object-fit:cover;">

                                @endif

                            </div>

                            <!-- IMAGE 4 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image secondaire 3

                                </label>

                                <input type="file"
                                       name="image4"
                                       class="form-control">

                                @if($article->image4)

                                    <img src="{{ asset('storage/' . $article->image4) }}"
                                         class="img-fluid rounded mt-3"
                                         style="height:150px; object-fit:cover;">

                                @endif

                            </div>

                            <!-- Submit -->
                            <div class="col-12">

                                <button class="btn btn-primary py-3 px-5">

                                    Sauvegarder

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