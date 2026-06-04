<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ArtisanAuthController extends Controller
{
    
    /**
     * Afficher le formulaire
     */
    public function showRegister()
    {
        return view('auth.artisan_register');
    }

    /**
     * Enregistrer artisan
     */
    public function register(Request $request)
    {
        $request->validate([

            'fullname' => 'required|string|max:255',

            'phone' => 'required|unique:artisans',

            'commune' => 'required',

            'quartier' => 'required',

            'secteur' => 'required',

            'email' => 'nullable|email',

            'experience' => 'nullable|integer|min:0|max:60',

            'id_card_front' => 'required|image',

            'id_card_back' => 'required|image',

            'profile_photo' => 'required|image',

            'password' => 'required|min:6|confirmed',
        ]);

        /**
         * Upload images
         */
        $front = $request->file('id_card_front')
            ->store('artisans/cards', 'public');

        $back = $request->file('id_card_back')
            ->store('artisans/cards', 'public');

        $profile = $request->file('profile_photo')
            ->store('artisans/profiles', 'public');

        /**
         * Save artisan
         */
        $artisan = Artisan::create([

            'fullname' => $request->fullname,

            'phone' => $request->phone,

            'city' => 'Abidjan',

            'commune' => $request->commune,

            'quartier' => $request->quartier,

            'secteur' => $request->secteur,

            'email' => $request->email,

            'experience' => $request->experience,

            'description' => $request->description,

            'id_card_front' => $front,

            'id_card_back' => $back,

            'profile_photo' => $profile,

            'password' => Hash::make($request->password),
        ]);

        /**
             * Connexion automatique
             */
            Auth::guard('artisan')->login($artisan);

            /**
             * Redirection dashboard
             */
            return redirect('/artisan/dashboard');
        
    }

    /**
     * Formulaire connexion
     */
    public function showLogin()
    {
        return view('auth.artisan_login');
    }

    /**
     * Connexion artisan
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([

            'phone' => ['required'],
            'password' => ['required'],

        ]);

        /**
         * Tentative connexion
         */
        if (
            Auth::guard('artisan')->attempt($credentials)
        ) {

            $request->session()->regenerate();

            return redirect('/artisan/dashboard');
        }

        return back()->withErrors([

            'phone' => 'Numéro ou mot de passe incorrect.'

        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('artisan')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/artisan/login');
    }

    /**
 * Afficher profil
 */
    public function profile()
    {
        $artisan = Auth::guard('artisan')->user();

        return view(
            'artisan.profile',
            compact('artisan')
        );
    }

    /**
 * Modifier profil
 */
    public function updateProfile(Request $request)
    {
        $artisan = Auth::guard('artisan')->user();

        $request->validate([

            'fullname' => 'required',

            'phone' => 'required',

            'commune' => 'required',

            'quartier' => 'required',

            'secteur' => 'required',

        ]);

        /**
         * Upload nouvelle photo
         */
        if ($request->hasFile('profile_photo')) {

            $photo = $request->file('profile_photo')
                ->store('artisans/profiles', 'public');

            $artisan->profile_photo = $photo;
        }

        /**
         * Mise à jour
         */
        $artisan->update([

            'fullname' => $request->fullname,

            'phone' => $request->phone,

            'commune' => $request->commune,

            'quartier' => $request->quartier,

            'secteur' => $request->secteur,

            'experience' => $request->experience,

            'description' => $request->description,

        ]);

        $artisan->save();

        return back()->with(
            'success',
            'Profil mis à jour avec succès.'
        );
    }

    /**
 * Afficher formulaire password
 */
    public function showPasswordForm()
    {
        return view('artisan.password');
    }


        /**
     * Modifier mot de passe
     */
    public function updatePassword(Request $request)
    {
        $request->validate([

            'current_password' => 'required',

            'new_password' => 'required|min:6|confirmed',

        ]);

        $artisan = Auth::guard('artisan')->user();

        /**
         * Vérifie ancien password
         */
        if (
            !Hash::check(
                $request->current_password,
                $artisan->password
            )
        ) {

            return back()->withErrors([

                'current_password' => 'Ancien mot de passe incorrect.'

            ]);
        }

        /**
         * Nouveau password
         */
        $artisan->password = Hash::make(
            $request->new_password
        );

        $artisan->save();

        return back()->with(
            'success',
            'Mot de passe modifié avec succès.'
        );
    }
}
