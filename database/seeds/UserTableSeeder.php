<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = factory('App\Models\User')->create([
            'name'      => 'berger',
            'nickname'  => '牧羊人',
            'email'     => str_random(10).'@gmail.com',
            'password'  => bcrypt('password'),
        ])->each(function($data) use($adminRole){
            $data->attachRole($adminRole);
        });


        $admin = factory('App\Models\User',1)->create([
            'name'=>    'admin',
            'password'  => bcrypt('password'),
        ])->each(function($data) use($userRole){
            $data->attachRole($userRole);
        });


    }
}
