<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gmaps', function () {
    return view('gmaps');
});

// Auth::routes();

Auth::routes(
    // ['register' => false]
);

Route::middleware("auth")->group(function(){
        
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users', 'HomeController@users')->name('users');
    Route::post('/users/{id}/edit', 'HomeController@users_edit')->name('users_edit');
    Route::get('/variable', 'HomeController@variable')->name('variable');

    // Topsis
    Route::get('/topsis', 'HomeController@topsis')->name('topsis');
    Route::post('/tambah-topsis', 'HomeController@tambahTopsis')->name('t-topsis');
    Route::post('/hapus-topsis/{id}', 'HomeController@hapusTopsis')->name('h-topsis');

    // Variable
    Route::get('/variable/v', 'VariableController@v')->name('v');
    Route::get('/variable/v/data', 'VariableController@data_v')->name('data_v');
    Route::post('/tambah_v', 'VariableController@tambah_v')->name('tambah_v');
    Route::post('/edit_v', 'VariableController@edit_v')->name('edit_v');
    Route::get('/hapus_v/{id}', 'VariableController@hapus_v')->name('hapus_v');
    Route::get('/active_v/{id}', 'VariableController@active_v')->name('active_v');

    // Maps
    Route::get('/data_maps', 'HomeController@maps')->name('maps');


});
