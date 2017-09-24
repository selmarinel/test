<?php

namespace App\Services;


class FieldTypeGenerator
{
    public function generate(Array $options)
    {
        if (!isset($options['name'])) {
            return $this->undefined();
        }
        if (!method_exists($this, $options['name'])) {
            return $this->input($options);
        }
        $type = $options['name'];
        return $this->$type($options);
    }

    public function undefined()
    {
        echo "<div>Undefined Type</div>";
        return false;
    }

    /**
     * Add tag options
     * @param array $options
     * @return string
     */
    private function addAdditional(Array $options)
    {
        $result = '';
        if (isset($options['additional'])) {
            foreach ($options['additional'] as $option => $value) {
                $result = $result . "$option = '$value'";
            }
        }
        return $result;
    }

    private $classForInput = "form-control";

    public function setClassForInput($class)
    {
        $this->classForInput = $class;
    }

    public function getClassForInput()
    {
        return $this->classForInput;
    }

    public function input($options)
    {
        $type = $options['type'];
        if (!$type) {
            return $this->undefined();
        }
        $this->setClassForInput("form-control");
        if (in_array($type, ['checkbox', 'radio'])) {
            $this->setClassForInput("form-check-input");
            $result = $this->addTitle([]);
        } else {
            $result = $this->addTitle($options);
        }
        $result = $result . "<div class='col-sm-9'>"
            . "<input type='{$options['type']}' name='{$options['name']}' class='" . $this->getClassForInput() . "'" . $this->addAdditional($options) . ">";

        if (in_array($options['type'], ["checkbox", 'radio'])) {
            echo $result . "{$options['title']}</div></div>";
            return null;
        }
        echo $result . "</div></div>";
        return null;
    }

    public function gender(Array $options)
    {
        $result = $this->addTitle($options);
        $result = $result . "<div class='col-sm-9'>";
        foreach ($options['options'] as $optionValue => $optionName) {
            $result = $result . "<label class='form-check-label'>" .
                "<input type='radio' name='{$options['name']}' value='{$optionValue}' " . $this->addAdditional($options) . ">{$optionName}</label>";
        }
        echo $result . "</div></div>";
        return null;
    }

    public function product(Array $options)
    {
        $result = $this->addTitle($options) . "<div class='col-sm-9'>"
            . "<select name='{$options['name']}' class='form-control' style='height: 36px' " . $this->addAdditional($options) . ">"
            . "<option value=''>None</option>";
        foreach ($options['options'] as $val => $option) {
            $result = $result . "<option value='{$val}'>{$option}</option>";
        }
        echo $result . "</select></div></div>";
        return null;
    }

    public function rating(Array $options)
    {
        $result = $this->addTitle($options) . "<div class='col-sm-9' data-type='rating'>";
        for ($i = 1; $i <= $options['max']; $i++) {
            $result = $result . "<input type='radio' value='{$i}' name='{$options['name']}' class='form-check-input' " . $this->addAdditional($options) . ">";
        }
        echo $result . "</div></div>";
        return null;
    }

    private function addTitle(Array $options)
    {
        $title = '';
        if (isset($options['title'])) {
            $title = $options['title'];
        }
        return "<div class='form-group row'><label class='col-sm-2 col-form-label'>{$title}</label>";
    }


}