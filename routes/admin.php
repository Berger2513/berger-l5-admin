<?php

Route::get('/logout', 'HomeController@logout')->name('admin.logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('admin.admin_home');
    //menu
    Route::get('/menu', 'HomeController@menu_show')->name('admin.menu_show');
    Route::post('/menu', 'HomeController@menu_store')->name('admin.menu_store');
    Route::any('/menu_update', 'HomeController@menu_update')->name('admin.menu_update');

    Route::resource('permission','PermissionController',array(
        'names' =>
            array('create' => 'admin.permission.create',
            'index'=>'admin.permission.index',
            'store'=>'admin.permission.store',
            'edit'=>'admin.permission.edit',
            'update'=>'admin.permission.update',
            'destroy'=>'admin.permission.delete',
            )
    ));

    Route::resource('role','RoleController',array(
        'names' =>
            array(
                'create' => 'admin.role.create',
                'index'=>'admin.role.index',
                'store'=>'admin.role.store',
                'edit'=>'admin.role.edit',
                'update'=>'admin.role.update',
                'destroy'=>'admin.role.delete',
                'show'=>'admin.role.show',
            )
    ));

    Route::resource('user','UserController',array(
        'names' =>
            array(
                'create' => 'admin.user.create',
                'index'=>'admin.user.index',
                'store'=>'admin.user.store',
                'edit'=>'admin.user.edit',
                'update'=>'admin.user.update',
                'destroy'=>'admin.user.delete',
            )
    ));

    Route::resource('post','PostController',array(
        'names' =>
            array(
                'create' => 'admin.post.create',
                'index'=>'admin.post.index',
                'store'=>'admin.post.store',
                'edit'=>'admin.post.edit',
                'update'=>'admin.post.update',
                'destroy'=>'admin.post.delete',
            )
    ));

     Route::resource('category','CategoryController',array(
        'names' =>
            array(
                'create' => 'admin.category.create',
                'index'=>'admin.category.index',
                'store'=>'admin.category.store',
                'edit'=>'admin.category.edit',
                'update'=>'admin.category.update',
                'destroy'=>'admin.category.delete',
            )
    ));

});