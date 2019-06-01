<?php

namespace Javoscript\PrepaidSubs\Http\Controllers;

use Javoscript\PrepaidSubs\Facades\PrepaidSubs;

/**
 * Class ExampleController
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class ExampleController
{
    public function greet()
    {
        return PrepaidSubs::hello();
    }
}

