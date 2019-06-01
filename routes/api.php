<?php

Route::group(['namespace' => 'Javoscript\PrepaidSubs\Http\Controllers', 'middleware' => 'api', 'prefix' => '/api'], function(){
    Route::get('/subs', function () {
        return PrepaidSubs::hello();
    });

    Route::middleware('auth:api')->group(function() {
        Route::get('/auth/subs', 'ExampleController@greet');
    });
});

