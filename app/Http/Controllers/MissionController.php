<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    /**
     * Liste missions artisan
     */
    public function index()
    {
        $artisan = Auth::guard('artisan')->user();

        $missions = Reservation::where(
                'artisan_id',
                $artisan->id
            )

            ->latest()

            ->paginate(10);

        return view(
            'artisan.missions.index',
            compact('missions')
        );
    }

    /**
     * Détail mission
     */
    public function show($id)
    {
        $artisan = Auth::guard('artisan')->user();

        $mission = Reservation::where(
                'artisan_id',
                $artisan->id
            )

            ->findOrFail($id);

        return view(
            'artisan.missions.show',
            compact('mission')
        );
    }

    /**
     * Modifier statut mission
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([

            'status' => 'required'

        ]);

        $artisan = Auth::guard('artisan')->user();

        $mission = Reservation::where(
                'artisan_id',
                $artisan->id
            )

            ->findOrFail($id);

        $mission->status_artisan  = $request->status;

        $mission->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Statut mission mis à jour.'
            );
    }
}