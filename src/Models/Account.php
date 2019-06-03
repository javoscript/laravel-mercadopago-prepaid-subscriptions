<?php

namespace Javoscript\PrepaidSubs\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class Account extends Model
{
    protected $table = 'prepaid_subs_accounts';

    protected $dates = [
        'expiration_date',
    ];

    protected $fillable = [
        'expiration_date',
        'model_id',
    ];

    public function model()
    {
        return $this->belongsTo(config('prepaid-subs.model'), 'model_id');
    }

    public function payments()
    {
        return $this->hasMany('Javoscript\PrepaidSubs\Models\Payment');
    }
}
