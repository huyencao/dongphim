<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episode';

    protected $fillable = ['name', 'slug', 'url', 'name_movie', 'movie_id'];
}
