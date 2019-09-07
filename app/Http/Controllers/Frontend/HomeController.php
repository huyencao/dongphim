<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SEO;
use OpenGraph;
use SEOMeta;
use TwitterCard;
use Artesaos\SEOTools\Facades\SEOTools;
use Hash;
use App\Repositories\SettingRepository;
use App\Repositories\CateMovieRepository;
use App\Repositories\MovieRepository;
use App\Repositories\EpisodeRepository;
use App\Repositories\PivotRepository;

class HomeController extends Controller
{
    protected $setting;
    protected $cate_movie;
    protected $pivot;
    protected $movie;
    protected $episode;

    public function __construct(SettingRepository $setting, CateMovieRepository $cate_movie, PivotRepository $pivot, MovieRepository $movie, EpisodeRepository $episode)
    {
        $this->setting = $setting;
        $this->cate_movie = $cate_movie;
        $this->pivot = $pivot;
        $this->movie = $movie;
        $this->episode = $episode;
    }

    public function index()
    {
//        SEO
        $seo = $this->setting->infoSetting();
        if (empty($seo->meta_title)) {
            SEO::setTitle('Động phim');
        } else {
            SEO::setTitle($seo->meta_title);
        }

        SEO::setDescription(empty($seo->meta_description) ? '' : $seo->meta_description);

        SEOMeta::addKeyword(!empty($seo->meta_keyword) ? $seo->meta_keyword : config('seotools.meta.defaults.keywords'));
        SEO::opengraph()->setUrl(url()->current());
        OpenGraph::setTitle(empty($seo->meta_title) ? 'Động phim' : $seo->meta_title);
        OpenGraph::setDescription(empty($seo->meta_description) ? '' : $seo->meta_description);
        OpenGraph::addImage(asset($seo->site_logo));
//        END SEO

        // danh sach phim chieu rap trang chu
        $slug_theaters = 'phim-chieu-rap';
        $movie_theaters = $this->cate_movie->findCateView($slug_theaters);
        $id_theaters = $movie_theaters->id;
        $movieID = $this->pivot->listMovieID($id_theaters);
        $movie_id = array();
        foreach ($movieID as $pin) {
            $movie_id[] = $pin->movie_id;
        }
        $data_movie = $this->movie->listMoviesCate($movie_id);
        // end theaters

        // danh sach phim hoat hinh
        $slug_animated  = 'hoat-hinh-anime';
        $movie_animated = $this->cate_movie->findCateView($slug_animated);
        $id_animated = $movie_animated->id;
        $movieID1 = $this->pivot->listMovieID($id_animated);
        $movie_id1 = array();
        foreach ($movieID1 as $pin) {
            $movie_id1[] = $pin->movie_id;
        }
        $data_animated = $this->movie->listMoviesCate($movie_id1);
        //het phim hoat hinh

        // danh sach tvshow
        $slug_tvshow = 'tv-show';
        $movie_tvshow = $this->cate_movie->findCateView($slug_tvshow);
        $id_tvshow = $movie_tvshow->id;
        $movieID2 = $this->pivot->listMovieID($id_tvshow);
        $movie_id2 = array();
        foreach ($movieID2 as $pin) {
            $movie_id2[] = $pin->movie_id;
        }
        $data_tvshow = $this->movie->listMoviesCate($movie_id2);
        //het ds tvshow

        //danh sach phim de cu
        $data_appoint = $this->movie->listMoviesAppoint();
         //het phim de cu

        // danh sach phim sap chieu
        $data_upcoming = $this->movie->upcomingActiveHome();

        // danh sách phim bo
        $slug_phimbo = 'phim-bo';
        $movie_phimbo = $this->cate_movie->findCateView($slug_phimbo);
        $id_phimbo = $movie_phimbo->id;
        $moviePB = $this->pivot->listMovieID($id_phimbo);
        $movie_pb = array();
        foreach ($moviePB as $pin) {
            $movie_pb[] = $pin->movie_id;
        }

        $data_pb = $this->movie->listMoviesCatePB($movie_pb);
        //  end phimm bo

        // ds phim le
        $slug_phimle = 'phim-le';
        $movie_phimle = $this->cate_movie->findCateView($slug_phimle);
        $id_phimle = $movie_phimle->id;
        $moviePL = $this->pivot->listMovieID($id_phimle);
        $movie_pl = array();
        foreach ($moviePL as $pin) {
            $movie_pl[] = $pin->movie_id;
        }

        $data_pl = $this->movie->listMoviesCatePL($movie_pl);
        //end phim le

        // ds hoat hinh
        $slug_hoathinh = 'hoat-hinh-anime';
        $movie_hoathinh = $this->cate_movie->findCateView($slug_hoathinh);
        $id_hoathinh = $movie_hoathinh->id;
        $movieHH = $this->pivot->listMovieID($id_hoathinh);
        $movie_hh = array();
        foreach ($movieHH as $pin) {
            $movie_hh[] = $pin->movie_id;
        }

        $data_hh = $this->movie->listMoviesCateHH($movie_hh);
//dd($data_hh);
        //het phim hoat hinh

        return view('frontend.home.index', compact('data_movie', 'data_animated', 'data_tvshow', 'data_appoint', 'data_upcoming', 'data_pb', 'data_pl', 'data_hh'));
    }

//    public function result(Request $request)
//    {
//        $result = Movie::where('name', 'LIKE', "%{$request->input('query')}%")->get();
//        return response()->json($result);
//    }

    public function find(Request $request) {
        $movie = Movie::where('name', 'like', '%' . $request->get('q') . '%')->get();
        return response()->json($movie);
    }
}
