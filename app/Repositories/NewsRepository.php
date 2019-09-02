<?php
namespace App\Repositories;

use App\Models\CategoryNews;
use App\Repositories\EloquentRepository;
use App\Models\News;

class NewsRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\News::class;
    }

    public function listNewsHot()
    {
        $news_hot = News::where('hot', 1)->where('status', 1)->limit(config('app.news_hot'))->orderBy('updated_at', 'DESC' )->get();

        return $news_hot;
    }

    public function listNewsRelated($id){
        $item  = News::where('id', $id)->first();
        $cate_id = $item->cate_id;
        $data = News::with('categoryNews')->where('cate_id', $cate_id)->where('id', '<>', $id)->limit(config('app.related_news'))->orderBy('id', 'DESC')->get();

        return $data;
    }

    public function listNews()
    {
        $list_news = News::with('categoryNews', 'user')->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(config('app.paginate_news'));

        return $list_news;
    }

    public function listNewsAdmin()
    {
        $list_news = News::with('categoryNews', 'user')->orderBy('updated_at', 'DESC')->get();

        return $list_news;
    }

    public function detailNews($id)
    {
        $data = News::where('id', $id)->get();

        return $data;
    }

    public function findNews($id){

        $data = News::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}
