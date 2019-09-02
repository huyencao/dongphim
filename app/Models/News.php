<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable =  ['name', 'slug', 'cate_id', 'description', 'content', 'image', 'status', 'hot', 'user_id', 'meta_title', 'meta_description', 'meta_keyword'];

    public function categoryNews()
    {
        return $this->belongsTo('App\Models\CategoryNews', 'cate_id', 'id');
    }

    public function  user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
