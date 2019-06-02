<?php

namespace Javoscript\PrepaidSubs\Http\Controllers;

use Javoscript\PrepaidSubs\Facades\PrepaidSubs;

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
}

