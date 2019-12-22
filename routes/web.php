<?php

Route::group(['prefix'=>'/','namespace'=>'Admin','as'=>'admin.'],function (){
    Route::group(['prefix'=>'/'],function (){
        Route::get('/login','AuthController@index')->name('login');
        Route::post('/login','AuthController@login')->name('login');
        Route::get('/logout','AuthController@logout')->name('logout');
    });
});

