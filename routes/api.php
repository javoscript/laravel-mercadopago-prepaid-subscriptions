<?php

Route::group(['namespace' => 'Javoscript\PrepaidSubs\Http\Controllers', 'middleware' => 'api', 'prefix' => '/api/'.config("prepaid-subs.route_prefix")], function(){
    Route::get('/plans', 'PrepaidSubsController@plans');

    Route::middleware('auth:api')->group(function() {

    });
});

