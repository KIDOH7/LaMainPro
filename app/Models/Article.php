<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [

        'artisan_id',

        'title',
        'description',
        'price',

        'image1',
        'image2',
        'image3',
        'image4',

        'is_available',

    ];

    /**
     * Artisan
     */
    public function artisan()
    {
        return $this->belongsTo(
            Artisan::class
        );
    }
}