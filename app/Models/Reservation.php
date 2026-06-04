<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artisan;

class Reservation extends Model
{
    protected $fillable = [

        'secteur',

        'client_name',
        'client_phone',

        'ville',
        'commune',
        'quartier',

        'reservation_date',

        'description',

        'artisan_id',


        'status',
        'status_admin',
        'status_artisan',

        'admin_note',

        'assigned_at'

    ];

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }
}