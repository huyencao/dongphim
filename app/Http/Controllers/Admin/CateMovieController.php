<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateMovie;
use App\Repositories\CateMovieRepository;
use App\Http\Requests\CateMovieRequest;
use App\Http\Requests\EditCateMovieRequest;
use File;

class CateMovieController extends Controller
{
    protected $cate_movie;

    public function __construct(CateMovieRepository $cate_movie)
    {
        return $this->cate_movie = $cate_movie;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->cate_movie->listCateMovie();

        return view('backend.cate-movie.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_parent = $this->cate_movie->listCateParent();

        return view('backend.cate-movie.add', compact('cate_parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateMovieRequest $request)
    {
        if (!empty($request->file('fImage'))) {
            $file_name = $request->file('fImage')->getClientOriginalName();
            $image = 'uploads/cate-movie/' . time() . '-' . $file_name;
            $request->file('fImage')->move('uploads/cate-movie/', $image);
        }

        $request->merge(
            [
                'image' => $image
            ]
        );


        $this->cate_movie->create($request->all());

        return redirect(route('cate-movie.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm thành công !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->cate_movie->findCate($id);
        $cate_parent = $this->cate_movie->listCateParent();

        return view('backend.cate-movie.edit', compact('data', 'cate_parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCateMovieRequest $request, $id)
    {
        $data = $this->cate_movie->findCate($id);

        if (!empty($request->file('fImage'))) {
            $image = $data->thumbnail;
            $file_name      = $request->file('fImage')->getClientOriginalName();
            $thumbnail    = 'uploads/cate-movie/'.time().'-'.$file_name;
            $request->file('fImage')->move('uploads/cate-movie/', $thumbnail);
            if(File::exists($image)){
                File::delete($image);
            }
        }

        if (empty($thumbnail)){
            $image_cate = $data->image;
        } else
        {
            $image_cate = $thumbnail;
        }

        $request->merge(
            [
                'image' => $image_cate
            ]
        );

        $this->cate_movie->update($id, $request->all());

        return redirect()->route('cate-movie.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Cập nhật thành công !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->cate_movie->findCate($id);
        if (isset($data)) {
            $image = $data->image;
            if(File::exists($image)){
                File::delete($image);
            }
            $this->cate_movie->delete($id);
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
                $cate = CateMovie::find($id);

                if(File::exists($cate->image)){
                    File::delete($cate->image);
                }

                CateMovie::where("id", $id)->delete();
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
