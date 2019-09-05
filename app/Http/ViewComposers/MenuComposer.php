<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Repositories\CateMovieRepository;
use App\Http\lib\Menu;

class MenuComposer
{
    protected $cate_movie;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(CateMovieRepository $cate_movie)
    {
        $this->cate_movie = $cate_movie;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menu = new Menu;
        $menu->setMenu($this->cate_movie->listCateMovieActive());
        $menus = $menu->callMenu();
        $view->with('menus', $menus);
    }
}