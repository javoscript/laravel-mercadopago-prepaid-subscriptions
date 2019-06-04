<?php

Route::namespace('Javoscript\PrepaidSubs\Http\Controllers')->middleware('web')->prefix(config("prepaid-subs.route_prefix"))->name('prepaid-subs.')->group(function(){
    Route::get('/plans', 'PrepaidSubsController@plans')->name('plans.index');

    Route::post('/notify/payment/{payment}', 'PrepaidSubsController@updatePayment')->name('payment.notify');

    Route::view('/payment/success', 'prepaid-subs::payments.success')->name('payment.success');
    Route::view('/payment/error', 'prepaid-subs::payments.error')->name('payment.error');
    Route::view('/payment/pending', 'prepaid-subs::payments.pending')->name('payment.pending');

    Route::post('/generate-payment/{model_id}', 'PrepaidSubsController@generatePayment')->name('payment.create');
    Route::middleware('auth')->group(function() {
    });
});

