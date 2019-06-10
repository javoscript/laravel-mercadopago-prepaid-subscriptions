<?php

namespace Javoscript\PrepaidSubs\Models;

use Illuminate\Database\Eloquent\Model;


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
        'status',
        'plan',
        'account_id'
    ];

    protected $casts = [
        'plan' => 'object'
    ];

    protected $appends = [
        'readable_status'
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

    public function getStatusBadgeAttribute()
    {
        $badge = '<span class="badge badge-secondary">pendiente</span>';
        switch ($this->status) {
            case self::MP_SUCCESS:
                $badge = '<span class="badge badge-success">exitoso</span>';
                break;
            case self::MP_ERROR:
                $badge = '<span class="badge badge-danger">error</span>';
                break;
            case self::MP_PENDING:
            default:
                $badge = '<span class="badge badge-secondary">pendiente</span>';
                break;
        }

        return $badge;
    }

    public function getReadableStatusAttribute()
    {
        switch ($this->status) {
            case self::MP_SUCCESS:
                return 'exito';
                break;
            case self::MP_ERROR:
                return 'error';
                break;
            case self::MP_PENDING:
            default:
                return 'pendiente';
                break;
        }
        return 'pendiente';
    }

    /*
     * SCOPES
     * */
    public function scopeSuccessful($query)
    {
        return $query->where('status', self::MP_SUCCESS);
    }
    public function scopeFailed($query)
    {
        return $query->where('status', self::MP_ERROR);
    }
    public function scopePending($query)
    {
        return $query->where('status', self::MP_PENDING);
    }
}
