<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Banner;

class BannerRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Banner::class;
    }

    public function listBannerAll()
    {
        $data = Banner::orderBy('updated_at', 'DESC')->get();

        return $data;
    }

    public function findBanner($id)
    {
        $data = Banner::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }

    public function infoBanner(){
        $data = Banner::first();

        return $data;
    }

    public function listBannerActive()
    {
        $data = Banner::where('status', 1)->orderBy('updated_at', 'DESC')->get();

        return $data;
    }
}
