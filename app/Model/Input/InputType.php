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
        return array_merge(["additional" => $this->additional], [
            "type" => $this->type,
            "name" => $this->getName(),
        ]);
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

    private $additional = [];

    private $type = 'text';

    public function setType($type)
    {
        $this->type = $type;
    }

}