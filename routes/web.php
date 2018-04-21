<?php

Route::get('/', 'Product\ProductController@indexAction');

Route::get('/shop/{id_product}', 'Product\ProductController@detailAction');

Route::prefix('cart')->group(function () {
    Route::get('', 'Cart\CartController@indexAction');
    Route::post('', 'Cart\CartController@addAction');
    Route::put('/{id_cart}/{qty}', 'Cart\CartController@updateAction')
        ->where(['id_cart' => '[0-9]+', 'qty' => '[0-9]+']);
    Route::delete('/{id_cart}', 'Cart\CartController@deleteAction')
        ->where(['id_cart' => '[0-9]+']);
});

Route::prefix('checkout')->group(function () {
    Route::get('', 'Checkout\CheckoutController@indexAction');
    Route::post('/process', 'Checkout\CheckoutController@processAction');
});

Auth::routes();

Route::get('/account', 'Account\AccountController@indexAction');
