<?php
namespace App\Repositories;

use App\Models\MovieActor;
use App\Repositories\EloquentRepository;
use App\Models\Actor;

class MovieActorRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\MovieActor::class;
    }

    public function findMovieActorDelete($id)
    {
        $data = MovieActor::where('actor_id', $id)->get();

        return $data;
    }
}
