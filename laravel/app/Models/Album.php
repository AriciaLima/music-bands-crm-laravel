<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
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
