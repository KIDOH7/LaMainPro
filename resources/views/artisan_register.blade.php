
@extends('layouts.default')

@section('content')
   

sjdjbdjsdfsooooooooooooooooooooooooooooooooooooooooo

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Get In Touch</h6>
                    <h1 class="mb-4">Contact For Any Query</h1>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <iframe class="position-relative w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light p-5 h-100 d-flex align-items-center">
                        

<form action="{{ url('/artisan/register') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="row g-3">

        <!-- Nom complet -->
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text"
                       class="form-control"
                       id="fullname"
                       name="fullname"
                       placeholder="Nom complet"
                       required>

                <label for="fullname">Nom complet</label>
            </div>
        </div>

        <!-- Téléphone -->
        <div class="col-md-6">
            <div class="form-floating">
                <input type="tel"
                       class="form-control"
                       id="phone"
                       name="phone"
                       placeholder="Numéro de téléphone"
                       required>

                <label for="phone">Numéro de téléphone</label>
            </div>
        </div>

        <!-- Ville -->
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text"
                       class="form-control"
                       id="city"
                       name="city"
                       value="Abidjan"
                       readonly>

                <label for="city">Ville</label>
            </div>
        </div>

        <!-- Commune -->
        <div class="col-md-6">
            <div class="form-floating">

                <select class="form-select"
                        id="commune"
                        name="commune"
                        required>

                    <option value="">Choisir une commune</option>

                    <option value="Abobo">Abobo</option>
                    <option value="Adjamé">Adjamé</option>
                    <option value="Attécoubé">Attécoubé</option>
                    <option value="Cocody">Cocody</option>
                    <option value="Deux-Plateaux">Deux-Plateaux</option>
                    <option value="Koumassi">Koumassi</option>
                    <option value="Marcory">Marcory</option>
                    <option value="Plateau">Plateau</option>
                    <option value="Port-Bouët">Port-Bouët</option>
                    <option value="Treichville">Treichville</option>
                    <option value="Yopougon">Yopougon</option>
                    <option value="Bingerville">Bingerville</option>
                    <option value="Songon">Songon</option>

                </select>

                <label for="commune">Commune</label>

            </div>
        </div>

        <!-- Quartier -->
        <div class="col-md-6">
            <div class="form-floating">

                <input type="text"
                       class="form-control"
                       id="quartier"
                       name="quartier"
                       placeholder="Quartier"
                       required>

                <label for="quartier">Quartier</label>

            </div>
        </div>

        <!-- Secteur -->
        <div class="col-md-6">
            <div class="form-floating">

                <select class="form-select"
                        id="secteur"
                        name="secteur"
                        required>

                    <option value="">Choisir un secteur</option>

                    <option value="Ménage">Ménage</option>
                    <option value="Plomberie">Plomberie</option>
                    <option value="Électricité">Électricité</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Menuiserie">Menuiserie</option>
                    <option value="Ferronnerie">Ferronnerie</option>
                    <option value="Carrelage">Carrelage</option>
                    <option value="Peinture">Peinture</option>
                    <option value="Coiffure">Coiffure</option>
                    <option value="Chauffeur">Chauffeur</option>
                    <option value="Maçonnerie">Maçonnerie</option>
                    <option value="Onglerie">Onglerie</option>

                </select>

                <label for="secteur">Secteur d'activité</label>

            </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <div class="form-floating">

                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       placeholder="Email">

                <label for="email">
                    Adresse Email (optionnel)
                </label>

            </div>
        </div>

        <!-- Expérience -->
        <div class="col-md-6">
            <div class="form-floating">

                <input type="number"
                       class="form-control"
                       id="experience"
                       name="experience"
                       placeholder="Années d'expérience">

                <label for="experience">
                    Années d'expérience
                </label>

            </div>
        </div>

        <!-- Description -->
        <div class="col-12">
            <div class="form-floating">

                <textarea class="form-control"
                          placeholder="Description"
                          id="description"
                          name="description"
                          style="height: 120px"></textarea>

                <label for="description">
                    Petite description de vos services
                </label>

            </div>
        </div>

        <!-- Pièce recto -->
        <div class="col-md-6">

            <label class="form-label">
                Photo de la pièce d'identité (Recto)
            </label>

            <input type="file"
                   class="form-control"
                   name="id_card_front"
                   accept="image/*"
                   required>

        </div>

        <!-- Pièce verso -->
        <div class="col-md-6">

            <label class="form-label">
                Photo de la pièce d'identité (Verso)
            </label>

            <input type="file"
                   class="form-control"
                   name="id_card_back"
                   accept="image/*"
                   required>

        </div>

        <!-- Photo profil -->
        <div class="col-md-6">

            <label class="form-label">
                Photo de profil
            </label>

            <input type="file"
                   class="form-control"
                   name="profile_photo"
                   accept="image/*"
                   required>

        </div>

        <!-- Mot de passe -->
        <div class="col-md-6">
            <div class="form-floating">

                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       placeholder="Mot de passe"
                       required>

                <label for="password">
                    Mot de passe
                </label>

            </div>
        </div>

        <!-- Confirmation mot de passe -->
        <div class="col-md-6">
            <div class="form-floating">

                <input type="password"
                       class="form-control"
                       id="password_confirmation"
                       name="password_confirmation"
                       placeholder="Confirmer le mot de passe"
                       required>

                <label for="password_confirmation">
                    Confirmer le mot de passe
                </label>

            </div>
        </div>

        <!-- Conditions -->
        <div class="col-12">

            <div class="form-check">

                <input class="form-check-input"
                       type="checkbox"
                       id="terms"
                       required>

                <label class="form-check-label"
                       for="terms">

                    J'accepte les conditions d'utilisation
                    de la plateforme.

                </label>

            </div>

        </div>

        <!-- Bouton -->
        <div class="col-12">

            <button class="btn btn-primary w-100 py-3"
                    type="submit">

                S'inscrire maintenant

            </button>

        </div>

    </div>

</form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

