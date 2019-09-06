<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Menu;

class MenuRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Menu::class;
    }
    public function listMenu()
    {
        return Menu::with('cateMovie')->where('status', 1)->orderBy('position', 'ASC')->get();
    }

    public function listMenuAll()
    {
        return Menu::with('cateMovie')->get();
    }

    public function listMenuParent()
    {
        return  Menu::where('parent_id', 0)->get();
    }

    public function findMenu($id)
    {
        $data = Menu::with('cateMovie')->findOrFail($id);
        if (empty($data)) {
            return false;
        } else {
            return $data;
        }
    }
}