<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory;

    protected $primaryKey = 'resource_id';

    protected $fillable = ['resource_id', 'name', 'designer', 'collection', 'gender', 'notes', 'description', 'thumbnail', 'image', 'rating', 'year', 'url'];

    public function artist()
    {
        return $this->belongsTo(Actor::class);
    }
}
