<?php

namespace App\Model\Input;


class RatingType extends Type implements InputInterface
{
    public function render()
    {
        return [
            "name" => $this->getName(),
            "max" => $this->getMax()
        ];
    }

    private $max = 5;

    public function setMax($max)
    {
        $this->max = $max;
    }

    public function getMax()
    {
        return $this->max;
    }
}