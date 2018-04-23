<?php

Route::get('/', function () {
    return redirect('shop');
});

Route::prefix('shop')->group(function () {
    Route::get('', 'Product\ProductController@indexAction');
    Route::get('/detail/{id}', 'Product\ProductController@detailAction')
        ->where(['id' => '[0-9]+']);
});

Route::prefix('cart')->group(function () {
    Route::get('', 'Cart\CartController@indexAction');
    Route::post('', 'Cart\CartController@addAction');
    Route::put('/{id}/{qty}', 'Cart\CartController@updateAction')
        ->where(['id' => '[0-9]+', 'qty' => '[0-9]+']);
    Route::delete('/{id}', 'Cart\CartController@deleteAction')
        ->where(['id' => '[0-9]+']);
});

Route::prefix('checkout')->group(function () {
    Route::get('', 'Checkout\CheckoutController@indexAction');
    Route::post('/process', 'Checkout\CheckoutController@processAction');
});

// Auth::routes();

Route::get('/account', 'Account\AccountController@indexAction');

Route::prefix('transaction')->group(function () {
    Route::get('', 'Transaction\TransactionController@indexAction');
    Route::get('/detail/{id}', 'Transaction\TransactionController@detailAction')
        ->where(['id' => '[0-9]+']);
});
