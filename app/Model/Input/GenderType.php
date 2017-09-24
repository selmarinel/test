<?php
/**
 * Created by PhpStorm.
 * User: selma
 * Date: 22.09.2017
 * Time: 19:39
 */

namespace App\Model\Input;

class GenderType extends Type implements InputInterface
{
    private $values = [
        1 => "Male",
        2 => "Female"
    ];

    public function render()
    {
        return array_merge(parent::render(), [
            "options" => $this->values
        ]);
    }

}