<?php

namespace Javoscript\PrepaidSubs;


class PrepaidPlan implements \JsonSerializable
{
    protected $id = null;
    protected $time_value = null;
    protected $time_unit = null;
    protected $name = null;
    protected $price = null;
    protected $old_price = null;
    protected $details = [];


    public function __construct($id, $time_value = 1, $time_unit = "month", $name = "Plan", $price = 1, $old_price = null, $details = [])
    {
        // TODO: check valid values

        $this->id = $id;
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
    public function getId()
    {
        return $this->id;
    }
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
    public function getDetails()
    {
        return $this->details;
    }


    /*
     * UTILITIES
     * */

    public function JsonSerialize()
    {
        return [
            "time_value" => $this->time_value,
            "time_unit" => $this->time_unit,
            "price" => $this->price,
            "old_price" => $this->old_price,
            "name" => $this->name,
            "details" => $this->details
        ];
    }

    public function toJson()
    {
        return json_encode($this);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
