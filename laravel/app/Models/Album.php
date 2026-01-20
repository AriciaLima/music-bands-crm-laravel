<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'band_id',
        'name',
        'image',
        'release_date',
    ];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
