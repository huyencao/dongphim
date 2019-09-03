<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable =  ['name', 'slug', 'info', 'view', 'production_year', 'show_times', 'content', 'air_date', 'episodes', 'movie_duration', 'directors', 'actor', 'cate_id', 'status', 'image', 'user_id', 'meta_title', 'meta_description', 'meta_keyword'];

    public function cateMovie()
    {
        return $this->belongsToMany(CateMovie::class);
    }
}
