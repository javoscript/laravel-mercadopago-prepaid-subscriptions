<?php

namespace Javoscript\PrepaidSubs;

use Javoscript\PrepaidSubs\PrepaidPlan;

/**
 * Class PrepaidSubs
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class PrepaidSubs
{

    public function getPlans()
    {
        $config_plans = config('prepaid-subs.plans');
        $plans = [];

        foreach($config_plans as $plan) {
            $plans[] = new PrepaidPlan(
                $plan["time"]["value"],
                $plan["time"]["unit"],
                $plan["price"],
                $plan["old_price"],
                $plan["name"],
                $plan["details"]
            );
        }

        return $plans;
    }

}
