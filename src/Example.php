<?php

namespace Javoscript\PrepaidSubs;

/**
 * Class Example
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class Example
{

    public function hello()
    {
        // Using packages config
        return config('prepaid-subs.greet');
    }

}
