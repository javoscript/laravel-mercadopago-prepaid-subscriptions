<?php

namespace Javoscript\PrepaidSubs;

/**
 * Class PrepaidPlan
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class PrepaidPlan implements \JsonSerializable
{
    protected $time_value = null;
    protected $time_unit = null;
    protected $name = null;
    protected $price = null;
    protected $old_price = null;
    protected $details = [];


    public function __construct($time_value, $time_unit, $name, $price, $old_price, $details)
    {
        // TODO: check valid values

        $this->time_value = $time_value;
        $this->time_unit = $time_unit;
        $this->name = $name;
        $this->price = $price;
        $this->old_price = $old_price;
        $this->details = $details;
    }


    /*
     * GETTERS
     * */
    public function getTimeValue()
    {
        return $this->time_value;
    }
    public function getTimeUnit()
    {
        return $this->time_unit;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getOldPrice()
    {
        return $this->old_price;
    }
    public function details()
    {
        return $this->details;
    }


    /*
     * UTILITIES
     * */

    public function JsonSerialize()
    {
        return [
            "time" => [
                "value" => $this->time_value,
                "unit" => $this->time_unit,
            ],
            "price" => $this->price,
            "old_price" => $this->old_price,
            "name" => $this->name,
            "details" => $this->details
        ];
    }
}
