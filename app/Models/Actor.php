<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function perfumes()
    {
        return $this->belongsToMany(Perfume::class, 'actor_perfumes', 'actor_id', 'resource_id');
    }
}

