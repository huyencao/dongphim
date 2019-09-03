<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\EditBannerRequest;
use Auth;
use Hash;
use File;

class BannerController extends Controller
{
    protected $banner;

    public function __construct(BannerRepository $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_banner = $this->banner->listBannerAll();

        return view('backend.banner.list', compact('list_banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        if (!empty($request->file('fImage'))) {
            $file_name = $request->file('fImage')->getClientOriginalName();
            $image = 'uploads/banner/' . time() . '-' . $file_name;
            $request->file('fImage')->move('uploads/banner/', $image);
        }

        $request->merge(
            [
                'image' => !empty($image) == true ? $image : null,
            ]
        );

        $this->banner->create($request->all());

        return redirect(route('banner.index'))->with([
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
        $banner_detail = $this->banner->findBanner($id);

        return view('backend.banner.edit', compact('banner_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBannerRequest $request, $id)
    {
        $banner = $this->banner->findBanner($id);

        if (!empty($request->file('fImage'))) {
            $image = $banner->thumbnail;
            $file_name      = $request->file('fImage')->getClientOriginalName();
            $thumbnail    = 'uploads/banner/'.time().'-'.$file_name;
            $request->file('fImage')->move('uploads/banner/', $thumbnail);
            if(File::exists($image)){
                File::delete($image);
            }
        }

        if (empty($thumbnail)){
            $image_banner = $banner->image;
        } else
        {
            $image_banner = $thumbnail;
        }

        $request->merge(
            [
                'image' => $image_banner
            ]
        );

        $this->banner->update($id, $request->all());

        return redirect()->route('banner.index')->with([
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
        $banner = $this->banner->findBanner($id);
        if (isset($banner)) {
            $image = $banner->thumbnail;
            if(File::exists($image)){
                File::delete($image);
            }
            $this->banner->delete($id);
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
                $banner = Banner::find($id);

                if(File::exists($banner->image)){
                    File::delete($banner->image);
                }

                Banner::where("id", $id)->delete();
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
