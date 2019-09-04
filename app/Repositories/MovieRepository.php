<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Movie;

class MovieRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Movie::class;
    }

    public function listMovies()
    {
        $data = Movie::orderBy('updated_at', 'DESC')->get();

        return $data;
    }

    public function findMovie($id)
    {
        $data = Movie::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}