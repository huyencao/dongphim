<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieActor extends Model
{
    protected $table = 'movie_actor';

    protected $fillable =  ['actor_id', 'movie_id'];
}
