<?php


Route::get('/', function () {
    return redirect('shop');
});

Route::prefix('shop')->group(function () {
    Route::get('', 'Product\ProductController@indexAction');
    Route::get('/detail/{id_product}', 'Product\ProductController@detailAction')
        ->where(['id_product' => '[0-9]+']);
});

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

Route::prefix('transaction')->group(function () {
    Route::get('', 'Transaction\TransactionController@indexAction');
    Route::get('/detail/{id_transaction}', 'Transaction\TransactionController@detailAction')
        ->where(['id_transaction' => '[0-9]+']);
});
