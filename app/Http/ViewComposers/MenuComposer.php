<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Repositories\CateMovieRepository;
use App\Repositories\MenuRepository;
use App\Http\lib\Menu;

class MenuComposer
{
    protected $cate_movie;
    protected $menus;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(CateMovieRepository $cate_movie, MenuRepository $menus)
    {
        $this->cate_movie = $cate_movie;
        $this->menus = $menus;
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
        $menu->setMenu($this->menus->listMenu());
        $menus = $menu->callMenu();
        $view->with('menus', $menus);
    }
}