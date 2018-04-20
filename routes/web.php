<?php

Route::get('/', 'ProductController@index');

Route::get('/shop/{id}', 'ProductController@detail');

Route::group(['prefix' => 'cart', 'as' => 'cart'], function () {
    Route::resource('', 'CartController');
    Route::post('', 'CartController@add');
    Route::delete('/{id_cart}', 'CartController@delete')->where(['id_cart' => '[0-9]+']);
});
