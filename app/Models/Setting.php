<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable =  ['site_logo', 'site_favicon', 'site_address', 'site_phone', 'site_hotline', 'site_email', 'user_id', 'meta_title', 'meta_description', 'meta_keyword', 'site_coppyright', 'code_maps', 'google_analytics', 'site_fanpage'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
