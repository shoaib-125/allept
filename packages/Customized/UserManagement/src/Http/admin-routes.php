<?php

Route::group(['middleware' => ['web', 'admin']], function () {

    Route::get('/admin/userss', 'Customized\UserManagement\Http\Controllers\Admin\UserManagementController@index')->defaults('_config', [
        'view' => 'admin::users.users.index',
    ])->name('usermanagement.admin.index');

});