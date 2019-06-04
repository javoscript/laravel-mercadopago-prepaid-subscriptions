<?php

namespace Javoscript\PrepaidSubs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Javoscript\PrepaidSubs\Facades\PrepaidSubs;
use Javoscript\PrepaidSubs\Models\Account;
use Javoscript\PrepaidSubs\Models\Payment;

/**
 * Class ExampleController
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class PrepaidSubsController
{
    public function plans()
    {
        return PrepaidSubs::getPlans();
    }

    protected function rules()
    {
        return [
            'prepaid_subs__first_name' => 'required|max:255',
            'prepaid_subs__last_name' => 'required|max:255',
            'prepaid_subs__email' => 'required|email',
            'prepaid_subs__plan_id' => 'required|integer|in:'.collect(PrepaidSubs::getPlans())->map(function($item){ return $item->getId(); })->implode(','),
        ];
    }

    public function generatePayment(Request $request, $model_id) {
        $validated_data = $request->validate($this->rules());
        $account = Account::where('model_id', $model_id)->first();

        $plan = PrepaidSubs::getPlans($validated_data["prepaid_subs__plan_id"]);
        if (!$plan) {
            abort(404, "No se encontró plan con ese ID");
        }

        // Create a pending payment
        $payment = $account->payments()->create([
            'client' => $validated_data['prepaid_subs__first_name'] . ' ' . $validated_data['prepaid_subs__last_name'],
            'email'  => $validated_data['prepaid_subs__email'],
            'plan'   => $plan->toArray(),
        ]);

        // MP api call
        $mp_public_key   = config('prepaid-subs.sandbox_mode') ? config('prepaid-subs.mp_sandbox_public_key') : config('prepaid-subs.mp_public_key');
        $mp_access_token = config('prepaid-subs.sandbox_mode') ? config('prepaid-subs.mp_sandbox_access_token') : config('prepaid-subs.mp_access_token');

        \MercadoPago\SDK::initialize();
        \MercadoPago\SDK::setPublicKey($mp_public_key);
        \MercadoPago\SDK::setAccessToken($mp_access_token);

        $preference = new \MercadoPago\Preference();
        $preference->items = [
            [
                "id"          => $plan->getId(),
                "title"       => $plan->getName(),
                "description" => $plan->getDetails(true), // TODO: implement getDetails() as one string
                "category_id" => 1,
                "unit_price"  => $plan->getPrice(),
                "currency_id" => 'ARS',
                "quantity"    => 1
            ]
        ];

        $payer = new \MercadoPago\Payer();
        $payer->name    = $validated_data["prepaid_subs__first_name"];
        $payer->surname = $validated_data["prepaid_subs__last_name"];
        $payer->email   = $validated_data["prepaid_subs__email"];

        $preference->payer = $payer;

        $preference->notification_url = route('prepaid-subs.api.payment.notify', $payment->id);
        $preference->back_urls = [
            'success' => route('prepaid-subs.payment.success'),
            'failure' => route('prepaid-subs.payment.error'),
            'pending' => route('prepaid-subs.payment.pending')
        ];

        $preference->external_reference = $payment->id;

        $preference->save();

        $redirect = config('prepaid-subs.sandbox_mode') ? $preference->sandbox_init_point : $preference->init_point;

        return redirect($redirect);
    }


    public function updatePayment(Request $request, Javoscript\Models\Payment $payment) {
        return "ok";
    }

    public function paymentSuccess(Request $request) {
        return "success";
    }
    public function paymentError(Request $request) {
        return "error";
    }
    public function paymentPending(Request $request) {
        return "pending";
    }

}

