<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Pivot;

class PivotRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Pivot::class;
    }

    public function findMovieDelete($id)
    {
        $data = Pivot::where('movie_id', $id)->get();

        return $data;
    }

    public function listProductID($cat)
    {
        $movieID = Pivot::where('cate_id', $cat)->select('movie_id')->orderBy('updated_at', 'DESC')->get();

        return $movieID;
    }
}