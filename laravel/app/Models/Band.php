<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre',
        'formed_year',
        'image',
        'description',
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

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
