<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CateNewRepository;
use App\Http\Requests\CateNewsRequest;
use App\Http\Requests\CateNewsEditRequest;
use Auth;
use App\Models\CategoryNews;

class CateNewsController extends Controller
{
    protected $cate_news;

    public function __construct(CateNewRepository $cate_news)
    {
        $this->cate_news = $cate_news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_news = $this->cate_news->listCateNews();

        return view('backend.cate-news.list', compact('cate_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $cate_parent = $this->cate_news->listCateParent();

        return view('backend.cate-news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateNewsRequest $request)
    {
        $this->cate_news->create($request->all());

        return redirect()->route('cate-news.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm thành công !'
        ]);;
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
        $category_news = $this->cate_news->findCate($id);

        return view('backend.cate-news.edit', compact('category_news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateNewsEditRequest $request, $id)
    {
        $this->cate_news->update($id, $request->all());

        return redirect(route('cate-news.index'))->with([
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
        $this->cate_news->delete($id);

        return redirect(route('cate-news.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm thành công !'
        ]);
    }

    public function deleteAll(Request $request)
    {
        if (isset($request->chkItem)) {

            $checked = $request->chkItem;

            foreach ($checked as $id) {
                CategoryNews::where("id", $id)->delete();
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
