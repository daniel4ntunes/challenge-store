<?php

Route::get('/', 'ProductController@index');

// Route::get('/', function () {
//     return redirect('shop');
// });

// Route::resource('shop', 'ProductController', ['only' => ['index', 'detail']]);

Route::get('/shop/{id}', 'ProductController@detail');
