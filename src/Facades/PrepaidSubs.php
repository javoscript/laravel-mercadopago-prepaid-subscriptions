<?php

namespace Javoscript\PrepaidSubs\Facades;

use Illuminate\Support\Facades\Facade;


class PrepaidSubs extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'prepaid-subs';
    }

}
