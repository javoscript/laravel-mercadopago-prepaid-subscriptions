<?php

namespace Javoscript\PrepaidSubs\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExampleModel
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class Account extends Model
{
    protected $table = 'prepaid_subs_accounts';

    protected $dates = [
        'expiration_date',
    ];

    public function model()
    {
        return $this->belongsTo(config('prepaid-subs.model'), 'model_id');
    }

}
