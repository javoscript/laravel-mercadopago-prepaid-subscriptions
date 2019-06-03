<?php

namespace Javoscript\PrepaidSubs\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class Payment extends Model
{
    protected $table = 'prepaid_subs_payments';

    // TODO: check MP status codes
    const MP_ERROR   = 0;
    const MP_SUCCESS = 1;
    const MP_PENDING = 2;

    // TODO: check MP required fields
    protected $fillable = [
        'request_key',
        'client',
        'email',
        'state',
        'plan',
        'account_id'
    ];

    protected $casts = [
        'plan' => 'object'
    ];

    public function applyPaymentPlan()
    {
        switch ($this->plan->time_unit) {
            case 'day':
            case 'days':
                $this->account->expiration_date = $this->account->expiration_date->addDays($this->plan->time_value);
                break;
            case 'month':
            case 'months':
                $this->account->expiration_date = $this->account->expiration_date->addMonths($this->plan->time_value);
                break;
            case 'year':
            case 'years':
                $this->account->expiration_date = $this->account->expiration_date->addYears($this->plan->time_value);
                break;
            default:
                return false;
        }

        $this->account->update();
        return true;
    }

    public function account()
    {
        return $this->belongsTo('Javoscript\PrepaidSubs\Models\Account');
    }

}
