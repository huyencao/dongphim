<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use Auth;

class PageController extends Controller
{
    protected $page;

    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->page->listAbout();

        return view('backend.page.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

        $validator = \Validator::make($request->all(), [
            'content' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('about.index')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
            ]
        );

        $this->page->create($request->all());

        return redirect(route('about.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm thành công!'
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('about.index')
                ->withErrors($validator)
                ->withInput();
        }


        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
            ]
        );

        $this->page->update($id, $request->all());

        return redirect()->route('about.index')->with([
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
        //
    }
}
