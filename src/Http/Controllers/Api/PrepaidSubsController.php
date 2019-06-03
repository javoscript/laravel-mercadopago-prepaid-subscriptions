<?php

namespace Javoscript\PrepaidSubs\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Javoscript\PrepaidSubs\Facades\PrepaidSubs;
use Javoscript\PrepaidSubs\Models\Account;
use Javoscript\PrepaidSubs\Models\Payment;

/**
 * Class PrepaidSubsController
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class PrepaidSubsController
{
    public function plans()
    {
        return PrepaidSubs::getPlans();
    }

    public function generatePayment(Request $request, $model_id) {
        $validated_data = $request->validate($this->rules());
        $account = Account::where('model_id', $model_id)->first();

        $plan = PrepaidSubs::getPlans($validated_data["plan_id"]);
        // TODO: fail if no plan found

        // TODO: Add MP api call

        // Create a pending payment
        $account->payments()->create([
            'client' => $validated_data['first_name'] . ' ' . $validated_data['last_name'],
            'email'  => $validated_data['email'],
            'plan'   => $plan->toArray(),
        ]);

        // TODO: Redirect to MP response init_point
        return "ok";
    }

    public function paymentNotifications(Request $request, Payment $payment)
    {
        // TODO: Update $payment with MP status
        // TODO: Update account expiration date with plan time value


        return response(["ok"], 200);
    }
}
