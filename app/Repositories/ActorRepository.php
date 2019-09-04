<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Actor;

class ActorRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Actor::class;
    }

    public function listActorAll()
    {
        $data = Actor::orderBy('updated_at', 'DESC')->get();

        return $data;
    }

    public function findActor($id)
    {
        $data = Actor::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}
