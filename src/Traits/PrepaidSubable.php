<?php

namespace Javoscript\PrepaidSubs\Traits;


trait PrepaidSubable
{

    public function prepaid_subs_account()
    {
        return $this->morphOne('Javoscript\PrepaidSubs\Models\Account', 'prepaid_subable');
    }

    public function prepaid_subs_createAccount()
    {
        return \PrepaidSubs::createAccountFor($this);
    }

    public function prepaid_subs_getExpirationDate()
    {
        $account = $this->prepaid_subs_account;
        return ($account)
            ? $account->expiration_date
            : null;
    }

    public function prepaid_subs_hasActiveSubscription()
    {
        $account = $this->prepaid_subs_account;
        return (! $account)
            ? false
            : $account->expiration_date->endOfDay()->greaterThanOrEqualTo(\Carbon\Carbon::now());
    }

    public function prepaid_subs_getDaysLeft()
    {
        $account = $this->prepaid_subs_account;
        return (! $account)
            ? -1
            : \Carbon\Carbon::now()->endOfDay()->diffInDays($account->expiration_date->endOfDay(), false);
    }

    public function prepaid_subs_payments()
    {
        $account = $this->prepaid_subs_account;

        return ($account)
            ? $account->payments
            : collect([]);
    }
}
