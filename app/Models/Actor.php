<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';

    protected $fillable =  ['name', 'slug', 'desc_actor', 'image'];

    public function movie()
    {
        return $this->belongsToMany(Movie::class);
    }
}
