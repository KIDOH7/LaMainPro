<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisanAuthController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\ClientController::class, 'home'])->name('home');

// Route::get(
//     '/recherche',
//     [ClientController::class, 'search']
// );

Route::get(
    '/recherche',
    [ClientController::class, 'search']
)->name('search');

Route::get(
    '/secteur/{secteur}',
    [ClientController::class, 'secteur']
);

Route::get(
    '/artisan/{id}',
    [ClientController::class, 'showArtisan']
);

Route::get(
    '/articles/{secteur}',
    [ClientController::class, 'articlesBySecteur']
);

// Route::get(
//     '/reservation',
//     [ReservationController::class, 'index']
// );

Route::get(
    '/articles/{secteur}',
    [ArticleController::class, 'bySecteur']
);

Route::get(
    'artisan/register',
    [ArtisanAuthController::class, 'showRegister']
);

Route::post(
    '/artisan/register',
    [ArtisanAuthController::class, 'register']
);

// Route::get('/artisan/dashboard', function () {

//     return view('artisan.dashboard');

// });

Route::get('/artisan/dashboard', function () {

    if (!Auth::guard('artisan')->check()) {

        return redirect('/artisan/register');
    }

    return view('artisan.dashboard');

});



Route::get(
    '/artisan/login',
    [ArtisanAuthController::class, 'showLogin']
);

Route::post(
    '/artisan/login',
    [ArtisanAuthController::class, 'login']
);


Route::get('/artisan/dashboard', function () {

    return view('artisan.dashboard');

})->middleware('artisan.auth');

Route::post(
    '/artisan/logout',
    [ArtisanAuthController::class, 'logout']
);


Route::get(
    '/artisan/profile',
    [ArtisanAuthController::class, 'profile']
)->middleware('artisan.auth');

Route::post(
    '/artisan/profile/update',
    [ArtisanAuthController::class, 'updateProfile']
)->middleware('artisan.auth');


Route::get(
    '/artisan/password',
    [ArtisanAuthController::class, 'showPasswordForm']
)->middleware('artisan.auth');

Route::post(
    '/artisan/password/update',
    [ArtisanAuthController::class, 'updatePassword']
)->middleware('artisan.auth');



/**
 * Secteurs
 */
Route::get(
    '/secteurs',
    [ArtisanController::class, 'secteurs']
);

/**
 * Artisans par secteur
 */
Route::get(
    '/secteur/{secteur}',
    [ArtisanController::class, 'bySecteur']
);

/**
 * Fiche artisan
 */
Route::get(
    '/artisan/{id}',
    [ArtisanController::class, 'show']
);


/**
 * SERVICES / ARTICLES
 */
Route::middleware('artisan')->group(function () {

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