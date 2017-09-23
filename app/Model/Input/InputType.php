<?php
/**
 * Created by PhpStorm.
 * User: selma
 * Date: 22.09.2017
 * Time: 19:43
 */

namespace App\Model\Input;


class InputType extends Type implements InputInterface
{
    public function render()
    {
        return array_merge(parent::render(), [
            "type" => $this->type,
        ]);
    }

    private $type = 'text';

    public function setType($type)
    {
        $this->type = $type;
    }

}