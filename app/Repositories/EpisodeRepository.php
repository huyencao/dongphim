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

    public function findMovieTrailer($id)
    {
        $data = Episode::with('movie')->where('movie_id', $id)->where('status', 1)->where('type', 1)->orderBy('updated_at', 'DESC')->get();

        return $data;
    }

    public function listMovieID($movieID)
    {
        $data = Episode::with('movie')->where('movie_id', $movieID)->where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(14);

        return $data;
    }
}
