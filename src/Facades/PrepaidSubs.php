<?php

namespace Javoscript\PrepaidSubs\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class PrepaidSubs
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class PrepaidSubs extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'prepaid-subs';
    }

}
