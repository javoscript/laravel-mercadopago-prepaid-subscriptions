<?php

Route::group(['namespace' => 'Javoscript\PrepaidSubs\Http\Controllers', 'middleware' => 'web'], function(){
    Route::get('/subs', 'ExampleController@greet');

    Route::middleware('auth')->group(function() {
        Route::get('/auth/subs', function() {
            return PrepaidSubs::hello();
        });
    });
});

