<?php
namespace App\Repositories;

use App\Models\CateMovie;
use App\Repositories\EloquentRepository;

class CateMovieRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\CateMovie::class;
    }

    public function listCateMovie()
    {
        $data = CateMovie::orderBy('updated_at', 'DESC')->get();

        return $data;
    }

    public function listCateMovieActive()
    {
        $data = CateMovie::where('status', 1)->orderBy('id', 'ASC')->get();

        return $data;
    }

    public function listCateParent()
    {
        $data = CateMovie::where('parent_id', 0)->where('status', 1)->get();

        return $data;
    }

    // TODO: find cate movie id
    public function findCate($id)
    {
        $data = CateMovie::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }

    // TODO : find cate movie home view
    public function findCateHome($slug)
    {
        $cat = CateMovie::where('slug', $slug)->first();

        return $cat;
    }

    public function findCateView($slug = '')
    {
        $cate_theaters = CateMovie::where('slug', $slug)->first();

        return $cate_theaters;
    }

}
