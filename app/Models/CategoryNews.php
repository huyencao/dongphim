<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = 'cate_news';

    protected $fillable = ['name', 'slug', 'status', 'meta_title', 'meta_description', 'meta_keyword'];

    public function news()
    {
        return $this->hasMany(News::class, 'id', 'id');
    }
}
