<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'designer', 'collection', 'gender', 'notes', 'description', 'thumbnail', 'image', 'rating', 'year', 'url'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
