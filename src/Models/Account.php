<?php

namespace Javoscript\PrepaidSubs\Models;

use Illuminate\Database\Eloquent\Model;


class Account extends Model
{
    protected $table = 'prepaid_subs_accounts';

    protected $casts = [
        'expiration_date' => 'date:d-m-Y'
    ];

    protected $fillable = [
        'expiration_date',
        'prepaid_subable_id',
        'prepaid_subable_type',
    ];

    protected $appends = [
        'subscription_status',
        'payments'
    ];


    public function prepaid_subable()
    {
        return $this->morphTo();
    }

    public function payments()
    {
        return $this->hasMany('Javoscript\PrepaidSubs\Models\Payment')->latest();
    }


    public function getSubscriptionStatusAttribute()
    {
        $successful_payments_count = $this->payments()->successful()->count();
        if (\Carbon\Carbon::today() <= $this->expiration_date) {
            if ($successful_payments_count == 0) {
                return "free_trial";
            }
            return "active";
        }
        return "expired";
    }

    public function getPaymentsAttribute()
    {
        return $this->payments()->get();
    }
}
