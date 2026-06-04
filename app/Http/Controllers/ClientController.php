<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\Article;

class ClientController extends Controller
{
    /**
     * HOME
     */
    public function home()
    {
        /**
         * Derniers artisans
         */
        // $artisans = Artisan::latest()
        //     ->take(8)
        //     ->get();

        $artisans = Artisan::visible()

            ->orderByDesc('is_premium')

            ->latest()

            ->take(8)

            ->get();

        /**
         * Derniers articles
         */
        $articles = Article::latest()
            ->take(8)
            ->get();

        /**
         * Secteurs
         */
        $secteurs = [

            'plomberie',
            'electricite',
            'menuiserie',
            'informatique',
            'coiffure',
            'maconnerie',
            'carrelage',
            'peinture',
            'chauffeur',
            'onglerie',

        ];

        return view(
            'home',
            compact(
                'artisans',
                'articles',
                'secteurs'
            )
        );
    }

    /**
     * Recherche globale
     */
    public function search(Request $request)
    {
        // $query = Artisan::query();
        $query = Artisan::visible();

        /**
         * Secteur
         */
        if ($request->secteur) {

            $query->where(
                'secteur',
                $request->secteur
            );
        }

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
                'like',
                '%' . $request->quartier . '%'
            );
        }

        /**
         * Nom artisan
         */
        if ($request->nom) {

            $query->where(
                'fullname',
                'like',
                '%' . $request->nom . '%'
            );
        }

        $artisans = $query
            ->latest()
            ->paginate(12);

        return view(
            'search',
            compact('artisans')
        );
    }

    /**
     * Liste artisans par secteur
     */
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

        return view(
            'secteurs',
            compact(
                'artisans',
                'secteur'
            )
        );
    }

    /**
     * Profil artisan
     */
    public function showArtisan($id)
    {
        // $artisan = Artisan::findOrFail($id);
        $artisan = Artisan::visible()

        ->findOrFail($id);

        /**
         * Articles artisan
         */
        $articles = Article::where(
            'artisan_id',
            $artisan->id
        )
        ->latest()
        ->get();

        return view(
            'artisan-show',
            compact(
                'artisan',
                'articles'
            )
        );
    }

    /**
     * Articles par secteur
     */
    // public function articlesBySecteur($secteur)
    // {
    //     $articles = Article::where(
    //         'secteur',
    //         $secteur
    //     )
    //     ->latest()
    //     ->paginate(12);

    //     return view(
    //         'articles',
    //         compact(
    //             'articles',
    //             'secteur'
    //         )
    //     );
    // }


    public function articlesBySecteur($secteur)
        {
            $articles = Article::where(
                    'secteur',
                    $secteur
                )

                /**
                 * Artisan visible uniquement
                 */
                ->whereHas(
                    'artisan',
                    function ($query) {

                        $query->visible();

                    }
                )

                /**
                 * Premium en priorité
                 */
                ->with('artisan')

                ->orderByDesc(
                    Artisan::select('is_premium')
                        ->whereColumn(
                            'artisans.id',
                            'articles.artisan_id'
                        )
                        ->limit(1)
                )

                ->latest()

                ->paginate(12);

            return view(
                'articles',
                compact(
                    'articles',
                    'secteur'
                )
            );
        }
}