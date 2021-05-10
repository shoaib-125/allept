<?php

Route::group(['middleware' => ['web', 'admin']], function () {

    Route::get('/admin/product', 'Techno\Product\Http\Controllers\Admin\ProductController@index')->defaults('_config', [
        'view' => 'product::admin.index',
    ])->name('product.admin.index');

});