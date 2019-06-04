<?php

namespace Javoscript\PrepaidSubs;

use Javoscript\PrepaidSubs\PrepaidPlan;
use Javoscript\PrepaidSubs\Models\Account;


class PrepaidSubs
{
    public function getExpirationDateFor($model_id)
    {
        $this->checkIsType($model_id, 'integer', __FUNCTION__);

        $account = $this->getAccountFor($model_id);
        return ($account) ? $account->expiration_date : null;
    }

    public function hasActiveSubscription($model_id)
    {
        $this->checkIsType($model_id, 'integer', __FUNCTION__);

        $account = $this->getAccountFor($model_id);
        if (! $account) {
            return false;
        }

        return $account->expiration_date->endOfDay()->greaterThanOrEqualTo(\Carbon\Carbon::now());
    }

    public function daysLeftFor($model_id)
    {
        $this->checkIsType($model_id, 'integer', __FUNCTION__);

        $account = $this->getAccountFor($model_id);
        if (! $account) {
            return null;
        }

        return \Carbon\Carbon::now()->endOfDay()->diffInDays($account->expiration_date->endOfDay(), false);
    }

    public function getAccountFor($model_id)
    {
        $this->checkIsType($model_id, 'integer', __FUNCTION__);

        return Account::where('model_id', $model_id)->first();
    }

    public function createAccountFor($model_id)
    {
        $this->checkIsType($model_id, 'integer', __FUNCTION__);

        // Return previous account if exists
        $prev_acc = $this->getAccountFor($model_id);
        if ($prev_acc) {
            return $prev_acc;
        }

        $starting_date = \Carbon\Carbon::now();
        try {
            $starting_date = $starting_date->add(config('prepaid-subs.free_trial'));
        } catch (\InvalidArgumentException $e) {
            // Leave the starting date as now()
        }

        $account = Account::create([
            'model_id' => $model_id,
            'expiration_date' => $starting_date,
        ]);

        return $account;
    }


    public function getPlans($id = null)
    {
        $config_plans = config('prepaid-subs.plans');
        $plans = [];
        $the_plan = null;

        foreach($config_plans as $index => $plan) {
            $new_plan = new PrepaidPlan(
                $index+1,
                $plan["time_value"],
                $plan["time_unit"],
                $plan["name"],
                $plan["price"],
                $plan["old_price"],
                $plan["details"]
            );

            if ($new_plan->getId() == $id) {
                $the_plan = $new_plan;
            }

            $plans[] = $new_plan;
        }

        return ($id != null) ? $the_plan : $plans;
    }


    protected function checkIsType($variable, $type, $function)
    {
        $var_type = gettype($variable);

        if ( $var_type != $type ) {
            throw new \InvalidArgumentException("${function}: wrong parameters received.");
        }
    }
}
