<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Liste services artisan
     */
    public function index()
    {
        $artisan = auth('artisan')->user();

        $articles = Article::where(
            'artisan_id',
            $artisan->id
        )
        ->latest()
        ->get();

        return view(
            'artisan.services.index',
            compact('articles')
        );
    }

    /**
 * Form ajout service
 */
    public function create()
    {
        return view(
            'artisan.services.create'
        );
    }

    /**
 * Ajouter service
 */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'price' => 'required',

            'image1' => 'required|image',

        ]);

        $artisan = auth('artisan')->user();

        /**
         * Upload images
         */
        $image1 = $request->file('image1')
            ->store('articles', 'public');

        $image2 = $request->file('image2')
            ? $request->file('image2')
                ->store('articles', 'public')
            : null;

        $image3 = $request->file('image3')
            ? $request->file('image3')
                ->store('articles', 'public')
            : null;

        $image4 = $request->file('image4')
            ? $request->file('image4')
                ->store('articles', 'public')
            : null;

        /**
         * Create
         */
        Article::create([

            'artisan_id' => $artisan->id,

            'title' => $request->title,

            'description' => $request->description,

            'price' => $request->price,

            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,

            'is_available' => true,

        ]);

        return redirect(
            '/artisan/dashboard/services'
        )
        ->with(
            'success',
            'Service ajouté avec succès'
        );
    }




    /**
 * Form modification service
 */
    public function edit($id)
    {
       $artisan = auth('artisan')->user();

        $article = Article::where(
            'artisan_id',
            $artisan->id
        )
        ->findOrFail($id);

        return view(
            'artisan.services.edit',
            compact('article')
        );
    }


    /**
 * Modifier service
 */
    public function update(Request $request, $id)
    {
       $artisan = auth('artisan')->user();

        $article = Article::where(
            'artisan_id',
            $artisan->id
        )
        ->findOrFail($id);

        /**
         * Validation
         */
        $request->validate([

            'title' => 'required',

            'price' => 'required',

        ]);

        /**
         * Update images
         */
        if ($request->hasFile('image1')) {

            $article->image1 = $request
                ->file('image1')
                ->store('articles', 'public');
        }

        if ($request->hasFile('image2')) {

            $article->image2 = $request
                ->file('image2')
                ->store('articles', 'public');
        }

        if ($request->hasFile('image3')) {

            $article->image3 = $request
                ->file('image3')
                ->store('articles', 'public');
        }

        if ($request->hasFile('image4')) {

            $article->image4 = $request
                ->file('image4')
                ->store('articles', 'public');
        }

        /**
         * Update
         */
        $article->title = $request->title;

        $article->description = $request->description;

        $article->price = $request->price;

        $article->is_available = $request->is_available;

        $article->save();

        return redirect(
            '/artisan/dashboard/services'
        )
        ->with(
            'success',
            'Service modifié avec succès'
        );
    }


    /**
     * Supprimer service
     */
    public function destroy($id)
    {
       $artisan = auth('artisan')->user();

        $article = Article::where(
            'artisan_id',
            $artisan->id
        )
        ->findOrFail($id);

        $article->delete();

        return back()->with(
            'success',
            'Service supprimé'
        );
    }
}