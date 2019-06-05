<?php

Route::namespace('Javoscript\PrepaidSubs\Http\Controllers')->middleware('web')->prefix(config("prepaid-subs.route_prefix"))->name('prepaid-subs.')->group(function(){
    if (config('prepaid-subs.register_default_callback_routes')) {
        Route::view('/payment/success', 'prepaid-subs::payments.success')->name('payment.success');
        Route::view('/payment/error', 'prepaid-subs::payments.error')->name('payment.error');
        Route::view('/payment/pending', 'prepaid-subs::payments.pending')->name('payment.pending');
    }

    Route::post('/generate-payment/{account}', 'PrepaidSubsController@generatePayment')->name('payment.create');
});

