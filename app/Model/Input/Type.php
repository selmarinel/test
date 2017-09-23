<?php

namespace App\Model\Input;


use Illuminate\Database\Eloquent\Model;

class Type extends Model implements InputInterface
{
    protected $table = "input_type";

    protected $fillable = ["name"];

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function render()
    {
        // TODO: Implement render() method.
    }

    const GENDER = 1;
    const ALTER = 2;
    const PRODUCT = 3;
    const COST = 4;
    const CHECKBOX = 5;
    const RATING = 6;
    const AUTOCOMPLETE = 7;

}