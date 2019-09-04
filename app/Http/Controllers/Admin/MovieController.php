<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Pivot;
use App\Repositories\MovieRepository;
use App\Repositories\CateMovieRepository;
use App\Repositories\PivotRepository;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\EditCateMovieRequest;
use Auth;
use Hash;
use File;
use DB;

class MovieController extends Controller
{
    protected $movie;
    protected $cate_movie;
    protected $pivot;

    public function __construct(MovieRepository $movie, CateMovieRepository $cate_movie, PivotRepository $pivot)
    {
        $this->movie = $movie;
        $this->cate_movie = $cate_movie;
        $this->pivot = $pivot;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_movie = $this->movie->listMovies();

        return view('backend.movie.index', compact('list_movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_movie = $this->cate_movie->listCateMovie();

        return view('backend.movie.add', compact('cate_movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        if (!empty($request->file('fImage'))) {
            $file_name = $request->file('fImage')->getClientOriginalName();
            $image = 'uploads/movie/' . time() . '-' . $file_name;
            $request->file('fImage')->move('uploads/movie/', $image);
        }

        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
                'image' => !empty($image) == true ? $image : null,
            ]
        );

        $data_movie = $this->movie->create($request->all());

        $movie_id = $data_movie->id;
        $cate_id = $request->cate_id;

        foreach ($cate_id as $item) {
            $pivot = new Pivot;
            $pivot->cate_id = $item;
            $pivot->movie_id = $movie_id;
            $pivot->save();
        }

        return redirect(route('movie.index'))->with([
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
        $detail_movie = $this->movie->findMovie($id);

        $movie_id = DB::table('pivot')->where('movie_id', $id)->get();
        $cateID = $movie_id->pluck('cate_id')->toArray();
        $cates = DB::table('cate_movie')->whereIn('id', $cateID)->get();

        $cate_movie = $this->cate_movie->listCateMovie();

       return view('backend.movie.edit', compact('detail_movie', 'cate_movie', 'cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->movie->findMovie($id);
        if (isset($data)) {
            $image = $data->image;
            if(File::exists($image)){
                File::delete($image);
            }
            $this->movie->delete($id);

            $pivot_item = $this->pivot->findMovieDelete($id);
            foreach ($pivot_item as $item) {
                $pivot_id = $item->id;
                $this->pivot->delete($pivot_id);
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
                $movie = Movie::find($id);

                if(File::exists($movie->image)){
                    File::delete($movie->image);
                }

                Movie::where("id", $id)->delete();

                $pivot_item = $this->pivot->findMovieDelete($id);
                foreach ($pivot_item as $item) {
                    $pivot_id = $item->id;
                    $this->pivot->delete($pivot_id);
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
