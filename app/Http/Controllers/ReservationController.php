<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Artisan;

class ReservationController extends Controller
{
    /**
     * Formulaire réservation
     */
    public function create()
    {
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
            'Onglerie'

        ];

        /**
         * Communes Abidjan
         */
        $communes = [

            'Abobo',
            'Adjamé',
            'Attécoubé',
            'Cocody',
            'Koumassi',
            'Marcory',
            'Plateau',
            'Port-Bouët',
            'Treichville',
            'Yopougon',
            'Bingerville',
            'Songon',
            'Anyama'

        ];

        return view(
            'reservation',
            compact(
                'secteurs',
                'communes'
            )
        );
    }

    /**
     * Enregistrer réservation
     */
    public function store(Request $request)
    {
        $request->validate([

            'secteur'           => 'required',
            'client_name'       => 'required',
            'client_phone'      => 'required',
            'commune'           => 'required',
            'quartier'          => 'required',
            'reservation_date'  => 'required|date',
            'description'       => 'required',

        ]);

        Reservation::create([

            'secteur'          => $request->secteur,

            'client_name'      => $request->client_name,

            'client_phone'     => $request->client_phone,

            'ville'            => 'Abidjan',

            'commune'          => $request->commune,

            'quartier'         => $request->quartier,

            'reservation_date' => $request->reservation_date,

            'description'      => $request->description,

            /**
             * Gestion réservation
             */
            'status'           => 'en_attente',

            'artisan_id'       => null,

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Votre demande a été envoyée avec succès.'
            );
    }

    /**
     * Liste réservations ADMIN
     */
    public function index()
    {
        $reservations = Reservation::latest()->paginate(20);

        return view(
            'admin.reservations.index',
            compact('reservations')
        );
    }

    /**
     * Détail réservation ADMIN
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        /**
         * Artisans du même secteur
         */
        $artisans = Artisan::visible()

            ->where(
                'secteur',
                $reservation->secteur
            )

            ->orderByDesc('is_premium')

            ->latest()

            ->get();

        return view(
            'admin.reservations.show',
            compact(
                'reservation',
                'artisans'
            )
        );
    }

    /**
     * Affecter artisan
     */
    public function assignArtisan(Request $request, $id)
    {
        $request->validate([

            'artisan_id' => 'required'

        ]);

        $reservation = Reservation::findOrFail($id);

        $reservation->artisan_id = $request->artisan_id;

        $reservation->status_admin  = 'affectee';

        $reservation->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Artisan affecté avec succès.'
            );
    }

    /**
     * Modifier statut réservation
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([

            'status' => 'required'

        ]);

        $reservation = Reservation::findOrFail($id);

        $reservation->status = $request->status;

        $reservation->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Statut mis à jour.'
            );
    }

    /**
     * Supprimer réservation
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Réservation supprimée.'
            );
    }
}