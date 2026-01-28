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

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
