<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\SettingRequest;

use App\Repositories\SettingRepository;

use Auth;

use File;

use SEOMeta;

use OpenGraph;

use Twitter;

## or

//use SEO;





class SettingController extends Controller

{

    protected $setting;



    public function __construct(SettingRepository $setting)

    {

        $this->setting = $setting;

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $site_info = $this->setting->infoSetting();

        return view('backend.setting.list', compact('site_info'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('backend.setting.add');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        if (Auth::check()) {

            $user = Auth::user();

        }



        if (!empty($request->file('fImage'))) {

            $file_name = $request->file('fImage')->getClientOriginalName();

            $image_logo = 'uploads/logo/' . time() . '-' . $file_name;

            $request->file('fImage')->move('uploads/logo/', $image_logo);

        }

        if (!empty($request->file('fFavicon'))) {

            $file_name = $request->file('fFavicon')->getClientOriginalName();

            $image_favicon = 'uploads/logo/' . time() . '-' . $file_name;

            $request->file('fFavicon')->move('uploads/logo/', $image_favicon);

        }

        $request->merge(

            [

                'user_id' => $user->id,

                'site_logo' => $image_logo,

                'site_favicon' => $image_favicon,

            ]

        );



        $this->setting->create($request->all());



        return redirect(route('setting.index'))->with([

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
        $setting = $this->setting->findSetting($id);

        if (!empty($request->file('fImage'))) {

            $image = $setting->site_logo;

            $file_name      = $request->file('fImage')->getClientOriginalName();

            $logo    = 'uploads/logo/'.time().'-'.$file_name;

            $request->file('fImage')->move('uploads/logo/', $logo);

            if(File::exists($image)){

                File::delete($image);

            }

        }


        if (empty($logo)){

            $site_logo = $setting->site_logo;

        } else

        {

            $site_logo = $logo;

        }



        if (!empty($request->file('fFavicon'))) {

            $image = $setting->site_favicon;

            $file_name      = $request->file('fFavicon')->getClientOriginalName();

            $favicon    = 'uploads/logo/'.time().'-'.$file_name;

            $request->file('fFavicon')->move('uploads/logo/', $favicon);

            if(File::exists($image)){

                File::delete($image);

            }

        }



        if (empty($favicon)){

            $site_favicon = $setting->site_favicon;

        } else

        {

            $site_favicon = $favicon;

        }



        $request->merge(

            [
                'site_logo' => $site_logo,

                'site_favicon' => $site_favicon

            ]

        );

        $this->setting->update($id, $request->all());

        return redirect()->route('setting.index')->with([

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

