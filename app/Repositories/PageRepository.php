<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\About;

class PageRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\About::class;
    }

    public function listAbout()
    {
        $data = About::first();

        return $data;
    }

//    public function listAboutActive()
//    {
//        $data = About::get();
//
//        return $data;
//    }
}
