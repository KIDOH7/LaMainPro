<?php

namespace App\Http\Controllers;

use App\Models\Artisan;

class HomeController extends Controller
{
    public function index()
    {
        /**
         * Secteurs
         */
        $secteurs = [

            'Ménage',
            'Plomberie',
            'Électricité',
            'Informatique',
            'Menuiserie',
            'Ferronnerie',
            'Carrelage',
            'Peinture',
            'Coiffure',
            'Chauffeur',
            'Maçonnerie',
            'Onglerie',

        ];

        /**
         * Artisans récents
         * Plus tard :
         * -> premium d'abord
         */
        $artisans = Artisan::latest()
            ->take(8)
            ->get();

        return view(
            'home',
            compact(
                'secteurs',
                'artisans'
            )
        );
    }
}