<?php

namespace App\Http\Controllers\Admin;

use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;
use App\Http\Requests\EditEpisodeRequest;
use App\Repositories\EpisodeRepository;
use App\Repositories\MovieRepository;
use Ixudra\Curl\Facades\Curl;
use Hash;
use File;

class EpisodeController extends Controller
{
    protected $episode;
    protected $movie;

    public function __construct(EpisodeRepository $episode, MovieRepository $movie)
    {
        $this->episode = $episode;
        $this->movie = $movie;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = $this->episode->listEpisodeAll();

        return view('backend.episode.list', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = $this->movie->listMoviesActive();

        return view('backend.episode.add', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(EpisodeRequest $request)
    {
//        api video youtube: get count view link url
        $url = $request->url;
        parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
        $video_ID = $my_array_of_vars['v'];
        $app_key = 'AIzaSyBtw9pLrJjiTV6VdSyc3Z5LofS_bXIfWT4';
        $api_response = curl_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$video_ID.'&fields=items/statistics&key='.$app_key);
        $api_response_decoded = json_decode($api_response, true);
        $view = $api_response_decoded['items'][0]['statistics']['viewCount'];

        $movie = $this->movie->findMovie($request->movie_id);
        $name_movie = $movie->name;

        if (!empty($request->file('fImage'))) {
            $file_name = $request->file('fImage')->getClientOriginalName();
            $image = 'uploads/video/' . time() . '-' . $file_name;
            $request->file('fImage')->move('uploads/video/', $image);
        }

        $request->merge(
            [
                'image' => !empty($image) == true ? $image : null,
                'name_movie' => $name_movie,
//                'view' => $view
            ]
        );

        $this->episode->create($request->all());

        return redirect(route('episode.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm thành công !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->episode->findEpisode($id);
        $movies = $this->movie->listMoviesActive();

        return view('backend.episode.edit', compact('data', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEpisodeRequest $request, $id)
    {
//        dd($request->all());
        $episode = $this->episode->findEpisode($id);

        if (!empty($request->file('fImage'))) {
            $image = $episode->image;
            $file_name      = $request->file('fImage')->getClientOriginalName();
            $thumbnail    = 'uploads/video/'.time().'-'.$file_name;
            $request->file('fImage')->move('uploads/video/', $thumbnail);
            if(File::exists($image)){
                File::delete($image);
            }
        }

        if (empty($thumbnail)){
            $image_episode = $episode->image;
        } else
        {
            $image_episode = $thumbnail;
        }

        $movie = $this->movie->findMovie($request->movie_id);
        $name_movie = $movie->name;

        $request->merge(
            [
                'image' => $image_episode,
                'name_movie' => $name_movie,
            ]
        );

        $this->episode->update($id, $request->all());

        return redirect()->route('episode.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Cập nhật thành công !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = $this->episode->findEpisode($id);
        if (isset($episode)) {
            $image = $episode->image;
            if(File::exists($image)){
                File::delete($image);
            }
            $this->episode->delete($id);
        }

        return back()->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công !'
        ]);
    }

    public function deleteAll(Request $request)
    {
        if (isset($request->chkItem)) {
            $checked = $request->chkItem;

            foreach ($checked as $id) {
                $episode = Episode::find($id);

                if(File::exists($episode->image)){
                    File::delete($episode->image);
                }

                Episode::where("id", $id)->delete();
            }

            return back()->with([
                'flash_level' => 'success',
                'flash_message' => 'Xóa thành công !'
            ]);
        } else {
            return back()->with([
                'flash_error' => 'Bạn chưa chọn dữ liệu cần xoá !'
            ]);
        }
    }
}
