<?php

namespace Javoscript\PrepaidSubs;

use Javoscript\PrepaidSubs\PrepaidPlan;

/**
 * Class PrepaidSubs
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class PrepaidSubs
{
    public function getExpirationDateFor($model_id)
    {
        $account = \Javoscript\PrepaidSubs\Models\Account::where('model_id', $model_id)->first();
        return ($account) ? $account->expiration_date : null;
    }

    public function getPlans($id = null)
    {
        $config_plans = config('prepaid-subs.plans');
        $plans = [];

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

            if ($id && $new_plan->getId() == $id) {
                return $new_plan;
            }

            $plans[] = $new_plan;
        }

        return $plans;
    }

}
