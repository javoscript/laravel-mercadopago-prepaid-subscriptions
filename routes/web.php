<?php

Route::group(['namespace' => 'Javoscript\PrepaidSubs\Http\Controllers', 'middleware' => 'web', 'prefix' => config('prepaid-subs.route_prefix')], function(){
    Route::get('/plans', 'PrepaidSubsController@plans');

    Route::middleware('auth')->group(function() {

    });
});

