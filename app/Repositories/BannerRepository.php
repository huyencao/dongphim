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

//    public function bannerHome(){
//        $data = Banner::where('type', 1)->first();
//
//        return $data;
//    }
//
//    public function bannerProduct(){
//        $data = Banner::where('type', 2)->first();
//
//        return $data;
//    }
}
