<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable =  ['name', 'slug', 'info', 'production_year', 'show_times', 'content', 'air_date', 'episodes', 'movie_duration', 'directors', 'status', 'image', 'user_id', 'meta_title', 'meta_description', 'meta_keyword'];

    public function cateMovie()
    {
        return $this->belongsToMany(CateMovie::class);
    }

    public function episode()
    {
        return $this->hasMany(Episode::class);
    }

    public function actor()
    {
        return $this->belongsToMany(Actor::class);
    }
}
