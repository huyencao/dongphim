<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';

    protected $fillable =  ['name', 'slug', 'desc_actor', 'cast', 'image', 'movie_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}
