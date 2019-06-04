<?php

Route::namespace('Javoscript\PrepaidSubs\Http\Controllers\Api')->middleware('api')->prefix('/api/'.config("prepaid-subs.route_prefix"))->name('prepaid-subs.api.')->group(function(){
    Route::get('/plans', 'PrepaidSubsController@plans')->name('plans.index');

    Route::post('/generate-payment/{model_id}', 'PrepaidSubsController@generatePayment')->name('payment.create');
    Route::post('/mercadopago/notification/{payment}', 'PrepaidSubsController@paymentNotifications')->name('payment.notify');

    Route::middleware('auth:api')->group(function() {

    });
});

