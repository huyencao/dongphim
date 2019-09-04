<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pivot extends Model
{
    protected $table = 'pivot';

    protected $fillable =  ['cate_id', 'movie_id'];
}
