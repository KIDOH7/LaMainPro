<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArtisanAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MissionController;



/*
|--------------------------------------------------------------------------
| RESERVATIONS
|--------------------------------------------------------------------------
*/

/**
 * Formulaire réservation
 */
// Route::get(
//     '/reservation/{artisan}',
//     [ReservationController::class, 'create']
// );

/**
 * Enregistrement réservation
 */
// Route::post(
//     '/reservation/store',
//     [ReservationController::class, 'store']
// );

/*
|--------------------------------------------------------------------------
| RÉSERVATION CLIENT
|--------------------------------------------------------------------------
*/

// Route::get('/admin/reservation/index', [ReservationController::class, 'index'])->name('admin.reservation.index');
// Route::get('/admin/reservation/{id}', [ReservationController::class, 'show'])->name('admin.reservation.show');

// Route::get(
//     '/reservation',
//     [ReservationController::class, 'create']
// )->name('reservation.create');

// Route::post(
//     '/reservation/store',
//     [ReservationController::class, 'store']
// )->name('reservation.store'); 

// Route::post(
//     '/admin/reservation/assign/{id}',
//     [ReservationController::class, 'assignArtisan']
// );

/**
 * =========================================
 * RESERVATIONS CLIENT
 * =========================================
 */

/**
 * Formulaire réservation
 */
Route::get(
    '/reservation',
    [ReservationController::class, 'create']
)->name('reservation.create');

/**
 * Enregistrer réservation
 */
Route::post(
    '/reservation/store',
    [ReservationController::class, 'store']
)->name('reservation.store');



/**
 * =========================================
 * ADMIN RESERVATIONS
 * =========================================
 */

/**
 * Liste des réservations
 */
Route::get(
    '/admin/reservations',
    [ReservationController::class, 'index']
)->name('admin.reservations');

/**
 * Détail réservation
 */
Route::get(
    '/admin/reservation/{id}',
    [ReservationController::class, 'show']
)->name('admin.reservation.show');

/**
 * Modifier statut réservation
 */
Route::post(
    '/admin/reservation/status/{id}',
    [ReservationController::class, 'updateStatus']
)->name('admin.reservation.status');

/**
 * Affecter artisan
 */
Route::post(
    '/admin/reservation/assign/{id}',
    [ReservationController::class, 'assignArtisan']
)->name('admin.reservation.assign');

/**
 * Supprimer réservation
 */
Route::post(
    '/admin/reservation/delete/{id}',
    [ReservationController::class, 'destroy']
)->name('admin.reservation.delete');
/*
|--------------------------------------------------------------------------
| CLIENT
|--------------------------------------------------------------------------
*/

Route::get(
    '/',
    [ClientController::class, 'home']
)->name('home');

/**
 * Recherche globale
 */
Route::get(
    '/recherche',
    [ClientController::class, 'search']
)->name('search');

/**
 * Secteurs
 */
Route::get(
    '/secteur/{secteur}',
    [ClientController::class, 'secteur']
);

/**
 * Profil artisan
 */
Route::get(
    '/artisan/profil/{id}',
    [ClientController::class, 'showArtisan']
);
// Route::get('/recherche', [ArtisanController::class, 'search']);

Route::get('/secteur/{secteur}', [ArtisanController::class, 'bySecteur']);

Route::get('/artisan/profil/{id}', [ArtisanController::class, 'show']);
/**
 * Articles par secteur
 */
Route::get(
    '/articles/{secteur}',
    [ClientController::class, 'articlesBySecteur']
);


/*
|--------------------------------------------------------------------------
| AUTH ARTISAN
|--------------------------------------------------------------------------
*/

/**
 * Inscription
 */
Route::get(
    '/artisan/register',
    [ArtisanAuthController::class, 'showRegister']
);

Route::post(
    '/artisan/register',
    [ArtisanAuthController::class, 'register']
);

/**
 * Connexion
 */
Route::get(
    '/artisan/login',
    [ArtisanAuthController::class, 'showLogin']
);

Route::post(
    '/artisan/login',
    [ArtisanAuthController::class, 'login']
);

/**
 * Logout
 */
Route::post(
    '/artisan/logout',
    [ArtisanAuthController::class, 'logout']
);


/*
|--------------------------------------------------------------------------
| DASHBOARD ARTISAN
|--------------------------------------------------------------------------
*/

Route::middleware('artisan.auth')->group(function () {

    /**
     * Dashboard
     */
    Route::get(
        '/artisan/dashboard',
        function () {

            return view('artisan.dashboard');
        }
    );

    /**
     * Profil
     */
    Route::get(
        '/artisan/profile',
        [ArtisanAuthController::class, 'profile']
    );

    Route::post(
        '/artisan/profile/update',
        [ArtisanAuthController::class, 'updateProfile']
    );

    /**
     * Password
     */
    Route::get(
        '/artisan/password',
        [ArtisanAuthController::class, 'showPasswordForm']
    );

    Route::post(
        '/artisan/password/update',
        [ArtisanAuthController::class, 'updatePassword']
    );

    /**
     * SERVICES / ARTICLES
     */
    Route::get(
        '/artisan/dashboard/services',
        [ArticleController::class, 'index']
    );

    Route::get(
        '/artisan/dashboard/services/create',
        [ArticleController::class, 'create']
    );

    Route::post(
        '/artisan/dashboard/services/store',
        [ArticleController::class, 'store']
    );

    Route::get(
        '/artisan/dashboard/services/edit/{id}',
        [ArticleController::class, 'edit']
    );

    Route::post(
        '/artisan/dashboard/services/update/{id}',
        [ArticleController::class, 'update']
    );

    Route::post(
        '/artisan/dashboard/services/delete/{id}',
        [ArticleController::class, 'destroy']
    );


});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/dashboard',
    [AdminController::class, 'dashboard']
);


/*
|--------------------------------------------------------------------------
| ADMIN ARTISANS
|--------------------------------------------------------------------------
*/

/**
 * Liste artisans
 */
Route::get(
    '/admin/artisans',
    [AdminController::class, 'artisans']
);

Route::get(
    '/admin/artisan/{id}',
    [AdminController::class, 'showArtisan']
);

/**
 * Valider artisan
 */
Route::post(
    '/admin/artisan/verify/{id}',
    [AdminController::class, 'verifyArtisan']
);

/**
 * Suspendre artisan
 */
Route::post(
    '/admin/artisan/suspend/{id}',
    [AdminController::class, 'suspendArtisan']
);

/**
 * Premium artisan
 */
Route::post(
    '/admin/artisan/premium/{id}',
    [AdminController::class, 'premiumArtisan']
);

/**
 * Supprimer artisan
 */
Route::post(
    '/admin/artisan/delete/{id}',
    [AdminController::class, 'deleteArtisan']
);


// Route::get(
//     '/artisan/missions',
//     [MissionController::class, 'index']
// );

// Route::get(
//     '/artisan/missions/{id}',
//     [MissionController::class, 'show']
// );

// Route::post(
//     '/artisan/missions/status/{id}',
//     [MissionController::class, 'updateStatus']
// );


/**
 * =========================================
 * MISSIONS ARTISAN
 * =========================================
 */

Route::middleware('artisan.auth')->group(function () {

    /**
     * Liste missions
     */
    Route::get(
        '/artisan/missions',
        [MissionController::class, 'index']
    );

    /**
     * Détail mission
     */
    Route::get(
        '/artisan/missions/{id}',
        [MissionController::class, 'show']
    );

    /**
     * Modifier statut mission
     */
    Route::post(
        '/artisan/missions/status/{id}',
        [MissionController::class, 'updateStatus']
    );

});