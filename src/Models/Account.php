<?php

namespace Javoscript\PrepaidSubs\Models;

use Illuminate\Database\Eloquent\Model;


class Account extends Model
{
    protected $table = 'prepaid_subs_accounts';

    protected $dates = [
        'expiration_date',
    ];

    protected $fillable = [
        'expiration_date',
        'prepaid_subable_id',
        'prepaid_subable_type',
    ];

    public function prepaid_subable()
    {
        return $this->morphTo();
    }

    public function payments()
    {
        return $this->hasMany('Javoscript\PrepaidSubs\Models\Payment')->latest();
    }
}
