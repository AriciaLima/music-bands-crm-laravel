<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getReleaseDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
