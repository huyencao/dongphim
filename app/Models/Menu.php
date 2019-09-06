<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable =  ['name', 'slug', 'parent_id', 'status', 'position', 'cate_id'];

    public function cateMovie()
    {
        return $this->belongsTo(CateMovie::class, 'cate_id', 'id');
    }
}
