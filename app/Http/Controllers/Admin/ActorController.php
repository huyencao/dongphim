<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actor;
use App\Models\MovieActor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ActorRepository;
use App\Repositories\MovieRepository;
use App\Repositories\MovieActorRepository;
use App\Http\Requests\ActorRequest;
use App\Http\Requests\EditActorRequest;
use Auth;
use Hash;
use File;
use DB;

class ActorController extends Controller
{
    protected $movie;
    protected $actor;
    protected $movie_actor;

    public function __construct(MovieRepository $movie, ActorRepository $actor, MovieActorRepository $movie_actor)
    {
        $this->movie = $movie;
        $this->actor = $actor;
        $this->movie_actor = $movie_actor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_actor = $this->actor->listActorAll();

        return view('backend.actor.list', compact('data_actor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = $this->movie->listMoviesActive();

        return view('backend.actor.add', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActorRequest $request)
    {
        if (!empty($request->file('fImage'))) {
            $file_name = $request->file('fImage')->getClientOriginalName();
            $image = 'uploads/actor/' . time() . '-' . $file_name;
            $request->file('fImage')->move('uploads/actor/', $image);
        }

        $request->merge(
            [
                'image' => !empty($image) == true ? $image : null,
            ]
        );

        $data_actor = $this->actor->create($request->all());

        $actor_id = $data_actor->id;
        $movie_id = $request->movie_id;
        foreach ($movie_id as $item) {
            $movie_actor = new MovieActor;
            $movie_actor->movie_id = $item;
            $movie_actor->actor_id = $actor_id;
            $movie_actor->save();
        }

        return redirect(route('actor.index'))->with([
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
        $detail_actor = $this->actor->findActor($id);
        $movies = $this->movie->listMoviesActive();

        return view('backend.actor.edit', compact('detail_actor', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditActorRequest $request, $id)
    {
//        dd($request->all());
        $actor = $this->actor->findActor($id);

        if (!empty($request->file('fImage'))) {
            $image = $actor->image;
            $file_name      = $request->file('fImage')->getClientOriginalName();
            $thumbnail    = 'uploads/actor/'.time().'-'.$file_name;
            $request->file('fImage')->move('uploads/actor/', $thumbnail);
            if(File::exists($image)){
                File::delete($image);
            }
        }

        if (empty($thumbnail)){
            $image_actor = $actor->image;
        } else
        {
            $image_actor = $thumbnail;
        }

        if (!empty($request->movie_id)) {
            // xoa id phim cu
            $actor_item = $this->movie_actor->findMovieActorDelete($id);
            foreach ($actor_item as $item) {
                $actor_id = $item->id;
                $this->movie_actor->delete($actor_id);
            }

            // them moi lai id phim moi
            $movie_id = $request->movie_id;
            foreach ($movie_id as $item) {
                $movie_actor = new MovieActor;
                $movie_actor->movie_id = $item;
                $movie_actor->actor_id = $id;
                $movie_actor->save();
            }
        }

        $request->merge(
            [
                'image' => $image_actor
            ]
        );

        $this->actor->update($id, $request->all());


        return redirect()->route('actor.index')->with([
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
        $data = $this->actor->findActor($id);
        if (isset($data)) {
            $image = $data->image;
            if (File::exists($image)) {
                File::delete($image);
            }
            $this->actor->delete($id);

            $actor_item = $this->movie_actor->findMovieActorDelete($id);
            foreach ($actor_item as $item) {
                $actor_id = $item->id;
                $this->movie_actor->delete($actor_id);
            }
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
                $actor = Actor::find($id);

                if (File::exists($actor->image)) {
                    File::delete($actor->image);
                }

                Actor::where("id", $id)->delete();

                $actor_item = $this->movie_actor->findMovieActorDelete($id);
                foreach ($actor_item as $item) {
                    $actor_id = $item->id;
                    $this->movie_actor->delete($actor_id);
                }
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
