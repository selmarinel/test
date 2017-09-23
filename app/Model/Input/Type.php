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
        return array_merge(["additional" => $this->getAdditional()], ["name" => $this->getName()]);
    }

    /**
     * Array like^
     * ['class' => 'class', 'max'=>12,'min'='1']
     * @param array $additional
     */
    public function setAdditional(Array $additional)
    {
        $this->additional = $additional;
    }

    public function getAdditional()
    {
        return $this->additional;
    }

    private $additional = [];

    const GENDER = 1;
    const ALTER = 2;
    const PRODUCT = 3;
    const COST = 4;
    const CHECKBOX = 5;
    const RATING = 6;
    const AUTOCOMPLETE = 7;

}