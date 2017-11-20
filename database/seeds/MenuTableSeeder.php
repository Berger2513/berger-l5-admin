<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backend = Menu::create([
             'name' => '控制台',
             'parent_id' => '0',
             'power' => 'admin.dashboard',
             'url' => '/'.config('berger.app_name').'/public/admin/',
         ]);

         $system = Menu::create([
             'power' => 'admin.system',
             'name' => '系统管理',
             'parent_id' => '0',
             'url' => 'www.iwanli.me',
         ]);

         Menu::create([
             'name' => '菜单管理',
             'parent_id' => $system->id,
             'power' => 'admin.menu.list',
             'url' => '/'.config('berger.app_name').'/public/admin/menu',
         ]);

         Menu::create([
             'name' => '用户管理',
             'power' => 'admin.user',
             'power' => 'admin.user.list',
             'parent_id' => $system->id,
             'url' => '/'.config('berger.app_name').'/public/admin/user',
         ]);

         Menu::create([
             'name' => '权限管理',
             'parent_id' => $system->id,
             'power' => 'admin.permission.list',
             'url' =>'/'.config('berger.app_name').'/public/admin/permission',
         ]);

         Menu::create([
             'name' => '角色管理',
             'parent_id' => $system->id,
             'power' => 'admin.role.list',
             'url' => '/'.config('berger.app_name').'/public/admin/role',
             ]);

        $content = Menu::create([
             'name' => '内容管理',
             'parent_id' => 0,
             'power' => 'admin.content',
             'url' => '/'.config('berger.app_name').'/public/admin/content',
             ]);
        Menu::create([
             'name' => '文章管理',
             'parent_id' => $content->id,
             'power' => 'admin.post.list',
             'url' => '/'.config('berger.app_name').'/public/admin/post',
             ]);
        Menu::create([
             'name' => '分类管理',
             'parent_id' => $content->id,
             'power' => 'admin.category.list',
             'url' => '/'.config('berger.app_name').'/public/admin/category',
             ]);
    }
}
