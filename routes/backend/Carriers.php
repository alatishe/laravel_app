<?php

// Carriers Management
Route::group(['namespace' => 'Carriers'], function () {
    Route::resource('carriers', 'ShippingCarriersController', ['except' => ['show']]);

    //For DataTables
    Route::post('carriers/get', 'ShippingCarriersTableController')->name('carriers.get');
});
