<?php

Route::namespace('Javoscript\PrepaidSubs\Http\Controllers')->middleware('web')->prefix(config("prepaid-subs.route_prefix"))->name('prepaid-subs.')->group(function(){
    Route::get('/plans', 'PrepaidSubsController@plans')->name('plans.index');

    Route::middleware('auth')->group(function() {
        Route::post('/generate-payment/{model_id}', 'PrepaidSubsController@generatePayment')->name('payment.create');
    });
});

