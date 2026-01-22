<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
        'name',
        'genre',
        'formed_year',
        'image',
        'description',
    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
