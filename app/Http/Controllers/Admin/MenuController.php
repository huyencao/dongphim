<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Repositories\CateMovieRepository;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\EditMenuRequest;
use Auth;
use File;

class MenuController extends Controller
{
    protected $menus;
    protected $cate_movies;

    public function __construct(MenuRepository $menus, CateMovieRepository $cate_movies)
    {
        $this->menus = $menus;
        $this->cate_movies = $cate_movies;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_menu = $this->menus->listMenuAll();

        return view('backend.menu.list', compact('list_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_parent = $this->menus->listMenuParent();
        $cate_movie = $this->cate_movies->listCateMovieActive();

        return view('backend.menu.add', compact('menu_parent', 'cate_movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $this->menus->create($request->all());

        return redirect(route('menu.index'))->with([
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
        $menu = $this->menus->findMenu($id);
        $menu_parent = $this->menus->listMenuParent();
        $cate_movie = $this->cate_movies->listCateMovieActive();

        return view('backend.menu.edit', compact('menu', 'menu_parent', 'cate_movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMenuRequest $request, $id)
    {
        $cate = $this->menus->findMenu($id);
        if (!empty($request->cate_id))
        {
            $cate_id = $request->cate_id;
        } else {
            $cate_id = $cate->cate_id;
        }

        $request->merge(
            [
            'cate_id' => $cate_id
        ]
        );
        $this->menus->update($id, $request->all());

        return redirect()->route('menu.index')->with([
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
        $this->menus->delete($id);

        return back()->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công !'
        ]);
    }
}
