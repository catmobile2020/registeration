<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {
    Route::get('/forms/{form}','FormController@getForm');
});
