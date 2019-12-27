<?php

Route::group(['prefix'=>'/','namespace'=>'Admin','as'=>'admin.'],function (){
    Route::group(['prefix'=>'/'],function (){
        Route::get('/login','AuthController@index')->name('login');
        Route::post('/login','AuthController@login')->name('login');
        Route::get('/logout','AuthController@logout')->name('logout');
    });

    Route::group(['middleware'=>['auth:web']],function (){
        Route::get('/','HomeController@index')->name('home');

        Route::get('/profile','ProfileController@index')->name('profile');
        Route::post('/profile','ProfileController@update')->name('profile.update');
        Route::resource('{type}/users','UserController');
        Route::get('{type}/users/{user}/destroy','UserController@destroy')->name('users.destroy');
        Route::resource('forms','EventController');
        Route::get('events/{event}/destroy','EventController@destroy')->name('events.destroy')->middleware('admin');
        Route::get('forms/{form}/form_fields','EventController@fieldsIndex')->name('forms.fields');
        Route::get('forms/{form}/fields_create','EventController@fieldsCreate')->name('forms.fields-create');
        Route::post('field-forms/store','EventController@fieldsStore')->name('fieldForms.store');
        Route::get('field-forms/{field_form}/edit','EventController@fieldsEdit')->name('fieldForms.edit');
        Route::put('field-forms/{field_form}/update','EventController@fieldsUpdate')->name('fieldForms.update');
        Route::get('field-forms/{field_form}/destroy','EventController@fieldsDestroy')->name('fieldForms.destroy');

    });
});

