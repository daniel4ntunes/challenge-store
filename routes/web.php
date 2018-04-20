<?php

Route::get('/', 'Product\ProductController@index');

Route::get('/shop/{id}', 'Product\ProductController@detail');

Route::prefix('cart')->group(function () {
    Route::get('', 'Cart\CartController@indexAction');
    Route::post('', 'Cart\CartController@addAction');
    Route::put('/{id_cart}/{qty}', 'Cart\CartController@updateAction')
        ->where(['id_cart' => '[0-9]+', 'qty' => '[0-9]+']);
    Route::delete('/{id_cart}', 'Cart\CartController@deleteAction')
        ->where(['id_cart' => '[0-9]+']);
});
