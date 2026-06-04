<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
      /**
     * Liste secteurs
     */
    // public function secteurs()
    // {
    //     $secteurs = [

    //         'Ménage',
    //         'Plomberie',
    //         'Électricité',
    //         'Informatique',
    //         'Menuiserie',
    //         'Ferronnerie',
    //         'Carrelage',
    //         'Peinture',
    //         'Coiffure',
    //         'Chauffeur',
    //         'Maçonnerie',
    //         'Onglerie',

    //     ];

    //     return view(
    //         'secteurs',
    //         compact('secteurs')
    //     );
    // }

    public function secteur(
    Request $request,
    $secteur
)
{
    $query = Artisan::where(
        'secteur',
        $secteur
    );

    /**
     * Filtre commune
     */
    if ($request->commune) {

        $query->where(
            'commune',
            $request->commune
        );
    }

    /**
     * Filtre quartier
     */
    if ($request->quartier) {

        $query->where(
            'quartier',
            'like',
            '%' . $request->quartier . '%'
        );
    }

    $artisans = $query
        ->latest()
        ->paginate(12);

    /**
     * Tous les secteurs
     */
    $secteurs = [

        'Plomberie',
        'Electricité',
        'Menuiserie',
        'Informatique',
        'Coiffure',
        'Maçonnerie',
        'Carrelage',
        'Peinture',
        'Chauffeur',
        'Onglerie',

    ];

    return view(
        'client.secteur',
        compact(
            'artisans',
            'secteur',
            'secteurs'
        )
    );
}

    /**
     * Artisans par secteur
     */
   public function bySecteur(Request $request, $secteur)
    {
        $query = Artisan::visible()

            ->where(
                'secteur',
                $secteur
            );

        /**
         * Commune
         */
        if ($request->commune) {

            $query->where(
                'commune',
                $request->commune
            );
        }

        /**
         * Quartier
         */
        if ($request->quartier) {

            $query->where(
                'quartier',
                $request->quartier
            );
        }

        $artisans = $query

            ->orderByDesc('is_premium')

            ->latest()

            ->get();

        return view(
            'artisans-by-secteur',
            compact(
                'artisans',
                'secteur'
            )
        );
    }

        /**
        * Afficher profil artisan
        */
    public function show($id)
    {
        $artisan = Artisan::findOrFail($id);

        $articles = $artisan->articles()
            ->where('is_available', true)
            ->latest()
            ->get();

        return view(
            'artisan-show',
            compact('artisan', 'articles')
        );
    }
}
