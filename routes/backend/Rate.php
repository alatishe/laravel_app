<?php

// Rates Management
Route::group(['namespace' => 'Rates'], function () {
    Route::resource('rates', 'RatesController', ['except' => ['show']]);

    //For DataTables
    Route::post('rates/get', 'RatesTableController')->name('rates.get');

    Route::post('rates/upload', 'RatesController@upload')->name('rates.upload');

});
