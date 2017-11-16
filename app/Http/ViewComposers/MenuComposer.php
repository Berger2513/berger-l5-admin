<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\MenuRepository;

class MenuComposer
{
    protected $menu;

    /**
     * 创建一个新的属性composer.
     *
     * @param UserRepository $menu
     * @return void
     */
    public function __construct(MenuRepository $menu)
    {
        // Dependencies automatically resolved by service container...
        $this->menu = $menu;
    }

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menu', $this->menu->GetMenuList());
    }
}