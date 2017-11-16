<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create([
             'name' => 'admin.system.login',
             'display_name' => '后台登录',
             'description' => '后台登录',
         ]);
         /**
         * 菜单权限
         */
        Permission::create([
             'name' => 'admin.menu.list',
             'display_name' => '菜单列表',
             'description' => '菜单列表',
         ]);

        Permission::create([
             'name' => 'admin.menu.add',
             'display_name' => '菜单添加',
             'description' => '菜单添加',
         ]);

        Permission::create([
             'name' => 'admin.menu.edit',
             'display_name' => '修改菜单',
             'description' => '修改菜单',
         ]);

        Permission::create([
             'name' => 'admin.menu.delete',
             'display_name' => '删除菜单',
             'description' => '删除菜单',
         ]);

        Permission::create([
             'name' => 'admin.dashboard',
             'display_name' => '控制台',
             'description' => '控制台',
         ]);

        Permission::create([
             'name' => 'admin.web',
             'display_name' => 'web前段',
             'description' => 'web前段',
        ]);
        Permission::create([
             'name' => 'admin.system',
             'display_name' => '系统设置',
             'description' => '系统设置',
         ]);

          /**
         * 权限
         */
        Permission::create([
             'name' => 'admin.permission.list',
             'display_name' => '权限列表',
             'description' => '权限列表',
         ]);

        Permission::create([
             'name' => 'admin.permission.add',
             'display_name' => '添加权限',
             'description' => '添加权限',
         ]);

        Permission::create([
             'name' => 'admin.permission.edit',
             'display_name' => '修改权限',
             'description' => '修改权限',
         ]);

        Permission::create([
             'name' => 'admin.permission.delete',
             'display_name' => '删除权限',
             'description' => '删除权限',
         ]);

          /**
         * 用户
         */
        Permission::create([
             'name' => 'admin.user.list',
             'display_name' => '用户列表',
             'description' => '用户列表',
         ]);

        Permission::create([
             'name' => 'admin.user.add',
             'display_name' => '添加用户',
             'description' => '添加用户',
         ]);

        Permission::create([
             'name' => 'admin.user.edit',
             'display_name' => '修改用户',
             'description' => '修改用户',
         ]);

        Permission::create([
             'name' => 'admin.user.delete',
             'display_name' => '删除用户',
             'description' => '删除用户',
         ]);

        //角色
        Permission::create([
             'name' => 'admin.role.list',
             'display_name' => '角色列表',
             'description' => '角色列表',
         ]);

        Permission::create([
             'name' => 'admin.role.add',
             'display_name' => '添加角色',
             'description' => '添加角色',
         ]);

        Permission::create([
             'name' => 'admin.role.edit',
             'display_name' => '修改角色',
             'description' => '修改角色',
         ]);

        Permission::create([
             'name' => 'admin.role.delete',
             'display_name' => '删除角色',
             'description' => '删除角色',
         ]);

    }
}
