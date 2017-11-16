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
            array('create' => 'admin.role.create',
            'index'=>'admin.role.index',
            'store'=>'admin.role.store',
            'edit'=>'admin.role.edit',
            'update'=>'admin.role.update',
            'destroy'=>'admin.role.delete',
            )
    ));

    Route::get('/role_permission', 'RoleController@role_permission')->name('admin.role.permission');
});