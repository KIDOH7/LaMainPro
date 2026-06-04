@extends('layouts.default')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    <h1 class="mb-4">

                        Ajouter un service

                    </h1>

                    <!-- Errors -->
                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ url('/artisan/dashboard/services/store') }}"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">

                            <!-- Titre -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Titre du service

                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="Ex: Réparation électrique">

                            </div>

                            <!-- Prix -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Prix

                                </label>

                                <input type="number"
                                       name="price"
                                       class="form-control"
                                       placeholder="Ex: 15000">

                            </div>

                            <!-- Description -->
                            <div class="col-12">

                                <label class="form-label">

                                    Description

                                </label>

                                <textarea name="description"
                                          class="form-control"
                                          rows="5"
                                          placeholder="Décrivez votre service"></textarea>

                            </div>

                            <!-- Disponibilité -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Disponibilité

                                </label>

                                <select name="is_available"
                                        class="form-select">

                                    <option value="1">

                                        Disponible

                                    </option>

                                    <option value="0">

                                        Indisponible

                                    </option>

                                </select>

                            </div>

                            <!-- Image 1 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image principale *

                                </label>

                                <input type="file"
                                       name="image1"
                                       class="form-control"
                                       accept="image/*"
                                       onchange="previewImage(event, 'preview1')">

                                <img id="preview1"
                                     class="img-fluid rounded mt-3 d-none"
                                     style="height:150px; object-fit:cover;">

                            </div>

                            <!-- Image 2 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image secondaire 1

                                </label>

                                <input type="file"
                                       name="image2"
                                       class="form-control"
                                       accept="image/*"
                                       onchange="previewImage(event, 'preview2')">

                                <img id="preview2"
                                     class="img-fluid rounded mt-3 d-none"
                                     style="height:150px; object-fit:cover;">

                            </div>

                            <!-- Image 3 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image secondaire 2

                                </label>

                                <input type="file"
                                       name="image3"
                                       class="form-control"
                                       accept="image/*"
                                       onchange="previewImage(event, 'preview3')">

                                <img id="preview3"
                                     class="img-fluid rounded mt-3 d-none"
                                     style="height:150px; object-fit:cover;">

                            </div>

                            <!-- Image 4 -->
                            <div class="col-md-6">

                                <label class="form-label">

                                    Image secondaire 3

                                </label>

                                <input type="file"
                                       name="image4"
                                       class="form-control"
                                       accept="image/*"
                                       onchange="previewImage(event, 'preview4')">

                                <img id="preview4"
                                     class="img-fluid rounded mt-3 d-none"
                                     style="height:150px; object-fit:cover;">

                            </div>

                            <!-- Submit -->
                            <div class="col-12">

                                <button class="btn btn-primary py-3 px-5">

                                    Ajouter le service

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Preview Script -->
<script>

function previewImage(event, previewId)
{
    const input = event.target;

    const preview = document.getElementById(
        previewId
    );

    preview.src = URL.createObjectURL(
        input.files[0]
    );

    preview.classList.remove('d-none');
}

</script>

@endsection