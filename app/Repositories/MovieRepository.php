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

    public function listMoviesActive()
    {
        $data = Movie::where('status', 1)->orderBy('name', 'ASC')->get();

        return $data;
    }

    public function findMovie($id)
    {
        $data = Movie::with('episode')->find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }

    public function listMoviesCate($movie_id)
    {
        $movies = Movie::whereIn('id', $movie_id)->orderBy('updated_at', 'DESC')->paginate(20);

        return $movies;
    }

    public function listMoviesCateAPI($movie_api)
    {
        $movies = Movie::whereIn('id', $movie_api)->orderBy('updated_at', 'DESC')->limit(4)->get();

        return $movies;
    }

    public function listMoviesUser($user_id)
    {
        $data = Movie::where('status', 1)->where('user_id', $user_id)->get();

        return $data;
    }

    public function listMoviesAppoint()
    {
        $data = Movie::where('appoint', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(8);

        return $data;
    }

    public function listMoviesAppointCat()
    {
        $data = Movie::where('appoint', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(20);

        return $data;
    }

    public function upcomingActiveHome()
    {
        $data = Movie::where('upcoming', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(4);

        return $data;
    }


    public function listMoviesUpcomingCat()
    {
        $data = Movie::where('upcoming', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(20);

        return $data;
    }
}