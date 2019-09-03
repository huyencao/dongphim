<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateMovie extends Model
{
    protected $table = 'cate_movie';

    protected $fillable = ['name', 'slug', 'parent_id', 'status', 'image', 'meta_title', 'meta_description', 'meta_keyword'];

    public function movie()
    {
        return $this->belongsToMany(Movie::class);
    }
}
