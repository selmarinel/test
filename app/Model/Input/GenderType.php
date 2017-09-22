<?php
/**
 * Created by PhpStorm.
 * User: selma
 * Date: 22.09.2017
 * Time: 19:39
 */

namespace App\Model\Input;

class GenderType extends AbstractType implements InputInterface
{
    private $values = [
        1 => "Male",
        2 => "Female"
    ];

    public function render()
    {
        // TODO: Implement render() method.
    }
}