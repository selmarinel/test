<?php

namespace App\Model\Input;

use App\Model\Produkts;
use Illuminate\Database\Eloquent\Model;

class SelectType extends AbstractType implements InputInterface
{

    private $className;

    private $options = [];

    public function setEntity($className)
    {
        $this->className = $className;
    }

    public function setOptions(Array $options)
    {
        $this->options = $options;
    }

    public function getOptionsFromEntity()
    {
        $this->options = [];
        if (class_exists($this->className)) {
            $className = $this->className;
            $classEntity = $className();
            if ($classEntity instanceof Model) {
                $collection = $classEntity->newQuery()->get();
                foreach ($collection as $model) {
                    $this->options[$model->id] = $model->name;
                }
            }
        }
        return $this->options;
    }

    public function getOptions()
    {
        if($this->className){
            return $this->getOptionsFromEntity();
        }
        return $this->options;
    }


    public function render()
    {
        return [
            "name" => $this->getName(),
            "options" => $this->getOptions()
        ];
    }
}