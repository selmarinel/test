<?php
/**
 * Created by PhpStorm.
 * User: selma
 * Date: 22.09.2017
 * Time: 19:33
 */

namespace App\Model\Input;


interface InputInterface
{

    public function getName();

    public function render();
}