<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SEO;
use OpenGraph;
use SEOMeta;
use TwitterCard;
use Artesaos\SEOTools\Facades\SEOTools;
use Hash;
use App\Repositories\SettingRepository;

class HomeController extends Controller
{
    protected $setting;

    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
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


        return view('frontend.home.index');
    }
}
