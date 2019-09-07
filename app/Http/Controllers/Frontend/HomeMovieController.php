<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CateMovieRepository;
use App\Repositories\PivotRepository;
use App\Repositories\MovieRepository;
use App\Repositories\EpisodeRepository;
use SEO;
use OpenGraph;
use SEOMeta;
use TwitterCard;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeMovieController extends Controller
{
    protected $cate_movie;
    protected $pivot;
    protected $movie;
    protected $episode;

    public function __construct(CateMovieRepository $cate_movie, PivotRepository $pivot, MovieRepository $movie, EpisodeRepository $episode)
    {
        $this->cate_movie = $cate_movie;
        $this->pivot = $pivot;
        $this->movie = $movie;
        $this->episode = $episode;
    }

    public function movies($slug = '')
    {
//        $data = explode("-", $id);
//        $catID = end($data);
        $cat = $this->cate_movie->findCateHome($slug);

        //seo
        if (empty($cat->meta_title)) {
            SEO::setTitle($cat->name);
        } else {
            SEO::setTitle($cat->meta_title);
        }

        SEO::setDescription(empty($cat->meta_description) ? '' : $cat->meta_description);

        SEOMeta::addKeyword(!empty($cat->meta_keyword) ? $cat->meta_keyword : config('seotools.meta.defaults.keywords'));
        SEO::opengraph()->setUrl(url()->current());
        OpenGraph::setTitle(empty($cat->meta_title) ? $cat->name : $cat->meta_title);
        OpenGraph::setDescription(empty($cat->meta_description) ? '' : $cat->meta_description);
        OpenGraph::addImage(asset($cat->image));
//        end seo

        $cat_id = $cat->id;

        $movieID = $this->pivot->listMovieID($cat_id);
        $movie_id = array();
        foreach ($movieID as $pin) {
            $movie_id[] = $pin->movie_id;
        }

        if ($slug == 'phim-de-cu') {
            $data_movie = $this->movie->listMoviesAppointCat();
        } elseif ($slug == 'phim-sap-chieu') {
            $data_movie = $this->movie->listMoviesUpcomingCat();
        } else {
            $data_movie = $this->movie->listMoviesCate($movie_id);

        }

        return view('frontend.home.list_movie', compact('data_movie', 'cat'));
    }

    public function detail($slug = '', $id)
    {
        $data = explode("-", $id);
        $movieID = end($data);
        $movie_detail = $this->movie->findMovie($movieID);

        // list episode movie
        $list_episode = $this->episode->listMovieID($movieID);

        //list trailer movie
        $movie_trailer = $this->episode->findMovieTrailer($movieID);
        //list movies interested(cùng user)
        $userID = $movie_detail->user_id;
        $list_interested = $this->movie->listMoviesUser($userID);

        //seo
        if (empty($movie_detail->meta_title)) {
            SEO::setTitle($movie_detail->name);
        } else {
            SEO::setTitle($movie_detail->meta_title);
        }

        SEO::setDescription(empty($movie_detail->meta_description) ? '' : $movie_detail->meta_description);

        SEOMeta::addKeyword(!empty($movie_detail->meta_keyword) ? $movie_detail->meta_keyword : config('seotools.meta.defaults.keywords'));
        SEO::opengraph()->setUrl(url()->current());
        OpenGraph::setTitle(empty($movie_detail->meta_title) ? $movie_detail->name : $movie_detail->meta_title);
        OpenGraph::setDescription(empty($movie_detail->meta_description) ? '' : $movie_detail->meta_description);
        OpenGraph::addImage(asset($movie_detail->image));
//        end seo

        return view('frontend.home.film_detail', compact('movie_detail', 'movie_trailer', 'list_interested', 'list_episode'));
    }

    public function video($slug = '', $id)
    {
        $data = explode("-", $id);
        $episodeID = end($data);

        $episode_detail = $this->episode->findEpisode($episodeID);
        $movie_id = $episode_detail->movie_id;
        $movie = $this->movie->findMovie($movie_id);

        $list_episode = $this->episode->listMovieID($movie_id);


        $userID = $movie->user_id;
        $list_interested = $this->movie->listMoviesUser($userID);

        //seo
        if (empty($episode_detail->meta_title)) {
            SEO::setTitle($episode_detail->name);
        } else {
            SEO::setTitle($episode_detail->meta_title);
        }

        SEO::setDescription(empty($episode_detail->meta_description) ? '' : $episode_detail->meta_description);

        SEOMeta::addKeyword(!empty($episode_detail->meta_keyword) ? $episode_detail->meta_keyword : 'Video film');
        SEO::opengraph()->setUrl(url()->current());
        OpenGraph::setTitle(empty($episode_detail->meta_title) ? $episode_detail->name : $episode_detail->meta_title);
        OpenGraph::setDescription(empty($episode_detail->meta_description) ? '' : $episode_detail->meta_description);
        OpenGraph::addImage(asset($episode_detail->image));
        //end seo

        return view('frontend.home.video', compact('episode_detail', 'list_interested', 'list_episode'));
    }
}
