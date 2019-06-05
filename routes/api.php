<?php

Route::namespace('Javoscript\PrepaidSubs\Http\Controllers\Api')->middleware('api')->prefix('/api/'.config("prepaid-subs.route_prefix"))->name('prepaid-subs.api.')->group(function(){
    Route::post('/generate-payment/{account}', 'PrepaidSubsController@generatePayment')->name('payment.create');
    Route::post('/mercadopago/notification/{payment}', 'PrepaidSubsController@paymentNotifications')->name('payment.notify');
});

