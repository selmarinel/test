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

    public function input($options)
    {
        $result = $this->addTitle($options);
        $result = $result . "<div class='col-sm-10'>";
        $result = $result . "<input type='{$options['type']}' name='{$options['name']}' class='form-control'";
        foreach ($options['additional'] as $option => $value) {
            $result = $result . "'$option' = '$value'";
        }
        echo $result . " ></div></div>";
        return null;
    }

    public function gender(Array $options)
    {
        $result = $this->addTitle($options);
        $result = $result . "<div class='col-sm-10'>";
        foreach ($options['options'] as $optionValue => $optionName) {
            $result = $result . "<label class='form-check-label'><input type='radio' name='{$options['name']}' value='{$optionValue}'>{$optionName}</label>";
        }
        echo $result . "</div></div>";
        return null;
    }

    public function product(Array $options)
    {
        $result = $this->addTitle($options);
        $result = $result . "<div class='col-sm-10'>";
        $result = $result . "<select name='{$options['name']}' class='custom-select mb-2 mr-sm-2 mb-sm-0'>";
        foreach ($options['options'] as $val => $option) {
            $result = $result . "<option value='{$val}'>{$option}</option>";
        }
        echo $result . "</select></div></div>";
        return null;
    }

    public function rating(Array $options)
    {
        $result = $this->addTitle($options);
        $result = $result . "<div class='col-sm-10'>";
        for ($i = 1; $i <= $options['max']; $i++) {
            $result = $result . "<label class='form-check-label'><input type='radio' value='{$i}' name='{$options['name']}' class='form-check-input'></label>";
        }
        echo $result . "</div></div>";
        return null;
    }

    private function addTitle(Array $options)
    {
        return "<div class='form-group row'><label class='col-sm-2 col-form-label'>{$options['title']}</label>";
    }


}