<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MenuRepository;
use App\Models\Menu;
use App\Validators\MenuValidator;
use Cache;

class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function GetMenuList()
    {
        if(Cache::has(config('berger.cache.menuList')) ) {
             return Cache::get(config('berger.cache.menuList'));
        }else {
            return $this->sortMenu();
        }
    }
    public function sortMenu()
    {
        $menus = $this->findByField('parent_id', 0);

        $arr = [];
        if ( empty($menus) ) {
            return '';
        }
        foreach ($menus as $k => $v) {
            $arr[$k] = $v;
            if( $this->sortMenuList($v->id)) {
                $arr[$k]['chlid'] = $this->sortMenuList($v->id);
            }
        }

        Cache::forever(config('berger.cache.menuList'), $arr);
        return Cache::get(config('berger.cache.menuList'));
    }

    public function sortMenuList($parent_id,$sort='desc')
    {
        return Menu::where('parent_id',$parent_id)
        ->orderBy('sort',$sort)
        ->get()
        ->toArray();
    }

}
