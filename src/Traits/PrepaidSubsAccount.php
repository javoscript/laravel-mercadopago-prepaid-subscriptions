<?php

namespace Javoscript\PrepaidSubs\Traits;

/**
 * Class PrepaidSubsAccount
 * @author Javier Ugarte <javougarte@gmail.com>
 */
trait PrepaidSubsAccount
{

    public function prepaid_account()
    {
        return $this->hasOne('\Javoscript\PrepaidSubs\Models\Account', 'model_id', 'id');
    }

}
