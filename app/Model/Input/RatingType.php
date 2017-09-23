<?php

namespace App\Model\Input;


class RatingType extends Type implements InputInterface
{
    public function render()
    {
        return array_merge(parent::render(), [
            "max" => $this->getMax()
        ]);
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