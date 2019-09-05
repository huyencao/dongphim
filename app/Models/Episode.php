<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episode';

    protected $fillable = ['name', 'url', 'slug', 'type', 'image', 'name_movie', 'movie_id', 'meta_title', 'meta_description', 'meta_keyword'];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}
