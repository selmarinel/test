<?php

namespace App\Model\Input;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractType extends Model
{
    protected $table = "input_type";

    protected $fillable = ["name"];

    public function getName()
    {
        return $this->attributes['name'];
    }

}