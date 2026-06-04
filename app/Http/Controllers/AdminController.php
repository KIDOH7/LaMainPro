<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Article;
use App\Models\Reservation;

class AdminController extends Controller
{
    /**
     * Dashboard admin
     */
    public function dashboard()
    {
        $artisans = Artisan::count();

        $articles = Article::count();

        $reservations = Reservation::count();

        $pendingReservations = Reservation::where(
            'status_admin',
            'en_attente'
        )->count();

        return view(
            'admin.dashboard',
            compact(
                'artisans',
                'articles',
                'reservations',
                'pendingReservations'
            )
        );
    }

    public function artisans()
    {
        $artisans = Artisan::latest()->get();

        return view(
            'admin.artisans.index',
            compact('artisans')
        );
    }

    /**
     * Voir artisan
     */
    public function showArtisan($id)
    {
        $artisan = Artisan::findOrFail($id);

        return view(
            'admin.artisans.show',
            compact('artisan')
        );
    }

    /**
     * Vérifier artisan
     */
    public function verifyArtisan($id)
    {
        $artisan = Artisan::findOrFail($id);

        $artisan->is_verified = true;

        $artisan->save();

        return back()->with(
            'success',
            'Artisan vérifié'
        );
    }

    /**
     * Premium
     */
    public function premiumArtisan($id)
    {
        $artisan = Artisan::findOrFail($id);

        $artisan->is_premium = !$artisan->is_premium;

        $artisan->save();

        return back()->with(
            'success',
            'Statut premium modifié'
        );
    }

    /**
     * Suspension
     */
    public function suspendArtisan($id)
    {
        $artisan = Artisan::findOrFail($id);

        $artisan->is_suspended = !$artisan->is_suspended;

        $artisan->save();

        return back()->with(
            'success',
            'Statut suspension modifié'
        );
    }

    /**
     * Supprimer
     */
    public function deleteArtisan($id)
    {
        $artisan = Artisan::findOrFail($id);

        $artisan->delete();

        return back()->with(
            'success',
            'Artisan supprimé'
        );
    }
}