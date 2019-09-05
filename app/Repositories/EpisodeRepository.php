<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Episode;

class EpisodeRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Episode::class;
    }

    public function listEpisodeAll()
    {
        $data = Episode::with('movie')->orderBy('updated_at', 'DESC')->get();

        return $data;
    }

    public function findEpisode($id)
    {
        $data = Episode::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}
