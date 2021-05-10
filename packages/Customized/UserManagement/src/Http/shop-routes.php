<?php

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {

    Route::get('/usermanagement', 'Customized\UserManagement\Http\Controllers\Shop\UserManagementController@index')->defaults('_config', [
        'view' => 'usermanagement::shop.index',
    ])->name('usermanagement.shop.index');

});