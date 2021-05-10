<?php

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {

    Route::get('/product', 'Techno\Product\Http\Controllers\Shop\ProductController@index')->defaults('_config', [
        'view' => 'product::shop.index',
    ])->name('product.shop.index');

});