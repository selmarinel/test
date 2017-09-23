<?php

namespace App\Services;


class FieldTypeGenerator
{
    public function generate(Array $options)
    {
        if (!isset($options['name'])) {
            return $this->def();
        }
        if (!method_exists($this, $options['name'])) {
            return $this->def();
        }
        $type = $options['name'];
        return $this->$type($options);
    }

    public function def()
    {
        echo "<div>Undefined Type</div>";
        return false;
    }

    public function gender(Array $options)
    {
        if (!isset($options['options']) || !isset($options['name'])) {
            return $this->def();
        }
        $result = $this->addTitle($options);
        foreach ($options['options'] as $optionValue => $optionName) {
            $result = $result . "<input type='radio' name='{$options['name']}' value='{$optionValue}'><label>{$optionName}</label>";
        }
        echo $result . "</div>";
    }

    public function alter(Array $options)
    {
        $result = $this->addTitle($options);
        $result = $result . "<input type='{$options['type']}' name='{$options['name']}'";
        foreach ($options['additional'] as $option => $value) {
            $result = $result . "'$option' = '$value'";
        }
        echo $result . " ></div>";
    }

    public function product(Array $options)
    {
        $result = $this->addTitle($options);
        $result = $result . "<select name='{$options['name']}'>";
        foreach ($options['options'] as $val=>$option) {
            $result = $result . "<option value='{$val}'>{$option}</option>";
        }
        echo $result . "</select></div>";
    }

    private function addTitle(Array $options)
    {
        return "<div><span>{$options['title']}</span>";
    }


}