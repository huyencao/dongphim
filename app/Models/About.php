<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';

    protected $fillable =  ['name', 'content', 'status', 'meta_title', 'meta_description', 'meta_keyword'];
}
