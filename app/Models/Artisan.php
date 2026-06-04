<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Artisan extends Authenticatable
{
    protected $fillable = [

        'fullname',
        'phone',
        'city',
        'commune',
        'quartier',
        'secteur',
        'email',
        'experience',
        'description',
        'id_card_front',
        'id_card_back',
        'profile_photo',
        'password',
    ];
    
    protected $hidden = [
        'password',
    ];

    /**
 * Articles artisan
 */
    public function articles()
    {
        return $this->hasMany(
            Article::class
        );
    }

    public function scopeVisible($query)
    {
        return $query

            ->where('is_verified', true)

            ->where('is_suspended', false);
    }
}
