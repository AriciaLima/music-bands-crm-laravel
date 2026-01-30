<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'band_id',
        'name',
        'image',
        'release_date',
    ];

    public function getImageUrlAttribute()
    {
        if (! $this->image) {
            return null;
        }

        // Se for uma URL completa (http ou https), retorna como está
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        // Caso contrário, é um arquivo local no storage
        return asset('storage/'.$this->image);
    }

    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function getReleaseDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
