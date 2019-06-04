<?php

namespace Javoscript\PrepaidSubs;

use Javoscript\PrepaidSubs\PrepaidPlan;
use Javoscript\PrepaidSubs\Models\Account;


class PrepaidSubs
{

    public function createAccountFor($model)
    {
        $this->checkIsA($model, 'Illuminate\Database\Eloquent\Model', __FUNCTION__);

        // Return previous account if exists
        $prev_acc = $this->getAccountFor($model);
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
            'prepaid_subable_id' => $model->id,
            'prepaid_subable_type' => get_class($model),
            'expiration_date' => $starting_date,
        ]);

        return $account;
    }


    public function getExpirationDateFor($model)
    {
        $this->checkIsA($model, 'Illuminate\Database\Eloquent\Model', __FUNCTION__);

        $account = $this->getAccountFor($model);
        return ($account) ? $account->expiration_date : null;
    }

    public function hasActiveSubscription($model)
    {
        $this->checkIsA($model, 'Illuminate\Database\Eloquent\Model', __FUNCTION__);

        $account = $this->getAccountFor($model);
        if (! $account) {
            return false;
        }

        return $account->expiration_date->endOfDay()->greaterThanOrEqualTo(\Carbon\Carbon::now());
    }

    public function daysLeftFor($model)
    {
        $this->checkIsA($model, 'Illuminate\Database\Eloquent\Model', __FUNCTION__);

        $account = $this->getAccountFor($model);
        if (! $account) {
            return -1;
        }

        return \Carbon\Carbon::now()->endOfDay()->diffInDays($account->expiration_date->endOfDay(), false);
    }

    public function getAccountFor($model)
    {
        $this->checkIsA($model, 'Illuminate\Database\Eloquent\Model', __FUNCTION__);

        return Account::where('prepaid_subable_id', $model->id)->where('prepaid_subable_type', get_class($model))->first();
    }

    public function getPaymentsFor($model)
    {
        $this->checkIsA($model, 'Illuminate\Database\Eloquent\Model', __FUNCTION__);

        $account = $this->getAccountFor($model);

        return ($account) ? $account->payments : collect([]);
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


    protected function checkIsA($object, $class, $function)
    {
        if ( ! is_a($object, $class)) {
            throw new \InvalidArgumentException("${function}: wrong parameters received.");
        }
    }
}
