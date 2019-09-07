<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable =  ['site_logo', 'site_favicon', 'content', 'website', 'meta_title', 'meta_description', 'meta_keyword'];
}
